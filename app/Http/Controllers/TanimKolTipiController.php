<?php

namespace App\Http\Controllers;

use App\Models\TanimKolTipi;
use App\Http\Requests\TanimKolTipiRequest;

class TanimKolTipiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimkoltipi = TanimKolTipi::get();

        return view('tanim.koltipi.liste',['tanimkoltipi'=>$tanimkoltipi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.koltipi.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimKolTipiRequest $request)
    {
        TanimKolTipi::create($request->all());
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
        $tanimkoltipi = TanimKolTipi::find($id);

        return view('tanim.koltipi.ekle',[
            'tanimkoltipi' => $tanimkoltipi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimKolTipiRequest $request, int $id)
    {
        $tanimkoltipi = TanimKolTipi::where('id', $id)->firstOrFail();
        $tanimkoltipi->update($request->all());

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
        $tanimkoltipi = TanimKolTipi::where('id', $id)->firstOrFail();
        $tanimkoltipi->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
