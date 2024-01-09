<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\DB;
use File;
use RealRashid\SweetAlert\Facades\Alert;
use Jenssegers\Date\Date;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $pertanyaan = Pertanyaan::get();
        $title = 'Delete Pertanyaan!';
        $text = "Apakah anda yakin ingin menghapusnya?";
        confirmDelete($title, $text);

        return view('pertanyaan.index', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Kategori::get();

        return view('pertanyaan.createpertanyaan', ['category' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
    {
        
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg',
            'content' => 'required',
            'date' => 'required|date',
        ]);

        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $fileName);

        // Convert the date to a Jenssegers/Date instance
        $date = Date::createFromFormat('Y-m-d', $request->input('date'));
        
        $pertanyaan = new Pertanyaan();
        $pertanyaan->category_id = $request->category_id;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->gambar = $fileName;
        $pertanyaan->content = $request->content;
        $pertanyaan->date = $date; // Use Jenssegers/Date instance directly
        
        $pertanyaan->save();

        Alert::success('Berhasil', 'Berhasil Menambahkan Pertanyaan');

        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);

        return view('pertanyaan.detail', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Kategori::all();
        $pertanyaan = Pertanyaan::find($id);

        return view('pertanyaan.editPertanyaan', ['pertanyaan' => $pertanyaan, 'category' => $categories]);
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
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg',
            'content' => 'required',
            'date' => 'required'
        ]);

        $pertanyaan = Pertanyaan::find($id);

        if ($request->has('image')) {
            $path = 'image/';
            File::delete($path . $pertanyaan->image);

            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('image'), $fileName);

            $pertanyaan->image = $fileName;
        }

        $pertanyaan->category_id = $request->category_id;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->content = $request->content;
        $pertanyaan->date = $request->date;

        $pertanyaan->save();

        Alert::success('Berhasil', 'Berhasil Merubah Pertanyaan');

        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
    
        $path = 'image/';
        File::delete($path . $pertanyaan->image);
    
        $pertanyaan->delete();
    
        return redirect('/pertanyaan');
    }
    
}
