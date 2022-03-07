<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaturaOdeme;
use App\Models\Abone;
use App\Models\Fatura;
use App\Models\Mukellef;
use App\Http\Requests\FaturaOdemeRequest;

class FaturaOdemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Fatura Ödeme Listesi
        $faturaodeme = FaturaOdeme::get();
        return view('faturaodeme.liste', ['faturaodeme' => $faturaodeme]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function storeGet()
    {
        $model = Fatura::query();
        $faturalar = $model
        ->get();
        $fmodel = Faturaodeme::query();
        $faturaodemeleri = $fmodel->get();
        return view('faturaodeme.ekle',
        [
            'faturalar' => $faturalar,
            'faturaodemeleri' => $faturaodemeleri,
    ]);
    }

    public function storePost(FaturaOdemeRequest $request)
    {
        FaturaOdeme::create($request->all());

        return redirect()
            ->back()
            ->with('message', 'Ekleme İşlemi Başarılı Şekilde Tamamlandı');
    }

    public function guncelleGet(int $id)
    {
        $faturaodeme = FaturaOdeme::find($id);

        return view('faturaodeme.ekle',[
            'faturaodeme'=> $faturaodeme,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaturaOdemeRequest $request, $id)
    {
        //Fatura Ödeme Güncelleme
        $faturaodeme = FaturaOdeme::where('id', $id)->firstOrFail();
        $faturaodeme->update($request->all());

        return redirect()
                ->back()
                ->with('message', 'Güncelleme İşlemi Başarılı Şekilde Tamamlandı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $faturaodeme = FaturaOdeme::where('id', $id)->firstOrFail();
        $faturaodeme->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }

}
