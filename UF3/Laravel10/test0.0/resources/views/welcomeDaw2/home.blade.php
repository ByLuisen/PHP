{{-- @extends('layouts.app')

@section('title', 'Home')

@section('content') --}}
{{-- @endsection --}}


{{-- forma 1: con componentes --}}
{{-- @component('components.layout')
    <h1>Welcome DAW2</h1>
@endcomponent --}}

{{-- forma 2: con componentes etiquetas <x-layout>
    asume que los compoentes están dentro de la carpeta components x-
    --}}
<x-layouts.app>
    <x-slot name="title">
        HomeTitle
    </x-slot>
    <h1>Welcome DAW2</h1>
</x-layouts.app>
