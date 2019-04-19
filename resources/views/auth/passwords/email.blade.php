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

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('layouts.errors')

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="field">
                                <div class="control">
                                    <label for="email" class="label">Email address:</label>
                                    <input type="email" class="input" name="email" id="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-text-centered">
                                    <button type="submit" class="button is-info">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                    <a href="/login" class="button is-link">Login</a>
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
