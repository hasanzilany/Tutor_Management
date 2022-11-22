@extends('layouts.app')


@section('content')

<div class="container col-md-12 col-md-offset-1 profileresize">        
    <div class="panel panel-default profileresize">
        <div class="panel-heading">
                <h4>Profile</h4>                      
        </div>

        <div class="panel-body profilebody">
            <!-- users profile avatar-->
            <img src="/upload/avatar/{{ $user->avatar}}" style="width:150px; height:150px; <!-- float:left; --> border-radius:5px; margin-right: 30px">
            <!-- users profile name -->

            
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>

                <input type='file' name='avatar' value="Upload">
                <input type="hidden" name="_token" value="{{ csrf_token()}}"><br>
                <input type="submit" class="btn btn-sm btn-primary">
            </form>

            <h3>{{ $user->name }}</h3>
             
            <h5><strong>Gender:</strong> {{ $user->gender }}</h5>
            
            <h5><strong>Date of Birth:</strong> {{ $user->age }}</h5>
            
            <h5><strong>Email:</strong> {{ $user->email }}</h5>
            
            <h5><strong>Address:</strong> {{ $user->address }} </h5>
             
            <h5><strong>Nid Number:</strong> {{ $user->nid }}</h5>
            
            <h5><strong>Phone:</strong> {{ $user->phone }}</h5>
            
            <h5><strong>Teaching Subject: </strong>{{ $user->teachingsubject }}</h5>
            
            <h5><strong>Catagory: </strong>{{ $user->category }}</h5>
            
            <h5><strong>School:</strong> {{ $user->school }}</h5>
            
            <h5><strong>School Cgpa:</strong>{{ $user->schoolcgpa }}</h5>
            
            <h5><strong>College: </strong>{{ $user->college }}</h5>
            
            <h5><strong>College Cgpa:</strong> {{ $user->collegecgpa }}</h5> 
            <label>Cirtificate:</label><br>
            <img src="/upload/cirtificates/{{ $user->cirtificate}}" height="500" width="500">
        </div>

              
    </div>           
</div>


    

@endsection
