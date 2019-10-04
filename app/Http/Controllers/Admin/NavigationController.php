<?php
namespace App\Http\Controllers\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Navigation::all();
        // dd($menus);
        // return view('admin.menus.index', compact('menus'));
        return view('admin.menus.index')->withItems($menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = array();
        $items = Navigation::pluck('title', 'id');
        return view('admin.menus.create', ['menu' => $menu, 'items' => $items ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [

            'title'             => 'required',

            'subtitle'           => 'required',

        ]);

        $form_data = array(
            'title'             =>   $request->title,
            'subtitle'          =>   $request->subtitle,
            'parent_id'         =>   $request->parent_id,
            'intro'             =>   $request->intro,
            'description'       =>   $request->description,
        );

        $portfolio = Navigation::create($form_data);

        return redirect()->route('menus.index')

                        ->with('success','Menu created successfully');
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
        $menu = Navigation::find($id);
        $items = Navigation::pluck('title', 'id');
        return view('admin.menus.edit', ['menu' => $menu, 'items' => $items ]);
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
         // dd($request);
         $this->validate($request, [

            'title'             => 'required',

            'subtitle'           => 'required',

        ]);

        $form_data = array(
            'title'             =>   $request->title,
            'subtitle'          =>   $request->subtitle,
            'parent_id'         =>   $request->parent_id,
            'intro'             =>   $request->intro,
            'description'       =>   $request->description,
        );

        Navigation::whereId($id)->update($form_data);

        return redirect()->route('menus.index')

                        ->with('success','Menu update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $navigation =  Navigation::findOrFail($id);
        $navigation->delete();
        return redirect()->route('menus.index')

                        ->with('success','Menu deleted successfully');
    }
}
