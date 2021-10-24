@extends('layout')

@section('content')
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $ads->title ?? '') }}">
            @if($errors->has('title'))
                <div class="alert alert-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $ads->description ?? '') }}</textarea>
            @if($errors->has('description'))
                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>
            <input type="submit" class="btn btn-primary" value="@if(!isset($ads->id))Create @else Save @endif"/>
    </form>
@endsection
