@extends('admin.layouts.app')

@section('title','DETAILS')

@section('context')
    <div class="container  border shadow p-3 mb-5 bg-body rounded">
        <h2>Details -  {{$post->title}}</h2>
        <hr>
        <ul>
            <li>{{$post->title}}</li><br>
            <li>{{$post->context}}</li><br>
        </ul>
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delet {{$post->title}}</button>
        </form>
        <a href="{{route('posts.index')}}" class="btn btn-warning">HOME PAGE</a>
                
    </div>
    
    <div class="container border bg-dark shadow p-3 mb-5 bg-body rounded">
        <form action="{{route('posts.comment',['id'=>$post->id])}}" method="post">
            @csrf
            <label for="comment">Comments</label><br>
            <input type="hidden" name="posts_id" value="{{$post->id}}">
            <textarea name="comment" class="form-control" placeholder="Send comment..."></textarea>
            <button type="submit" class="btn btn-dark">Send</button>
        </form>
        @isset($comentarios)
            
            @foreach ($comentarios as $comentario)
                <div class="container  border shadow p-3 mb-5 bg-body rounded">
                    <h6>{{date('d/m/Y',strtotime($comentario->created_at))}}</h6><br>
                    <p>{{$comentario->comment}}</p> 
                </div>
            @endforeach
            
        @endisset
    </div>
    
@endsection