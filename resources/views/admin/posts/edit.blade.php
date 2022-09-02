<h1>Edit post {{$post->title}}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </ul>
@endif

<form action="{{route('posts.update',$post->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="TITLE" value="{{$post->title}}"><br>
    <textarea name="context" id="context" cols="30" rows="4">{{$post->context}}</textarea><br>
    <button type="submit">Submit</button>
</form>
<button><a href="{{route('posts.index')}}">Home page</a></button>