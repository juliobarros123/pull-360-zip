@component('mail::message')
Email do remetente: {{$email}} <br>
Nome do remetente: {{$vc_nome}} <br>
Sobenome do remetente: {{$vc_apelido}} <br>
Telefone do remetente: {{$vc_telefone}} <br>
Mensagem do remetente:{{$vc_mensagem}}
@endcomponent