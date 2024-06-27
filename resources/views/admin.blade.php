<!Doctype html>
<html>

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="images/favicon.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('img/logo.png') }}" rel="icon">

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
<title>Ajouter Site</title>
</script>
</head>

<body class="relative h-full w-full">
    {{-- @php
         dd($groups)
      @endphp --}}

    {{-- navbar --}}

    {{-- //////////////////////end navbar /////////////////////////////: --}}


    {{-- /////////////////////////creat and join group//////////////////////////// --}}
    <style>
        .h-lot {
            height: 450px;
        }
    </style>
    <nav class="sticky top-0 flex justify-between items-center mb-4 h-16 bg-laravel">
        <a href="/">
            <p class="text-2xl font-medium text-white ml-4">Polynet</p>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg text-white">
            <li>
                <a href="/logout"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Se déconnecter</a>
            </li>
        </ul>
    </nav>
    <main class="grid w-full justify-items-center">
        <p class="text-2xl w-4/5 m-3 pl-6 underline underline-offset-4">#Admins</p>

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-4/5 mb-10">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="py-3 px-6">id</th>
                        <th scope="col" class="py-3 px-6">Nom</th>
                        <th scope="col" class="py-3 px-6">Email</th>
                        <th scope="col" class="py-3 px-6">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6">#{{ $admin->id }}</td>
                            <td class="py-4 px-6">{{ $admin->name }}</td>
                            <td class="py-4 px-6">{{ $admin->email }}</td>
                            <td class="py-4 px-6">
                                <a href="/user/delete/{{ $admin->id }}">
                                    <button
                                        class=" bg-red-600 w-full h-8 rounded-md font-mon hover:scale-95 font-medium hover:bg-red-500 text-white">
                                        Supprimer
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</body>
{{-- <script src="https://kit.fontawesome.com/71d0f31537.js" crossorigin="anonymous"></script> --}}

</html>
