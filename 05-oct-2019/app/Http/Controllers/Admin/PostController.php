<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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
    public function index(Request $request)
    {
        $posts= Post::latest()->paginate(10);

        return view('admin.posts.index',compact('posts'))

            ->with('i', ($request->input('page', 1) - 1) * 10);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post = array();
        return view('admin.posts.create', compact('post'));
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
        $full = 'uploads/posts/full/';
        $thumb = 'uploads/posts/thumb/';
        $medium = 'uploads/posts/medium/';
        $large = 'uploads/posts/large/';

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


        return redirect()->route('posts.index')

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
        $post= Post::find($id);

        return view('admin.posts.show',compact('post'));
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
        $post= Post::find($id);

        return view('admin.posts.edit',compact('post'));
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
       $filename = $request->hidden_image;
       $image = $request->file('featured_image');

       // dd($request);
       if($image != '')
       {
           // dd($request);
           $this->validate($request, [

               'title'             => 'required',

               'content'           => 'required',

               'featured_image'    =>  'required | image | max:2048'

           ]);
           $image = $request->file('featured_image');
           $filename = rand() . '.' . $image->getClientOriginalExtension();
           $full = 'uploads/posts/full/';
           $thumb = 'uploads/posts/thumb/';
           $medium = 'uploads/posts/medium/';
           $large = 'uploads/posts/large/';

           $image_resize = Image::make($image->getRealPath());
           $image_resize->resize(150, 150);
           $image_resize->save(public_path($thumb.$filename));

           $image_resize->resize(300, 300);
           $image_resize->save(public_path($medium.$filename));

           $image_resize->resize(780, 520);
           $image_resize->save(public_path($large.$filename));

           $image->move($full, $filename);

       }else
       {
           $this->validate($request, [

               'title'             => 'required',

               'content'           => 'required',

           ]);
       }
       $form_data = array(
           'title'          =>   $request->title,
           'content'        =>   $request->content,
           'excerpt'        =>   $request->excerpt,
           'featured_image' =>   $filename
       );
       $tags = explode(",", $request->tags);

       Post::whereId($id)->update($form_data);
       $posts =  Post::findOrFail($id);
       $posts->tag($tags);


        return redirect()->route('posts.index')

                        ->with('success','Post updated successfully');
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
        Post::find($id)->delete();

        return redirect()->route('posts.index')

                        ->with('success','Post deleted successfully');
    }

    /**
     * Remove the all tags from porfolio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTags($id)
    {
        //
        $posts =  Post::findOrFail($id);
        $posts->untag(); // remove all tags
    }
}
