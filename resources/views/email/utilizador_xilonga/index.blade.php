@component('mail::message')
<p>Email do remetente: {{$email}} <br>
Nome do remetente: {{$vc_nome}} <br>
Sobenome do remetente: {{$vc_apelido}} <br>
Telefone do remetente: {{$vc_telefone}} <br></p>
<p>
<h3>Mensagem do remetente:</h3><br>{{$vc_mensagem}}
</p>
@endcomponent