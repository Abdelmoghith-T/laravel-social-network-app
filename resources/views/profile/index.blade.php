<x-master title="Profiles">
    <div style="background-color: #f2f4f7;">
        <h1 class="text-center p-3">Profiles</h1>
        <div class="container ">

            @foreach ($profiles as $profile)
                @php
                    $shortBio = Str::limit($profile->bio, 50, "");
                @endphp

                <div class="card p-3 mb-2 rounded-4 d-flex flex-row align-items-start shadow-sm mx-auto " style="max-width: 80%; border: 1px solid #ebeaea;">
                    <img src="https://picsum.photos/80" alt="Profile" class="rounded-circle me-3"
                        style="width: 65px; height: 65px; object-fit: cover;">
                    <div>
                        <h5 class="card-title mb-1" >{{ $profile->name }}</h5>

                        <div class="bio-container card-text text-muted mb-0" style="max-width: 450px;">
                            <span class="short-bio d-inline">{{ $shortBio }}</span>
                            <span class="full-bio d-none">{{ $profile->bio }}</span>
                            <a href="#" class="read-more-link text-body-secondary fw-semibold ms-1">...read more</a>
                        </div>
                    </div>
                    <a href={{route('profiles.show',$profile->id)}} class="stretched-link"></a>
                </div>
            @endforeach

            {{$profiles->links()}}
        </div>        
    </div>


    <style>
        /* make the link nice */
        .read-more-link {
            text-decoration: none !important;
            cursor: pointer;
            outline: none !important;
            /* make the link be on top the stretched show link */
            position: relative;
            z-index: 5;
        }

        .read-more-link:hover {
            text-decoration: underline !important;
        }


        /* contain long bio text */
        .bio-container {
            display: block;
            white-space: normal;
            overflow: hidden;
            word-wrap: break-word;
        }

        /* smooth transition for expanding */
        .full-bio {
            display: none;
        }

        .full-bio.show {
            display: inline;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.read-more-link');

            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    const container = this.closest('.bio-container');
                    const shortBio = container.querySelector('.short-bio');
                    const fullBio = container.querySelector('.full-bio');

                    if (fullBio.classList.contains('d-none')) {
                        shortBio.classList.add('d-none');
                        fullBio.classList.remove('d-none');
                        fullBio.classList.add('show');
                        this.textContent = '...read less';
                    } else {
                        fullBio.classList.add('d-none');
                        fullBio.classList.remove('show');
                        shortBio.classList.remove('d-none');
                        this.textContent = '...read more';
                    }
                });
            });
        });
    </script>
</x-master>