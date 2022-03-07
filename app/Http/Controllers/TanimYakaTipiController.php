<?php

namespace App\Http\Controllers;

use App\Models\TanimYakaTipi;
use App\Http\Requests\TanimYakaTipiRequest;

class TanimYakaTipiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimyakatipi = TanimYakaTipi::get();

        return view('tanim.yakatipi.liste',['tanimyakatipi' => $tanimyakatipi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.yakatipi.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimYakaTipiRequest $request)
    {
        TanimYakaTipi::create($request->all());

        return redirect()->back()
                ->with('message', 'Ekleme İşlemi Başarılı');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guncelleGet(int $id)
    {
        $tanimyakatipi = TanimYakaTipi::find($id);

        return view('tanim.yakatipi.ekle', [
            'tanimyakatipi' => $tanimyakatipi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimYakaTipiRequest $request, int $id)
    {
        $tanimyakatipi = TanimYakaTipi::where('id', $id)->firstOrFail();
        $tanimyakatipi->update($request->all());

        return redirect()->back()->with('message', 'Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $tanimyakatipi = TanimYakaTipi::where('id', $id)->firstOrFail();
        $tanimyakatipi->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
