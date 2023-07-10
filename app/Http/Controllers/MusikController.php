<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musik;
class MusikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Musik::all();
        return view('musik.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musik.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'no_alat' => 'bail|required|unique:tb_alatmusik',
                'nama_alat' => 'required'
            ],
            [
                'no_alat.required' => 'No wajib diisi',
                'no_alat.unique' => 'No sudah ada',
                'nama_alat.required' => 'Nama wajib diisi'
            ]
        );

        Musik::create([
            'no_alat' => $request->no_alat,
            'nama_alat' => $request->nama_alat,
            'merk_alat' => $request->merk_alat,
            'jenis' => $request->jenis,
            'harga' => $request->harga
        ]);

        return redirect('musik');
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
        $row = Musik::findOrFail($id);
        return view('musik.edit', compact('row'));
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
        $request->validate(
            [
                'no_alat' => 'bail|required',
                'nama_alat' => 'required'
            ],
            [
                'no_alat.required' => 'No wajib diisi',
                'nama_alat.required' => 'Nama wajib diisi'
            ]
        );

        $row = Musik::findOrFail($id);
        $row->update([
            'no_alat' => $request->no_alat,
            'nama_alat' => $request->nama_alat,
            'merk_alat' => $request->merk_alat,
            'jenis' => $request->jenis,
            'harga' => $request->harga
        ]);

        return redirect('musik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Musik::findOrFail($id);
        $row->delete();

        return redirect('musik');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $rows = Musik::where('nama_alat', 'like', "%" . $keyword . "%")->paginate(5);
        return view('musik.index', compact('rows'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
