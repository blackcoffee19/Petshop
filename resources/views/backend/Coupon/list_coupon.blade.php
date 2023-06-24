@extends('admin')
@section('content')
<main>
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>List Coupon</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Coupon</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-lg my-2" id="add_coupon" data-bs-toggle="modal" data-bs-target="#modaladdCoupon">Add Coupon</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            @if (Session::has("message"))
            <div class="alert alert-success">{{Session::get("message")}}</div>
            @endif
            @if (Session::has("error"))
            <div class="alert alert-danger">{{Session::get("error")}}</div>
            @endif
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>CODE</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Usage</th>
                                        <th>Edt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $cp)
                                    <tr>
                                        <td>{{$cp->id_coupon}}</td>
                                        <td>{{$cp->title}}</td>
                                        <td>{{$cp->code}}</td>
                                        <td>{{$cp->discount}}%</td>
                                        <td>
                                            @if ($cp->status)
                                            <i class='fa-solid fa-circle-dot fa-lg' style='color: #26a269;'></i>
                                            @else
                                            <i class='fa-solid fa-circle-dot fa-lg' style='color: #a51d2d;''></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{count($cp->Order)}}
                                        </td>
                                        <td>
                                            <a href="#!" class="edit_modal_cp" data-bs-toggle="modal" data-bs-target="#modalEditCoupon" data-idcoupon="{{$cp->id_coupon}}"><i class="fa-sharp fa-solid fa-pen text-secondary"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-5">
                            {{ $coupons->links() }}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modaladdCoupon" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="add_new_slide" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" >
        <div class="modal-content" style="overflow: scroll">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitleId">Add Coupon</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('addcoupon')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class=" row">
                        <label for="add_coupon_title" class="col-form-label col-5">Title</label>
                        <div class="col-7">
                            <input type="text" name="add_coupon_title" id="add_coupon_title" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="add_coupon_code" class="col-form-label col-5">CODE</label>
                        <div class="col-7">
                            <input type="text" name="add_coupon_code" id="add_coupon_code" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="add_coupon_disc" class="col-form-label col-5">Discount</label>
                        <div class="col-7">
                            <div class="input-group">
                                <input type="text" name="add_coupon_disc" id="add_coupon_disc" class="form-control" required>
                                <label for="add_coupon_disc" class="input-group-text"><i class="fa-solid fa-percent"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="add_coupon_status" class="col-form-label col-5">Status</label>
                        <div class="col-7">
                            <select name="add_coupon_status" id="add_coupon_status" class="form-select">
                                <option value="true">Active</option>
                                <option value="false">Disactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5 close-modal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fs-5" id="submit_addcoupon" style="width: 200px" disabled>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditCoupon" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="add_new_slide" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" >
        <div class="modal-content" style="overflow: scroll">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Edit Coupon</h5>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('editcoupon')}}" method="post">
                @csrf
                <input type="hidden" name="edit_id_coupon" id="edit_id_coupon">
                <div class="modal-body">
                    <div class="mt-3 row ">
                        <label for="coupon_title" class="col-form-label col-5">Title</label>
                        <div class="col-7">
                            <input type="text" name="coupon_title" id="coupon_title" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="coupon_code" class="col-form-label col-5">CODE</label>
                        <div class="col-7">
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="coupon_disc" class="col-form-label col-5">Discount</label>
                        <div class="col-7">
                            <div class="input-group">
                                <input type="text" name="coupon_disc" id="coupon_disc" class="form-control" required>
                                <label for="coupon_disc" class="input-group-text"><i class="fa-solid fa-percent"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="coupon_status" class="col-form-label col-5">Status</label>
                        <div class="col-7">
                            <select name="coupon_status" id="coupon_status" class="form-select">
                                <option value="true">Active</option>
                                <option value="false">Disactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5 close-modal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fs-5" id="submit_editcoupon" style="width: 200px" disabled>Edit</button>
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
            });
            $("#add_coupon").click(function(){
                $(".navbar-vertical-nav").removeClass('d-xl-block');
            });
            $('.edit_modal_cp').click(function(){
                $(".navbar-vertical-nav").removeClass('d-xl-block');
                $.get(window.location.origin+"/index.php/admin/coupon/get_coupon/"+$(this).data('idcoupon'),function(data){
                    let data_coupon = jQuery.parseJSON(data);
                    $('#edit_id_coupon').val(data_coupon["id_coupon"]);
                    $('#coupon_title').val(data_coupon["title"]);
                    $('#coupon_code').val(data_coupon['code']);
                    $('#coupon_disc').val(data_coupon["discount"]);
                    $(`#coupon_status option[value=${data_coupon['status'] ? 'true':'false'}]`).prop('selected',true);
                });                
            })
            $('#add_coupon_title, #add_coupon_code, #add_coupon_disc,#add_coupon_status').change(function(){
                if($('#add_coupon_title').val().length>0 && $('#add_coupon_code').val().length>0 && $('#add_coupon_disc').val().length>0 ){
                  $('#submit_addcoupon').removeAttr('disabled');  
                }else{
                  $('#submit_addcoupon').attr('disabled','disabled');  
                }
            });
            $('#coupon_title, #coupon_code, #coupon_disc,#coupon_status').change(function(){
                if($('#coupon_title').val().length>0 && $('#coupon_code').val().length>0 && $('#coupon_disc').val().length>0 && $('#coupon_status').val()){
                  $('#submit_editcoupon').removeAttr('disabled');  
                }else{
                  $('#submit_editcoupon').attr('disabled','disabled');  
                }
            });
        })
    </script>
@endsection