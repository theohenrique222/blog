@extends('site.main')
@section('title', 'Blog | TH')

<x-navbar></x-navbar>

@section('content')

    <a href="/register">Registro</a>


    <h1 class="text-red-500">
        View referente a nossa página Home {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}
    </h1>
