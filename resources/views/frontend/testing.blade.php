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
        <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
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
        <style>
            .dropdown_news::after{
            content: none;
            }
            .dropdown-toggle::after{
                content: none!important;
            }
            .show_listchat::after{
                content: none!important;

            }
            .list_mess::after{
                content: none!important;
            }
            body{
                background: #393C42;
            }
        </style>
    </head>
  <body>
    
      <main class="container-fluid" style="height: 800px">
          <div class="row">
              <div class="col-4"></div>
              <div class="col-4 mx-auto position-relative">
                @if (Auth::check())
                    @if (Auth::user()->admin == 1)
                    <div class="position-fixed rounded-circle btn-group bottom-0 end-0 dropstart position-relative"  style="width: 100%;">
                        <a class="dropdown-toggle list_mess" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="bottom: 30px;">
                            <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                        </a>
                        <div class="dropdown-menu pt-0"   style="width: auto; background-color: #393C42;bottom:30px">
                            <div class="d-flex flex-row position-relative dropup justify-content-between align-items-center ">
                                @foreach ($groups as $group)
                                <a class="ms-3 show_chat" data-groupcode="{{$group->code_group}}" data-iduser="" >
                                    @if ($group->User1->image)
                                    <img src="{{asset('resources/image/user/'.$group->User1->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                    @else
                                    <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                    @endif
                                </a>
                                @endforeach
                                @foreach ($user_message as $user)
                                <a class="ms-3 show_chat" data-groupcode="" data-iduser="{{$user->id_user}}">
                                    @if ($user->image)
                                    <img src="{{asset('resources/image/user/'.$user->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                    @else
                                    <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                    @endif
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="position-absolute " id="chatbox"  style="height: 400px; width: 300px; bottom:50px">
                            <div class="card w-100 h-100 overflow-y-scroll" >
                                <div class="card-header row" style="background-color: #E38B29">
                                    <h4 class="col-11">Contact to Admin</h4>
                                    <button type="button" class="btn-close col-1"  aria-label="Close" id="btn_close"></button>
                                </div>
                                <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages" data-chat="new" data-iduser="{{Auth::user()->id_user}}" style="background-color: #FDEEDC">
                                </div>
                                <div class="card-footer p-2 w-100 input_message " style="">
                                    <div class="input-group">
                                        <input type="text" class="form-control " style="background-color: #f5f5f5; border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                                        <button class="btn border button-submit" type="button" style="background-color: #ffffff" tabindex="1">
                                            <i class="fa-solid fa-paper-plane-top fa-lg" style="color: #1c71d8;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="position-fixed  dropstart "  style="right: 20px;bottom: 10px;">
                        <a class="dropdown-toggle list_mess " data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="bottom: 30px;">
                            <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                        </a>
                        <div class="dropdown-menu pt-0"   style="width: auto; background-color: #393C42;bottom:30px">
                            <div class="d-flex flex-row position-relative dropup justify-content-between align-items-center ">
                                @foreach ($groups as $group)
                                <a class="me-3 show_chat" data-groupcode="{{$group->code_group}}" data-iduser="" >
                                    @if ($group->User1->image)
                                    <img src="{{asset('resources/image/user/'.$group->User1->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                    @else
                                    <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                    @endif
                                </a>
                                @endforeach
                                <a class="me-3 show_chat" data-groupcode="" data-iduser="{{Auth::user()->id_user}}">
                                    <img src="{{asset('resources/image/user/admin.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                </a>
                            </div>
                        </div>
                        <div class="position-absolute " id="chatbox"  style="height: 400px; width: 300px; bottom:50px">
                            <div class="card w-100 h-100 overflow-y-scroll" >
                                <div class="card-header row" style="background-color: #E38B29">
                                    <h4 class="col-11">Contact to Admin</h4>
                                    <button type="button" class="btn-close col-1"  aria-label="Close" id="btn_close"></button>
                                </div>
                                <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages" data-chat="new" data-iduser="{{Auth::user()->id_user}}" style="background-color: #FDEEDC">
                                </div>
                                <div class="card-footer p-2 w-100 input_message " style="">
                                    <div class="input-group">
                                        <input type="text" class="form-control " style="background-color: #f5f5f5; border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                                        <button class="btn border button-submit" type="button" style="background-color: #ffffff" tabindex="1">
                                            <i class="fa-solid fa-paper-plane-top fa-lg" style="color: #1c71d8;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="position-fixed rounded-circle bottom-0 end-0 p-3 dropup d-flex flex-row position-relative" style="width: 400px; height: 500px;">
                            <a href="#!" class="btn shadow  position-absolute " data-bs-toggle="modal" data-bs-target="#userModal" " style="bottom: 30px; right: 30px;background-color: #e66100">
                            <i class="fa-light fa-message-smile fa-bounce fa-2xl" style="color: #ffffff;"></i>
                            </a>
                    </div>
                @endif
              </div>
              <div class="col-4"></div>
          </div>
      </main>
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/simplebar/dist/simplebar.min.js"></script>
      <script src="node_modules/slick-carousel/slick/slick.js"></script>
      <script src="node_modules/slick-carousel/slick/slick.min.js"></script>
      <script src="node_modules/tiny-slider/dist/min/tiny-slider.js"></script>
      <script src="node_modules/jquery-countdown/dist/jquery.countdown.min.js"></script>
      <script src="resources/js/slick-slider.js"></script>
      <script src="resources/js/theme.min.js"></script>
      <script src="resources/js/countdown.js"></script>
      <script src="resources/js/zoom.js"></script>
      <script>
        
        $(document).ready(function(){
            $('#chatbox').hide();
            $('#btn_close').click(function(){
                $('#chatbox').hide();
            })
            $('.show_chat').click(function(){
            //   console.log($(this).data('groupcode'));
            //   console.log($(this).data('iduser'));
              $('#chatbox').show();
              $.ajax(
                  {method: "GET",
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url: window.location.origin+'/index.php/ajax/message/show',
                  data: {'codegroup':$(this).data('groupcode'),'id_user':$(this).data('iduser')},
                  success: function (data) {
                    // console.log(data);
                    $('#messages').html(data);
                  }}
              )
            })
        })
        // if (toastTrigger) {
        //   toastTrigger.addEventListener('click', () => {
        //   })
        // }
      </script>
  </body>
</html>
