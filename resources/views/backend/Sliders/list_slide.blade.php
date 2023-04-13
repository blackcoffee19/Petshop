@extends('admin')
@section('content')
<div class="col-sm-7 col-md-8 mx-auto mt-4 bg-light overflow-x-scroll">
    <div class="row">
        <div class="mx-auto  p-4 rounded-2 ">
            <div>
                <h2 >List Slide</h2>
                <button type="button" class="btn btn-primary btn-lg my-2 " data-bs-toggle="modal" data-bs-target="#modalAddSlide">Add Slide</button>
                <div class="modal fade" id="modalAddSlide" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="add_new_slide" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" >
                        <div class="modal-content" style="overflow: scroll">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAddTitleId">Add Slide</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('addslide')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                                    <div class="mt-3 row w-100">
                                        <label for="add_title" class="col-form-label col-1">Title</label>
                                        <div class="col-8">
                                            <input type="text" name="add_title" id="add_title" class="form-control" required>
                                        </div>
                                        <div class="col-2 mx-auto">
                                            <input type="color" name="add_title-color" id="add_title-color" class="form-control-color">
                                        </div>
                                    </div>
                                    <div class="mt-3 row  w-100">
                                        <label for="add_content" class="col-form-label col-1">Content</label>
                                        <div class="col-8">
                                            <input type="text" name="add_content" id="add_content" class="form-control" required>
                                        </div>
                                        <div class="col-2 mx-auto">
                                            <input type="color" name="add_content_color" id="add_content_color" class="form-control-color">
                                        </div>
                                    </div>
                                    <div class="mt-3 row  w-100">
                                        <label for="add_button" class="col-form-label col-1">Button</label>
                                        <div class="col-5">
                                            <input type="text" name="add_button" id="add_button" class="form-control" required>
                                        </div>
                                        <div class="col-6 row">
                                            <label for="add_btn_color" class="col-form-label col-3">Text color</label>
                                            <div class="col-3">
                                                <input type="color" name="add_btn_color" id="add_btn_color" class="form-control-color mx-auto">
                                            </div>
                                            <label for="add_btn_bg_color" class="col-form-label col-3">BG color</label>
                                            <div class="col-3">
                                                <input type="color" name="add_btn_bg_color" id="add_btn_bg_color" class="form-control-color mx-auto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row  w-100">
                                        <label for="add_alert" class="col-form-label col-1">Alert</label>
                                        <div class="col-3">
                                            <input type="text" name="add_alert" id="add_alert" class="form-control">
                                        </div>
                                        <div class="col-4 form-floating">
                                            <select name="add_alert_size" id="add_alert_size" class="form-select">
                                                <option value="fs-6" selected>fs-6</option>
                                                <option value="fs-5">fs-5</option>
                                                <option value="fs-4">fs-4</option>
                                                <option value="fs-3">fs-3</option>
                                                <option value="fs-2">fs-2</option>
                                                <option value="fs-1">fs-1</option>
                                            </select>
                                            <label for="add_alert_size">Size</label>
                                        </div>
                                        <div class="col-4 row">
                                            <label for="add_alert_color" class="col-form-label col-3">Text color</label>
                                            <div class="col-3">
                                                <input type="color" name="add_alert_color" id="add_alert_color" class="form-control-color mx-auto">
                                            </div>
                                            <label for="add_alert_bg_color" class="col-form-label col-3">BG color</label>
                                            <div class="col-3">
                                                <input type="color" name="add_alert_bg_color" id="add_alert_bg_color" class="form-control-color mx-auto">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3 row  w-100">
                                        <label for="add_link" class="col-form-label col-1">Link</label>
                                        <div class="col-5">
                                            <select name="add_link" id="add_link" class="form-select">
                                                <option value="signup">Sign up</option>
                                                <option value="productlist">Pet List</option>
                                                <option value="signin">Sign in</option>
                                                <option value="contact">Contact Us</option>
                                                <option value="productdetail">Specific pet</option>
                                            </select>
                                        </div>
                                        <div class="col-3 d-none form-floating" id="add_select_type">
                                            <select name="add_attr1" id="add_attr1" class="form-select">
                                                <option value="all">All Type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{$type->name_type}}" class="text-capitalize">{{$type->name_type}}</option>
                                                @endforeach
                                            </select>
                                            <label for="add_attr1">Type Pet</label>
                                        </div>
                                        <div class="col-3 d-none form-floating" id="add_listpet">
                                            <select name="add_idpet" id="add_idpet" class="form-select">
                                            </select>
                                            <label for="add_idpet">Select Pet</label>
                                        </div>
                                        <div class="col-3 d-none form-floating" id="add_select_breed">
                                            <select name="add_attr2" id="add_attr2" class="form-select">
                                            </select>
                                            <label for="add_attr2">Breed pet</label>
                                        </div>
                                    </div>
                                    <div class="my-3 row w-100">
                                        <label for="image" class="col-form-label col-2">Upload Image</label>
                                        <span class="text-black-50">For the best performance image should be </span>
                                        <div class="col-10">
                                            <input type="file" name="imageSlide" id="add_imageSlide" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary fs-5" id="submit_addslide" style="width: 200px" disabled>Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalEditSlide" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="add_new_slide" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" >
                        <div class="modal-content" style="overflow: scroll">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Edit Slide</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('editslide')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="edit_id_slide" id="edit_id_slide">
                                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                                    <div id="display-img" class="col-10 mx-auto d-none ">
                                        <div class="w-100" style="height: 250px" id="silder_image" >
                                            <div class="ps-3 py-4" >
                                                <span class="badge" id="display_alert"></span>
                                                <p class="display-6 fw-bold mt-4" id="display_title"></p>
                                                <p class="lead" id="display_content"></p>
                                                <a href="javascript:void(0);" id="display_btn" class="btn mt-3" ></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row w-100">
                                        <label for="title" class="col-form-label col-1">Title</label>
                                        <div class="col-8">
                                            <input type="text" name="title" id="title" class="form-control" required>
                                        </div>
                                        <div class="col-2 mx-auto">
                                            <input type="color" name="title-color" id="title-color" class="form-control-color">
                                        </div>
                                    </div>
                                    <div class="mt-3 row  w-100">
                                        <label for="content" class="col-form-label col-1">Content</label>
                                        <div class="col-8">
                                            <input type="text" name="content" id="content" class="form-control" required>
                                        </div>
                                        <div class="col-2 mx-auto">
                                            <input type="color" name="content-color" id="content-color" class="form-control-color">
                                        </div>
                                    </div>
                                    <div class="mt-3 row  w-100">
                                        <label for="button" class="col-form-label col-1">Button</label>
                                        <div class="col-5">
                                            <input type="text" name="button" id="button" class="form-control" required>
                                        </div>
                                        <div class="col-6 row">
                                            <label for="btn-color" class="col-form-label col-3">Text color</label>
                                            <div class="col-3">
                                                <input type="color" name="btn-color" id="btn-color" class="form-control-color mx-auto">
                                            </div>
                                            <label for="btn-bg-color" class="col-form-label col-3">BG color</label>
                                            <div class="col-3">
                                                <input type="color" name="btn-bg-color" id="btn-bg-color" class="form-control-color mx-auto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row  w-100">
                                        <label for="alert" class="col-form-label col-1">Alert</label>
                                        <div class="col-3">
                                            <input type="text" name="alert" id="alert" class="form-control">
                                        </div>
                                        <div class="col-4 form-floating">
                                            <select name="alert-size" id="alert-size" class="form-select">
                                                <option value="fs-6" selected>fs-6</option>
                                                <option value="fs-5">fs-5</option>
                                                <option value="fs-4">fs-4</option>
                                                <option value="fs-3">fs-3</option>
                                                <option value="fs-2">fs-2</option>
                                                <option value="fs-1">fs-1</option>
                                            </select>
                                            <label for="alert-size">Size</label>
                                        </div>
                                        <div class="col-4 row">
                                            <label for="alert-color" class="col-form-label col-3">Text color</label>
                                            <div class="col-3">
                                                <input type="color" name="alert-color" id="alert-color" class="form-control-color mx-auto">
                                            </div>
                                            <label for="alert-bg-color" class="col-form-label col-3">BG color</label>
                                            <div class="col-3">
                                                <input type="color" name="alert-bg-color" id="alert-bg-color" class="form-control-color mx-auto">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3 row  w-100">
                                        <label for="link" class="col-form-label col-1">Link</label>
                                        <div class="col-5">
                                            <select name="link" id="link" class="form-select">
                                                <option value="signup">Sign up</option>
                                                <option value="productlist">Pet List</option>
                                                <option value="signin">Sign in</option>
                                                <option value="contact">Contact Us</option>
                                                <option value="productdetail">Specific pet</option>
                                            </select>
                                        </div>
                                        <div class="col-3 d-none form-floating" id="select_type">
                                            <select name="attr1" id="attr1" class="form-select">
                                                <option value="all">All Type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{$type->name_type}}" class="text-capitalize">{{$type->name_type}}</option>
                                                @endforeach
                                            </select>
                                            <label for="attr1">Type Pet</label>
                                        </div>
                                        <div class="col-3 d-none form-floating" id="edit_listpet">
                                            <select name="edit_idpet" id="edit_idpet">
                                            </select>
                                            <label for="edit_idpet">Select Pet</label>
                                        </div>
                                        <div class="col-3 d-none form-floating" id="select_breed">
                                            <select name="attr2" id="attr2" class="form-select">
                                            </select>
                                            <label for="attr2">Breed pet</label>
                                        </div>
                                    </div>
                                    <div class=" mt-2 form-checkbox-inline d-none w-100" id="editImg">
                                        <input type="checkbox" name="changeImgSlide" id="changeImgSlide" class="form-checkbox" autocomplete="off">
                                        <label for="changeImgSlide" class="form-checkbox-label">Change imge of slide</label>
                                    </div>
                                    <div class="my-3 row w-100">
                                        <label for="image" class="col-form-label col-2">Upload Image</label>
                                        <span class="text-black-50">For the best performance image should be width= </span>
                                        <div class="col-10">
                                            <input type="file" name="imageSlide" id="imageSlide" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary fs-5" id="submit_editslide" style="width: 200px" disabled>Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @if (Session::has("message"))
            <div class="alert alert-success">{{Session::get("message")}}</div>
            @endif
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get("error")}}</div>
            @endif
            <table class="table table-light overflow-x-scroll table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 70%">Image</th>
                        <th>Link</th>
                        <th>Del</th>
                        <th>Edt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $sl)
                    <tr>
                        <td>{{$sl->id_slide}}</td>
                        <td>
                            <div class="w-100" style="background: url(/resources/image/slides/{{$sl->image}})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                                <div class="ps-3 py-4">
                                      @if (isset($sl->alert))
                                      <span class="badge {{$sl->alert_size}}"style="color: {{$sl->alert_color}}; background-color: {{$sl->alert_bg}}" >{{$sl->alert}}</span>
                                    @endif
                                    <p class="display-6 fw-bold mt-4" style="color:{{$sl->title_color}}">{{$sl->title}}</p>
                                    <p class="lead" style="color:{{$sl->content_color}}">{{$sl->content}}</p>
                                    <a href="javascript:void(0);" class="btn mt-3"  style="color: {{$sl->btn_color}};background-color:{{$sl->btn_bg_color}}">{{$sl->btn_content}} <i class="feather-icon icon-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </td>
                        <td>Link to {{$sl->link}}/{{$sl->attr1}}/{{$sl->attr2}}</td>
                        <td>
                            <a href="{{route('deleteslide',[$sl->id_slide])}}"><i class="fa-sharp fa-solid fa-trash text-danger"></i></a>
                        </td>
                        <td>
                            <a href="#!" class="edit_modal" data-bs-toggle="modal" data-bs-target="#modalEditSlide" data-idslide="{{$sl->id_slide}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('admin_script')
    <script>
        $(document).ready(function(){
            $('#link').change(function(){
                if($(this).val()=='productlist'){
                    $('#select_type').removeClass('d-none');
                    $('#select_breed').removeClass('d-none');
                }else if($(this).val()=="productdetail"){
                    $('#edit_listpet').removeClass('d-none');
                    $.get(window.location.origin +"/index.php/ajax/slide/list-pet",function(data){
                        $('#edit_idpet').html(data);
                    });
                } else{
                    if(!$('#select_type').hasClass('d-none') ){
                        $('#select_type').addClass('d-none');
                        $('#select_breed').addClass('d-none');
                        $('#select_listpet').removeClass('d-none');
                    }
                }
            });
            $('#attr1').change(function(){
                $.get(window.location.origin+'/index.php/ajax/list-breed/'+$(this).val(),function(data){
                    $('#attr2').html(data);
                })
            });
            $('#add_link').change(function(){
                if($(this).val()=='productlist'){
                    $('#add_select_type').removeClass('d-none');
                    $('#add_select_breed').removeClass('d-none');
                }else if($(this).val() == 'productdetail'){
                    $('#add_listpet').removeClass('d-none');
                    $.get(window.location.origin +"/index.php/ajax/slide/list-pet",function(data){
                        $('#add_idpet').html(data);
                    })
                }
                else{
                    if(!$('#add_select_type').hasClass('d-none') ){
                        $('#add_select_type').addClass('d-none');
                        $('#add_select_breed').addClass('d-none');
                    }
                }
            });
            $('#add_attr1').change(function(){
                $.get(window.location.origin+'/index.php/ajax/list-breed/'+$(this).val(),function(data){
                    $('#add_attr2').html(data);
                })
            });
            $('#add_title,#add_content,#add_button,#add_alert').change(function(){
                if($('#add_title').val().length>0&&$('#add_content').val().length>0&&$('#add_button').val().length>0&&$('#add_alert').val().length>0){
                    $('#submit_addslide').removeAttr('disabled');
                }else{
                    $('#submit_addslide').attr('disabled','disabled');
                }
            });
            $('#title,#content,#button,#alert,#changeImgSlide').change(function(){
                if($('#title').val().length>0&&$('#content').val().length>0&&$('#button').val().length>0&&$('#alert').val().length>0){
                    $('#submit_editslide').removeAttr('disabled');
                }else{
                    $('#submit_editslide').attr('disabled','disabled');
                }
            })
            $('.edit_modal').click(function(){
                $('#editImg').removeClass('d-none');
                $.get(window.location.origin+"/index.php/ajax/edit_slide/"+$(this).data('idslide'),function(data){
                    let data_slide = jQuery.parseJSON(data);
                    $('#display-img').removeClass('d-none');
                    $('#display-img').css({'background': `url(/resources/image/slides/${data_slide['image']})no-repeat`,'background-size': 'cover', 'border-radius': '.5rem', 'background-position': 'center'});
                    $('#display_alert').addClass(data_slide["alert_size"]).css({'color': data_slide['alert_color'], 'background-color': data_slide['alert_bg']}).html(data_slide['alert']);
                    $('#display_title').css('color',data_slide['title_color']).html(data_slide['title']);
                    $('#display_content').css('color',data_slide['content_color']).html(data_slide['content']);
                    $('#display_btn').css({'color': data_slide['btn_color'],'background-color':data_slide['btn_bg_color']}).html(data_slide['btn_content']+"<i class='feather-icon icon-arrow-right ms-1'></i>");
                    $('#title').val(data_slide['title']);
                    $('#title-color').val(data_slide['title_color']);
                    $('#content').val(data_slide['content']);
                    $('#content-color').val(data_slide['content_color']);
                    $('#button').val(data_slide['btn_content']);
                    $('#btn-color').val(data_slide['btn_color']);
                    $('#btn-bg-color').val(data_slide['btn_bg_color']);
                    $('#alert').val(data_slide['alert']);
                    $(`#alert-size option[value="${data_slide['alert-size']}"]`).prop('selected', true);
                    $('#alert-color').val(data_slide['alert_color']);
                    $('#alert-bg-color').val(data_slide['alert_bg']);
                    $(`#link option[value="${data_slide['link']}"]`).prop('selected',true);
                    if(data_slide['link']=='productlist'){
                        $('#select_type, #select_breed').removeClass('d-none');
                    }else if(data_slide['link'] == 'productdetail'){
                        $('#edit_listpet').removeClass('d-none');
                        $.get(window.location.origin +"/index.php/ajax/slide/list-pet/"+data_slide["attr1"],function(data){
                        $('#edit_idpet').html(data);
                    });
                    };
                    $('#edit_id_slide').val(data_slide["id_slide"]);
                    $('#attr1').val(data_slide['attr1']); 
                    $('#attr2').val(data_slide['attr2']);
                    $('#imageSlide').attr('disabled','disabled');
                });
            });
            $('#changeImgSlide').change(function(){
                if($(this).is(':checked')){
                    $('#imageSlide').removeAttr('disabled');
                }else{
                    $('#imageSlide').attr('disabled','disabled');
                };
            });
            $('#title').change(function(){
                $('#display_title').css('color',$('#title-color').val()).html($(this).val());
                  
            });
            $('#title-color').change(function(){
                $('#display_title').css('color',$(this).val()).html($('#title').val());  
                
            });
            $('#content').change(function(){
                $('#display_content').css('color',$('#content-color').val()).html($(this).val());  
                
            });
            $('#content-color').change(function(){
                $('#display_content').css('color',$(this).val()).html($('#content').val());                  
            });
            $('#button').change(function(){
                $('#display_btn').css({'color': $('#btn-color').val(),'background-color':$('#btn-bg-color').val()}).html($(this).val()+"<i class='feather-icon icon-arrow-right ms-1'></i>");     
                
            });
            $('#btn-color').change(function(){
                $('#display_btn').css({'color': $(this).val(),'background-color':$('#btn-bg-color').val()}).html($('#button').val()+"<i class='feather-icon icon-arrow-right ms-1'></i>");     
                
            });
            $('#btn-bg-color').change(function(){
                $('#display_btn').css({'color': $('#btn-color').val(),'background-color':$(this).val()}).html($('#button').val()+"<i class='feather-icon icon-arrow-right ms-1'></i>");     
                
            });
            $('#alert').change(function(){
                $('#display_alert').prop('class',$('#alert-size option:selected').val() + ' badge').css({'color': $('#alert-color').val(), 'background-color': $('#alert-bg-color').val()}).html($(this).val());
                
            });
            $('#alert-size').change(function(){
                $('#display_alert').prop('class',$(this).val()+ ' badge').css({'color': $('#alert-color').val(), 'background-color': $('#alert-bg-color').val()}).html($('#alert').val());
            });
            $('#alert-bg-color').change(function(){
                $('#display_alert').prop('class',$('#alert-size option:selected').val()+' badge').css({'color': $('#alert-color').val(), 'background-color': $(this).val()}).html($('#alert').val());
                
            });
            $('#alert-color').change(function(){
                $('#display_alert').prop('class',$('#alert-size option:selected').val()+' badge').css({'color': $(this).val(), 'background-color': $('#alert-bg-color').val()}).html($('#alert').val());
                
            });
        })
    </script>
@endsection