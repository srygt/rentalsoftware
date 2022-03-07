<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    @yield('meta')

    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    @includeIf('layout.admin.partials.css')
</head>
<body>

    <div class="page-wrapper compact-sidebar" id="pageWrapper">
      <!-- Page Header Start-->
      @includeIf('layout.admin.partials.header')
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        @include('layout.admin.partials.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <!-- Container-fluid starts-->
            @yield('content')
            <!-- Container-fluid Ends-->
          </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 footer-copyright">
                  <p class="mb-0">Copyright {{date('Y')}}-{{date('y', strtotime('+1 year'))}} © Matgis Yazılım tarafından geliştirilmiştir..</p>
                </div>
                <div class="col-md-6">
                  <p class="pull-right mb-0">OfisERP İnsan Kaynakları ve Ön Muhasebe Yazılımı</p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
      <!-- latest jquery-->
      @includeIf('layout.admin.partials.js')

<!-- Scripts -->

@stack('after-scripts')

<script type="text/javascript"><!--

function deleteItem(parentElement, deleteUrl) {
    swal({
        title: "Silmek istediğinize emin misiniz?",
        text: "Silinen verileri geri getiremezsiniz!",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: 'İptal',
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Evet, sil!",
        closeOnConfirm: false
    }, () => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "DELETE",
            url: deleteUrl,
        })
            .done(() => {
                parentElement.remove();
                swal("Silindi!", "Silme işlemi başarı ile tamamlandı.", "success");
            })
            .fail(( jqXHR, textStatus ) => {
                alert( "Request failed: " + textStatus );
            });
    });
}

$(document).ready(function(){
   var alertMessageExists = !!$('#alertMessages').length;

   if (alertMessageExists) {
       $('#alertMessages').scrollIntoView();
   }
});

--></script>

@if (trim($__env->yieldContent('page-script')))
    @yield('page-script')
@endif

</body>
</html>
