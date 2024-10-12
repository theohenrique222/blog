@extends('site.main')
@section('title', 'Blog | Serviços')

<x-navbar></x-navbar>

@section('content')

<h1>Services</h1>
<a href="{{ route('create-services') }}">Criar Serviço</a>