@extends('layout.master')
@section('parentPageTitle', 'Ek Faturalar')
@if(isset($aidatfaturaturu->id))
    @section('title', 'Aidat Fatura Türü Güncelle')
@else
    @section('title', 'Aidat Fatura Türü Ekle')
@endif
@section('content')
    <div class="row clearfix">
        @if ($errors->any() || session()->has('message'))
            <div class="col-sm-12" id="messages">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif
        <div class="col-sm-6 col-md-4">
            <a href="{{route('aidatfaturaturu.liste')}}" class="btn btn-success pull-right p-10 m-1"><i class="fa fa-list"></i> Fatura Türleri</a>
            <div class="card text-white bg-info">
                <div class="card-header">Aidat Fatura Türü</div>
                <div class="card-body">
                    <form
                        action="{{ isset($aidatfaturaturu->id)
                                    ? route('aidatfaturaturu.guncelle.get', ['id' => $aidatfaturaturu->id])
                                    : route('aidatfaturaturu.store.post') }}"
                        method="post"
                    >
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Başlık<span class="text-danger">*</span></label>
                                    <input class="form-control" name="baslik" value="{{ old('baslik', $aidatfaturaturu->baslik ?? '') }}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-lg-right m-t-20">
                                <button type="submit" class="btn btn-primary btn-lg">Gönder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-styles')

    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script>
$('#ucretTur').on('change', function(){
    if ( $(this).children('option:selected').val() === "{{ \App\Models\AyarEkKalem::FIELD_UCRET_BIRIM_FIYAT }}" )
    {
        $('#oranContainer').show(250);
    }
    else {
        $('#oranContainer').hide(250);
    }
})
.trigger('change');
</script>
@stop
