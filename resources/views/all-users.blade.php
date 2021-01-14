<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">


    <!-- Page Heading -->


    <!-- Page Content -->

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 pb-20 overflow-x-auto">
            <div class="inline-block min-w-full mt-3 border-2 border-gray-300 rounded-2xl">
                <table class="min-w-full leading-normal mt-2">
                    <thead>
                    <tr class="text-center">

                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            C.I.
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            H. trabajadas
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            H. retrasadas
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100  text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            H. extras
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="text-center">
                            <td class="px-5 py-5 border border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$user->name}}</p>
                            </td>
                            <td class="px-5 py-5 border border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$user->type=='a'?'Administrador':'Técnico'}}</p>
                            </td>
                            <td class="px-5 py-5 border border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$user->created_at}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border border-gray-200 bg-white text-sm">
                                    <span
                                        class=" px-3 py-1 font-semibold text-green-900 leading-tight bg-green-200  rounded-full">
                                        {{$user->active?'Activo':'Inactivo'}}
                                    </span>
                            </td>
                            <td class="px-5 py-5 border border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$user->created_at}}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


</div>


</body>
</html>
