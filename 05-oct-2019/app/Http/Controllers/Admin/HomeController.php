<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts= Post::latest()->paginate(10);

        // return view('admin.posts.index',compact('posts'))

        //     ->with('i', ($request->input('page', 1) - 1) * 10);
        $frontpage = array();
        return view('admin.frontpage.create',compact('frontpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'title'             => 'required',

            'content'           => 'required',

            'featured_image'    =>  'required | image | max:2048',

            'tags' => 'required',

        ]);
        // dd($request);
        $image = $request->file('featured_image');
        $filename = rand() . '.' . $image->getClientOriginalExtension();
        $full = 'uploads/media/full/';
        $thumb = 'uploads/media/thumb/';
        $medium = 'uploads/media/medium/';
        $large = 'uploads/media/large/';

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(150, 150);
        $image_resize->save(public_path($thumb.$filename));

        $image_resize->resize(300, 300);
        $image_resize->save(public_path($medium.$filename));

        $image_resize->resize(780, 520);
        $image_resize->save(public_path($large.$filename));

        $image->move($full, $filename);

        $form_data = array(
            'title'             =>   $request->title,
            'content'           =>   $request->content,
            'featured_image'    =>   $filename,
            'excerpt'           =>   $request->excerpt
        );
        $tags = explode(",", $request->tags);

        $posts = Post::create($form_data);
        $posts->tag($tags);


        return redirect()->route('frontpage.index')

                        ->with('success','Post created successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
