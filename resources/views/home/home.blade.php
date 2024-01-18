@extends('base')

@section('title', 'Login')

@section('content')
   <div class="container">
     <div class="col-md-4 mx-auto">
        <h1 class="text-center text-muted mb-3 mt-5">Gestion des etudiants</h1>
        <p class="text-center text-muted mb-5"></p>

        <form method="POST" action="{{route('login')}}">
            @csrf

            @error('email')
            <div class="alert alert-danger text-center" role="alert">
                {{ $message }}
              </div>
            @enderror

            @error('password')
            <div class="alert alert-danger text-center" role="alert">
                {{ $message }}
              </div>
            @enderror

            <label for="email" class="email">Email </label>
            <input type="email" name="email" placeholder="m....n@mail.com" id="email" class="form-control mb-3 @error('email') is-invalid @enderror" value="{{old('email')}}" required autocomplete="email" autofocus>

            <label for="password" class="password">Mot de passe </label>
            <input type="password" name="password" placeholder="Password" id="password" class="form-control mb-3 @error('password') is-invalid @enderror" value="{{old('password')}}" required autocomplete="password" autofocus>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember" {{old('remember') ? 'checked' : ''}} >
                    <label class="form-check-label" for="remember">
                      Se souvenir de moi
                    </label>
                  </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#">mot de passe oublier?</a>
                </div>
            </div>
            <div class="d-grid gap-2">
            <button class="btn btn-primary " type="submit">Se connecter</button>
        </div>
        </form>
     </div>
   </div>
@endsection
