@extends('layout.master')
@section('parentPageTitle', 'Beden Tipleri')
@if(isset($aidatfaturaturu->id))
    @section('title', 'Beden Güncelle')
@else
    @section('title', 'Beden Ekle')
@endif

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Beden Ekle</h3>
		@endslot
		<li class="breadcrumb-item">Beden Tipleri</li>
	@endcomponent
	
	<div class="container-fluid">
		<div class="row">
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
			<div class="col-sm-12">
				<div class="card">
                    <a href="{{route('tanim.beden.liste')}}" class="btn btn-info pull-right p-10 m-1"><i class="fa fa-list"></i> Bedenler</a>

					<div class="card-header pb-0">
						<h5>Beden</h5>
						<span>
							Beden eklemek için aşağıdaki formu kullanabilirsiniz.
						</span>
					</div>
					<div class="card-body">
                        <form class="needs-validation"
                        action="{{ isset($beden->id)
                                    ? route('tanim.beden.guncelle.get', ['id' => $beden->id])
                                    : route('tanim.beden.store.post') }}"
                        method="post"
                    >
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="validationCustom01">Beden<span class="text-danger">*</span></label>
                                    <input class="form-control" name="body" value="{{ old('body', $beden->body ?? '') }}" type="text" placeholder="Beden Yazınız">
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="validationCustom01">Göğüs(cm)<span class="text-danger">*</span></label>
                                    <input class="form-control" name="bust" value="{{ old('bust', $beden->bust ?? '') }}" type="text" placeholder="Gögüs Ölçüsü (cm) Yazınız">
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="validationCustom01">Bel (cm)<span class="text-danger">*</span></label>
                                    <input class="form-control" name="waist" value="{{ old('waist', $beden->waist ?? '') }}" type="text" placeholder="Bel Ölçüsü (cm) Yazınız">
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="validationCustom01">Kalça (cm)<span class="text-danger">*</span></label>
                                    <input class="form-control" name="hip" value="{{ old('hip', $beden->hip ?? '') }}" type="text" placeholder="Kalça Ölçüsü (cm) Yazınız">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-lg-right m-t-20">
                                <button type="submit" class="btn btn-primary">Gönder</button>
                            </div>
                        </div>
                    </form>     
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	@push('scripts')
	<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
	@endpush

@endsection