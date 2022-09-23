@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </ul>
@endif
<hr>
@csrf
<div class="mb-3">
    <label  class="form-label">Post title</label>
    <input class="form-control" type="text" name="title" id="title" placeholder="Title" value="{{$post->title ?? old('title')}}" required>
</div>
<div class="mb-3">
    <label  class="form-label">Description about anything</label>
    <textarea class="form-control" rows="3" name="context" class="form-control" id="context" placeholder="blabla" required>{{$post->context ?? old('context')}}</textarea>
</div>


<button type="submit" class="btn btn-success">Submit</button>
<a href="{{route('posts.index')}}" class="btn btn-danger">Cancel</a>