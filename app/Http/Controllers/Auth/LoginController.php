<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\socialProvider;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    //take provider as a parameter which is passed from  routes/web.php file
    public function handleProviderCallback($provider)
    {   
        try{
            $socialuser = Socialite::driver($provider)->user();
        }
        catch(Exception $e){
            return redirect('/');
        }
        //check if we have the logged provider
        $sprovider = socialProvider::where('provider_id',$socialuser->getId())->first();
        
        if(!$sprovider){
            //runs if $sprovider is false.
            //create a new user with their provider and and save it database 
            $user = User::firstOrCreate(
            ['email' => $socialuser->getEmail()],
            ['name' => $socialuser->getName()]
            ); 

            $user->socialProvider()->create(
                ['provider_id'=>$socialuser->getId(), 'provider' =>$provider]
                );

        }
        else{
            $user = $sprovider->user();

        }    

        auth()->login($user);
         return redirect('/home');

    }
    
    

}
