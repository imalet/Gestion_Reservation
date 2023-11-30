<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1>{{ $evenement->libelle }}</h1>

    @if (Auth::guard('association')->check())
    <a href="{{route('evenement.edit',['evenement'=>$evenement->id])}}">Modifier</a>
    <a href="{{ route('evenement.destroy',['evenement'=>$evenement->id]) }}">Spprimer</a>
    @else
    <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}">Reserver</a>
    @endif

</body>

</html>