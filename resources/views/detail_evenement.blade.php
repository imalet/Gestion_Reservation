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
    <section class="sm:mt-6 lg:mt-8 mt-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="mx-7">
            <a href="/"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Page d'Accueil &nbsp; <span aria-hidden="true"></span>
            </a>
            &nbsp; &nbsp;
            @if (Auth::guard('association')->check())
            <a href="{{ route('evenement.create') }}"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Ajouter un Evenements &nbsp; <span aria-hidden="true">+</span>
            </a>
            &nbsp; &nbsp;
            <a href="{{ route('evenement.list') }}"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Mes Publications &nbsp; <span aria-hidden="true">+</span>
            </a>
            &nbsp; &nbsp;
            <a href="{{ route('association.reservations.liste') }}"
                class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Voir les resevations &nbsp; <span aria-hidden="true"></span>
            </a>
            @endif
        </div>

        {{-- <h1>{{ $evenement->libelle }}</h1>

        @if (Auth::guard('association')->check())
        <a href="{{route('evenement.edit',['evenement'=>$evenement->id])}}">Modifier</a>
        <a href="{{ route('evenement.destroy',['evenement'=>$evenement->id]) }}">Spprimer</a>
        @else
        <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}">Reserver</a>
        @endif --}}


        <div
            class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 flex gap-3 lg:flex-justify lg:flex flex-col lg:flex-row">

            <div class="sm:text-center lg:text-left">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-6xl">
                    <span class="block xl:inline">{{ $evenement->libelle }}</span>
                    <span class="block text-indigo-600 ">{{ $evenement->association->name }}</span>
                </h1>
                <p
                    class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt
                    amet
                    fugiat veniam occaecat fugiat aliqua.
                </p>
                <!-- Button Section -->
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                    @if (Auth::guard('association')->check() )


                    @if (Auth::guard('association')->user()->id === $evenement->association_id)
                    <div class="rounded-md shadow">
                        <a href="{{route('evenement.edit',['evenement'=>$evenement->id])}}"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600  md:py-4 md:text-lg md:px-10">
                            Modifier
                        </a>
                    </div>

                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="{{ route('evenement.destroy',['evenement'=>$evenement->id]) }}"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 md:py-4 md:text-lg md:px-10">
                            Supprimer
                        </a>
                    </div>
                    @endif



                    @else

                    {{-- @if ($evenement->user_id === Auth::guard('web')->user()->id)
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 md:py-4 md:text-lg md:px-10">
                            Deja Réservé
                        </a>
                    </div>
                    @endif --}}

                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 md:py-4 md:text-lg md:px-10">
                            Reserver
                        </a>
                    </div>


                    @endif
                </div>
                <!-- End of Button Section -->
            </div>

            <!--   Image Section     -->
            <div class="lg:inset-y-0 lg:right-0 lg:w-1/2 my-4">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                    src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80"
                    alt="">
            </div>
            <!--   End of Image Section     -->
        </div>

    </section>

</body>

</html>