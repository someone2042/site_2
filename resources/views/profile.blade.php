<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#1967D2",
                    },
                },
            },
        };
    </script>
    <style>
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
            border-radius: 10px;

        }

        /* Track */
        ::-webkit-scrollbar-track {
            background-color: #97c5d9;
            box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #1967D2;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-corner {
            display: none;
        }
    </style>
    <title>Profile</title>
</head>

<body class="mb-48 bg-slate-100">
    <nav class="sticky top-0 flex justify-between items-center mb-4 h-16 bg-laravel">
        <a href="/">
            <p class="text-2xl font-medium text-white ml-4">Polynet</p>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg text-white">

        </ul>
    </nav>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 shadow-md p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        EDITER LE PROFIL
                    </h2>
                </header>
                <form action="/user/update/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">Nom</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                            placeholder="name" value="{{ old('name') ?? auth()->user()->name }}" />
                        @error('name')
                            <p class="text-red-500 test-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">E-mail</label>
                        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                            placeholder="email@email.com" value={{ old('email') ?? auth()->user()->email }} />
                        @error('email')
                            <p class="text-red-500 test-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">
                            nouveau mot de passe
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                            placeholder="nouveau mot de passe" />
                        @error('password')
                            <p class="text-red-500 test-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-slate-900 flex  mt-2"><svg xmlns="http://www.w3.org/2000/svg"
                                class="mr-1" x="0px" y="0px" width="18" height="18" viewBox="0 0 50 50">
                                <path
                                    d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 25 11 A 3 3 0 0 0 22 14 A 3 3 0 0 0 25 17 A 3 3 0 0 0 28 14 A 3 3 0 0 0 25 11 z M 21 21 L 21 23 L 22 23 L 23 23 L 23 36 L 22 36 L 21 36 L 21 38 L 22 38 L 23 38 L 27 38 L 28 38 L 29 38 L 29 36 L 28 36 L 27 36 L 27 21 L 26 21 L 22 21 L 21 21 z">
                                </path>
                            </svg>si vous ne souhaitez pas changer votre mot de passe, laissez cette entrée vide</p>
                    </div>
                    <div class="mb-6">
                        <label for="password_confirmation" class="inline-block text-lg mb-2">
                            Confirmation mot de passe
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full"
                            name="password_confirmation" placeholder="Confirmer votre mot de passe" />
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs w-80 mt-1">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-laravel2 text-lg">
                            Editer le profil
                        </button>

                        <a href="/"
                            class="border-laravel border text-black ml-4 rounded py-2 px-4 hover:bg-laravel2 text-lg">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
