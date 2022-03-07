@extends('layout.master')
@section('parentPageTitle', 'KDV Türleri')
@if(isset($aidatfaturaturu->id))
    @section('title', 'KDV Türü Güncelle')
@else
    @section('title', 'KDV Türü Ekle')
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
            <a href="{{route('kdvturu.liste')}}" class="btn btn-success pull-right p-10 m-1"><i class="fa fa-list"></i> Kdv Türleri</a>

            <div class="card text-white bg-info">
                <div class="card-header">KDV Türü</div>
                <div class="card-body">
                    <form
                        action="{{ isset($kdvturu->id)
                                    ? route('kdvturu.guncelle.get', ['id' => $kdvturu->id])
                                    : route('kdvturu.store.post') }}"
                        method="post"
                    >
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Oran<span class="text-danger">*</span></label>
                                    <input class="form-control" name="oran" value="{{ old('oran', $kdvturu->oran ?? '') }}" type="text" placeholder="Oran Giriniz">
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

@stop
