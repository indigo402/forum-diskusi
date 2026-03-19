<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line
use App\Models\Jawaban;
use App\Models\User; // Make sure to import the User model
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Pertanyaan;
use Carbon\Carbon;

class JawabanController extends Controller
{
    public function tambah(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $idUser = Auth::id();

        $jawaban = new Jawaban();

        $jawaban->user_id = $idUser;
        $jawaban->content = $request->content;
        $jawaban->date = now(); // Set the date to the current date and time
        $jawaban->pertanyaan_id = $id;

        $jawaban->save();

        Alert::success('Berhasil', 'Berhasil Menambahkan Jawaban');
        return redirect('/pertanyaan/' . $id);
    }
    

    public function edit($id)
    {
        $jawaban = Jawaban::find($id);

        return view('pertanyaan.editJawaban', ['jawaban' => $jawaban]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'content' => 'required',
        ]);
        
        $jawaban = Jawaban::find($id);
        $idUser = Auth::id();
        // Update
        $jawaban->user_id = $idUser;
        $jawaban->content = $request->input("content");
        $todayDate = Carbon::now();
        $jawaban->date = $todayDate; // Set the date to the current date and time



        $jawaban->save();

        Alert::success('Berhasil', 'Berhasil Merubah Jawaban');

        return redirect('/pertanyaan');
    }

    public function destroy($id)
    {
        DB::table('jawaban')->where('id', $id)->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Jawaban');

        return redirect('/pertanyaan')->with('success', 'Answer deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

