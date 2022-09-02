<h1>Home index</h1>
@if (session('message'))
    <div style="background-color: crimson">
        {{session('message')}}
    </div>
   
@endif
<button><a href="{{route('posts.create')}}">Create</a></button><hr>

<form action="{{route('posts.search')}}" method="post">
    @csrf
    <input type="text" name="search" placeholder="Search">
    <button type="submit">Search</button>
</form>

@foreach ($posts as $post)
    <p><strong>{{$post->id}}</strong> Title - {{$post->title}}</p>
    
    <p>Description - {{$post->context}}</p>
    <a href="{{route('posts.show',$post->id)}}">Details</a> | <a href="{{route('posts.edit',$post->id)}}">Edit</a>
    <hr>
@endforeach

{{$posts->links()}}
