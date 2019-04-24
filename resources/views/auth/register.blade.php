@extends('layouts.app')

@section('content')
<div id="main">
    <div class="container">
        <div>
            <div class="hero-body">
                <div class="columns">
                    <div class="column is-6 is-offset-3">
                        <div class="box">
                            <h1 class="title is-4 has-text-centered "><i class="fas fa-lightbulb"></i>Idealist</h1>

                            <div class="tabs is-centered is-fullwidth">
                                <ul>
                                    <li><a href="/login">Login</a></li>
                                    <li class="is-active"><a href="/register">Register</a></li>
                                </ul>
                            </div>

                            @include('layouts.errors')

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="field">
                                    <div class="control">
                                        <label for="name" class="label">Name:</label>
                                        <input type="text" class="input" name="name" id="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="email" class="label">Email address:</label>
                                        <input type="email" class="input" name="email" id="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="password" class="label">Password:</label>
                                        <input type="password" class="input" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="password-confirm" class="label">Confirm password:</label>
                                        <input type="password" class="input" name="password_confirmation" id="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control has-text-centered">
                                        <button type="submit" class="button is-info">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
