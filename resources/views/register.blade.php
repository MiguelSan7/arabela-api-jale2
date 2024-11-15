@extends('layouts.app')

@section('content')
<script src="https://www.google.com/recaptcha/api.js?render=6Lc1JuUpAAAAAHNJwJzMZnzTylJlVZ4tP6P1KXwD"></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Registro de Usuario') }}</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('registerpost') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nombre">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="lastname_p" type="text" class="form-control @error('lastname_p') is-invalid @enderror" name="lastname_p" value="{{ old('lastname_p') }}" autocomplete="lastname_p" placeholder="Apellido Paterno">
                                @error('lastname_p')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input id="lastname_m" type="text" class="form-control @error('lastname_m') is-invalid @enderror" name="lastname_m" value="{{ old('lastname_m') }}" autocomplete="lastname_m" placeholder="Apellido Materno">
                                @error('lastname_m')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirmar Contraseña">
                            </div>
                        </div>

                        @error('g-recaptcha-response')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="btn btn-link">¿Ya tienes una cuenta? Inicia sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('submit', function(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc1JuUpAAAAAHNJwJzMZnzTylJlVZ4tP6P1KXwD', {action: 'submit'}).then(function(token) {
                let form = e.target;
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'g-recaptcha-response';
                input.value = token;
                form.appendChild(input);
                form.submit();
            });
        });
    });
</script>
@endsection
