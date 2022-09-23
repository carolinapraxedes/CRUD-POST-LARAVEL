@extends('admin.layouts.app')

@section('title', 'Create Post')
    

@section('context')
    <div class="container border shadow p-3 mb-5 bg-body rounded">
        <h1>New post</h1>

        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            @include('admin.posts._partials.form')

        </form>
        
    </div>
    
    
@endsection