<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TanimRenk;
use App\Http\Requests\TanimRenkRequest;

class TanimRenkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimrenk = TanimRenk::get();

        return view('tanim.renk.liste',['tanimrenk'=>$tanimrenk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.renk.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimRenkRequest $request)
    {
        TanimRenk::create($request->all());
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
        $tanimrenk = TanimRenk::find($id);

        return view('tanim.renk.ekle',[
            'tanimrenk' => $tanimrenk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimRenkRequest $request, int $id)
    {
        $tanimrenk = TanimRenk::where('id', $id)->firstOrFail();
        $tanimrenk->update($request->all());

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
        $tanimrenk = TanimRenk::where('id', $id)->firstOrFail();
        $tanimrenk->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
