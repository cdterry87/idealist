@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div id="app">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="box">
                    <div class="tabs is-centered">
                        <ul>
                            <li class="{{ Request::is('settings') ? 'is-active' : '' }}"><a href="/settings"><span class="icon fas fa-cogs"></span><span>Settings</span></a></li>
                            <li class="{{ Request::is('myideas') ? 'is-active' : '' }}"><a href="/myideas"><span class="icon fas fa-lightbulb"></span>My Ideas<span></span></a></li>
                            <li class="{{ Request::is('favorites') ? 'is-active' : '' }}"><a href="/favorites"><span class="icon fas fa-star"></span><span>Favorites</span></a></li>
                            <li class="{{ Request::is('history') ? 'is-active' : '' }}"><a href="/history"><span class="icon fas fa-history"></span><span>History</span></a></li>
                        </ul>
                    </div>

                    @yield('usersection')

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
