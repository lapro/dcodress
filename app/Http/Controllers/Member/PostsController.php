<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;
use Auth;
use Illuminate\Support\Str;
use Session;

class PostsController extends Controller
{
    //

    public function __contruct(){

         $this->middleware('auth');
    }

/*
    public function getSubmit(){

        return view("member.submit");
    }
*/
    public function getIndex(){
        
        $tags = Post::existingTags()->pluck('name');

        //menampilkan
        return view("member.post")->with('tags',$tags);
    }

    public function postIndex(Request $request, Post $post){
        
        $slug = Str::slug($request->get('name'));
        $photo = $request->file('file');
        $user_id = Auth::user()->id;

        $filename = $slug.".".$photo->guessExtension();
        $location = "posts/".$user_id."/";


        $thumbfilename = $slug.".".$photo->guessExtension();
        $thumblocation = "posts-thumbnail/".$user_id."/";
        
        if(Post::uploadImage($photo, $location, $filename) AND Post::uploadImageThumb($photo, $thumblocation, $thumbfilename)){
            
            $post->user_id = $user_id;
            
            $post->image = $location.$filename;
            $post->thumb = $thumblocation.$thumbfilename;

            $post->description = $request->get('description');
            $post->name = $request->get('name');

            $post->save();
            
            if($request->get('tags')!=""){
                $post->tag(explode(',', $request->get('tags')));
            }
        }
        
        return redirect("/");
    }

    public function detail($slug){


        $post = Post::with('tagged')->find($this->getId($slug));
        
        //  Session::put("redirectAfterLogin",url("detail/".$slug));

        // Fire view       
        $this->viewed($post);

        return view("member.detail")->with("post",$post);
    }

    public function love($id){

        $post = Post::find($id);

        if(!$post->lovable(true)){
             /* simpan session untuk memberitahu jika setelai login menuju halaman product tertentu */
            Session::put("redirectAfterLogin",url("detail/".$post->id."-".Str::slug($post->name)));
            return redirect("login");
        }

        return redirect("detail/".$id);
    }

    private function getId($slug){
        $pecah = explode("-",$slug);

        return (int) trim($pecah[0]);
    }

    private function viewed($post){

        
         // print_r(Session::get("viewed_page"));

            if(!$this->hasViewed($post->id, Session::get("viewed_page"))){
                
                $post->views += 1;
                $post->save();
                Session::put("viewed_page.$post->id");
            }
        
    }

    private function hasViewed($id, $arr){
        
        if(count($arr)>0){
           foreach ($arr as $key => $value) {
               if($key == $id) return true;
           }
        
        }

        return false;

    }


    
}
