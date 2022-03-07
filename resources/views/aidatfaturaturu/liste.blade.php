@extends('layout.master')
@section('parentPageTitle', 'Aidat Fatura Türü İşlemleri ')
@section('title', 'Aidat Fatura Türü Listesi')

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
    <div class="col-lg-12">
        <a href="{{route('home')}}" class="btn btn-info pull-right p-10 m-1"><i class="fa fa-home"></i></a>
        <a href="{{route('aidatfaturaturu.store.get')}}" class="btn btn-success pull-right p-10 m-1"><i class="fa fa-plus-square"></i> Başlık Ekle</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                <thead>
                <tr>
                    <th>Başlık</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($aidatfaturaturu as $fturu)
                    <tr>
                        <td>{{$fturu->baslik }}</td>
                        <td>
                            <a href="{{ route('aidatfaturaturu.guncelle.get', $fturu->id) }}" class="btn btn-sm btn-default" ><i class="fa fa-edit text-blue"></i></a>
                            <a data-id="{{ $fturu->id }}" href="javascript:" class="btn btn-sm btn-default matgis-delete"><i class="fa fa-trash-o text-danger"></i></a>
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
    <style>
        .table-responsive form {
            display: inline;
        }
        .dataTables_length{display: none;}
        .dataTables_filter input {
            background-color: white;
        }
    </style>
@stop

@section('page-script')
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>

    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
    <script>

        $('.matgis-delete').on('click', function(){
            deleteItem(
                $(this).parents('tr'),
                "{{ route('aidatfaturaturu.destroy', ':id') }}".replace(':id', $(this).data('id'))
            );
        });
        $('.dataTable').DataTable( {
            "language": {
                "url":'{{asset('js/json/datatableturkish.json')}}',
            }
        } );
    </script>
@stop
