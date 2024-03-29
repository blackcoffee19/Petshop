<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <base href="{{asset('')}}">
    <title>Admin</title>
    <!-- CSS only -->
    {{-- <link rel="stylesheet" href="{{asset('resources/css/pagination.css')}}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <!-- font-family: 'Montserrat', sans-serif;
    font-family: 'Poppins', sans-serif; -->
    {{-- <link rel="stylesheet" href="resources/css/admin.css"> --}}
    <link rel="stylesheet" href="resources/css/theme.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>

    <style>
        *{
            margin: 0;
            padding: 0;
            font-size: 13px;
        }

        .dropdown_news::after{
        content: none;
        }
        .show_listchat::after{
            content: none!important;
        }
    </style>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>
</head>
<body>
    @include('backend.header')

    <div class="main-wrapper">
        @include('backend.menu')
        <main class="main-content-wrapper">
            @yield('content')
        </main>
    </div>
    <script src="node_modules/simplebar/dist/simplebar.min.js"></script>
    <!-- Theme JS -->
    <script src="https://kit.fontawesome.com/2f28ccbbd6.js" crossorigin="anonymous"></script>
    <script src="{{ asset('resources/js/theme.min.js') }}"></script>
    <script src="{{ asset('resources/js/apexcharts.min.js') }}"></script>
    {{-- @include('layout.notification') --}}
    @yield('admin_script')
    @include('layout.message')
    <script>
        $(document).ready(function(){
            @if(Session::has('message_confirm'))
                $('#messConfirm').html('{{Session::get("message_confirm")}}');
                const toast = new bootstrap.Toast($('#toastMessage'))
                toast.show();
            @endif
            @if(Session::has('message_error'))
                $('#messError').html('{{Session::get("message_error")}}');
                const toast = new bootstrap.Toast($('#toastError'))
                toast.show();
            @endif
            let toastElList = [].slice.call($('.notificate'));
            let toastList = toastElList.map(function(toastEl) {
              return new bootstrap.Toast(toastEl)
            })
            toastList.forEach(toast => toast.show());
            $('.btn_admin_removenews').click(function(){
                window.location.assign(window.location.origin+"/index.php/admin/ajax/remove-news/"+$(this).data('idnews'));
            })
            $('.btn_admin_vieworder').click(function(){
                $.get(window.location.origin+'/index.php/admin/ajax/view_order/'+$(this).data('idnews'),function(data){
                    $('#table_view').html(data);
                    if($('#check_order').data('status') == 'unconfimred'){
                        $('#submit_status').removeAttr('disabled');
                    }else{
                        $('#submit_status').attr('disabled','disabled');
                    };
                });
            })
        })
    </script>
</body>
</html>
