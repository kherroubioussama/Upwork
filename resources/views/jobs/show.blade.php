@extends('layouts.app')
@section('content')
    <h1 class="text-3xl text-green-500 mb-2">
        {{$job->title}}
    </h1>
    
        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md duration-200 rounded border-2 border-gray-300">
            <p class="text-md text-gray-800"> {{$job->description}}</p>
            <span class="text-sm text-gray-600">{{number_format($job->price/100,2,',',' ')}} $</span>
        </div>
        <section x-data="{open:false}">
            <a href="#" class="text-green-500" @click="open=!open">cliquer ici pour soumettre une condidature</a>
            <form method="POST" action="{{route('proposals.store',$job)}}"  x-show="open" x-cloak>
                @csrf
                <textarea  class="p-3 font-thin w-full max-w-md  " name="content"></textarea>
                <button type="submit" class="block bg-green-700 text-white px-3 py-1 mt-3">Soumettre ma lettre de motivation</button>
            </form>
        </section>
@endsection