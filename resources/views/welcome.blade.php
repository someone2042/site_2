<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/favicon.ico" />
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
                        laravel2: "#254e86",
                    },
                },
            },
        };
        let i = 0;
    </script>
    <style>
        .title-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* number of lines to show */
            line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .h-calc {
            height: calc(100vh - 64px);
        }

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
    <title>Accuil</title>
</head>

<body class="mb-36 h-full">

    <div data-value="" class="fixed z-30 font-mon bg-red-50 grid hidden rounded-md shadow-md" id="deleteGroupModal"
        style="width: 400px; justify-items: center; align-content: space-evenly ;height: 200px; left: 50%; top:50%; transform: translate(-50%, -50%); tabindex="-1"
        aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="grid justify-items-center">
            <svg fill="#eed202" height="60px" width="60px" version="1.1" id="Capa_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 27.963 27.963" xml:space="preserve">
                <g>
                    <g id="c129_exclamation">
                        <path d="M13.983,0C6.261,0,0.001,6.259,0.001,13.979c0,7.724,6.26,13.984,13.982,13.984s13.98-6.261,13.98-13.984
                           C27.963,6.259,21.705,0,13.983,0z M13.983,26.531c-6.933,0-12.55-5.62-12.55-12.553c0-6.93,5.617-12.548,12.55-12.548
                           c6.931,0,12.549,5.618,12.549,12.548C26.531,20.911,20.913,26.531,13.983,26.531z" />
                        <polygon points="15.579,17.158 16.191,4.579 11.804,4.579 12.414,17.158 		" />
                        <path d="M13.998,18.546c-1.471,0-2.5,1.029-2.5,2.526c0,1.443,0.999,2.528,2.444,2.528h0.056c1.499,0,2.469-1.085,2.469-2.528
                           C16.441,19.575,15.468,18.546,13.998,18.546z" />
                    </g>
                    <g id="Capa_1_207_">
                    </g>
                </g>
            </svg>
            <h5 class="font-semibold text-lg" id="deleteGroupModalLabel">Confirmation de la suppression</h5>
        </div>
        <div class="text-sm text-gray-900">
            Êtes-vous sûr de vouloir supprimer cette catégorie ?
        </div>
        <div class="flex w-2/3 justify-around">
            <button type="button" class="btn btn-secondary"
                onclick="hide();toggleEdit(this.parentElement.parentElement.dataset.value)"
                data-bs-dismiss="modal">Annuler</button>
            <form action="/categorier/delete/" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="deleteGroupId" value="">
                <button type="submit"
                    class="bg-red-500 text-white p-2 rounded-sm hover:scale-110 hover:bg-red-400">Supprimer</button>
            </form>
        </div>
    </div>

    <nav class=" sticky top-0 flex justify-between items-center h-16 bg-laravel">
        <div class="flex">
            <button id="toggleButton" class="ml-2 mr-4" style="display:block">
                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    fill="none">
                    <path fill="#FFF" fill-rule="evenodd"
                        d="M19 4a1 1 0 01-1 1H2a1 1 0 010-2h16a1 1 0 011 1zm0 6a1 1 0 01-1 1H2a1 1 0 110-2h16a1 1 0 011 1zm-1 7a1 1 0 100-2H2a1 1 0 100 2h16z" />
                </svg>
            </button>
            <button id="showButton" style="display:none" class="ml-2 mr-4">
                <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    fill="none">
                    <path fill="#FFF" fill-rule="evenodd"
                        d="M19 4a1 1 0 01-1 1H2a1 1 0 010-2h16a1 1 0 011 1zm0 6a1 1 0 01-1 1H2a1 1 0 110-2h16a1 1 0 011 1zm-1 7a1 1 0 100-2H2a1 1 0 100 2h16z" />
                </svg>
            </button>
            <a href="/">
                <p class="text-2xl font-medium text-white">Polynet</p>
            </a>
        </div>
        <ul class="flex space-x-6 mr-6 text-lg items-center text-white">
            @auth
                <li>
                    <abbr title="{{ auth()->user()->name }}">
                        <a href="/profile"><svg width="40px" height="40px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="9" r="3" stroke="#fff" stroke-width="1.5" />
                                <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="1.5" />
                                <path
                                    d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20"
                                    stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                            </svg></a>
                    </abbr>
                </li>
                <li>
                    <a href="/logout" class="flex items-center	"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <p class="ml-2 hidden sm:flex">Se déconnecter</p>
                    </a>
                </li>
            @endauth
            @if (!auth()->check())
                <li>
                    <a href="/admin"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Se connecter</a>
                </li>
            @endif
        </ul>
    </nav>
    <div id="sidebar"
        class=' transition duration-300 flex-col items-start justify-start w-64 fixed left-0 h-calc overflow-auto flex pb-6 bg-gray-100 overflow-x-hidden'>
        @auth
            @if (auth()->user()->role == 'S')
                <a href="/register" class="flex text-laravel font-medium text items-center pl-4 mt-6">
                    <svg fill="#1967D2" height="20px" width="20px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 328 328" xml:space="preserve">
                        <g id="XMLID_455_">
                            <path id="XMLID_458_"
                                d="M15,286.75h125.596c19.246,24.348,49.031,40,82.404,40c57.897,0,105-47.103,105-105s-47.103-105-105-105
                                                                                                                                        c-34.488,0-65.145,16.716-84.298,42.47c-7.763-1.628-15.694-2.47-23.702-2.47c-63.411,0-115,51.589-115,115
                                                                                                                                        C0,280.034,6.716,286.75,15,286.75z M223,146.75c41.355,0,75,33.645,75,75s-33.645,75-75,75s-75-33.645-75-75
                                                                                                                                        S181.645,146.75,223,146.75z" />
                            <path id="XMLID_461_"
                                d="M115,1.25c-34.602,0-62.751,28.15-62.751,62.751S80.398,126.75,115,126.75
                                                                                                                                        c34.601,0,62.75-28.148,62.75-62.749S149.601,1.25,115,1.25z" />
                            <path id="XMLID_462_"
                                d="M193,236.75h15v15c0,8.284,6.716,15,15,15s15-6.716,15-15v-15h15c8.284,0,15-6.716,15-15s-6.716-15-15-15
                                                                                                                                        h-15v-15c0-8.284-6.716-15-15-15s-15,6.716-15,15v15h-15c-8.284,0-15,6.716-15,15S184.716,236.75,193,236.75z" />
                        </g>
                    </svg>
                    <p class="ml-4">
                        Ajouter un admin
                    </p>
                </a>
                <a href="/update/admin" class="flex text-laravel font-medium text items-center pl-4 mt-6">
                    <svg width="20px" height="20px" viewBox="0 -1.5 20 20" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-100.000000, -2122.000000)"
                                fill="#1967D2">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path
                                        d="M63.9996063,1963 C63.9996063,1963.552 63.5516063,1964 62.9996063,1964 L56.9996063,1964 C56.4476063,1964 55.9996063,1963.552 55.9996063,1963 C55.9996063,1962.448 56.4476063,1962 56.9996063,1962 L62.9996063,1962 C63.5516063,1962 63.9996063,1962.448 63.9996063,1963 M51.9726063,1970.902 C51.9586063,1970.902 51.9446063,1970.9 51.9306063,1970.9 C51.9156063,1970.9 51.9026063,1970.902 51.8876063,1970.902 C50.8046063,1970.879 49.9306063,1969.995 49.9306063,1968.906 C49.9306063,1967.803 50.8276063,1966.906 51.9306063,1966.906 C53.0326063,1966.906 53.9306063,1967.803 53.9306063,1968.906 C53.9306063,1969.995 53.0556063,1970.879 51.9726063,1970.902 M54.9556063,1971.495 C55.7856063,1970.527 56.1856063,1969.18 55.7546063,1967.724 C55.3576063,1966.38 54.2276063,1965.32 52.8616063,1965.011 C50.2476063,1964.422 47.9306063,1966.393 47.9306063,1968.906 C47.9306063,1969.899 48.3056063,1970.796 48.9036063,1971.495 C46.3206063,1972.55 44.4126063,1974.997 44.0096063,1977.867 C43.9256063,1978.466 44.4036063,1979 45.0086063,1979 C45.5026063,1979 45.9206063,1978.637 45.9906063,1978.147 C46.4026063,1975.24 48.8866063,1972.923 51.8876063,1972.902 C51.9026063,1972.902 51.9156063,1972.906 51.9306063,1972.906 C51.9446063,1972.906 51.9576063,1972.902 51.9726063,1972.902 C54.9736063,1972.923 57.4576063,1975.24 57.8696063,1978.148 C57.9396063,1978.637 58.3576063,1979 58.8526063,1979 C59.4566063,1979 59.9346063,1978.466 59.8506063,1977.867 C59.4476063,1974.997 57.5396063,1972.551 54.9556063,1971.495"
                                        id="profile_minus-[#1353]">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <p class="ml-4">
                        Gérer les admin
                    </p>
                </a>
            @endif
            <a href="/create" class="flex text-laravel font-medium text items-center  pl-4 mt-6">
                <abbr title="ajouter site">
                    <svg fill="#1967D2" height="20px" width="20px" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 27.963 27.963" xml:space="preserve">
                        <g>
                            <g id="c140__x2B_">
                                <path
                                    d="M13.98,0C6.259,0,0,6.26,0,13.982s6.259,13.981,13.98,13.981c7.725,0,13.983-6.26,13.983-13.981
                                                                                                                                            C27.963,6.26,21.705,0,13.98,0z M21.102,16.059h-4.939v5.042h-4.299v-5.042H6.862V11.76h5.001v-4.9h4.299v4.9h4.939v4.299H21.102z
                                                                                                                                            " />
                            </g>
                            <g id="Capa_1_9_">
                            </g>
                        </g>
                    </svg>
                </abbr>
                <p class="ml-4">
                    Ajouter un site
                </p>
            </a>
            <button onclick="show()" href="/create" class="flex text-laravel font-medium text items-center  pl-4 mt-6">
                <abbr title="ajouter site">
                    <svg fill="#1967D2" height="20px" width="20px" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 27.963 27.963" xml:space="preserve">
                        <g>
                            <g id="c140__x2B_">
                                <path
                                    d="M13.98,0C6.259,0,0,6.26,0,13.982s6.259,13.981,13.98,13.981c7.725,0,13.983-6.26,13.983-13.981
                                                                                                                                            C27.963,6.26,21.705,0,13.98,0z M21.102,16.059h-4.939v5.042h-4.299v-5.042H6.862V11.76h5.001v-4.9h4.299v4.9h4.939v4.299H21.102z
                                                                                                                                            " />
                            </g>
                            <g id="Capa_1_9_">
                            </g>
                        </g>
                    </svg>
                </abbr>
                <p class="ml-4">
                    Ajouter une catégorie
                </p>
            </button>
            <form action="/categorier/store" method="POST" id="add"
                class="flex items-center justify-around w-full hidden">
                @csrf
                <input type="text" name="categorier"
                    class="flex text-laravel font-medium text items-center border-laravel border focus:border-0 ml-4 my-3 w-44 ">
                <button type="submit" class="bg-laravel p-1 h-fit w-fit rounded-md">
                    <svg fill="#ffff" height="20px" width="20px" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 27.963 27.963" xml:space="preserve">
                        <g>
                            <g id="c140__x2B_">
                                <path
                                    d="M13.98,0C6.259,0,0,6.26,0,13.982s6.259,13.981,13.98,13.981c7.725,0,13.983-6.26,13.983-13.981
                                                                                                                                            C27.963,6.26,21.705,0,13.98,0z M21.102,16.059h-4.939v5.042h-4.299v-5.042H6.862V11.76h5.001v-4.9h4.299v4.9h4.939v4.299H21.102z
                                                                                                                                            " />
                            </g>
                            <g id="Capa_1_9_">
                            </g>
                        </g>
                    </svg>
                </button>
            </form>
            @error('categorier')
                <p id="error" class="text-red-500 text-xs ml-4 mt-1">{{ $message }}</p>
            @enderror
            <div class="h-px  w-11/12 mt-4 bg-laravel">‎ </div>
        @endauth
        <a class="flex text-laravel font-medium text items-center  pl-4 mt-6">

            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="Iconly/Curved/Category">
                    <g id="Category">
                        <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z"
                            stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z"
                            stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path id="Stroke 5" fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z"
                            stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path id="Stroke 7" fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z"
                            stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                </g>
            </svg>
            <p class="ml-4">
                Catégories
            </p>
        </a>
        @foreach ($categorier as $item)
            <form action="/categorier/update/{{ $item->id }}" method="POST" class="w-full">
                <div class="flex items-center justify-between  hover:bg-blue-100 w-full h-full p-2 pl-12">
                    @csrf
                    @method('PUT')
                    @auth
                        <div id="s-{{ $item->id }}" class="hidden cursor-pointer"
                            onclick="warnning({{ $item->id }})">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 11V17" stroke="#1967D2" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M14 11V17" stroke="#1967D2" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M4 7H20" stroke="#1967D2" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                    stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                    stroke="#1967D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    @endauth
                    <a href="/{{ $item->id }}">
                        <p id="p-{{ $item->id }}" class="ml-4 text-laravel capitalize">
                            {{ $item->categorier }}
                        </p>
                    </a>
                    @auth
                        <input type="text" name="categorier2" id="input-{{ $item->id }}"
                            value="{{ $item->categorier }}" class="ml-4 w-full capitalize hidden" />
                        <button type="button" id="b-{{ $item->id }}" onclick="toggleEdit({{ $item->id }})"
                            class="">
                            <svg class="feather feather-edit" fill="none" height="24" stroke="#1967D2"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg></button>
                        <button type="submit" id="save-{{ $item->id }}" class=" hidden">
                            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 6L7.5 5.25H16.5L17.25 6V19.3162L12 16.2051L6.75 19.3162V6ZM8.25 6.75V16.6838L12 14.4615L15.75 16.6838V6.75H8.25Z"
                                    fill="#1967D2" />
                            </svg>
                        </button>
                    @endauth
                </div>
            </form>
            <form action="/categorier/delete/{{ $item->id }}" method="POST" id="hadik-{{ $item->id }}"
                onsubmit="warnning({{ $item->id }})">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>
    <script>
        function toggleEdit(id) {
            var p = document.getElementById('p-' + id);
            var input = document.getElementById('input-' + id);
            var saveButton = document.getElementById('save-' + id);
            var Button = document.getElementById('b-' + id);
            var hadik = document.getElementById('s-' + id);

            if (p.style.display === 'none') {
                p.style.display = 'block';
                Button.style.display = 'block';
                input.style.display = 'none';
                saveButton.style.display = 'none';
                hadik.style.display = 'none';
            } else {
                p.style.display = 'none';
                Button.style.display = 'none';
                input.style.display = 'block';
                saveButton.style.display = 'block';
                hadik.style.display = 'block';
                input.focus();
            }
        }
    </script>




    {{-- @dd($site) --}}
    <!-- Hero -->
    <main id="item" class="ml-64">
        <!-- Search -->

        <div id="ma" class="lg:grid xl:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 mt-4">
            <style>
                .image {
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                }

                .whatever {
                    word-wrap: break-word;
                    /* width: 250px; */
                }
            </style>
            @foreach ($site as $item)
                <!-- Item 1 -->
                <div class="bg-gray-50 border border-gray-200 rounded p-6 shadow-md max-w-full">
                    <div class="grid md:flex">
                        <div class="grid h-full md:h-48 aspect-square mr-6 md:block">
                            <img class="image" {{-- src="{{$listing->logo ? asset('storage/'.$listing->logo):asset('/images/no-image.png')}}" --}} src="{{ asset('/storage/' . $item->logo) }}"
                                alt="" />
                        </div>
                        <div class=" w-full">
                            <h3 class="text-2xl flex">
                                <div class="w-full">
                                    {{ $item->titre }}
                                </div>
                            </h3>

                            <div
                                class="max-h-11 overflow-hidden max-w-full whatever mt-4 text-sm title-text hidden md:inline-block ">
                                {{ $item->description }}
                            </div>
                            <div class="w-full flex justify-between mt-4 md:mt-0">
                                <abbr title="{{ $item->lien }}" class="no-underline">
                                    <a href="{{ $item->lien }}" target="_blank">
                                        <p class="p-2 w-fit rounded-md bg-laravel text-white">visiter
                                            {{ $item->categorier->categorier }}</p>
                                    </a>
                                </abbr>
                                @auth

                                    <abbr title="{{ $item->lien }}" class="no-underline">
                                        <a href="/site/update/{{ $item->id }}">
                                            <p
                                                class="p-2 w-fit rounded-md bg-white border-laravel border hover:scale-95 text-white">

                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                <svg fill="#1967D2" height="22px" width="22px" version="1.1"
                                                    id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path stroke-width="1"
                                                            d="M51.22,21h-5.052c-0.812,0-1.481-0.447-1.792-1.197s-0.153-1.54,0.42-2.114l3.572-3.571
                                                                                                                                                            c0.525-0.525,0.814-1.224,0.814-1.966c0-0.743-0.289-1.441-0.814-1.967l-4.553-4.553c-1.05-1.05-2.881-1.052-3.933,0l-3.571,3.571
                                                                                                                                                            c-0.574,0.573-1.366,0.733-2.114,0.421C33.447,9.313,33,8.644,33,7.832V2.78C33,1.247,31.753,0,30.22,0H23.78
                                                                                                                                                            C22.247,0,21,1.247,21,2.78v5.052c0,0.812-0.447,1.481-1.197,1.792c-0.748,0.313-1.54,0.152-2.114-0.421l-3.571-3.571
                                                                                                                                                            c-1.052-1.052-2.883-1.05-3.933,0l-4.553,4.553c-0.525,0.525-0.814,1.224-0.814,1.967c0,0.742,0.289,1.44,0.814,1.966l3.572,3.571
                                                                                                                                                            c0.573,0.574,0.73,1.364,0.42,2.114S8.644,21,7.832,21H2.78C1.247,21,0,22.247,0,23.78v6.439C0,31.753,1.247,33,2.78,33h5.052
                                                                                                                                                            c0.812,0,1.481,0.447,1.792,1.197s0.153,1.54-0.42,2.114l-3.572,3.571c-0.525,0.525-0.814,1.224-0.814,1.966
                                                                                                                                                            c0,0.743,0.289,1.441,0.814,1.967l4.553,4.553c1.051,1.051,2.881,1.053,3.933,0l3.571-3.572c0.574-0.573,1.363-0.731,2.114-0.42
                                                                                                                                                            c0.75,0.311,1.197,0.98,1.197,1.792v5.052c0,1.533,1.247,2.78,2.78,2.78h6.439c1.533,0,2.78-1.247,2.78-2.78v-5.052
                                                                                                                                                            c0-0.812,0.447-1.481,1.197-1.792c0.751-0.312,1.54-0.153,2.114,0.42l3.571,3.572c1.052,1.052,2.883,1.05,3.933,0l4.553-4.553
                                                                                                                                                            c0.525-0.525,0.814-1.224,0.814-1.967c0-0.742-0.289-1.44-0.814-1.966l-3.572-3.571c-0.573-0.574-0.73-1.364-0.42-2.114
                                                                                                                                                            S45.356,33,46.168,33h5.052c1.533,0,2.78-1.247,2.78-2.78V23.78C54,22.247,52.753,21,51.22,21z M52,30.22
                                                                                                                                                            C52,30.65,51.65,31,51.22,31h-5.052c-1.624,0-3.019,0.932-3.64,2.432c-0.622,1.5-0.295,3.146,0.854,4.294l3.572,3.571
                                                                                                                                                            c0.305,0.305,0.305,0.8,0,1.104l-4.553,4.553c-0.304,0.304-0.799,0.306-1.104,0l-3.571-3.572c-1.149-1.149-2.794-1.474-4.294-0.854
                                                                                                                                                            c-1.5,0.621-2.432,2.016-2.432,3.64v5.052C31,51.65,30.65,52,30.22,52H23.78C23.35,52,23,51.65,23,51.22v-5.052
                                                                                                                                                            c0-1.624-0.932-3.019-2.432-3.64c-0.503-0.209-1.021-0.311-1.533-0.311c-1.014,0-1.997,0.4-2.761,1.164l-3.571,3.572
                                                                                                                                                            c-0.306,0.306-0.801,0.304-1.104,0l-4.553-4.553c-0.305-0.305-0.305-0.8,0-1.104l3.572-3.571c1.148-1.148,1.476-2.794,0.854-4.294
                                                                                                                                                            C10.851,31.932,9.456,31,7.832,31H2.78C2.35,31,2,30.65,2,30.22V23.78C2,23.35,2.35,23,2.78,23h5.052
                                                                                                                                                            c1.624,0,3.019-0.932,3.64-2.432c0.622-1.5,0.295-3.146-0.854-4.294l-3.572-3.571c-0.305-0.305-0.305-0.8,0-1.104l4.553-4.553
                                                                                                                                                            c0.304-0.305,0.799-0.305,1.104,0l3.571,3.571c1.147,1.147,2.792,1.476,4.294,0.854C22.068,10.851,23,9.456,23,7.832V2.78
                                                                                                                                                            C23,2.35,23.35,2,23.78,2h6.439C30.65,2,31,2.35,31,2.78v5.052c0,1.624,0.932,3.019,2.432,3.64
                                                                                                                                                            c1.502,0.622,3.146,0.294,4.294-0.854l3.571-3.571c0.306-0.305,0.801-0.305,1.104,0l4.553,4.553c0.305,0.305,0.305,0.8,0,1.104
                                                                                                                                                            l-3.572,3.571c-1.148,1.148-1.476,2.794-0.854,4.294c0.621,1.5,2.016,2.432,3.64,2.432h5.052C51.65,23,52,23.35,52,23.78V30.22z" />
                                                        <path
                                                            d="M27,18c-4.963,0-9,4.037-9,9s4.037,9,9,9s9-4.037,9-9S31.963,18,27,18z M27,34c-3.859,0-7-3.141-7-7s3.141-7,7-7
                                                                                                                                                            s7,3.141,7,7S30.859,34,27,34z" />
                                                    </g>
                                                </svg>
                                            </p>
                                        </a>
                                    </abbr>
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            <div class=" pl-4 mt-6 p-4 col-span-full">
                {{ $site->links() }}
            </div>
        </div>
        @if (count($site) == 0)
            <p class="w-full h-full text-7xl  text-center text-gray-400 font-medium">Aucune site dans cette categorier
            </p>
        @endif
    </main>
</body>
<script>
    document.getElementById('toggleButton').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        // sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.remove('flex');
        var main = document.getElementById('item');
        main.classList.remove('ml-64');
        var ma = document.getElementById('ma');
        ma.classList.toggle('2xl:grid-cols-3');
        i++;
        name();
    });
    document.getElementById('showButton').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.toggle('flex');
        var main = document.getElementById('item');
        if (screen.width > 480) {
            main.classList.toggle('ml-64');
        }
        var ma = document.getElementById('ma');
        ma.classList.remove('2xl:grid-cols-3');
        i++;
        name();
    });
</script>
<script>
    function name() {

        if (i % 2 === 0) {
            document.getElementById('toggleButton').style.display = 'block'; // Show toggleButton
            document.getElementById('showButton').style.display = 'none'; // Hide showButton

        } else {
            document.getElementById('toggleButton').style.display = 'none'; // Hide toggleButton
            document.getElementById('showButton').style.display = 'block'; // Show showButton

        }
    }
    if (screen.width < 480) {
        document.getElementById('toggleButton').click();
    }
</script>
<script>
    const empt = document.getElementById("error").innerHTML;
    // nameInput.addEventListener("invalid", join);
    if (empt != null && empt != "") {
        // 
        show();
    }
</script>
<script>
    function show() {
        var form = document.getElementById('add');
        form.classList.toggle('hidden');
    }
</script>
@error('categorier2')
    <script>
        alert('{{ $message }}')
    </script>
@enderror
<script>
    function warnning(id) {
        document.getElementById('deleteGroupModal').classList.remove('hidden');
        document.getElementById('deleteGroupModal').setAttribute("data-value", id);
        const deleteGroupIdInput = document.getElementById('deleteGroupId');
        // Set the hidden input field's value to the retrieved group ID
        deleteGroupIdInput.value = id;
    }
</script>
<script>
    function hide() {
        document.getElementById('deleteGroupModal').classList.add('hidden');
    }
</script>

</html>
