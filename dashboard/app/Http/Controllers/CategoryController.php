<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

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
        $data = Category::all();
        return view('backend.cat_index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cat_add');
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

        // If image upload is needed
        // if($request->hasFile('cat_image')){
        //     $image = $request->file('cat_image');
        //     $reImage = time().'c.'.$image->getClientOriginalExtension();
        //     $dest = public_path('/imgs');
        //     $image->move($dest, $reImage);
        // }else{
        //     $reImage = "";
        // }

        $category = new Category;
        $category->title = $request->title;
        $category->detail = $request->description;
        $category->image = "";
        $category->save();

        return redirect('category/create')->with('success','Category created successfully');   

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
        $data = Category::find($id);
        return view('backend.cat_update', ['data' => $data]);
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
        $request->validate([
            'title'=>'required'
        ]);

        // If image upload is needed
        // if($request->hasFile('cat_image')){
        //     $image = $request->file('cat_image');
        //     $reImage = time().'c.'.$image->getClientOriginalExtension();
        //     $dest = public_path('/imgs');
        //     $image->move($dest, $reImage);
        // }else{
        //     $reImage = $request->cat_image;
        // }

        $category = Category::find($id);
        $category->title = $request->title;
        $category->detail = $request->description;
        $category->image = "";
        $category->save();

        return redirect('category/'.$id.'/edit')->with('success','Category Updated successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect('category');
    }
}
