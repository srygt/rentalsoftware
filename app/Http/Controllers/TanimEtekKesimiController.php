<?php

namespace App\Http\Controllers;

use App\Models\TanimEtekKesimi;
use App\Http\Requests\TanimEtekKesimiRequest;

class TanimEtekKesimiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimetekkesimi = TanimEtekKesimi::get();

        return view('tanim.etekkesimi.liste',['tanimetekkesimi'=>$tanimetekkesimi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.etekkesimi.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimEtekKesimiRequest $request)
    {
        TanimEtekKesimi::create($request->all());
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
        $tanimetekkesimi = TanimEtekKesimi::find($id);

        return view('tanim.etekkesimi.ekle',[
            'tanimetekkesimi' => $tanimetekkesimi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimEtekKesimiRequest $request, int $id)
    {
        $tanimetekkesimi = TanimEtekKesimi::where('id', $id)->firstOrFail();
        $tanimetekkesimi->update($request->all());

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
        $tanimetekkesimi = TanimEtekKesimi::where('id', $id)->firstOrFail();
        $tanimetekkesimi->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
