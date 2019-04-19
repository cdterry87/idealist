@extends('layouts.app')

@section('content')
<div class="container">
    <div class="hero">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-4 is-offset-4">
                    <div class="box">
                        <h1 class="title is-4 has-text-centered "><i class="fas fa-lightbulb"></i>Idealist</h1>
                        <h3 class="subtitle is-6 has-text-centered">Reset your password!</h3>

                        @include('layouts.errors')

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

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
                                        {{ __('Reset Password') }}
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
