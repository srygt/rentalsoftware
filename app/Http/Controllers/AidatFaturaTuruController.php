<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AidatFaturaTuru;
use App\Http\Requests\AidatFaturaTuruEkleRequest;


class AidatFaturaTuruController extends Controller
{
    public function index()
    {
        $aidatfaturaturu = AidatFaturaTuru::get();

        return view('aidatfaturaturu.liste', ['aidatfaturaturu' => $aidatfaturaturu]);
    }
        
    public function update(AidatFaturaTuruEkleRequest $request, int $id)
    {
        $ekKalem = AidatFaturaTuru::where('id', $id)->firstOrFail();

        $ekKalem->update($request->all());

        return redirect()
            ->back()
            ->with('message', 'Güncelleme işlemi başarı ile tamamlandı.');
    }

    public function storeGet()
    {
        return view('aidatfaturaturu.ekle');
    }

    public function storePost(AidatFaturaTuruEkleRequest $request)
    {
        AidatFaturaTuru::create($request->all());

        return redirect()
            ->back()
            ->with('message', 'Ekleme işlemi başarı ile tamamlandı.');
    }


    public function guncelleGet(int $id)
    {
        $aidatfaturaturu = AidatFaturaTuru::find($id);

        return view('aidatfaturaturu.ekle', [
            'aidatfaturaturu' => $aidatfaturaturu,
        ]);
    }
    public function destroy(int $id)
    {
        $aidatfaturaturu = AidatFaturaTuru::where('id', $id)->firstOrFail();
        $aidatfaturaturu->delete();

        return response()->json(['message' => 'Silme işlemi başarı ile tamamlandı!']);
    }
}
