<?php

namespace App\Http\Controllers;

use App\Models\TanimKiralamaTuru;
use App\Http\Requests\TanimKiralamaTuruRequest;

class TanimKiralamaTuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimkiralamaturu = TanimKiralamaTuru::get();
        return view('tanim.kiralamaturu.liste',['tanimkiralamaturu' => $tanimkiralamaturu]);
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        //
        return view('tanim.kiralamaturu.ekle');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimKiralamaTuruRequest $request)
    {
        TanimKiralamaTuru::create($request->all());

        return redirect()->back()
        ->with('message','Ekleme İşlemi Başarılı');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimKiralamaTuruRequest $request, int $id)
    {
        $tanimkiralamaturu = TanimKiralamaTuru::where('id',$id)->firstOrFail();

        $tanimkiralamaturu->update($request->all());

        return redirect()->back()->with('message', 'Güncelleme Başarılı');
    }

    // Güncelleme

    public function guncelleGet(int $id)
    {
        $tanimkiralamaturu = TanimKiralamaTuru::find($id);

        return view('tanim.kiralamaturu.ekle', [
            'tanimkiralamaturu' => $tanimkiralamaturu,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $tanimkiralamaturu = TanimKiralamaTuru::where('id', $id)->firstOrFail();
        $tanimkiralamaturu->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
