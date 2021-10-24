@extends('layout')

@section('content')
            <h2>{{ $ad->title }}</h2>
            <h5>{{ $ad->user->name }}</h5>
            <h5>{{ $ad->created_at->diffForHumans() }}</h5>
            <p>{{ $ad->description }}</p>
@endsection


