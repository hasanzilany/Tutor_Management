@extends('layouts.app')

@section('content')
<div class="container col-md-12 col-md-offset-1 ">
            
    <div class="panel panel-default registersize">
        <form action="{{ route('signup.save') }}" method="post" enctype="multipart/form-data" name="reg">
                <h1>Register</h1>
                <hr>
                <div class="form-group {{$errors->has('category')? 'has-error':''}}" style="text-align:center">

                    <input type="radio" name="category" value="student" required> Student
                    <input type="radio" name="category" value="tutor" > Tutor
                </div>
               
                <div class="form-group ">
                    <lavel  >Name:</lavel>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}" required>
                </div>

                <!-- div class="form-group">
                    <label >Age</label>
                    <input type="text" name="age" class="form-control" value="{{ $user->age}}" id="age">
                </div> -->
                
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date" name="age" class="form-control" id="exampleInputDOB1" placeholder="Date of Birth" required>
                </div>
                
                <div class="form-group {{$errors->has('gender')? 'has-error':''}}">
                    <label>Gender</label><br>
                    <input type="radio" name="gender" value="male" required> Male
                    <input type="radio" name="gender" value="female"> Female
                    
                </div>
                <div class="form-group">
                    <label >Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone}}" id="phone" required>
                </div>
                <div class="form-group">
                    <label >National Id card number</label>
                    <input type="text" name="nid" class="form-control" value="{{ $user->nid }}" id="nid" required>
                </div>

                <div class="form-group">
                    <label >Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}" id="address" required>
                </div>
                <div class="form-group">
                    <label>Update Cirtificate Image</label>
                    <input type='file' name='cirtificate' value="Upload" required>
                    
                </div>
                <div class="form-group">
                    <label >Subject</label>
                    <input type="text" name="teachingsubject" class="form-control" value="{{ $user->teachingsubject }}" id="teachingsubject" required>
                </div>
                    
                <div class="form-group">
                    <label >Medium</label>
                    
                    <input type="radio" name="medium" value="english" required> English
                    <input type="radio" name="medium" value="bengali"> Bengali
                </div>

                <div class="form-group">
                    <label >School Name: [SSC/O'level]</label>
                    <input type="text" name="school" class="form-control" value="{{ $user->school}}" id="school" required>
                </div>
                <div class="form-group">
                    <label >School Cgpa</label>
                    <input type="text" name="schoolcgpa" class="form-control" value="{{ $user->schoolcgpa}}" id="schoolcgpa" required>
                </div>
                <div class="form-group">
                    <label >College Name: [HSC/A'level]</label>
                    <input type="text" name="college" class="form-control" value="{{ $user->college}}" id="college" required>
                </div>
                <div class="form-group">
                    <label >College Cgpa</label>
                    <input type="text" name="collegecgpa" class="form-control" value="{{ $user->collegecgpa}}" id="collegecgpa" required>
                </div>
                
                
                <!-- <input class="form-control" type="text" name="age2" id="name" value="">
                <br> -->
                
                <button type="submit" class="btn btn-primary" onclick="func">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>

           

    </div>        
    
</div>
@endsection
   



            