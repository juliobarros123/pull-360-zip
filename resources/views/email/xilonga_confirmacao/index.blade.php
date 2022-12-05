@component('mail::message')
{{--
    Email do remetente: {{$email}} <br>
Nome do remetente: {{$vc_nome}} <br>
Mensagem do remetente:
--}}
{{$vc_mensagem}}
@endcomponent