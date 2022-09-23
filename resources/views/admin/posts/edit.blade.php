@extends('admin.layouts.app')

@section('title','Edit post')
    

@section('context')
    <div class="container  border shadow p-3 mb-5 bg-body rounded">
        <h2>Edit post: {{$post->title}}</h2>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
    
            </ul>
        @endif
    
        <form action="{{route('posts.update',$post->id)}}" method="POST">
            @method('put')
            @include('admin.posts._partials.form')
    
        </form>

    </div>   
   
@endsection