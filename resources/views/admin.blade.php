<!Doctype html>
<html>

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="images/favicon.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{asset('img/logo.png')}}" rel="icon">

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
        .h-lot{
            height: 450px;
        }
      </style>
      <nav class="sticky top-0 flex justify-between items-center mb-4 h-16 bg-laravel">
        <a href="/">
            <p class="text-2xl font-medium text-white ml-4">Polynet</p>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg text-white">
            <li>
                <a href="/logout"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Se déconnecter</a >
            </li>
        </ul>
    </nav>
   <main class="grid w-full justify-items-center">
        <p class="text-2xl w-4/5 m-3 pl-6 underline underline-offset-4">#Admins</p>
        <div class="w-4/5 h-lot mb-10 overflow-auto">
            <table class="border-collapse border border-slate-500 w-full">
                <thead>
                  <tr>
                    <th class="border border-slate-600 p-2 font-mon">Id</th>
                    <th class="border border-slate-600 p-2 font-mon">Name</th>
                    <th class="border border-slate-600 p-2 font-mon">Email</th>
                    <th class="border border-slate-600 p-2 font-mon">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td class="border border-slate-700 p-2 font-mon w-16 text-center">#{{$admin->id}}</td>
                            <td class="border border-slate-700 p-2 font-mon">{{$admin->name}} </td>
                            <td class="border border-slate-700 p-2 font-mon">{{$admin->email}} </td>
                            <td class="border border-slate-700 p-2 font-mon min-w-20"><a href="/user/delete/{{$admin->id}}"><button class=" bg-red-600 w-full h-8 rounded-md font-mon hover:scale-95 font-medium hover:bg-red-500 text-white">Delete</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   </main>

   </body>
{{-- <script src="https://kit.fontawesome.com/71d0f31537.js" crossorigin="anonymous"></script> --}}
</html>