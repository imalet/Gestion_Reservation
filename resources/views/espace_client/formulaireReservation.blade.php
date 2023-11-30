<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reservation Evenement : {{ $evenement->libelle }}</h1>

    <form action="{{ route('client.reservation.confirmation') }}" method="post">
        @csrf
        <label for="">Nombre de personne</label>
        <input type="number" name="nombre_de_personne" value="1">
        <br>
        <input type="number" name="evenement_id" value="{{ $evenement->id }}" hidden>
        <br>
        <input type="submit" value="Confirmation de reservation">
    </form>
</body>
</html>