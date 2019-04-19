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
                            <h3 class="subtitle is-6 has-text-centered">Verify your email address!</h3>

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
