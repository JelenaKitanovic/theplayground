@extends('layouts.app')
@section('content')
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        <div
            class="grid grid-cols-2 align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="border-2 max-w-2x1">
                <tbody class="bg-white">
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">ID</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["id"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Full Name</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["full_name"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Email</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["email"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Strengths</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["strengths"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Age</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["age"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Goal</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["goal"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Ideal partner</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["ideal_partner"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Availability</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900" style="font-weight: 600;">
                            {{ $customer["availability"] }}
                        </div>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Matched</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                @if($customer["is_matched"])
                                    <span aria-hidden=""
                                          class="absolute inset-0 bg-green-200  opacity-50 rounded-full"></span>
                                @else
                                    <span aria-hidden=""
                                          class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                @endif
                                <span class="relative text-xs">{{ $customer["is_matched"] ? "YES" : "NO"}}</span>
                            </span>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Favourite game</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["favourite_game"] }}
                        </div>
                    </td>
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">Favourite quote</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $customer["favourite_quote"] }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div style="padding-left: 10px;">
                <div>
                    Matched: {{ $customer["is_matched"] ? "YES" : "NO" }}
                </div>
                <button
                    id="match-btn"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Find a match!
                </button>
                <div id="matches-list-container">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <script>

        $(document).ready(function () {
            if (window.location.href.indexOf("import") < 0) {
                console.log(window.location.href.indexOf("import"));
                $(document).on('click', '#match-btn', function () {
                    $.get('{{ route('match', $customer["id"])}}', function (response) {
                        $("#matches-list-container").append(response);
                    })
                });
            }
        });
    </script>
@stop
