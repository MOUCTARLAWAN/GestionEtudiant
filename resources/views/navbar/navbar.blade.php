<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">{{ config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @if(Request::route()->getName() == 'app_home') active @endif" aria-current="page" href="{{ route('app_home') }}"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link  @if(Request::route()->getName() == 'app_about') active @endif " aria-current="page" href="{{ route('app_about') }}"></a>
          </li>
        </ul>
      </div>
      <div class="dropdown">
        @auth
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> {{Auth::user()->name}} </button>
        <ul >
             <li><a href="{{route('app_logout')}}">Logout</a></li>
        </ul>

        @endauth

     </div>

    </div>
  </nav>

