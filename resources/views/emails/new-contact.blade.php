<h2>Richiesta ricevuta!</h2>

<p>Ciao {{$publicData["name"]}}, grazie per averci contattato</p>
<div>-------------------------------</div>

<div>Recap della sua richiesta</div>
<ul>
    <li>{{$publicData["email"]}}</li>
    <li>{{$publicData["message_subject"]}}</li>
    <li>{{$publicData["message"]}}</li>
</ul>

