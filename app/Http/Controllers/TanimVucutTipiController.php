<?php

namespace App\Http\Controllers;

use App\Models\TanimVucutTipi;
use App\Http\Requests\TanimVucutTipiRequest;

class TanimVucutTipiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vucuttipi = TanimVucutTipi::get();

        return view('tanim.vucuttipi.liste',['vucuttipi'=>$vucuttipi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.vucuttipi.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimVucutTipiRequest $request)
    {
            TanimVucutTipi::create($request->all());
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
        $tanimvucuttipi = TanimVucutTipi::find($id);

        return view('tanim.vucuttipi.ekle',[
            'tanimvucuttipi' => $tanimvucuttipi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimVucutTipiRequest $request, int $id)
    {
        $tanimvucuttipi = TanimVucutTipi::where('id', $id)->firstOrFail();
        $tanimvucuttipi->update($request->all());

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
        $tanimvucuttipi = TanimVucutTipi::where('id', $id)->firstOrFail();
        $tanimvucuttipi->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
