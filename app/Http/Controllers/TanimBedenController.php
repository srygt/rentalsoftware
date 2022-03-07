<?php

namespace App\Http\Controllers;

use App\Http\Requests\TanimBedenRequest;
use App\Models\TanimBeden;

class TanimBedenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beden = TanimBeden::get();

        return view('tanim.beden.liste',['beden' => $beden]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.beden.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepost(TanimBedenRequest $request)
    {
        TanimBeden::create($request->all());

        return redirect()->back()->with('message', 'Ekleme İşlemi Başarılı');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guncelleGet(int $id)
    {
        $beden = TanimBeden::find($id);

        return view('tanim.beden.ekle',[
            'beden' => $beden,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimBedenRequest $request, int $id)
    {
        $beden = TanimBeden::where('id', $id)->firstOrFail();
        $beden->update($request->all());

        return redirect()->back()->with('message','Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $beden = TanimBeden::where('id', $id)->firstOrFail();
        $beden->delete();
        return response()->json(['message'=>'Silme İşlemi Başarılı']);
    }
}
