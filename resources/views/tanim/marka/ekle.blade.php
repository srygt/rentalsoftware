@extends('layout.master')
@section('parentPageTitle', 'Markalar')
@if(isset($tanimmarka->id))
    @section('title', 'Marka Güncelle')
@else
    @section('title', 'Marka Ekle')
@endif

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Marka Ekle</h3>
		@endslot
		<li class="breadcrumb-item">Markalar</li>
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
                    <a href="{{route('tanim.marka.liste')}}" class="btn btn-info pull-right p-10 m-1"><i class="fa fa-list"></i> Markalar</a>

					<div class="card-header pb-0">
						<h5>Markalar</h5>
						<span>
							Marka eklemek için aşağıdaki formu kullanabilirsiniz.
						</span>
					</div>
					<div class="card-body">
                        <form class="needs-validation"
                        action="{{ isset($tanimmarka->id)
                                    ? route('tanim.marka.guncelle.get', ['id' => $tanimmarka->id])
                                    : route('tanim.marka.store.post') }}"
                        method="post"
                    >
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="validationCustom01">Başlık<span class="text-danger">*</span></label>
                                    <input class="form-control" name="title" value="{{ old('title', $tanimmarka->title ?? '') }}" type="text" placeholder="Başlık Yazınız">
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