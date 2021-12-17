@extends('layouts.app')
@section('content')
    <h1 class="text-3xl text-green-500 mb-2">
        Nos dernières missioins
    </h1>
    @foreach ($jobs as $job)
        <livewire:job :job="$job">
    @endforeach
@endsection