@extends('layout')

@section('content')
    @auth()
    <a href="{{ route('ads.create') }}">Create Ad</a>
    @endauth
        @foreach($ads as $ad)
            <h2><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h2>
            @can('update', $ad)
            <ul>
                <li><a href="{{ route('ads.create', $ad->id) }}">Edit</a></li>
                <li><a href="{{ route('ads.delete', $ad->id) }}">Delete</a></li>
            </ul>
            @endcan
            <h5>{{ $ad->user->name }}</h5>
            <h5>{{ $ad->created_at->diffForHumans() }}</h5>
            <p>{{ $ad->description }}</p>
        @endforeach
    {{ $ads->links() }}
@endsection


