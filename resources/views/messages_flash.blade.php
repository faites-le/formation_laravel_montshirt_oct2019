@if(session('notice'))
    <div class="alert alert-primary message_flash">
        {!! session('notice') !!}
    </div>
@endif
