@if(count($errors))
<div class="columns">
    <div class="column is-full">
        <div class="message is-danger">
            <div class="message-body">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
