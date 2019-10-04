<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
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
        $items = Menu::pluck('title', 'id');
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

            'url'               => 'required',

        ]);

        $form_data = array(
            'title'             =>   $request->title,
            'url'               =>   $request->url,
            'parent_id'         =>   $request->parent_id,
            'order'             =>   $request->order,
        );

        $menu = Menu::create($form_data);

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
        $menu = Menu::find($id);
        $items = Menu::pluck('title', 'id');
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

            'url'           => 'required',

        ]);

        $form_data = array(
            'title'             =>   $request->title,
            'url'               =>   $request->url,
            'parent_id'         =>   $request->parent_id,
            'order'             =>   $request->order,
        );

        Menu::whereId($id)->update($form_data);

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
        $navigation =  Menu::findOrFail($id);
        $navigation->delete();
        return redirect()->route('menus.index')

                        ->with('success','Menu deleted successfully');
    }
}
