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
            @foreach ($evenements as $evenement)
            <div class="mb-6 rounded-lg bg-white p-6 border">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="mr-2 h-10 w-10 rounded-full object-cover"
                            src="{{ Storage::url($evenement->path_image) }}"
                            alt="profile" />
                        <div>
                            <h3 class="text-base font-semibold text-gray-900">{{ $evenement->libelle }}</h3>
                            <span class="block text-xs font-normal text-gray-500">Association</span>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('evenement.detail',['evenement'=>$evenement->id]) }}"
                            class="text-sm font-medium text-stone-500"><span>+</span>Voir Detail</a>
                        <br>

                        {{-- <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}"
                            class="text-sm font-medium text-green-500"><span>+</span>Reserver une place</a> --}}

                        @if (!Auth::guard('association')->check())
                        <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}"
                            class="text-sm font-medium text-green-500"><span>+</span>Reserver</a>
                        {{-- <a href="{{ route('evenement.destroy',['evenement'=>$evenement->id]) }}"
                            class="text-sm font-medium text-red-500"><span>+</span>Corbeille</a> --}}
                        
                        {{-- <a href="{{ route('client.reservation.form',['evenement'=>$evenement->id]) }}"
                            class="text-sm font-medium text-green-500"><span>+</span>Reserver une place</a> --}}
                        @endif

                    </div>
                </div>
                <p class="my-5 text-sm font-normal text-gray-500">{{ $evenement->description }}.</p>
                <div class="mt-6 flex items-center justify-between text-sm font-semibold text-gray-900">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mr-2 h-5 w-5 text-base text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                        <span class="mr-1">40</span> Task
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mr-1 h-5 w-6 text-yellow-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                        4,7 (750 Reviews)
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>