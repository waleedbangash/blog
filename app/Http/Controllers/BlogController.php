<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/user_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'user_title'=>'required',
            'shortdisc'=>'required|max:500',
            'longdisc'=>'required',
            'image'   =>'required',
         ]);


         $image = $request->file('image');
         $my_image =null;
         if(!empty($image)):

             $my_image = rand() . '.' . $image->getClientOriginalExtension();
             $image->move(public_path('asset/img'), $my_image);
         endif;
        $res=new Blog();
        $res->title            = $request->input('user_title');
        $res->short_discription= $request->input('shortdisc');
        $res->long_discription = $request->input('longdisc');
        $res->image=$my_image;
        $res->user_id          = session()->get('user')->id;
       $res->save();
       $request->session()->flash('msg','Record is inserted');
       return redirect('user/bloguser');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
       $result= Blog::where('user_id','=',session()->get('user')->id)->get();
       return view('user/show_blog')->with('rowArr', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog,$id)
    {

        return view('user/blog_edit')->with('rowArr',Blog::find($id));
    }



    public function update(Request $request, blog $blog,$result)
    {
        $image = $request->file('image');
        $my_image =null;
        if(!empty($image)):

            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('asset/img'), $my_image);
        endif;
       $res= Blog::find($request->id);
       $res->title            = $request->input('user_title');
       $res->short_discription= $request->input('shortdisc');
       $res->long_discription = $request->input('longdisc');
       $res->image=$my_image;
       $res->user_id          = session()->get('user')->id;
      $res->save();
      $request->session()->flash('msg','Record is inserted');
      return redirect('user/show');
    }

    public function destroy(blog $blog,$id)
    {
        Blog::destroy(array('id',$id));
        return redirect('user/show');
    }
}
