<?php

namespace App\Http\Controllers;

use App\Http\Requests\TanimKesimTipiRequest;
use App\Models\TanimKesimTipi;

class TanimKesimTipiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimkesimtipi = TanimKesimTipi::get();

        return view('tanim.kesimtipi.liste',['tanimkesimtipi'=>$tanimkesimtipi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.kesimtipi.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimKesimTipiRequest $request)
    {
        TanimKesimTipi::create($request->all());
            return redirect()->back()->with('message', 'Ekleme İşlemi Başarılı');
        
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guncelleGet( int $id)
    {
        $tanimkesimtipi = TanimKesimTipi::find($id);

        return view('tanim.kesimtipi.ekle',[
            'tanimkesimtipi' => $tanimkesimtipi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimKesimTipiRequest $request, int $id)
    {
        $tanimkesimtipi = TanimKesimTipi::where('id', $id)->firstOrFail();
        $tanimkesimtipi->update($request->all());

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
        $tanimkesimtipi = TanimKesimTipi::where('id', $id)->firstOrFail();
        $tanimkesimtipi->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
