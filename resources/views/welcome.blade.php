<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <base href="{{asset('')}}">
        <title>Laravel</title>
        <link rel="shortcut icon" type="image/x-icon" href="public/favicon.ico">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">        <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('resources/css/theme.min.css')}}">
        <!-- Styles -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/sharp-solid.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/sharp-regular.css">
        {{-- <script src="{{ asset('../resources/js/app.js') }}" defer></script> --}}
        {{-- Libary --}}
        <link rel="stylesheet" href="/node_modules/animate.css/animate.min.css">
        <link href="/node_modules/slick-carousel/slick/slick.css" rel="stylesheet" />
        <link href="/node_modules/slick-carousel/slick/slick-theme.css" rel="stylesheet" />
        <link href="/node_modules/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
        <link rel="stylesheet" href="node_modules/feather-webfont/dist/feather-icons.css">
        <link rel="stylesheet" href="node_modules/simplebar/dist/simplebar.css">
        <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
          
            gtag('config', 'G-M8S4MT3EYG');
          </script>
        <style>
            *{
                margin: 0;
                padding: 0;
                font-size: 13px;
            }
            body{
                position: relative;
                
            }
            #header{
                z-index: 2;
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                top: 0;
                height: 90px
            }
            .active2, .active1{
                background-color: #ffffff !important;
            }
            option{
                font-size: 1.1rem;
            }

            .loading{
                color: #999;
                background-color: #999;
            }
            .user_dropdown::after{
                content: none
            }

            .for-contact{
                backdrop-filter: blur(5px);
                    background-color: rgba(10, 38, 71, 0.8);
                }
                .header_1{
                margin: 0;
                z-index: 2;
            }
            .header_2{
                z-index: 5;
            }
            .header_3>p,a{
                font-size: 1.2rem;
            }
            .nav-link{
                font-size: 1.3rem;
            }
            .header_3{
                height: 50px;
            }
            .home_contact{
                height: 500px;
                background-image: url('resources/image/istockphoto-1131381748-612x612.jpg');
                background-position: center;
                background-repeat: no-repeat;
                background-size: contain;
            }
            .contact1{
                height: 400px;
                background-position: 0 -70px;
                background-size: cover;
            }
            .contact2{
                background-color: #13289D;
                z-index: 0;
                opacity: 0.8;
            }
            
            .login-site{
                min-height: 600px;
                padding-bottom: 80px
            }
            .login1{
                --bs-nav-link-color: var(--bs-white);
                --bs-nav-pills-link-active-color: var(--bs-primary);
                --bs-nav-pills-link-active-bg: var(--bs-white);
            }
            .product-list-site{
                background-color: #2c3e50;
                box-shadow: #000 0 2px 5px;
                height: 140px;
            }
            .btn-cus{
              cursor: pointer;
            }
            .btn-cus:hover .fa-light{
                font-weight: 900;
            }
            .curved {
                background: #2c3e50;
                border-bottom-left-radius: 50% 14%;
                border-bottom-right-radius: 50% 14%;
            }
            .active-profie{
                background-color: #7743DB;
                box-shadow: box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;;
            }
            .active-profie > a{
                color: #ffffff;
            }
            .dropdown_news::after{
            content: none;
            }
            .show_listchat::after{
                content: none!important;
            }
            .list_mess::after{
                content: none!important;
            }
            .commt-edit::after{
                content: none!important;
            }
        </style>
    </head>
    <body>
        @include('layout.header')
        @yield('content')
        @include('layout.modal')
        @include('layout.footer')
        @yield('modal')
        <!-- Libs JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/umd/popper.min.js"></script>
        <script src="node_modules/simplebar/dist/simplebar.min.js"></script>
        <script src="node_modules/slick-carousel/slick/slick.js"></script>
        <script src="node_modules/slick-carousel/slick/slick.min.js"></script>
        <script src="node_modules/tiny-slider/dist/min/tiny-slider.js"></script>
        <script src="node_modules/jquery-countdown/dist/jquery.countdown.min.js"></script>
        <script src="resources/js/slick-slider.js"></script>
        <script src="resources/js/theme.min.js"></script>
        <script src="resources/js/countdown.js"></script>
        <script src="resources/js/zoom.js"></script>
        @include('layout.message')
        @include('scripts.fe_script')
        @yield('script')
        {{-- <script>
           
            $(document).ready(function(){
                $('#clearCart').click(function(){
                  console.log(window.location.origin + "/index.php/ajax/cart/clearcart");
                    $.get(window.location.origin + "/index.php/ajax/cart/clearcart",function(data){
                        $('#listCart').html(data);
                    })
                });
                $('.btn_showcart').click(function(){
                    $.get(window.location.origin+"/index.php/ajax/cart/listcart",function(data){
                        $('#listCart').html(data);
                        $('input[name=_token]').val($('meta[name="csrf-token"]').attr('content'));
                        
                    })
                });
                const valiquan_cart = (value)=>{
                    let validateNum =/^\d{1,10}$/;
                    let currentVl = $(this).val();
                    $(this).val(validateNum.test(currentVl)?currentVl:value);
                }
            })
        </script> --}}
    </body>
    </html>
    