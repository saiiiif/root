@component('mail::message')


    Bonjour  {{$data['data']->name}} , <br>

    Nous avons reçu une demande de réinitialisation de votre mot de passe: <br>

    @component('mail::button', ['url' => ('/admin/reset/'.$data['token'])])
        Cliquez ici pour changer votre mot de passe.
    @endcomponent
    Vous pouvez également copier le lien de réinitialisation du mot de passe :
    <a href="{{url('/admin/reset/'.$data['token'])}}">{{url('/admin/reset/'.$data['token'])}}</a>

    Merci,<br>

@endcomponent