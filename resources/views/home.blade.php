@extends('layouts.app')

@section('content')
<div class="container col-md-12 col-md-offset-1 homesize">
            
        
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <form class="search ">
                      <input class="searchTerm" placeholder="Enter your search  ..." /><input class="searchButton" type="submit" />
                    </form>                    
                </div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->
                    <!-- creates the users post of certain job -->
                   
                    <section>
                       <!-- user can create post here -->
                        <form action="{{ route('post.create') }}" method="post">
                          
                          <div class="form-group">
                            <label for="exampleTextarea">Enter Your Job Offer</label>
                            <textarea class="form-control" name="body" id="exampleTextarea" rows="3"placeholder="Place your Subject: Salary: class:" required></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <input type="hidden" value="{{ Session::token() }}" name="_token">
                        </form>
                    </section>
                    <hr>
                    <!-- shows all the posts -->
                    <section class="row posts">

                        <div class="col-md-6 ">
                            <header class="headercenter">
                                <h2>
                                    Posts
                                </h2>
                            </header>
                            
                            @foreach($posts as $post)
                            <div class="postsetting">
                                <article class="post" data-postid="{{$post->id}}">
                                    <div class="innersize">
                                        <div class="postusername">
                                            <h3 class="username">{{$post->user->name}}</h3>
                                            <h6>{{$post->created_at}}</h6>
                                        </div >
                                        <div class="postbody">
                                            <p1>{{ $post-> body }}</p1>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                <!-- <div class="info">
                                    Posted by {{$post->user->name}} on {{$post->created_at}}
                                </div> -->
                                    <div class="interaction">
                                        @if(Auth::user()==$post->user)
                                            <a href="#" class="edit">Edit</a> |
                                        <a href="{{ route('post.delete', ['post_id'=> $post->id]) }}">Delete</a>
                                        @endif
                                        @if(!(Auth::user()==$post->user))
                                            <a href="#" class="report">report</a> 
                                        @endif
                                    </div>
                                </article>
                            </div>
                                
                            @endforeach
                            
                        </div>
                    </section>


                </div>
            </div>
        
    
</div>
@endsection
