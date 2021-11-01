@extends('layout')

@section('content')
    @auth()
    <a href="{{ route('ads.create') }}">Create Ad</a>
    @endauth
        @foreach($ads as $ad)
            <h2><a href="{{ route('ads.show', $ad->id) }}">{{ $ad->title }}</a></h2>
            <ul>
                @can('update', $ad)
                <li><a href="{{ route('ads.create', $ad->id) }}">Edit</a></li>
                @endcan

                @can('delete', $ad)
                <li><a href="{{ route('ads.delete', $ad->id) }}">Delete</a></li>
                    @endcan
            </ul>
            <h5>{{ $ad->user->name }}</h5>
            <h5>{{ $ad->created_at->diffForHumans() }}</h5>
            <p>{{ $ad->description }}</p>
        @endforeach
    {{ $ads->links() }}
@endsection


