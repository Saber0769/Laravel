@if ($erreur != "")
<p>
    <div class="alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sing" aria-hidden="true"></span> {{$erreur}}
    </div>
</p>
@endif