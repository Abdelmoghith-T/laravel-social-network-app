<x-master title="Profiles">
    <h1 class="text-center m-2">Profiles</h1>
    <div class="container p-2">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Bio</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                    @php
                        $shortBio = Str::limit($profile->bio, 50,"");
                    @endphp
                    
                    <tr>
                        <td class="text-center">{{ $profile->id }}</td>
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->email }}</td>
                        <td>
                            <div class="bio-container" style="max-width: 350px;">
                                <span class="short-bio d-inline">{{ $shortBio }}</span>
                                <span class="full-bio d-none">{{ $profile->bio }}</span>
                                <a href="#" class="read-more-link text-body-secondary fw-semibold ms-1">...read more</a>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-outline-primary" href={{route('profiles.show',$profile->id)}} role="button">show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$profiles->links()}}
    </div>

    <style>
        /* make the link nice */
        .read-more-link {
        text-decoration: none !important;
        cursor: pointer;
        outline: none !important; 
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
            from { opacity: 0; }
            to { opacity: 1; }
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
