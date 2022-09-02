<h1>Details {{$post->title}}</h1>

<ul>
    <li><strong>Title: </strong>{{$post->title}}</li><br>
    <li><strong>Description: </strong>{{$post->context}}</li><br>
</ul>
<form action="{{route('posts.destroy',$post->id)}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Delet {{$post->title}}</button>
</form>
<button><a href="{{route('posts.index')}}">HOME PAGE</a></button>
<hr>



<form action="{{route('posts.comment',['id'=>$post->id])}}" method="post">
    @csrf
    <label for="comment">Comments</label><br>
    <input type="hidden" name="posts_id" value="{{$post->id}}">
    <textarea name="comment" id="" cols="30" rows="10" placeholder="Send comment..."></textarea>
    <button type="submit">Send</button>
</form>


@foreach ($comentarios as $comentario)
    <p>{{$comentario->comment}}</p> 
    <p>{{$comentario->created_at}}</p><br>
@endforeach