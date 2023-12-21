<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    <title>Alpine.js Example</title>
</head>

<body>
    <div class="bg-white p-4 py-8">
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800 bg-white">
            <a href="/">Retoure</a> / Publier un Evenemenet
        </div>
        <form action="{{ route('evenement.store') }}" method="post" enctype="multipart/form-data">
           @csrf
            <div
                class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">


                {{-- Libelle de l'Evenement --}}
                <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
                    placeholder="Libelle de l'Evenement..." type="text" name="libelle">

                {{-- Date de limite l'Inscription --}}
                <label class="text-gray-600 dark:text-gray-400 mb-2">Date de limite des Inscriptions
                </label>
                <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
                    placeholder="Date limite des Inscription" type="date" name="date_limite_inscription">

                {{-- Description de l'Evenement--}}
                <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                    spellcheck="false" placeholder="Décrivez tout ce qu’il faut savoir sur cet article ici..."
                    name="description"></textarea>

                {{-- Image --}}
                <div class="border border-gray-300 bg-gray-50 p-4 mt-4">
                    <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-gray-600 font-medium">Upload file</span>
                    </label>
                    <input id="upload" type="file" class="hidden" name="path_image" />
                </div>

                {{-- Est cloture ou pas --}}
                <label class="text-gray-600 dark:text-gray-400 mt-4">l'Evenement est cloture ou pas ?
                </label>
                <select id="" class="bg-gray-100 border border-gray-300 p-2 mt-2  outline-none"
                    name="est_cloture_ou_pas">
                    <option selected class="text-slate-400" aria-placeholder="">Est Cloture ou pas ?</option>
                    <option value="cloture">Cloture</option>
                    <option selected value="pas cloture">Pas Cloture</option>
                </select>

                {{-- Date de l'evenement --}}
                <input class="title bg-gray-100 border border-gray-300 p-2 my-4 outline-none" spellcheck="false"
                    type="date" name="date_evenement">

                <!-- icons -->
                <div class="icons flex text-gray-500 m-2">
                    <label id="select-image">
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                    </label>
                    <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
                </div>
                <div class="buttons flex justify-end">
                    <input
                        class="btn border border-stne-900 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-stone-900"
                        type="submit" value="Post">

                </div>
            </div>

    </div>
    </form>
    </div>

</body>

</html>