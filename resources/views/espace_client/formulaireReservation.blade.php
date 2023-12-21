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
    {{-- <h1>Reservation Evenement : {{ $evenement->libelle }}</h1> --}}

    <form action="{{ route('client.reservation.confirmation') }}" method="post">
        @csrf
        {{-- <label for="">Nombre de personne</label>
        <input type="number" name="nombre_de_personne" value="1">
        <br>
        <input type="number" name="evenement_id" value="{{ $evenement->id }}" hidden>
        <br>
        <input type="submit" value="Confirmation de reservation"> --}}


        <div class="flex flex-1 flex-col  justify-center space-y-5 max-w-md mx-auto mt-24">
            <div class="flex flex-col space-y-2 text-center">
                <h3 class="text-2xl md:text-1xl font-bold">Confirmation de la Reservation <br> {{ $evenement->libelle }}
                </h3>
                {{-- <p class="text-md md:text-xl">
                    Confirmation de la Reservation {{ $evenement->libelle }}
                </p> --}}
            </div>
            <div class="flex flex-col max-w-md space-y-5">
                <input type="number" name="nombre_de_personne" value="1" placeholder="otp"
                    class="flex px-3 py-2 md:px-4 md:py-3 border-2 border-green rounded-lg font-medium placeholder:font-normal" />

                <input type="number" name="evenement_id" value="{{ $evenement->id }}" placeholder="otp"
                    class="flex px-3 py-2 md:px-4 md:py-3 border-2 border-black rounded-lg font-medium placeholder:font-normal hidden" />

                @if (Auth::guard('web')->check())
                <button
                    class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-whith bg-green-500 text-white"
                    type="submit">
                    Confirmer la Reservation
                </button>
                @endif
            </div>
        </div>
    </form>
</body>

</html>