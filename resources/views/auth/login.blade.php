@extends('layouts.app')

@section('content')
<div id="main">
    <div class="container">
        <div class="hero">
            <div class="hero-body">
                <div class="columns">
                    <div class="column is-4 is-offset-4">
                        <div class="box">
                            <h1 class="title is-4 has-text-centered "><i class="fas fa-lightbulb"></i>Idealist</h1>
                            <h3 class="subtitle is-6 has-text-centered">Login to share ideas!</h3>

                            @include('layouts.errors')

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field">
                                    <div class="control">
                                        <label for="email" class="label">Email address:</label>
                                        <input type="text" class="input" name="email" id="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="password" class="label">Password:</label>
                                        <input type="password" class="input" name="password" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label class="checkbox" for="remember">
                                            <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control has-text-centered">
                                        <button type="submit" class="button is-info">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="button is-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
