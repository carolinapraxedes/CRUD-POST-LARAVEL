@extends('admin.layouts.app')
@section('title','HOMEPAGE')


@section('context')
    <div class="container border shadow p-3 mb-5 bg-body rounded" >
        <div >
            <div class="col-12 h2 "> 
                Posts
                
                
            </div>
            <div class="col-12">
                Welcome! this is a miniblog. here you can read about anything! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel leo id arcu elementum rutrum a ac nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam ut nisi et quam viverra feugiat eu in felis. Sed convallis tincidunt diam. Quisque interdum cursus risus, et porttitor libero blandit non. Nunc molestie rhoncus lectus, et gravida orci eleifend quis. Praesent dignissim tempus magna vitae elementum. Suspendisse nec finibus nibh. Nulla euismod fringilla ante, vitae tristique tellus consequat eget.<br>
            </div>
            <form action="{{route('posts.search')}}" method="post">
                @csrf
                <input class="form-control" type="text" name="search" class="form-control" placeholder="Search">                    
                <button class="btn btn-primary " type="submit">Search</button>                 
            </form>
            <div>
                <strong class="h4">Create a new post?</strong>
                <a href="{{route('posts.create')}}" class="btn btn-primary">Create</a>
            </div>

            
            <hr>
            
        </div>
        @if (session('message'))
            <div style="background-color: crimson">
                {{session('message')}}
            </div>
        
        @endif

        <div class="row">
            <div class="col-md-12">   
               @foreach ($posts as $post)
                    <p class="text-capitalize"><strong>#{{$post->id}}</strong> - {{$post->title}}</p>
                        
                    <p>{{$post->context}}</p>
                    <a href="{{route('posts.show',$post->id)}}"class="btn btn-info">Details</a> | <a href="{{route('posts.edit',$post->id)}}" class="btn btn-secondary">Edit</a>
                    <hr>
                @endforeach  
                @isset($search)
                    <a href="{{route('posts.index')}}" class="btn btn-primary">HOME PAGE</a>
                @endisset

            </div>
        </div>

        

        @if (isset($filters))
            <div class="pagination">
                {{$posts->appends($filters)->links()}}

            </div>
        @else
            <div class="pagination">
                {{$posts->links()}}
            </div>            
        @endif
    </div>
    



@endsection