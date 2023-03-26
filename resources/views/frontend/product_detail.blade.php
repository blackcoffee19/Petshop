@extends('welcome')
@section('content')
<div class="container-fluid position-relative product-detail-site" style="background-color: #2C3E50;">
    <nav aria-label="breadcrumb" class="pt-2 px-5">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-decoration-none text-white" href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none text-white text-capitalize" href="{{route('productlist',[$pet->Breed->TypeProduct->name_type])}}">{{$pet->Breed->TypeProduct->name_type}}</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">{{$pet->product_name}}</li>
      </ol>
    </nav>
    <div class="row" style="background-color: azure;min-height: 500px">
        @if (Session::has("message"))
            <div class="alert alert-success text-center h4">
                {{Session::get("message")}}
            </div>
        @endif
        @if (Session::has("warning"))
            <div class="alert alert-danger text-center h4">
                {{Session::get("warning")}}
            </div>
        @endif
        <div class="col-sm-8 col-md-4 mx-md-auto px-4">
            <h1 class="fw-light text-center mt-5">{{$pet->product_name}}</h1>
            <div class="text-center my-3">
                @for ($i = 0; $i < $pet->rating; $i++)
                <i class="fa-solid text-warning fs-4 fa-star"></i>
                @endfor
                @for ($i = 0; $i < 5- $pet->rating; $i++)
                <i class="fa-solid text-secondary fs-4 fa-star"></i>
                @endfor
                &Tab;<span>{{$pet->sold}}</span>
            </div>
            <p>{{$pet->description}}</p>
            <p>Q.ty: {{$pet->quantity}}</p>
            <p class="fs-3 text-danger">${{$pet->per_price}}</p>
            <form action="{{route('productdetail',[$pet->id_product])}}" method="post" class="row">
                @csrf
                <div class="d-flex flex-row justify-content-center">
                    <input type="hidden" name="max_quan" value="{{$pet->quantity}}">
                    <input type="hidden" name="id_pro" value="{{$pet->id_product}}">
                    <button type="button" class="btn btn-outline-secondary" style="border-radius: 10px 0 0 10px;" id="btn_minus">
                        <i class="fa-solid fa-minus-large"></i>
                    </button>
                    <input type="text" name="quan" class="border border-secondary text-center pt-1 fs-4 text-secondary" style="width: 50px;" value="1"/>
                    <button type="button" class="btn btn-outline-secondary" style="border-radius: 0 10px 10px 0;" id="btn_plus" >
                        <i class="fa-solid fa-plus-large"></i>
                    </button>
                </div>
                @if ($errors->has('quan'))
                    <span class="text-danger">{{$errors->first('quan')}}</span>
                @endif
                <button type="submit"class="btn btn-success mt-3 pt-2 mx-auto px-4 w-auto">
                    <i class="fa-sharp h4 fa-solid fa-cart-plus"></i>
                    <span class="ms-3 h5">Add to Cart</span>
                </button>
            </form>
            <div class="d-flex flex-row justify-content-around flex-wrap align-content-around mt-4 p-3" style="background-color:rgb(243, 250, 250);">
                <div class="border rounded mb-2 pt-3" style="width:90px;height: 90px;">
                    <p class="text-center text-black-50">Breed</p>
                    <p class="text-center fs-5">{{$pet->Breed->breed_name}}</p>
                </div>
                <div class="border rounded mb-2 pt-3" style="width:90px;height: 90px;">
                    <p class="text-center text-black-50">Age</p>
                    <p class="text-center fs-5">{{$pet->age}} Months</p>
                </div>
                <div class="border rounded mb-2 pt-3" style="width:90px;height: 90px;">
                    <p class="text-center text-black-50">Foods</p>
                    <p class="text-center fs-6">{{$pet->food}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 mx-md-auto  py-5">
            <img src="../resources/image/pet/{{$pet->image}}" alt="" class="img-thumbnail" style="object-fit: contain">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row" style="background-color: #2C3E50;">
        <div class=" ms-md-4 col-md-2 col-lg-3 mt-5 d-flex flex-column justify-content-around align-content-around " >
            <p class="text-light text-monospace" style="font-size:3rem;">Another Pet You would like</p>
        </div>
        <div class="col-md-9 col-lg-7 py-5 overflow-hidden" style="max-height: 500px">
            <div class="row">
                @foreach ($list_relate as $pet_random)
                <div class="card col-3  mx-auto p-0 mb-3 card-item" >
                    <div class="card-img-top h-50 d-flex flex-row justify-content-center align-content-center" style="max-height: 230px;">
                        <a class="h-100" href="{{route('productdetail',$pet_random->id_product)}}"><img src="/../resources/image/pet/{{$pet_random['image']}}" class="rounded-0 img-fluid h-100" style="max-height: 220px;object-fit: cover" alt="{{$pet_random->id_product}}" ></a>
                    </div>
                    <div class="card-body h-50 d-flex flex-column justify-content-center"  style=" text-align: center;">
                        <a href="{{route('productdetail',$pet_random->id_product)}}" class="card-title h4 text-decoration-none text-dark">{{$pet_random->product_name}}</a>
                        <p class="card-text text-black-50 fw-light">Age: {{$pet_random->age}}
                        <br>Gender: {{$pet_random->gender}}</p>
                        <p class="card-text text-black-50">Price:
                        <span class="ms-5 fs-5 text-dark">${{$pet_random->per_price}}</span></p>
                        <div class="d-flex flex-row justify-content-around align-content-center">
                            <p class="text-warning">
                                @for ($i = 0; $i < $pet_random->rating; $i++)
                                    <i class="fa-solid text-warning fa-star"></i>
                                @endfor
                                @for ($i = 0; $i < 5- $pet_random->rating; $i++)
                                <i class="fa-solid text-secondary fa-star"></i>
                                @endfor
                            </p>
                            <a href="{{route('productdetail',[$pet_random->id_product])}}" class="me-2">
                                <i class="fa-sharp h4 fa-solid fa-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mb-5"  style="background-color: azure;">
    <div class="row">
        <p class="text-center fs-2 mt-5 fw-light">Customer Review</p>
        <div class="col-8 mx-auto mt-4 d-flex flex-column bg-light">
            @if (Auth::check())    
            <div class="row mb-3 row">
                <div class="col-md-2 col-lg-1">
                    <img src="../resources/image/user/{{Auth::user()->image ?Auth::user()->image : 'user.png'}}" alt="" class="rounded-circle" width="48px" height="48px" style="object-fit: cover">
                </div>
                <div class="col-lg-11 col-md-10 d-flex flex-column ">
                    <form action="{{route('addComment')}}" method="post">
                    @csrf
                        <input type="hidden" name="id_product" value="{{$pet->id_product}}">
                        <div class="form-check form-check-inline mb-3">
                            <input type="hidden" class="stop1">
                            <input type="radio" name="rating_pro" class="btn-check" id="rating-btn1" autocomplete="off" value="1">
                            <label class="btn-cus text-warning " for="rating-btn1" >
                                <i class="fa-light fa-star" style="font-size:1.3rem;"></i>
                            </label>
                            <input type="radio" name="rating_pro" class="btn-check" id="rating-btn2" autocomplete="off" value="2">
                            <label class="btn-cus text-warning" for="rating-btn2">
                                <i class="fa-light fa-star" style="font-size:1.3rem"></i>
                            </label>
                            <input type="radio" name="rating_pro" class="btn-check" id="rating-btn3" autocomplete="off" value="3">
                            <label class="btn-cus text-warning" for="rating-btn3">     
                                <i class="fa-light fa-star" style="font-size:1.3rem"></i>                                    
                            </label>
                            <input type="radio" name="rating_pro" class="btn-check" id="rating-btn4" autocomplete="off" value="4">
                            <label class="btn-cus text-warning" for="rating-btn4">
                                <i class="fa-light fa-star" style="font-size:1.3rem"></i>
                            </label>
                            <input type="radio" name="rating_pro" class="btn-check" id="rating-btn5" autocomplete="off" value="5">
                            <label class="btn-cus text-warning" for="rating-btn5">
                                <i class="fa-light fa-star" style="font-size:1.3rem"></i>
                            </label>
                            <input type="hidden" class="stop2">
                        </div>
                        <div id="printf"></div>
                        <div class="mb-3">
                            <textarea name="comment" id="comment"rows="3" class="form-control"></textarea>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <span id="count-word" class="text-black-50"></span>
                            <input type="submit" value="Post" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
            @endif
            <hr>
            @if (count($comments) == 0)
                <div class="text-center py-3"><h3 class="text-black-50">No Comment</h3></div>
            @endif
            @foreach ($comments as $cmt)
            <div class="row mb-3">
                <div class="col-md-2 col-lg-1">
                    <img src="{{$cmt->User->image!=null?asset('../resources/image/user/'.$cmt->User->image):asset('../resources/image/user/user.png')}}" alt="{{$cmt->User->name}}" class="rounded-circle" width="48px" height="48px" style="object-fit: cover">
                </div>
                <div class="{{Auth::check()? 'col-md-8 col-lg-9':'col-md-6 col-lg-7'}}">
                    <div class="ms-4 mb-3">
                        @for ($i = 0; $i < $cmt->rating; $i++)
                            <i class="fa-solid text-warning fa-star" style="font-size: 1.3rem"></i>
                        @endfor
                        @for ($j = 0; $j < (5-$cmt->rating); $j++)
                            <i class="fa-regular text-warning fa-star" style="font-size: 1.3rem"></i>
                        @endfor
                    </div>
                    <p class="fw-bold">{{$cmt->User->name}}</p>
                    <p>{{$cmt->context}}</p>
                    <span class="text-black-50">{{$cmt->created_at}}</span>
                </div> 
                @if (!Auth::check())
                <div class="col-md-4 col-lg-4 px-4" style="border-left: 2px #99a2ab98 solid; ">
                    <p class="text-center">Do you like this comment?</p>
                    <div class="text-center">
                        <i class="fa-solid fa-thumbs-up text-success me-4 fs-4"></i>
                        <i class="fa-solid fa-thumbs-down text-danger fs-4"></i>
                    </div>
                    <br>
                    <p class="text-center"><a href="{{route('signin')}}" class=" text-decoration-none">Sign In </a>or <a href="{{route('signup')}}" class=" text-decoration-none">Sign Up</a> to reply comment</p>
                </div>
                @else
                <div class="col-md-2 col-lg-1 d-flex flex-column justify-content-end align-content-end">
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#replyform{{$cmt->id_comment}}" aria-expanded="false" aria-controls="replyform{{$cmt->id_comment}}">
                        <i class="fa-solid fa-reply" style="font-size: 1.3rem"></i>
                    </button>
                </div>
                <div class="collapse col-12 px-3 py-4 shadow" id="replyform{{$cmt->id_comment}}">
                    <form action="{{route('addComment',[$cmt->id_comment])}}" method="post" class="input-group">
                        @csrf
                        <input type="hidden" name="reply_id_product" value="{{$pet->id_product}}">
                        <input type="text" name="reply_context" id="reply_context" class="form-control" placeholder="Reply message">
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-paper-plane-top"></i>
                        </button>
                    </form>
                </div>
                @endif
            </div>
                @if (count($cmt->Comment)>0)  
                    @foreach ($cmt->Comment as $reply)
                    <div class="row mb-3 ms-4">
                        <div class="col-md-2 col-lg-1 mt-5">
                            <i class="fa-solid fa-arrow-turn-down-right text-black-50" style="font-size:1.6rem;"></i>
                        </div>
                        <div class="col-md-2 col-lg-1 ">
                            <img src="{{$reply->User->image!=null?asset('../resources/image/user/'.$reply->User->image):asset('../resources/image/user/user.png')}}" alt="{{$reply->User->name}}" class="rounded-circle" width="48px" height="48px" style="object-fit: cover">
                        </div>
                        <div class="col-md-7 col-lg-9 mt-3">
                            <p class="fw-bold">{{$reply->User->name}}</p>
                            <p>{{$reply->context}}</p>
                            <span class="text-black-50">{{$reply->created_at}}</span>
                        </div> 
                        <div class="col-md-1 col-lg-1 d-flex flex-column justify-content-end">
                            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#replyform{{$reply->id_comment}}" aria-expanded="false" aria-controls="replyform{{$reply->id_comment}}">
                                <i class="fa-solid fa-reply" style="font-size: 1.3rem"></i>
                            </button>
                        </div>
                        <div class="collapse col-12 px-3 py-4 shadow" id="replyform{{$reply->id_comment}}">
                            <form action="{{route('addComment',[$cmt->id_comment])}}" method="post" class="input-group">
                                @csrf
                                <input type="hidden" name="reply_id_product" value="{{$pet->id_product}}">
                                <input type="text" name="reply_context" id="reply_context" class="form-control" placeholder="Reply message">
                                <button type="submit" class="btn">
                                    <i class="fa-solid fa-paper-plane-top"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr> 
                    @endforeach
                @else
                <hr>
                @endif 
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('modal')
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body p-8">
        <div class="position-absolute top-0 end-0 me-3 mt-3">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="product productModal" id="productModal">
              <div class="zoom" onmousemove="zoom(event)" id="imgModal">
              </div>
            </div>
            <div class="product-tools">
              {{-- <div class="thumbnails row g-3" id="productModalThumbnails">
                <div class="col-3" class="tns-nav-active">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../resources/assets/images/products/product-single-img-1.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img" >
                    <!-- img -->
                    <img src="../resources/assets/images/products/product-single-img-2.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../resources/assets/images/products/product-single-img-3.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../resources/assets/images/products/product-single-img-4.jpg" alt="">
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-lg-8 mt-6 mt-lg-0">
              <a href="#!" class="mb-4 d-block" id="breedModal"></a>
              <h2 class="mb-1 h1" id="petNameModal"></h2>
              <div class="mb-4 text-warning" id="ratingModal">
                <a href="#" class="ms-2" id="soldModal"></a>
              </div>
              <h5 class="text-danger" id="priceAFSModal"></h5>
              <div class="hasSale">
                <span class="text-decoration-line-through text-muted" id="priceModal"></span>
                <span><small class="fs-6 ms-2 text-danger" id="saleModal"></small></span>
              </div>
              <hr class="my-6">
              <div class="mb-4">
                <h5>Left: <span id="quantityModal" ></span></h5>
                <button type="button" class="btn btn-outline-secondary" id="weigthModal">
                </button> 
              </div>
              <form action="{{route('productdetail',[$pet->id_product])}}" method="post" class="row">
                @csrf
                <input type="hidden" name="id_pro">
              <div>
                <div class="input-group input-spinner ">
                  <button type="button" class="btn btn-outline-secondary" style="border-radius: 10px 0 0 10px;"  data-field="quantity" id="btn_minus">
                    <i class="fa-solid fa-minus-large"></i>
                  </button>
                  <input type="text" name="quan" class="border border-secondary text-center pt-1 fs-4 text-secondary" style="width: 50px;" value="1"/>
                  <button type="button" class="btn btn-outline-secondary" style="border-radius: 0 10px 10px 0;" id="btn_plus" >
                      <i class="fa-solid fa-plus-large"></i>
                  </button>
                </div>
              </div>
              <div class="mt-3 row justify-content-start g-2 align-items-center">

                <div class="col-lg-4 col-md-5 col-6 d-grid">
                  <button type="submit" class="btn btn-primary">
                    <i class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                  </button>
                </div>
                <div class="col-md-4 col-5">
                  <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare">
                    <i class="bi bi-arrow-left-right"></i>
                  </a>
                  <a class="btn btn-light {{Auth::check()? 'addFav':''}}" id="modal_Fav"
                  {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle=tooltip data-bs-html=true title=Wishlist data-bs-idproduct="}}></a>
                </div>
              </div>
              </form>
              <hr class="my-6">
              <div>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Product Code:</td>
                      <td id="idModal">FBB00255</td>
                    </tr>
                    <tr>
                      <td>Availability:</td>
                      <td>In Stock</td>
                    </tr>
                    <tr>
                      <td>Type:</td>
                      <td id="typeModal">Fruits</td>
                    </tr>
                    <tr>
                      <td>Shipping:</td>
                      <td>
                        <small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small>
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
  </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-center" >
      <i class="bi bi-cart-check-fill" style="font-size: 1.3rem"></i>
      <span style="font-size: 1.3rem" class="me-auto">Add pet to cart successully</span>
    </div>
  </div>
</div>
<div class="toast-container position-fixed end-50" style="bottom: 20px" >
  <div id="liveToast2" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  </div>
</div>
<div data-bs-toggle="tooltip"  title="Show Compare" class="position-fixed rounded-circle bottom-0 start-0 p-3 animate__animated animate__heartBeat animate__infinite {{!Session::has('compare')?'d-none':''}}" id="btn-compare">
  <button role="button" class="btn btn-primary shadow" id="show_compare" data-bs-toggle="modal" data-bs-target="#comparePet">
    <i class="bi bi-arrow-left-right"></i>
  </button>
</div>
<div class="modal fade" id="comparePet" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header">
        <a class="btn btn-outline-danger" href="{{route('removeCmp')}}">
          <i class="bi bi-x-circle-fill text-danger"></i>
          Clean
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-8">
        <div class="row">
          <table class="table table-hover">
            <tbody id="compare_detail">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#btn_minus').click(function(e){
                e.preventDefault();
                let current = parseInt($('input[name=quan]').val());
                if(current>0){
                    $.get(window.location.pathname,function(){
                        current--;
                        $('input[name=quan]').val(current);
                    });
                }else{
                    alert("Can choose less than 0");
                }
            });
            $('#btn_plus').click(function(e){
                e.preventDefault();
                let max = parseInt($('input[name=max_quan]').val());
                let current = parseInt($('input[name=quan]').val());
                if(max > current){
                    $.get(window.location.pathname,function(){
                        current++;
                        $('input[name=quan]').val(current);
                    });
                }else{
                    alert("You can't choose more than quantity of product");
                }
            });
            $('input[name=quan]').on('focusout',function(e){
                e.preventDefault();
                let validateNum =/^\d{1,10}$/;
                let currentVl = $(this).val();
                // if(!validateNum.test(currentVl)){
                //     $(this).val(1);
                // }
                $(this).val(validateNum.test(currentVl)?currentVl:1);
            });
            $('#count-word').text($('#comment').val().length+ " /1000 characters");
            $('#comment').focusout(function(e){
                e.preventDefault();
                let num = $(this).val().length;
                $.get(window.location.href,function(data){
                    $('#count-word').text(num + " /1000 characters");
                    if(num>1000){
                        $('#count-word').removeClass('text-black-50').addClass('text-danger');
                    }
                });
            });
            $("input[name='rating_pro']").click(function(){
                $(this).prevUntil("input.stop1").next().children().css('font-weight',900);
                $(this).next().children().css('font-weight',900);
                $(this).nextUntil("input.stop2").next().children().css('font-weight',300);
            });
            $('.btn_modal').click(function(){
            $.get(window.location.href+"/ajax/modal/"+$(this).data('bsProduct'),function(data){
              let dataProduct = jQuery.parseJSON(data); 
              $('#imgModal').css({'background-image':'url(resources/image/pet/'+dataProduct['image']+')','object-fit': 'contain','background-repeat': 'no-repeat'});
              $('#imgModal').html(`<image src='resources/image/pet/${dataProduct["image"]}' style="background-color: #ffffff">`);
              $('#breedModal').html(dataProduct['breed_name']);
              $('#petNameModal').html(dataProduct['product_name']);
              let strStart ="";
              for(let i =0; i<dataProduct['rating'];i++){
                strStart+="<i class='bi bi-star-fill'></i>"
              }
              for(let j = 0; j < 5-dataProduct['rating'];j++){
                strStart+="<i class='bi bi-star'></i>";
              }
              strStart += `<span class='ms-3 text-muted'>(${dataProduct["sold"]} solds)</span>`;
              $('#modal_Fav').attr("data-bs-idproduct",dataProduct['id_product']);
              if(dataProduct["favourite"]){
                $('#modal_Fav').html("<i class='bi bi-heart-fill text-danger'></i>")
              }else{
                $('#modal_Fav').html("<i class='bi bi-heart'></i>")
              }
              $('#ratingModal').html(strStart);
              $('#soldModal').html(`(${dataProduct["sold"]} sold)`);
              if(dataProduct["sale"]>0){
                $('.hasSale').removeClass('d-none');
                $('#priceModal').html(`$${dataProduct["per_price"]}`);
                $('#saleModal').html(`${dataProduct["sale"]}% Off`);
                $('#priceAFSModal').html(`$${dataProduct["per_price"]*(1-dataProduct["sale"]/100)}`)
              }else{
                $('.hasSale').addClass('d-none');
                $('#priceAFSModal').html(`$${dataProduct["per_price"]}`);
              };
              $('#weigthModal').html(dataProduct["weight"]+" kg");
              $('#quantityModal').html(dataProduct['quantity']);
              $('#idModal').html(dataProduct['id_product']);
              $('input[name=id_pro]').val(dataProduct['id_product']);
              $('#typeModal').html(dataProduct['type_name']);
            });
          });
          $('.compare_pet').click(function(){
            const toast = new bootstrap.Toast($('#liveToast2'))
            toast.show();
            if($('#btn-compare').hasClass('d-none')){
              $('#btn-compare').removeClass('d-none');
            }
            $.get(window.location.origin+"/index.php/ajax/addcompare/"+$(this).data('bsProduct'),function(data){
              $('#liveToast2').html(data);  
            })
          });
          $('#show_compare').click(function(){
            $.get(window.location.origin+"/index.php/ajax/compare/showcompare",function(data){
              $('#compare_detail').html(data);  
            })
          });
          $('.addFav').click(function(){
              $(this).children().toggleClass('bi-heart').toggleClass('bi-heart-fill text-danger');
            $.get(window.location.href+'/ajax/favourite/'+$(this).data('bsIdproduct'),function(data){
              $('.countFav').html(data);
            })
          });
          $('.addToCart').click(function(){
            const toast = new bootstrap.Toast($('#liveToast'))
            toast.show();
            $.get(window.location.href+"/ajax/"+$(this).data('bsId'),function(data){
              $('.countCart').html(data);
            });
          });
        })
    </script>
@endsection