@extends('main')

@section('content')
<h2>Existing Routes</h2>
<div class="container">
    <h3>Please select wall number and color code</h3>


    @php
    function readableTextColor($hex) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) { $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2]; }
    if (strlen($hex) !== 6) return '#000';
    $r = hexdec(substr($hex,0,2)); $g = hexdec(substr($hex,2,2)); $b = hexdec(substr($hex,4,2));
    $l = (0.2126*$r + 0.7152*$g + 0.0722*$b) / 255;
    return $l > 0.6 ? '#000' : '#fff';
    }
    @endphp

    <ul>
        @foreach($nodes as $node)
        @php
        $bg = $node['color'] ?? '#cccccc';
        $fg = readableTextColor($bg);
        $href = $node['link'] ?? '#';
        @endphp
        <li class="mb-2 flex items-center text-sm font-semibold list-none">
        <button style="width:3em; height:3em; {{ $node['class'] ?? '' }}" ></button>
            <div class="ml-3">
                {{ $node['nickname'] }} (Level: {{ $node['levelAtSetup'] }}, Color: {{ $node['color'] }})
            </div>
        </li>
        @endforeach
    </ul>

    @endsection