@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div id="main">
    <div class="container">
        <div class="columns">
            <div class="column is-half">
                <div class="box">
                    <h2 class="title is-5 has-text-centered">Submit your ideas!</h2>
                    <hr>
                    <div class="field has-addons">
                        <div class="control has-icons-left is-expanded">
                            <textarea name="idea" id="idea" class="textarea" rows="2" placeholder="This could be your best idea yet!"></textarea>
                        </div>
                    </div>
                    <div class="control">
                        <div class="control">
                            <button class="button is-info is-fullwidth">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <h2 class="title is-5 has-text-centered">Cast your votes!</h2>
                    <hr>
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus leo nec massa viverra, et scelerisque ante vestibulum.
                            </div>
                        </div>
                        <div class="media-right">
                            <span class="icon is-small">
                                <i class="fa fa-arrow-up"></i>
                            </span>
                            <span class="icon is-small">
                                <i class="fa fa-arrow-down"></i>
                            </span>
                            <span class="icon is-small">
                                <i class="fa fa-star"></i>
                            </span>
                        </div>
                    </article>
                </div>
            </div>
            <div class="column is-half">
                <div class="box">
                    <h2 class="title is-5 has-text-centered">Top ideas</h2>
                    <hr>
                    <article class="media">
                        <figure class="media-left">
                            <p class="image is-32x32">
                                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus leo nec massa viverra, et scelerisque ante vestibulum.
                            </div>
                        </div>
                        <div class="media-right">
                            <span class="icon is-small">
                                <i class="fa fa-star"></i>
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
