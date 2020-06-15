<?php

namespace App\Http\Controllers\Admin;

use App\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = History::all();
        return view('admin.history.index', ['history' => $history]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.history.create');
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
            'year' =>'required',
            'description' => 'required'
        ]);

        $news = History::add($request->all());
        return redirect()->route('history.index')->with('status', 'Запись успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $history = History::find($id);
        return view('admin.history.edit', ['history' => $history]);
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
            'year' =>'required',
            'description' => 'required'
        ]);
        $history = History::find($id);
        $history->edit($request->all());
        return redirect()->route('history.index')->with('status', 'Запись успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete();
        return redirect()->route('history.index')->with('status', 'Запись успешно удалена');
    }
}
