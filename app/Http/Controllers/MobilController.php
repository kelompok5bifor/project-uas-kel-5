<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use DataTables;
use DB;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mobil.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobil = new Mobil();
        return view('mobil.form', compact('mobil'));
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
            'kode_mobil' => 'required|string|max:5|unique:mobil',
            'merk_mobil' => 'required|string|max:50',
            'plat_nomor' => 'required|string|max:10',
            'harga_sewa' => 'required|string|max:50'
        ]);
        $mobil = Mobil::create($request->all());
        return $mobil;
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
        $mobil = Mobil::findOrFail($id);
        return view('mobil.form', compact('mobil'));
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
            'kode_mobil' => 'required|string|max:5|unique:mobil',
            'merk_mobil' => 'required|string|max:50',
            'plat_nomor' => 'required|string|max:10',
            'harga_sewa' => 'required|string|max:50'
        ]);
        $mobil = Mobil::findOrFail($id);
        $mobil->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();
    }

    public function dataTable()
    {
        $mobil = Mobil::query();
        return DataTables::of($mobil)
            ->addColumn('action', function ($mobil){
                return view('mobil._action', [
                    'mobil' => $mobil,
                    'url_edit' => route('mobil.edit', $mobil->id),
                    'url_destroy' => route('mobil.destroy', $mobil->id)
                ]);

            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
