{{-- @if (Auth::check())
  @if (Auth::user()->admin == 1)
    @php
      $next = 30;
    @endphp
    <div class="position-fixed rounded-circle bottom-0 end-0 p-3 dropup d-flex flex-row position-relative" style="height: 100px;width: 300px;">
      @foreach ($groups as $group)
        <a class="dropdown-toggle position-absolute show_listchat" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="bottom: 30px; right: {{$next}}px;">
          @if ($group->User1->image)
          <img src="{{asset('resources/image/user/'.$group->User1->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
          @else
          <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
          @endif
        </a>
        @php
          $next+=70;
        @endphp
        <div class="dropdown-menu w-100 rounded-2  position-absolute p-0 chatbox right-0" style="border: 1px solid #FFD8A9;height: 400px;bottom:310px" >
          <div class="card w-100 overflow-y-scroll" style="height: 400px">
            <div class="card-header position-fixed w-100 top-0 p-3" style="z-index: 1;background-color: #E38B29">
              <h4>{{$group->User1->name}}</h4>
            </div>
            <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " data-chat="{{$group->code_group}}" data-iduser="{{$group->id_user1}}" style="margin-top:45px;background-color: #FDEEDC">
              @foreach ($group->Message as $mess)
                  @if ($mess->id_user == $group->id_user1)
                  <div class="row mb-4 mx-3">
                    <div class="col-1 me-3 rounded-circle border text-center p-1" style="width:40px;height: 40px;">
                      @if ($group->User1->image)
                      <img src="{{asset('resources/image/user/'.$group->User1->image)}}" alt="" class="img-fluid h-100 rounded-circle" style="object-fit: cover">
                      @else
                      <i class="fa-duotone fa-user fa-lg"></i>
                      @endif
                    </div>
                    <div class="col-8 ">
                      <span class="text-danger">{{$group->User1->name}}</span>
                      <div class="text-wrap rounded-1 border py-1 px-2 bg-light" >
                        {{$mess->message}}
                      </div>
                    </div>
                  </div>
                  @endif
                  @if ($mess->id_user == $group->id_user2)
                  <div class="row mb-4 mx-3">
                    <div class="col-4"></div>
                    <div class="col-8">
                      <div class="text-wrap rounded-1 border py-1 px-2 bg-light">
                        {{$mess->message}}
                      </div>
                    </div>
                  </div>  
                  @endif
              @endforeach
            </div>
            <div class="position-fixed p-2 w-100 bottom-0 input_message" style="z-index: 1;">
                <div class="input-group">
                  <input type="text" class="form-control " style="background-color: #f5f5f5; border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                  <button class="btn border button-submit" type="button" style="background-color: #ffffff">
                    <i class="fa-solid fa-paper-plane-top fa-lg" style="color: #1c71d8;"></i>
                  </button>
                </div>
            </div>
          </div>
        </div>
      @endforeach
      @foreach ($user_message as $user)
        <a class="dropdown-toggle position-absolute show_listchat" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="bottom: 30px; right: {{$next}}px;">
          @if ($user->image)
          <img src="{{asset('resources/image/user/'.$user->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
          @else
          <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
          @endif
        </a>
        @php
          $next+=70;
        @endphp
        <div class="dropdown-menu w-100 rounded-2  position-absolute p-0 chatbox right-0" style="border: 1px solid #FFD8A9;height: 400px;bottom:310px" >
          <div class="card w-100 overflow-y-scroll" style="height: 400px">
            <div class="card-header position-fixed w-100 top-0 p-3" style="z-index: 1;background-color: #E38B29">
              <h4>{{$user->name}}</h4>
            </div>
            <div class="card-body p-1 overflow-y-scroll overflow-x-hidden " data-chat="null" data-iduser="{{$user->id_user}}"  style="margin-top:45px;background-color: #FDEEDC">
                @foreach ($user->Message->where('code_group','=',null) as $mess)
                <div class="row text-center mb-3">
                  <span class="text-black-50">{{$mess->created_at}}</span>
                </div>
                <div class="row mb-4 mx-3">
                  <div class="col-1 me-3 rounded-circle border text-center p-1" style="width:60px;height: 60px;">
                    @if ($mess->User->image)
                    <img src="{{asset('resources/image/user/'.$mess->User->image)}}" alt="" class="img-fluid h-100 rounded-circle" style="object-fit: cover">
                    @else
                    <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail h-100 rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @endif
                  </div>
                  <div class="col-8 ">
                    <span class="text-danger">{{$mess->User->name}}</span>
                    <div class="text-wrap rounded-1 border py-1 px-2 bg-light">
                      {{$mess->message}}
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
            <div class="position-fixed p-2 w-100 bottom-0 input_message" style="z-index: 1;">
                <div class="input-group">
                  <input type="text" class="form-control " style="background-color: #f5f5f5; border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                  <button class="btn border button-submit" type="button" style="background-color: #ffffff">
                    <i class="fa-solid fa-paper-plane-top fa-lg" style="color: #1c71d8;"></i>
                  </button>
                </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>  
  @else
      @php
        $next = 30;
      @endphp
    <div class="position-fixed rounded-circle bottom-0 end-0 p-3 dropup d-flex flex-row position-relative" style="width: 400px; height: 100px;">
        @if (count($messages_to_admin)==0)
            <a class="dropdown-toggle position-absolute show_listchat" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="bottom: 30px; right: {{$next}}px;">  
                <img src="{{asset('resources/image/user/admin.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
            </a>
          @php
            $next += 70;
          @endphp
          <div class="dropdown-menu w-100 rounded-2  position-relative p-0 chatbox right-0" style="border: 1px solid #FFD8A9;height: 400px;bottom: 310px">
            <div class="card w-100 overflow-y-scroll" style="height: 400px;">
              <div class="card-header position-fixed w-100 top-0 p-3" style="z-index: 1;background-color: #E38B29">
                <h4>Contact to Admin</h4>
              </div>
              <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " data-chat="new" data-iduser="{{Auth::user()->id_user}}" style="margin-top:45px;background-color: #FDEEDC">
                <div class="position-fixed p-2 w-100 bottom-0 input_message" style="z-index: 1;">
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
            <a class="dropdown-toggle position-absolute show_listchat" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="bottom: 30px; right: {{$next}}px;">  
                <img src="{{asset('resources/image/user/admin.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
            </a>
            <div class="dropdown-menu w-100 rounded-2  position-relative p-0 chatbox right-0" style="border: 1px solid #FFD8A9; height:400px;bottom:310px" >
                <div class="card w-100 overflow-y-scroll" style="height: 400px">
                    <div class="card-header position-fixed w-100 top-0 p-3" style="z-index: 1;background-color: #E38B29">
                        <h4>Contact to Admin</h4>
                    </div>
                    <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " data-chat="new" data-iduser="{{Auth::user()->id_user}}" style="margin-top:45px;background-color: #FDEEDC">
                        @foreach ($messages_to_admin as $mess)
                            <div class="row text-center mb-3">
                                <span class="text-black-50">{{$mess->created_at}}</span>
                            </div>
                            <div class="row mb-4 mx-3">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    <div class="text-wrap rounded-1 border py-1 px-2 bg-light">
                                    {{$mess->message}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>  
                    <div class="position-fixed p-2 w-100 bottom-0 input_message" style="z-index: 1;">
                        <div class="input-group">
                            <input type="text" class="form-control " style="background-color: #f5f5f5; border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                            <button class="btn border button-submit" type="button" style="background-color: #ffffff">
                                <i class="fa-solid fa-paper-plane-top fa-lg" style="color: #1c71d8;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $next+=70;
            @endphp
        @endif
        @foreach ($groups as $group)
          <a class="dropdown-toggle position-absolute show_listchat" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="bottom: 30px; right: {{$next}}px;">
            @if ($group->User2->image)
            <img src="{{asset('resources/image/user/'.$group->User2->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
            @else
            <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
            @endif
          </a>
          @php
            $next+=70;
          @endphp
          <div class="dropdown-menu w-100 rounded-2  position-relative p-0 chatbox right-0" style="border: 1px solid #FFD8A9; height: 400px;bottom: 310px">
            <div class="card w-100 overflow-y-scroll" style="height: 400px;">
              <div class="card-header position-fixed w-100 top-0 p-3" style="z-index: 1;background-color: #E38B29">
                <h4>Admin - {{$group->User2->name}}</h4>
              </div>
              <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " data-chat="{{$group->code_group}}" data-iduser="{{$group->id_user2}}" style="margin-top:45px;background-color: #FDEEDC">
                @foreach ($group->Message as $mess)
                    @if ($mess->id_user == $group->id_user2)
                    <div class="row mb-4 mx-3">
                      <div class="col-1 me-3 rounded-circle border text-center p-1" style="width:40px;height: 40px;">
                        @if ($group->User2->image)
                        <img src="{{asset('resources/image/user/'.$group->User2->image)}}" alt="" class="img-fluid h-100 rounded-circle" style="object-fit: cover">
                        @else
                        <i class="fa-duotone fa-user-tie fa-lg"></i>
                        @endif
                      </div>
                      <div class="col-8 ">
                        <span class="text-danger">{{$group->User2->name}}</span>
                        <div class="text-wrap rounded-1 border py-1 px-2 bg-light">
                          {{$mess->message}}
                        </div>
                      </div>
                    </div>
                    @endif
                    @if ($mess->id_user == $group->id_user1)
                    <div class="row mb-4 mx-3">
                      <div class="col-4"></div>
                      <div class="col-8">
                        <div class="text-wrap rounded-1 border py-1 px-2 bg-light">
                          {{$mess->message}}
                        </div>
                      </div>
                    </div>  
                    @endif
                @endforeach
              </div>
              <div class="position-fixed p-2 w-100 bottom-0 input_message" style="z-index: 1;">
                  <div class="input-group">
                    <input type="text" class="form-control " style="background-color: #f5f5f5; border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                    <button class="btn border button-submit" type="button" style="background-color: #ffffff">
                      <i class="fa-solid fa-paper-plane-top fa-lg" style="color: #1c71d8;"></i>
                    </button>
                  </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>
  @endif
@else
<div class="position-fixed rounded-circle bottom-0 end-0 p-3 dropup d-flex flex-row position-relative" style="width: 400px; height: 500px;">
      <a href="#!" class="btn shadow  position-absolute " data-bs-toggle="modal" data-bs-target="#userModal" " style="bottom: 30px; right: 30px;background-color: #e66100">
        <i class="fa-light fa-message-smile fa-bounce fa-2xl" style="color: #ffffff;"></i>
      </a>
</div>
@endif --}}
@if (Auth::check())
    @if (Auth::user()->admin == 1)
    <div class="position-fixed dropstart position-relative"  style="right: 20px;bottom: 10px;">
        <a class="dropdown-toggle list_mess rounded-circle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false" style="bottom: 30px;">
          <img src="{{asset('resources/image/icons/message-icon.webp')}}" alt="" class="img-fluid" style="width:40px;height: 40px;object-fit: contain">
        </a>
        <div class="dropdown-menu pt-0" style="background-color:  transparent">
            <div class="btn-group" style="background: transparent">
                @foreach ($groups as $group)
                <a class="ms-3 show_chat" data-groupcode="{{$group->code_group}}" data-iduser="" style="width:60px;height: 60px;">
                    @if ($group->User1->image)
                    <img src="{{asset('resources/image/user/'.$group->User1->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @else
                    <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @endif
                </a>
                @endforeach
                @foreach ($user_message as $user)
                <a class="ms-3 show_chat" data-groupcode="" data-iduser="{{$user->id_user}}" style="width:60px;height: 60px;">
                    @if ($user->image)
                    <img src="{{asset('resources/image/user/'.$user->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @else
                    <img src="{{asset('resources/image/user/user.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                    @endif
                </a>
                @endforeach
            </div>
        </div>
        <div class="position-absolute d-none" id="chatbox"  style="height: 400px; width: 300px; bottom:100px;right:0;">
            <div class="card w-100 h-100 overflow-y-scroll overflow-x-hidden" >
                <div class="card-header row" >
                    <h4 class="col-11" id="usr_contact">User</h4>
                    <button type="button" class="btn-close col-1"  aria-label="Close" id="btn_close"></button>
                </div>
                <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages" data-chat="new" data-iduser="{{Auth::user()->id_user}}">
                </div>
                <div class="card-footer p-2 w-100 input_message " >
                    <div class="input-group">
                        <input type="text" class="form-control " style="border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                        <button class="btn border button-submit" type="button" tabindex="1">
                            <i class="fa-solid fa-paper-plane-top fa-lg" style="color: #1c71d8;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="position-fixed  dropstart position-relative"  style="right: 20px;bottom: 10px;">
        <a class="dropdown-toggle list_mess rounded-circle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false" style="bottom: 30px;" data-bs-offset="0,0">
            <img src="{{asset('resources/image/icons/message-icon.webp')}}" alt="" class="img-fluid " style="width:40px;height: 40px;object-fit: contain">
        </a>
        <div class=" dropdown-menu pt-0"  style="background: transparent">
          <div class="btn-group" style="background: transparent">
            @foreach ($groups as $group)
            <a class="me-3 show_chat" data-groupcode="{{$group->code_group}}" data-iduser="" style="width:60px;height: 60px;">
                @if ($group->User2->image)
                <img src="{{asset('resources/image/user/'.$group->User2->image)}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                @else
                <img src="{{asset('resources/image/user/admin.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                @endif
            </a>
            @endforeach
            <a class="me-3 show_chat" data-groupcode="new" data-iduser="{{Auth::user()->id_user}}" style="width:60px;height: 60px;">
                <img src="{{asset('resources/image/icons/message.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: contain">
            </a>
          </div>
        </div>
        <div class="position-absolute d-none" id="chatbox"  style="height: 400px; width: 300px; bottom:100px;right:0;">
            <div class="card w-100 h-100 overflow-y-scroll overflow-x-hidden" >
                <div class="card-header row" >
                    <h4 class="col-11">Admin <span id="usr_contact"></span></h4>
                    <button type="button" class="btn-close col-1"  aria-label="Close" id="btn_close"></button>
                </div>
                <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages" data-chat="new" data-iduser="{{Auth::user()->id_user}}" >
                </div>
                <div class="card-footer p-2 w-100 input_message ">
                    <div class="input-group">
                        <input type="text" class="form-control " style=" border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
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
    <div class="position-fixed  bottom-0 end-0 p-3 "style="right: 20px;bottom: 10px;" >
            <a href="#!" class="btn shadow rounded-circle" data-bs-toggle="modal" data-bs-target="#userModal" style="width:60px;height: 60px;" >
              <img src="{{asset('resources/image/icons/message-icon.webp')}}" alt="" class="img-fluid" style="width:40px;height: 40px;object-fit:contain">
            </a>
    </div>
@endif
<script>
    $(document).ready(function(){
        
        $('#btn_close').click(function(){
            $('#chatbox').toggleClass('d-none');
        })
        $('.show_chat').click(function(){
          $('#chatbox').removeClass('d-none');
          $('#messages').data('chat',$(this).data('groupcode'));
          $('#messages').data('iduser',$(this).data('iduser'));
          $.ajax(
              {method: "GET",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: window.location.origin+'/index.php/ajax/message/show',
              data: {'codegroup':$(this).data('groupcode'),'id_user':$(this).data('iduser')},
              success: function (data) {
                let data_mess  = data.split(',');
                // console.log(data_mess);
                $('#messages').html(data_mess[0]);
                $('#usr_contact').html(data_mess[0]?data_mess[1]:'');
              }}
          )
        });
        $('.list_mess').click(function(){
          if(!$('#chatbox').hasClass('d-none')){
            $('#chatbox').addClass('d-none');
          }
        })
        $('.button-submit').click(function(){
            let message = $(this).siblings('input[name="send_message"]');
            let chatbox = $(this).parents('.input_message').prev();
            if(message.val().length>0){
              $.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: window.location.origin+'/index.php/ajax-post/message',
                data: {'send_message':message.val(),'code_group':chatbox.data('chat'),'connect_user':chatbox.data('iduser')},
                success: function (data) {
                  chatbox.append(`<div class="row mb-4 mx-3"><div class="col-4"></div><div class="col-8">
                    <div class="text-wrap rounded-1 border py-1 px-2 bg-light">
                      ${data}
                    </div>
                  </div>
                </div>`);
                }
              });
              message.val('');
            };
          });
          $('.show_listchat').click(function(){
            let nextDD = $(this).next();
            $('.chatbox').not(nextDD).removeClass('show');
          })
    })
</script>