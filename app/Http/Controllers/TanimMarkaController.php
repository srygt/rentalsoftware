<?php

namespace App\Http\Controllers;

use App\Models\TanimMarka;
use App\Http\Requests\TanimMarkaRequest;

class TanimMarkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanimmarka = TanimMarka::get();

        return view('tanim.marka.liste',['tanimmarka'=>$tanimmarka]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGet()
    {
        return view('tanim.marka.ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(TanimMarkaRequest $request)
    {
        TanimMarka::create($request->all());
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
        $tanimmarka = TanimMarka::find($id);

        return view('tanim.marka.ekle',[
            'tanimmarka' => $tanimmarka,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TanimMarkaRequest $request, int $id)
    {
        $tanimmarka = TanimMarka::where('id', $id)->firstOrFail();
        $tanimmarka->update($request->all());

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
        $tanimmarka = TanimMarka::where('id', $id)->firstOrFail();
        $tanimmarka->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
