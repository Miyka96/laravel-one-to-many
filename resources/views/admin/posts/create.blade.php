@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create a new post</h1>

    <form action="{{route('admin.posts.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Insert Post title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="content">Post content</label>
            <textarea class="form-control" name="content" id="content">{{old('content')}}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Post Category</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">No category</option>
                @foreach($category as $cat)
                    <option value="{{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}">{{ $cat->name}}</option>  
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="published_at">Published At</label>
            <input type="date" class="form-control" name="published_at" id="published_at" value="{{old('published_at')}}">
        </div>

        <button class="btn btn-primary" type="submit">
            Create
        </button>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

    </form>
</div>

@endsection
