<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KdvTuru;
use App\Http\Requests\KdvTuruEkleRequest;


class KdvTuruController extends Controller
{
    public function index()
    {
        $kdvturu = KdvTuru::get();

        return view('kdvturu.liste', ['kdvturu' => $kdvturu]);
    }
        
    public function update(KdvTuruEkleRequest $request, int $id)
    {
        $ekKalem = KdvTuru::where('id', $id)->firstOrFail();

        $ekKalem->update($request->all());

        return redirect()
            ->back()
            ->with('message', 'Güncelleme işlemi başarı ile tamamlandı.');
    }

    public function storeGet()
    {
        return view('kdvturu.ekle');
    }

    public function storePost(KdvTuruEkleRequest $request)
    {
        KdvTuru::create($request->all());

        return redirect()
            ->back()
            ->with('message', 'Ekleme işlemi başarı ile tamamlandı.');
    }


    public function guncelleGet(int $id)
    {
        $kdvturu = KdvTuru::find($id);

        return view('kdvturu.ekle', [
            'kdvturu' => $kdvturu,
        ]);
    }
    public function destroy(int $id)
    {
        $kdvturu = KdvTuru::where('id', $id)->firstOrFail();
        $kdvturu->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
