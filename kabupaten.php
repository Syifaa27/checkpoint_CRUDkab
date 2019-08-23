<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model_kabupaten;
use Validator;
class kabupaten extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = model_kabupaten::all();
        //return view('contact', compact('data'));
        return view('kabupaten', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kabupaten_create');
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
            'id'=> 'required',
            'code'=> 'required',
            'description'=> 'required',
        ]);

        $data = new model_kabupaten();
        $data->id = $request->id;
        $data->code = $request->code;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('kabupaten.index')->with('alert_message', 'Berhasil menambah data!');
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
        $data = model_kabupaten::where('id', $id)->get();
        return view('kabupaten_edit', compact('data'));
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
            'id'=> 'required',
            'code'=> 'required',
            'description'=> 'required',
        ]);

        $data = model_kabupaten::where('id', $id)->first();
        $data->id = $request->id;
        $data->code = $request->code;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('kabupaten.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = model_kabupaten::where('id', $id)->first();
        $data->delete();
        return redirect()->route('kabupaten.index')->with('alert_,message', 'Berhasil menghapus kabupaten!');
    }
}
