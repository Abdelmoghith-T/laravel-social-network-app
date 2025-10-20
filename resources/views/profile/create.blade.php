<x-master title="Create a profile" >
    <div class="container mb-5 ps-5">
        <h1 class=" pt-3 ps-0">Create a profile</h1>
        <form  method="post" action={{ route("profiles.store") }}>
            @csrf
            <div class="mb-3">
                <label class="form-label">Full name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Bio</label>
                <textarea class="form-control" name="bio" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </div>
            
        </form>
    </div>

</x-master>