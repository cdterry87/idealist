@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div id="app">
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                <div class="box">
                    <div class="buttons">
                        <a href="/settings" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-cogs"></i>
                            </span>
                            <span>Settings</span>
                        </a>
                        <a href="/myideas" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-lightbulb"></i>
                            </span>
                            <span>My Ideas</span>
                        </a>
                        <a href="/favorites" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-star"></i>
                            </span>
                            <span>Favorites</span>
                        </a>
                        <a href="/history" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-history"></i>
                            </span>
                            <span>History</span>
                        </a>
                        <a href="/logout" class="button is-fullwidth is-danger"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>
                    </div>
                </div>
            </div>
            <div class="column is-9">

                @yield('myideas')

            </div>
        </div>
    </div>
</div>

@endsection
