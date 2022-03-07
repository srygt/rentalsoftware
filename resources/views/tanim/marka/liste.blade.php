
@extends('layout.master')

@section('parentPageTitle', 'Marka İşlemleri ')
@section('title', 'Marka Listesi')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatable-extension.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>Markalar</h3>
    @endslot
    <li class="breadcrumb-item">Marka</li>
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
	        <!-- HTML (DOM) sourced data  Starts-->
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-header">
                        <a href="{{route('home')}}" class="btn btn-info pull-right p-10 m-1"><i class="fa fa-home"></i></a>
                        <a href="{{route('tanim.marka.store.get')}}" class="btn btn-success pull-right p-10 m-1"><i class="fa fa-plus-square"></i> Ekle</a>
                        <hr>
	                    <h5>Markalar</h5>
	                    <span>
	                        Markalara aşağıdaki tablodan erişebilirsiniz.
	                    </span>                        
	                </div>
	                <div class="card-body">
	                    <div class="dt-ext table-responsive">
	                        <table class="display" id="responsive">                            
	                            <thead>
	                                <tr>
	                                    <th>Başlık</th>
	                                    <th>İşlem</th>
	                                </tr>
	                            </thead>
                                <tbody>
                                    @foreach($tanimmarka as $kturu)
                                        <tr>
                                            <td>{{$kturu->title }}</td>
                                            <td>
                                                <a href="{{ route('tanim.marka.guncelle.get', $kturu->id) }}" class="btn btn-sm btn-default" ><h5><i class="fa fa-edit text-blue"></i></h5></a>
                                                <a data-id="{{ $kturu->id }}" href="javascript:" class="btn btn-sm btn-default matgis-delete"><h5><i class="fa fa-trash-o text-danger"></i></h5></a>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- HTML (DOM) sourced data  Ends-->
	    </div>
	</div>

	
	@push('scripts')
	<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.matgis-delete').on('click', function(){
            deleteItem(
                $(this).parents('tr'),
                "{{ route('tanim.marka.destroy', ':id') }}".replace(':id', $(this).data('id'))
            );
        });
        $('.dataTable').DataTable( {
            "language": {
                "url":'{{asset('js/json/datatableturkish.json')}}',
            }
        } );
    </script>    
	@endpush

@endsection