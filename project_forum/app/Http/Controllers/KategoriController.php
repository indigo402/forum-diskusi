<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;


class KategoriController extends Controller
{
    public function create()
    {
        return view('kategori.createkategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        DB::table('category')->insert([
            'name' => $request['name']
        ]);

        Alert::success('Berhasil', 'Berhasil Menambahkan Kategori');

        return redirect('/kategori');
    }

    public function index()
    {

        $category = Kategori::get();
        // dd($cast);
        $title = 'Delete Kategori!';
        $text = "Apakah anda yakin ingin menghapusnya?";
        confirmDelete($title, $text);

        return view('kategori.tampil', compact('category', 'title', 'text'));
    }

    public function show($id)
    {

        $category = Kategori::find($id);

        return view('kategori.detail', ['category' => $category]);

    }

    public function edit($id)
    {
        $category = Kategori::find($id);

        return view('kategori.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
        ]);


        // Update
        DB::table('category')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->input('name'),
                ]
            );

        Alert::success('Berhasil', 'Berhasil Merubah Kategori');

        return redirect('/kategori');
    }

    public function destroy($id)
    {
        DB::table('category')->where('id', $id)->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Kategori');

        return redirect('/kategori')->with('success', 'Answer deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



}

