<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
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
        $portfolio= Portfolio::latest()->paginate(10);

        return view('admin.portfolio.index',compact('portfolio'))

            ->with('i', ($request->input('page', 1) - 1) * 10);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = false)
    {
        //
        $portfolio = array();
        return view('admin.portfolio.create',compact('portfolio'));
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
        $full = 'uploads/portfolio/full/';
        $thumb = 'uploads/portfolio/thumb/';
        $medium = 'uploads/portfolio/medium/';
        $large = 'uploads/portfolio/large/';

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

        $portfolio = Portfolio::create($form_data);
        $portfolio->tag($tags);
        return redirect()->route('portfolio.index')

                        ->with('success','Portfolio created successfully');
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
        $portfolio= Portfolio::find($id);

        return view('admin.portfolio.show',compact('portfolio'));
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
        $portfolio= Portfolio::find($id);

        return view('admin.portfolio.edit',compact('portfolio'));
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
            $full = 'uploads/portfolio/full/';
            $thumb = 'uploads/portfolio/thumb/';
            $medium = 'uploads/portfolio/medium/';
            $large = 'uploads/portfolio/large/';

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

        Portfolio::whereId($id)->update($form_data);
        $portfolio =  Portfolio::findOrFail($id);
        $portfolio->tag($tags);

        return redirect()->route('portfolio.index')

                        ->with('success','Portfolio updated successfully');
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
        $portfolio =  Portfolio::findOrFail($id);
        $portfolio->delete();
        $portfolio->untag(); // remove all tags
        return redirect()->route('portfolio.index')

                        ->with('success','Portfolio deleted successfully');
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
        $portfolio =  Portfolio::findOrFail($id);
        $portfolio->untag(); // remove all tags
    }


}
