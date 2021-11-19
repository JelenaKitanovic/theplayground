@extends('layouts.app')
@section('content')
@foreach($data as $row)
    <div class="grid grid-cols-3" style="padding-top: 10px; padding-bottom: 10px;">
        <div class="py-4">
            <table class="border-2 max-w-2x1 border-blue-500">
                <tbody class="bg-white">
                <tr class="border-b-2">
                    <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <div class="text-sm leading-5">ID</div>
                        </div>
                    </th>
                    <td class="px-3 py-3 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-blue-900">
                            {{ $row["customer"]["id"] }}
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
                            {{ $row["customer"]["full_name"] }}
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
                            {{ $row["customer"]["email"] }}
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
                            {{ $row["customerStrengths"] }}
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
                            {{ $row["customer"]["age"] }}
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
                            {{ $row["customer"]["goal"] }}
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
                            {{ $row["customer"]["ideal_partner"] }}
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
                            {{ $row["customer"]["availability"] }}
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
                                @if($row["customer"]["is_matched"])
                                    <span aria-hidden=""
                                          class="absolute inset-0 bg-green-200  opacity-50 rounded-full"></span>
                                @else
                                    <span aria-hidden=""
                                          class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                @endif
                                <span class="relative text-xs">{{ $row["customer"]["is_matched"] ? "YES" : "NO"}}</span>
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
                            {{ $row["customer"]["favourite_game"] }}
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
                            {{ $row["customer"]["favourite_quote"] }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    @foreach($row["matchingScores"] as $match)
        <div class="py-4" style="padding-left: 20px;">
        <table class="border-2 max-w-2x1">
            <tbody class="bg-white">
            <tr class="border-b-2">
                <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                    <div class="flex items-center">
                        <div class="text-sm leading-5">Matching Score</div>
                    </div>
                </th>
                <td class="px-3 py-3 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-blue-900 text-2x1">
                        {{ $match["matchScore"]["score"] }}
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
                        {{ $match["customer"]["full_name"] }}
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
                        {{ $match["customer"]["email"] }}
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
                        @if($match["matchScore"]["age"])
                            <div class="text-sm leading-5  text-blue-900" style="color: green !important;">
                                {{ $match["customerStrengths"] }}
                            </div>
                        @else
                            <div class="text-sm leading-5  text-blue-900" style="color: red !important;">
                                {{ $match["customerStrenghts"] }}
                            </div>
                        @endif                    </div>
                </td>
            </tr>
            <tr class="border-b-2">
                <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                    <div class="flex items-center">
                        <div class="text-sm leading-5">Age</div>
                    </div>
                </th>
                <td class="px-3 py-3 whitespace-no-wrap">
                    @if($match["matchScore"]["age"])
                        <div class="text-sm leading-5  text-blue-900" style="color: green !important;">
                            {{ $match["customer"]["age"] }}
                        </div>
                    @else
                        <div class="text-sm leading-5  text-blue-900" style="color: red !important;">
                            {{ $match["customer"]["age"] }}
                        </div>
                    @endif
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

                        @if($match["matchScore"]["goal"])
                            <div class="text-sm leading-5  text-blue-900" style="color: green !important;">
                                {{ $match["customer"]["goal"] }}
                            </div>
                        @else
                            <div class="text-sm leading-5  text-blue-900" style="color: red !important;">
                                {{ $match["customer"]["goal"] }}
                            </div>
                        @endif                    </div>
                </td>
            </tr>
            <tr class="border-b-2">
                <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                    <div class="flex items-center">
                        <div class="text-sm leading-5">Ideal partner</div>
                    </div>
                </th>
                <td class="px-3 py-3 whitespace-no-wrap">

                    @if($match["matchScore"]["idealPartner"])
                        <div class="text-sm leading-5  text-blue-900" style="color: green !important;">
                            {{ $match["customer"]["ideal_partner"] }}
                        </div>
                    @else
                        <div class="text-sm leading-5  text-blue-900" style="color: red !important;">
                            {{ $match["customer"]["ideal_partner"] }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr class="border-b-2">
                <th class="px-3 py-3 text-left leading-4 text-blue-500 tracking-wider">
                    <div class="flex items-center">
                        <div class="text-sm leading-5">Availability</div>
                    </div>
                </th>
                <td class="px-3 py-3 whitespace-no-wrap">
                    <div class="text-sm leading-5  text-blue-900" style="font-weight: 600;">
                        {{ $match["customer"]["availability"] }}
                    </div>
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
                        {{ $match["customer"]["favourite_game"] }}
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
                        {{ $match["customer"]["favourite_quote"] }}
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    @endforeach
    </div>
@endforeach
@endsection
