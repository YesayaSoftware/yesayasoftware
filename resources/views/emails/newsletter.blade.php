@component('mail::message')
    {{ $newsletter->body }}

    @component('mail::button', ['url' => route('newsletters.index')])
        {{ __('View Newsletter') }}
    @endcomponent
@endcomponent
