<?php
namespace App\Http\Controllers;
use App\RecentOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /*route to home with post variable*/
    public function getDashboard(){
        $posts =RecentOffers::orderBy('created_at','desc')->get();
        return view('home',['posts' => $posts]);
    }

    /*Create post*/
    public function postCreatePost(Request $request){
        ///validation
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new RecentOffers();
        $post->body = $request['body'];
        $message = 'There was an error';
        if($request->user()->posts()->save($post)){
            echo "hi";
            $message = 'Post Successfully created';
        }
        return redirect()->route('home')->with(['message' => $message]);
    }

    /*Delete post*/
    public function getDeletePost($post_id){
        $post = RecentOffers::where('id', $post_id)->first();
        if(Auth::user()!= $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('home')->with(['message'=>'Post Deleted!!!']);
    }

    /*edit post*/
    public function postEditPost(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);
        $post=RecentOffers::find($request['postId']);
        if(Auth::user()!= $post->user){
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body'=> $post->body],200);
    }
}