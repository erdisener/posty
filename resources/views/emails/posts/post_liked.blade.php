@component('mail::message')
# Bir gönderin beğenildi!

{{ $liker->name }} kişisi gönderini beğendi!

@component('mail::button', ['url' => route('posts.show', $post)])
Gönderiyi Gör
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
