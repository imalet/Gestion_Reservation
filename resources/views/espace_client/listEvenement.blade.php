<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Liste des evenements disponibles</h1>
    @foreach ($evenements as $evenement)
        <h2>{{ $evenement->libelle }}</h2>
        <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}">Reserver</a>
    @endforeach
</body>
</html>