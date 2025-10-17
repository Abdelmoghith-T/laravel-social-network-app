<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Social Network</a>

      <div class=" navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('myprofile.index') }}">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profiles.index') }}">Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.index') }}">Settings</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>