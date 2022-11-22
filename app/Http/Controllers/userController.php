<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
//use App\User;

class userController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    //
    /*route to profile*/
    public function profile(){
    	return view('profile', array('user' => Auth::user()));
    }

    /*route to help*/
    public function help(){
    	return view('help', array('user' => Auth::user()));
    }

    /*route to search*/
    public function search(){
    	return view('search', array('user' => Auth::user()));
    }

    /*route to setting*/
    public function setting(){
    	return view('setting', array('user' => Auth::user()));
    }

    /*route to generalsetting*/
    public function generalsetting(){
    	return view('generalsetting', array('user' => Auth::user()));
    }

    /*route to accountsetting*/
	public function accountsetting(){
    	return view('accountsetting', array('user' => Auth::user()));
    }

    /*route to register all info*/
    public function allinfo(){
        return view('allinfo', array('user' => Auth::user()));
    }


    /*upload avatar*/
     public function update_avatar(Request $req ){
     	//handle the user upload of avatar
     	if($req->hasFile('avatar')){
			$avatar = $req->file('avatar');
			$filename = time().'.'.$avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300,300)->save(public_path('/upload/avatar/'.$filename));
			$user= Auth::user();
			$user->avatar = $filename;
			$user->save();
		}

		return view('profile',array('user' => Auth::user()));
     }

     /*takes the registered info from the all info class and store it in database*/
     public function postSaveAccount(Request $request){
        $this->validate($request,[
            'name'=>'required|max:120'
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->update();
        
        return redirect()->route('profile');
    }

    /*takes the registered info from the all info class and store it in database*/
    public function postSignUp(Request $request){
       $this->validate($request,[
           'name'=>'required',
           'phone'=>'required|min:11',
           'address'=>'required',
           'nid' => 'required|unique:users',
           
           'category' =>'required',
           
       ]);
        $category=$request['category'];
        $name=$request['name'];
        $age=$request['age'];
        $phone=$request['phone'];
        $address=$request['address'];
        $nid=$request['nid'];
        $gender=$request['gender'];
        
        $teachingsubject=$request['teachingsubject'];
        $medium=$request['medium'];
        $school=$request['school'];
        $schoolcgpa=$request['schoolcgpa'];
        $college=$request['college'];
        $collegecgpa=$request['collegecgpa'];


        $user= Auth::user();
        $user->category=$category;
        $user->name =$name;
        $user->gender = $gender;
        $user->age= $age;
        $user->phone =$phone;
        $user->address =$address;
        $user->nid =$nid;
        
        $user->teachingsubject=$teachingsubject;
        $user->medium =$medium;
        $user->school =$school;
        $user->schoolcgpa =$schoolcgpa;
        $user->college =$college;
        $user->collegecgpa = $collegecgpa;

        if($request->hasFile('cirtificate')){
            $cirtificate = $request->file('cirtificate');
            $filename = $user->id.'tstamp'.time().'.'.$cirtificate->getClientOriginalExtension();
            Image::make($cirtificate)->resize(500,500)->save(public_path('/upload/cirtificates/'.$filename));
            $user= Auth::user();
            $user->cirtificate = $filename;
            
        }
        

        $user->save();
        return redirect()->route('/profile');
    }
}
