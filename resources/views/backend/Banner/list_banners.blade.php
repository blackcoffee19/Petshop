@extends('admin')
@section('content')
<main>
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <div>
                    <h2>List Banner</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Banners</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">
                    <div class="card-body p-0">
                        @if (Session::has("message"))
                            <div class="alert alert-success">{{Session::get("message")}}</div>
                        @endif
                        @if (Session::has("error"))
                            <div class="alert alert-danger">{{Session::get("error")}}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID</th>
                                        <th style="width: 50%">Image</th>
                                        <th>Link</th>
                                        <th>Edt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i<2;$i++)
                                    <tr>
                                        <td>{{$banners[$i]->id_banner}}</td>
                                        <td >
                                            <div class="d-flex align-items-center px-4 rounded" style="background:url(resources/image/banner/{{$banners[$i]->image}})no-repeat; background-size: cover; background-position: center; height: 175px; ">
                                                <div>
                                                  <h3 class="fw-bold mb-1" style="color: {{$banners[$i]->title_color}}">{{$banners[$i]->title}}
                                                  </h3>
                                                  <p class="mb-4" style="color: {{$banners[$i]->content_color}}">{{$banners[$i]->content}}</p>
                                                  <a href="javascript:void(0);" class="btn" style="background-color: {{$banners[$i]->btn_bg_color}}; color:{{$banners[$i]->btn_color}}">{{$banners[$i]->btn_content}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Link to {{$banners[$i]->link}}/{{$banners[$i]->attr}}</td>
                                        <td>
                                            <a class="btn_edit_banner" data-bs-toggle="modal" data-bs-target="#editBanner" data-idbanner="{{$banners[$i]->id_banner}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                                        </td>
                                    </tr>
                                    @endfor
                                    <tr>
                                        <td>{{$banners[2]->id_banner}}</td>
                                        <td>
                                            <div class=" rounded" style="background:url(resources/image/banner/{{$banners[2]->image}})no-repeat; background-size: cover; height: 470px;width: 315px; padding: 20px 0 0 20px">
                                              <div>
                                                <h2 class="fw-bold"  style="color: {{$banners[2]->title_color}}">{{$banners[2]->title}}</h2>
                                                <p style="color: {{$banners[2]->content_color}}">{{$banners[2]->content}}</p>
                                                <a href="javascript:void(0);" class="btn" style="background-color: {{$banners[2]->btn_bg_color}}; color:{{$banners[2]->btn_color}}">{{$banners[2]->btn_content}} <i class="feather-icon icon-arrow-right ms-1"></i></a>
                                              </div>
                                            </div>
                                        </td>
                                        <td>Link to {{$banners[2]->link}}/{{$banners[2]->attr}}</td>
                                        <td>
                                            <a class=" btn_edit_banner" data-bs-toggle="modal" data-bs-target="#editBanner" data-idbanner="{{$banners[2]->id_banner}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="editBanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content" style="overflow: scroll">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Banner</h1>
          <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('editbanner')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="rounded col-6 mx-auto"  id="display_img" >
                    <div>
                        <h2 class="fw-bold" id="display_title"></h2>
                        <p id="display_content"></p>
                        <a href="javascript:void(0);" class="btn" id="display_btn" ><i class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>
                    </div>
                    <div class="col-12 row mt-3">
                        <input type="hidden" name="id_banner" id="id_banner">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-1 col-form-label" for="edit_title">Title</label>
                            <div class="col-lg-6 col-md-4">
                                <input type="text" name="title" id="edit_title" class="form-control" required>
                            </div>
                            <label class="col-lg-2 col-md-1 col-form-label" for="edit_title_color">Color</label>
                            <div class="col-lg-2 col-md-2">
                                <input type="color" name="title_color" id="edit_title_color" class="form-control-color">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class=" col-lg-2 col-md-1 col-form-label" for="edit_content">Content</label>
                            <div class="col-lg-6 col-md-4">
                                <textarea name="content" id="edit_content" class="form-control" rows="3"></textarea>
                            </div>
                            <label class="col-lg-2 col-md-1 col-form-label" for="edit_content_color">Color</label>
                            <div class="col-lg-2 col-md-2">
                                <input type="color" name="content_color" id="edit_content_color" class="form-control-color">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class=" col-2 col-form-label" for="edit_btn_content">Content button</label>
                            <div class="col-4 ">
                                <input type="text" name="btn_content" id="edit_btn_content" class="form-control">
                            </div>
                            <div class="col-6 mt-2 form-group mx-auto row">
                                <label class="col-2 col-form-label" for="edit_btn_bg_color">BG</label>
                                <div class="col-4">
                                    <input type="color" name="btn_bg_color" id="edit_btn_bg_color" class="form-control-color">
                                </div>
                                <label for="edit_btn_color" class="col-2 col-form-label">Color</label>
                                <div class="col-4">
                                    <input type="color" name="btn_color" id="edit_btn_color" class="form-control-color">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="edit_link" class="col-form-label col-lg-3 col-md-2">Link to</label>
                            <div class="col-lg-9 col-md-10">
                                <select name="link" id="edit_link" class="form-select">
                                    <option value="productlist">Pet List</option>
                                    <option value="signup">Sign Up</option>
                                    <option value="contact">Contact Us</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row d-none" id="checkAttr">
                            <label for="edit_attr" class="col-form-label col-lg-3 col-md-2">Attr</label>
                            <div class="col-lg-9 col-md-10">
                                <select name="attr" id="edit_attr" class="form-select">
                                    @foreach ($types as $type)
                                    <option value="{{$type->name_type}}">{{$type->name_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="edit_img" class="col-form-label col-lg-3 col-md-2">Change Image</label>
                            <span class="text-black-50" id="suggest"></span>
                            <div class="col-lg-9 col-md-10 mt-2">
                                <input type="file" name="new_img" id="edit_img" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_banner" class="btn btn-primary" disabled>Change</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
@section('admin_script')
    <script>
        $(document).ready(function(){
            $(".close-modal").click(function(){
                $(".navbar-vertical-nav").addClass('d-xl-block');
            })
            $('.btn_edit_banner').click(function(){
                $(".navbar-vertical-nav").removeClass('d-xl-block');
                $.get(window.location.origin+'/index.php/ajax/banner/'+$(this).data('idbanner'),function(data){
                    let data_banner = jQuery.parseJSON(data);
                    $('#id_banner').val(data_banner['id_banner']);
                    if(data_banner['id_banner'] != 3){
                        $('#display_img').css({'background':`url(resources/image/banner/${data_banner['image']}) no-repeat`,'background-size': 'cover', 'height': '150px', 'padding': '20px 0 0 20px'});
                    }else{
                        $('#display_img').css({'background':`url(resources/image/banner/${data_banner['image']}) no-repeat`,'background-size': 'cover', 'height': '470px','width': '315px', 'padding': '20px 0 0 20px'});
                    }
                    $('#display_title').html(data_banner['title']);
                    $('#display_title').css('color',data_banner['title_color']);
                    $('#display_content').html(data_banner['content']);
                    $('#display_content').css('color',data_banner["content_color"]);
                    $('#display_btn').html(data_banner["btn_content"]);
                    $('#display_btn').css({'color':data_banner["btn_color"],'background-color':data_banner["btn_bg_color"]});
                    $('#edit_title').val(data_banner["title"]);
                    $('#edit_title_color').val(data_banner["title_color"]);
                    $('#edit_content').val(data_banner["content"]);
                    $('#edit_content_color').val(data_banner["content_color"]);
                    $('#edit_btn_content').val(data_banner["btn_content"]);
                    $('#edit_btn_bg_color').val(data_banner["btn_bg_color"]);
                    $('#edit_btn_color').val(data_banner['btn_color']);
                    $('#edit_link').val(data_banner["link"]);
                    if(data_banner['link']=='productlist'){
                        $('#checkAttr').removeClass('d-none');
                    };
                    $(`#edit_attr option[value="${data_banner['attr']}"]`).prop('selected', true);
                    if(data_banner['id_banner'] != 2){
                        $('#suggest').html('For the best performance this banner need image width=781 x height=300');
                    }else{
                        $('#suggest').html('For the best performance this banner need image width=720 x height=880');
                    }
                });
            });
            $('#edit_link').change(function(){
                if($(this).val()=="productlist"){
                    $('#checkAttr').removeClass('d-none');
                }else {
                    $('#checkAttr').addClass('d-none');
                };
            });
            $('#edit_title').change(function(){
                $('#display_title').html($(this).val());
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            });
            $('#edit_title_color').change(function(){
                $('#display_title').css('color',$(this).val());
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            });
            $('#edit_content').change(function(){
                $('#display_content').html($(this).val());
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            });
            $('#edit_content_color').change(function(){
                $('#display_content').css('color',$(this).val());
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            });
            $('#edit_btn_content').change(function(){
                $('#display_btn').html($(this).val());
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            });
            $('#edit_btn_bg_color').change(function(){
                $('#display_btn').css({'color':$('#edit_btn_color').val(),'background-color':$(this).val()});
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            });
            $('#edit_btn_color').change(function(){
                $('#display_btn').css({'color':$(this).val(),'background-color':$('#edit_btn_bg_color').val()});
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            });
            $('#edit_img').change(function(){
                if($(this).val().length != 0){
                    $(this).removeClass('is-invalid');
                    $('#submit_banner').removeAttr('disabled');
                }else{
                    $(this).addClass('is-invalid');
                };
            })
        })
    </script>
@endsection