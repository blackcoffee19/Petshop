@if (Auth::check())
    @if (Auth::user()->admin != '0')
        <div class="position-fixed dropstart position-relative d-none d-sm-block"
            style="right: 50px;bottom: 20px;height: 30px; width: 22px;">
            <a class="dropdown-toggle list_mess rounded-circle position-relative" data-bs-toggle="dropdown"
                aria-expanded="false" data-bs-auto-close="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800" height="32px" width="32px" role="img" alt="Biểu tượng trò chuyện" class=""><path fill-rule="evenodd" clip-rule="evenodd" d="M400 26.2c-193.3 0-350 156.7-350 350 0 136.2 77.9 254.3 191.5 312.1 15.4 8.1 31.4 15.1 48.1 20.8l-16.5 63.5c-2 7.8 5.4 14.7 13 12.1l229.8-77.6c14.6-5.3 28.8-11.6 42.4-18.7C672 630.6 750 512.5 750 376.2c0-193.3-156.7-350-350-350zm211.1 510.7c-10.8 26.5-41.9 77.2-121.5 77.2-79.9 0-110.9-51-121.6-77.4-2.8-6.8 5-13.4 13.8-11.8 76.2 13.7 147.7 13 215.3.3 8.9-1.8 16.8 4.8 14 11.7z"></path></svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                    @if (isset($num_new))
                        {{ $num_new }}
                    @endif
                </span>
            </a>
            <div class="dropdown-menu pt-0" style="background-color:  transparent">
                <div class="btn-group" style="background: transparent;height: 50px">
                    @if (isset($groups))
                        @foreach ($groups as $group)
                            <a class="ms-3 show_chat position-relative" data-groupcode="{{ $group->code_group }}"
                                data-iduser="" style="width:60px;height: 60px;">
                                @if ($group->User->image)
                                    <img src="{{ asset('resources/image/user/' . $group->User->image) }}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                @else
                                    <img src="{{ asset('resources/image/user/user.png') }}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                                @endif
                                @if (isset($group->new_mess) && $group->new_mess)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                        !
                                    </span>
                                @endif
                            </a>
                        @endforeach
                    @endif
                    @foreach ($user_message as $user)
                        <a class="ms-3 show_chat position-relative" data-groupcode="" data-iduser="{{ $user->id_user }}"
                            style="width:60px;height: 60px;">
                            @if ($user->image)
                                <img src="{{ asset('resources/image/user/' . $user->image) }}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                            @else
                                <img src="{{ asset('resources/image/user/user.png') }}" alt="" class="img-thumbnail rounded-circle" style="width:60px;height: 60px;object-fit: cover">
                            @endif
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                !
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="position-absolute d-none" id="chatbox"
                style="height: 400px; width: 300px; bottom:80px;right:60px;">
                <div class="card w-100 h-100 overflow-y-scroll overflow-x-hidden">
                    <div class="card-header row">
                        <h4 class="col-9" id="usr_contact">User</h4>
                        <div class="col-3 d-flex flex-row justify-content-between align-items-center">
                            <a class="clear_chat" data-bs-toggle="tooltip" title="Delete all messages with this user">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>
                            <button type="button" class="btn-close" aria-label="Close" id="btn_close"></button>
                        </div>
                    </div>
                    <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages" data-chat="new"
                        data-iduser="{{ Auth::user()->id_user }}">
                    </div>
                    <div class="card-footer p-2 w-100 input_message ">
                        <div class="input-group">
                            <input type="text" class="form-control " style="border-radius: 4px 0 0 4px" name="send_message" aria-describedby="button-submit">
                            <button class="btn border button-submit" type="button" tabindex="1" style="color: #1c71d8;">
                                <i class="bi bi-send" style="font-size: 1.3rem"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="position-fixed  dropstart position-relative d-none d-sm-block"
            style="right: 50px;bottom: 20px; width:22px;height: 30px;">
            <a class="dropdown-toggle list_mess rounded-circle position-relative" data-bs-toggle="dropdown"
                aria-expanded="false" data-bs-auto-close="false" style="bottom: 30px; " data-bs-offset="0,0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800" height="32px" width="32px" role="img" alt="Biểu tượng trò chuyện" class=""><path fill-rule="evenodd" clip-rule="evenodd" d="M400 26.2c-193.3 0-350 156.7-350 350 0 136.2 77.9 254.3 191.5 312.1 15.4 8.1 31.4 15.1 48.1 20.8l-16.5 63.5c-2 7.8 5.4 14.7 13 12.1l229.8-77.6c14.6-5.3 28.8-11.6 42.4-18.7C672 630.6 750 512.5 750 376.2c0-193.3-156.7-350-350-350zm211.1 510.7c-10.8 26.5-41.9 77.2-121.5 77.2-79.9 0-110.9-51-121.6-77.4-2.8-6.8 5-13.4 13.8-11.8 76.2 13.7 147.7 13 215.3.3 8.9-1.8 16.8 4.8 14 11.7z"></path></svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                    @if (isset($num_new))
                        {{ $num_new }}
                    @endif
                </span>
            </a>
            <div class=" dropdown-menu pt-0" style="background: transparent">
                <div class="btn-group" style="background: transparent; height: 50px;">
                    @foreach ($groups as $group)
                        <a class="me-3 show_chat position-relative" data-groupcode="{{ $group->code_group }}"
                            data-iduser="" style="width:40px;height: 40px;">
                            @if ($group->Admin->image)
                                <img src="{{ asset('resources/image/user/' . $group->Admin->image) }}" alt="" class="img-thumbnail rounded-circle" style="width:40px;height: 40px;object-fit: cover">
                            @else
                                <img src="{{ asset('resources/image/user/admin.png') }}" alt="" class="img-thumbnail rounded-circle" style="width:40px;height: 40px;object-fit: cover">
                            @endif
                            @if (isset($group->new_mess) && $group->new_mess)
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                    !
                                </span>
                            @endif
                        </a>
                    @endforeach
                    <a class="me-3 show_chat" data-groupcode="new" data-iduser="{{ Auth::user()->id_user }}" style="width:40px;height: 40px; padding: 5px">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="position-absolute d-none" id="chatbox"
                style="height: 400px; width: 300px; bottom:80px;right:60px;">
                <div class="card w-100 h-100 overflow-y-scroll overflow-x-hidden">
                    <div class="card-header row">
                        <h4 class="col-11">Admin <span id="usr_contact"></span></h4>
                        <button type="button" class="btn-close col-1" aria-label="Close" id="btn_close"></button>
                    </div>
                    <div class="card-body p-1 overflow-y-scroll overflow-x-hidden h-100 " id="messages"
                        data-chat="new" data-iduser="{{ Auth::user()->id_user }}">
                    </div>
                    <div class="card-footer p-2 w-100 input_message ">
                        <div class="input-group">
                            <input type="text" class="form-control " style=" border-radius: 4px 0 0 4px"
                                name="send_message" aria-describedby="button-submit">
                            <button class="btn border button-submit" type="button" style="color: #1c71d8;"
                                tabindex="1">
                                <i class="bi bi-send" style="font-size: 1.3rem"></i>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="position-fixed  bottom-0 end-0 p-3 d-none d-sm-block"style="right: 50px;bottom: 20px;">
        <a href="#!" class="btn shadow rounded-circle" data-bs-toggle="modal" data-bs-target="#userModal"
            style="width:60px;height: 60px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800" height="32px" width="32px" role="img" alt="Biểu tượng trò chuyện" class=""><path fill-rule="evenodd" clip-rule="evenodd" d="M400 26.2c-193.3 0-350 156.7-350 350 0 136.2 77.9 254.3 191.5 312.1 15.4 8.1 31.4 15.1 48.1 20.8l-16.5 63.5c-2 7.8 5.4 14.7 13 12.1l229.8-77.6c14.6-5.3 28.8-11.6 42.4-18.7C672 630.6 750 512.5 750 376.2c0-193.3-156.7-350-350-350zm211.1 510.7c-10.8 26.5-41.9 77.2-121.5 77.2-79.9 0-110.9-51-121.6-77.4-2.8-6.8 5-13.4 13.8-11.8 76.2 13.7 147.7 13 215.3.3 8.9-1.8 16.8 4.8 14 11.7z"></path></svg>
        </a>
    </div>
@endif
<script>
    // Chat script
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
              let data_mess  = data.split('-/-');
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
              let mess_data = jQuery.parseJSON(data);
              if(mess_data['message']){
                  chatbox.append(`<div class="d-flex flex-row mb-4 mx-3"><div class="ms-auto">
                    <div class="text-wrap rounded-1 py-1 px-2 bg-light">
                      ${mess_data['message']}
                    </div>
                  </div>
                </div>`);
              }
              $('.list_mess').find('span').html(mess_data['unread_mess']);
            }
          });
          message.val('');
        };
      });
    $('.show_listchat').click(function() {
        let nextDD = $(this).next();
        $('.chatbox').not(nextDD).removeClass('show');
    })

    function split(val) {
        return val.split(/@\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }
    let availableTags = [];
    @if (isset($name_products))
        @foreach ($name_products as $key => $value)
            var object = new Object();
            @foreach ($value as $key2 => $value2)
                object['{{ $key2 }}'] = "{{ $value2 }}";
            @endforeach
            availableTags.push(object);
        @endforeach
    @endif
    $("input[name=send_message]").autocomplete({
      minLength: 0,
      source: function(request, response) {
          var results, term = request.term;
          var aData = $.map(availableTags, function(value, key) {
            return {
                label: value.name,
                value: value.id
            }
          });
          if (term.indexOf("@") >= 0) {
            term = extractLast(request.term);
            /* If they've typed anything after the "@": */
            if (term.length > 0) {
                results = $.ui.autocomplete.filter(
                    aData, term);
            } else {
                results = ['Start typing...'];
            }
          }
          response(results);
      },
      focus: function(event, ui) {
          return false;
      },
      select: function(event, ui) {
        let chatbox = $(this).parents('.input_message').prev();
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content')
            },
            url: window.location.origin +
                '/index.php/ajax-post/message',
            data: {
                'send_link': ui.item.value,
                'code_group': chatbox.data('chat'),
                'connect_user': chatbox.data('iduser')
            },
            success: function(data) {
              let mess_data = jQuery.parseJSON(data);
              if (mess_data['link']) {
                  let share = `<div class='row mb-4 mx-3'><div class='col-2 '></div><div class="col-10  rounded-1 border py-1 px-2 "><div class='card my-3'><a href='${mess_data['share_link']}'>
                              <div class='row g-0'>
                                <div class='col-4'>
                                  <img src='${mess_data['image']}' class='img-fluid rounded-start' >
                                </div>
                              <div class='col-8'>
                                <div class='card-body'>
                                <h5 class='card-title text-uppercase'>${mess_data['name_product']}</h5>
                                <p class="card-text">View >> </p>
                              </div></div></div></a></div></div>`;
                  chatbox.append(share);
              };
              $('.list_mess').find('span').html(mess_data['unread_mess']);
            }
        });
        $("input[name=send_message]").val('');
        return false;
      }
    })
    $('.clear_chat').click(function(e){
      e.preventDefault();
      let code_gr = $('#messages').data('chat');
      window.location.assign(window.location.origin+"/index.php/ajax/message/clear/"+code_gr);
    })
</script>