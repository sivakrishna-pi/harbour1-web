<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
//use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        $data = DB::table('posts')
            ->join('categories', 'posts.cat_id', '=', 'categories.id')
            ->select('posts.*', 'categories.title as cat_name')
            ->get();
        return view('backend.post_index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_data = Category::all();
        return view('backend.post_add',['cat_data' => $cat_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);


        if($request->hasFile('post_thumb')){
            $image = $request->file('post_thumb');
            $reImageThumb = time().'t.'.$image->getClientOriginalExtension();
            $dest = public_path('imgs');
            $image->move($dest, $reImageThumb);
        } 

        //Case studies category id is 3, There we will get pdf file so we are storing these pdf file into pdf folder else for other pages we store in images folder
        if($request->cat_id == '3'){
            if($request->hasFile('post_image')){
                $image = $request->file('post_image');
                $reImageMain = 'case_'.time().'.'.$image->getClientOriginalExtension();
                $dest = public_path('pdfs');
                $image->move($dest, $reImageMain);
            } 
        }
        else{
            if($request->hasFile('post_image')){
                $image = $request->file('post_image');
                $reImageMain = time().'m.'.$image->getClientOriginalExtension();
                $dest = public_path('imgs');
                $image->move($dest, $reImageMain);
            } 
        }
        
        
        $userId = Auth::user()->id;
        
        //auth()->user()->is_admin == 1
        $post = new Post;
        $post->title = $request->title;
        $post->user_id = $userId;
        $post->cat_id = $request->cat_id;
        $post->detail = $request->description;
        $post->thumb = $reImageThumb;
        $post->full_img = $reImageMain;
        $post->tags = "harbour1, Pi Datacenters";
        $post->status = $request->status;;
        $post->save();

        return redirect('post/create')->with('success','post created successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_data = Post::find($id);
        $cat_data = Category::all();
        return view('backend.post_update', ['post_data' => $post_data, 'cat_data' => $cat_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      //  print_r($id);exit;
        $request->validate([
            'title'=>'required'
        ]);

        $userId = Auth::user()->id;

        if($request->hasFile('post_thumb')){
            $image = $request->file('post_thumb');
            $reImageThumb = time().'t.'.$image->getClientOriginalExtension();
            $dest = public_path('/imgs');
            $image->move($dest, $reImageThumb);
        }else{
            $reImageThumb = $request->post_thumb;
        }

        //Case studies category id is 3, There we will get pdf file so we are storing these pdf file into pdf folder else for other pages we store in images folder
        if($request->cat_id == 3){
            if($request->hasFile('post_image')){
                $image = $request->file('post_image');
                $reImageMain = 'case_'.time().'.'.$image->getClientOriginalExtension();
               // $dest = public_path('/pdfs');
               // $image->move($dest, $reImageMain);
                $image->move(public_path().'imgs', $fileName);
            } else{
                $reImageMain = $request->post_image;
            }
        }else{
            if($request->hasFile('post_image')){
                $image = $request->file('post_image');
                $reImageMain = time().'m.'.$image->getClientOriginalExtension();
                $dest = public_path('/imgs');
                $image->move($dest, $reImageMain);
            } else{
                $reImageMain = $request->post_image;
            }
        }
            

        $post = Post::find($id);
        $post->title = $request->title;
        $post->user_id = $userId;
        $post->cat_id = $request->cat_id;
        $post->detail = $request->description;
        $post->thumb = $reImageThumb;
        $post->full_img = $reImageMain;
        $post->tags = "harbour1, Pi Datacenters";
        $post->status = $request->status;
        $post->save();

        return redirect('post/'.$id.'/edit')->with('success','Post Updated successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect('post');
    }
}
