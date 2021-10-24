@extends('layout')

@section('content')
            <h2>{{ $ad->title }}</h2>
            @can('update', $ad)
                <ul>
                    <li><a href="{{ route('ads.create', $ad->id) }}">Edit</a></li>
                    <li><a href="{{ route('ads.delete', $ad->id) }}">Delete</a></li>
                </ul>
            @endcan
            <h5>{{ $ad->user->name }}</h5>
            <h5>{{ $ad->created_at->diffForHumans() }}</h5>
            <p>{{ $ad->description }}</p>
@endsection


