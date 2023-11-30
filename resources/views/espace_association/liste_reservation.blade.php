<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>List des Resevations</h2>

    @foreach ($reservations as $reservation)
        <h3>Evenement : {{ $reservation->evenement->libelle }}</h3>
        <h5> Nom : {{ $reservation->user->firstName }}</h5>
        <h5>Date de reservation : {{ $reservation->created_at }}</h5>
        <h5>Etat reservation : {{ $reservation->est_accepte_ou_pas }}</h5>
        @if ($reservation->est_accepte_ou_pas === 'accepte')
            <a href="{{ route('association.reservation.update',['reservation'=>$reservation->id, 'etat'=>'decline']) }}">Decline</a>
        @elseif ($reservation->est_accepte_ou_pas === 'decline')
        <a href="{{ route('association.reservation.update',['reservation'=>$reservation->id, 'etat'=>'accepte']) }}">Accepter</a>
        @endif
        
    @endforeach

</body>
</html>