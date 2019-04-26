@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div id="app">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="box">

                    <user />

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
