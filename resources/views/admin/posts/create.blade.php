<h1>New post</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </ul>
@endif

<form action="{{route('posts.store')}}" method="POST">
    @csrf
    <input type="text" name="title" id="title" placeholder="TITLE" value="{{old('title')}}"><br>
    <textarea name="context" id="context" cols="30" rows="4">{{old('context')}}</textarea><br>
    <button type="submit">Submit</button>
</form>
<button><a href="{{route('posts.index')}}">Home page</a></button>