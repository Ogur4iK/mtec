<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_itmes = Menu::all();
        return view('admin.menu.index', ['menu_itmes' => $menu_itmes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_items = Menu::all();
        return view('admin.menu.create', ['menu_items' => $menu_items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   =>  'required'
        ]);

        Menu::add($request->all());
        return redirect()->route('menu.index')->with('status', 'Запись успешно добавлена');
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
        $edit_item = Menu::find($id);
        $menu_items = Menu::where('id', '<>', $edit_item->id)->get();
        return view('admin.menu.edit', ['edit_item' => $edit_item, 'menu_items' => $menu_items]);
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
        $this->validate($request, [
            'name'   =>  'required'
        ]);

        Menu::find($id)->edit($request->all());
        return redirect()->route('menu.index')->with('status', 'Запись успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::find($id)->remove();
        return redirect()->route('menu.index')->with('status', 'Запись успешно удалена');
    }
}
