<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <div class="sm:mt-6 lg:mt-8 mt-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="m-5">
            <a href="/"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Page d'Accueil &nbsp; <span aria-hidden="true"></span>
            </a>
            @if (Auth::guard('association')->check())

            &nbsp; &nbsp;
            <a href="{{ route('evenement.create') }}"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Ajouter un Evenements &nbsp; <span aria-hidden="true">+</span>
            </a>
            &nbsp; &nbsp;
            <a href="{{ route('evenement.list') }}"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Mes Publications &nbsp; <span aria-hidden="true"></span>
            </a>
            &nbsp; &nbsp;
            <a href="{{ route('association.reservations.liste') }}"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Voir les resevations &nbsp; <span aria-hidden="true"></span>
            </a>
            @endif
        </div>

        <div class="grid sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 p-5">
            @foreach ($reservations as $reservation)
            <div class="mb-6 rounded-lg bg-white p-6 border">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        {{-- <img class="mr-2 h-10 w-10 rounded-full object-cover"
                            src="{{ Storage::url($reservation->user->path_image) }}"
                            alt="profile" /> --}}
                        <div>
                            <h3 class="text-base font-semibold text-gray-900">{{ $reservation->user->firstName }} {{ $reservation->user->lastName }}</h3>
                            <span class="block text-xs font-normal text-gray-500">Client</span>
                        </div>
                    </div>

                    <div>
                        @if ($reservation->est_accepte_ou_pas === 'accepte')
                        <a href="{{ route('association.reservation.update',['reservation'=>$reservation->id, 'etat'=>'decline']) }}"
                            class="text-sm font-medium text-red-500"><span>+</span>Decliner</a>
                        @elseif ($reservation->est_accepte_ou_pas === 'decline')
                        <a href="{{ route('association.reservation.update',['reservation'=>$reservation->id, 'etat'=>'accepte']) }}"
                            class="text-sm font-medium text-green-600"><span>+</span>Accepter</a>
                        @endif
                    </div>
                </div>
                <p class="mt-5 text-sm font-normal text-gray-500"> <b>Evenement</b> : {{ $reservation->evenement->libelle }} / <b> Nombre de Place : </b> {{ $reservation->nombre_de_personne }}</p>

            </div>
            @endforeach
        </div>
    </div>
</body>

</html>