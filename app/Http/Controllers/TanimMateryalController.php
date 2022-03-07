<?php

namespace App\Http\Controllers;

use App\Models\TanimMateryal;
use App\Http\Requests\TanimMateryalRequest;

class TanimMateryalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimmateryal = TanimMateryal::get();

        return view('tanim.materyal.liste',['tanimmateryal'=>$tanimmateryal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.materyal.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimMateryalRequest $request)
    {
        TanimMateryal::create($request->all());
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
        $tanimmateryal = TanimMateryal::find($id);

        return view('tanim.materyal.ekle',[
            'tanimmateryal' => $tanimmateryal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimMateryalRequest $request, int $id)
    {
        $tanimmateryal = TanimMateryal::where('id', $id)->firstOrFail();
        $tanimmateryal->update($request->all());

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
        $tanimmateryal = TanimMateryal::where('id', $id)->firstOrFail();
        $tanimmateryal->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
