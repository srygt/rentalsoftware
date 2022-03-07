@extends('layout.master')
@section('parentPageTitle', 'Fatura Ödemeleri')
@if(isset($aidatfaturaturu->id))
    @section('title', 'Fatura Ödeme Güncelle')
@else
    @section('title', 'Fatura Ödeme Ekle')
@endif
@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datetimepicker/jquery.datetimepicker.min.css') }}"/>
@append
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
        <div class="col-sm-6 col-md-6">
            <a href="{{route('faturaodeme.liste')}}" class="btn btn-success pull-right p-10 m-1"><i class="fa fa-list"></i> Ödenen Faturalar</a>
            <div class="card text-white bg-info">
                <div class="card-header">Fatura Ödeme Tanımla</div>
                <div class="card-body">
                    <form
                        action="{{ isset($faturaodeme->id)
                                    ? route('faturaodeme.guncelle.get', ['id' => $faturaodeme->id])
                                    : route('faturaodeme.store.post') }}"
                        method="post"
                    >
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Fatura No<span class="text-danger">*</span></label>                                
                                    <select class="form-control" name="fatura_no" id="fatura_no">
                                        <option value="">Fatura Seçin</option>
                                        @foreach($faturalar as $fatura)
                                            <option
                                                value="{{ $fatura->fatura_no }}"
                                                data-id="{{ $fatura->uuid }}"
                                                data-tutari="{{ $fatura->toplam_odenecek_ucret }}"
                                                data-ftarihi="{{ $fatura->fatura_tarih }}"
                                                data-otarihi="{{ $fatura->son_odeme_tarihi }}"
                                                data-fturu="{{ $fatura->tur }}"
                                                data-not="{{ $fatura->not }}"
                                                data-abone="{{ $fatura->abone_id }}"
                                                >{{ $fatura->fatura_no }} - {{ $fatura->fatura_tarih }} - {{ $fatura->toplam_odenecek_ucret }}
                                            </option>                                   
                                        @endforeach
                                    </select>
                                    <input
                                        id="fatura_detay"
                                        name="fatura_detay"
                                        type="hidden"
                                        value="test"
                                        class="form-control"
                                    >
                                    <input
                                        id="uuid"
                                        name="uuid"
                                        type="hidden"
                                        value="test"
                                        class="form-control"
                                    >                                    
                                    <input
                                        id="odemedurumu"
                                        name="odemedurumu"
                                        type="hidden"
                                        value="1"
                                        class="form-control"
                                    >      
                                    <input
                                        id="faturatarihi"
                                        name="faturatarihi"
                                        type="hidden"
                                        class="form-control"
                                    >                                                                      
                                    <input
                                        id="sonodemetarihi"
                                        name="sonodemetarihi"
                                        type="hidden"
                                        class="form-control"
                                    >    
                                    <input
                                        id="turu"
                                        name="turu"
                                        type="hidden"
                                        class="form-control"
                                    >    
                                    <input
                                        id="aboneid"
                                        name="aboneid"
                                        type="hidden"
                                        class="form-control"
                                    >                                      
                                    <input
                                    id="faturanotu"
                                    name="faturanotu"
                                    type="hidden"
                                    class="form-control"
                                >                                                                             
                                </div>
                            </div> 
                            <div class="col-sm-0">
                                <button style="display:none;"
                                    id="fillDefaultsButton"
                                    onclick="fillDefaults()"
                                    type="button"
                                    class="btn btn-primary"
                                    disabled
                                >
                                </button>
                            </div>
                            <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Fatura Ödeme Tarihi<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                    </div>
                                    <input
                                        id="odemetarihi"
                                        name="odemetarihi"
                                        value="{{ old("odemetarihi") }}"
                                        placeholder="Seçin"
                                        class="form-control datetime"
                                    >
                                </div>
                            </div>
                        </div>   
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Fatura Ödeme Tutarı<span class="text-danger">*</span></label>
                                <input
                                    id="odemetutari"
                                    name="odemetutari"
                                    value="{{ old("odemetutari") }}"
                                    type="text"
                                    class="ucret form-control"
                                >
                            </div>
                        </div>  
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Fatura Ödeme Açıklaması</label>
                                <textarea
                                    id="odemenotu"
                                    name="odemenotu"
                                    type="text"
                                    rows="4"
                                    class="form-control"
                                ></textarea>
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
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-turk-lirasi-maskesi/jquery.turkLirasi.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datetimepicker/jquery.datetimepicker.full.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-select2/js/select2.min.js') }}"></script>
<script>

    function getComingDayDate(day) {
        var possibleDate                = new Date();

        if (day < possibleDate.getDay()) {
            possibleDate.setMonth(possibleDate.getMonth() + 1)
        }

        // getMonth() Ocak'ı  "0" kabul ediyor, setMonth() Ocak'ı "1" kabul ediyor :)
        let month                       = possibleDate.getMonth() + 1

        return ("0" + day).slice(-2)
            + '.' + ("0" + month).slice(-2)
            + '.' + ("0" + possibleDate.getFullYear()).slice(-4);
    }

    function getCurrentDatetime() {
        let dateObj = new Date();

        let year    = dateObj.getFullYear();
        let month   = String(dateObj.getMonth() + 1).padStart(2, '0');
        let day     = String(dateObj.getDate()).padStart(2, '0');

        let hour    = String(dateObj.getHours()).padStart(2, '0');
        let minute  = String(dateObj.getMinutes()).padStart(2, '0');

        return [day, month, year].join('.') + ' ' + [hour,minute].join(':');
    }

    $(function () {

        $.datetimepicker.setLocale('tr');

        $('.date').datetimepicker({
            timepicker: false,
            format: '{{ config('common.date.format') }}',
        });

        $('.datetime').datetimepicker({
            format: '{{ config('common.time.format') }}',
        });

        $('#mainForm').on('submit', function(){
            $('.ucret')
                .each(function(){
                    $(this).val($(this).val().replace(/[^0-9,]/g, '').replace(',', '.'));
                });
        });
        function fillDefaults() {
            let seciliFatura         = $('#fatura_no').find(':selected');
            let uuid                 = seciliFatura.data('uuid');
            let tutar                = seciliFatura.data('tutar');

        }
        $('.ucret')
            .turkLirasi({
                maxDecimalCount: 9,
            })
            .trigger('keydown');
            $('#fatura_no')
                .on('change', function(){
                    $('#fillDefaultsButton').prop('disabled', !$(this).val());

                    const selected      = $(this).find(':selected');
                    const uuid          = selected.data('id');
                    const tutar         = selected.data('tutari');
                    const ftarihi       = selected.data('ftarihi');
                    const otarihi       = selected.data('otarihi');
                    const fturu         = selected.data('fturu');
                    const not           = selected.data('not');
                    const abone         = selected.data('abone');
                    $('#uuid').val(uuid)
                    $('#odemetutari').val(tutar)                    
                    $('#faturatarihi').val(ftarihi)                    
                    $('#sonodemetarihi').val(otarihi)                    
                    $('#turu').val(fturu)                    
                    $('#aboneid').val(abone)                    
                    $('#faturanotu').val(not)                    
                })
                .trigger('change')
                .select2();
    });
</script>
@stop
