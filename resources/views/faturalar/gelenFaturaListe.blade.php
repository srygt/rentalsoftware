@extends('layout.master')
@section('parentPageTitle', 'Fatura İşlemleri ')
@section('title', 'Fatura Listesi')


@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="col-sm-12">
                    <form action="{{ route('fatura.gelen.liste') }}">
                        <div class="form-group">
                            <label>Filtre</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="since" id="since">
                                        <option value="">Seçin</option>
                                        @foreach(\App\Http\Requests\GelenFaturaRequest::GELEN_FATURA_DAY_LIST as $day)
                                            <option
                                                value="{{ $day }}"
                                                @if (request('since', \App\Http\Requests\GelenFaturaRequest::SINCE_DEFAULT) == $day)
                                                    selected
                                                @endif
                                            >
                                                Son {{ $day }} Gün
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Filtrele</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                <thead>
                <tr>
                    <th>Fatura No</th>
                    <th>Doküman Türü</th>
                    <th>Doküman Profili</th>
                    <th>Durum</th>
                    <th>Miktar</th>
                    <th>Oluşturulma Tarihi</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
             @foreach($faturalar as $fatura)
                <tr>
                    <td><div class="font-15">{{ $fatura->DocumentId }}</div></td>
                    <td>{{ $fatura->DocumentTypeCode }}</td>
                    <td>{{ $fatura->ProfileId }}</td>
                    <td>{{ $fatura->StatusExp }}</td>
                    <td>{{ $fatura->PayableAmount . $fatura->DocumentCurrencyCode }}</td>
                    <td>{{ $fatura->CreatedDate }}</td>
                    <td>
                        <a href="{{ route('fatura.detay', ['appType' => $fatura->AppType, 'uuid' => $fatura->UUID]) }}" class="btn btn-sm btn-default" ><i class="fa fa-download text-blue"></i></a>
                        <!-- <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button> -->
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

        $('.dataTable').DataTable( {
            "language": {
                "url":'{{asset('js/json/datatableturkish.json')}}',
            }
        } );
    </script>
@stop
