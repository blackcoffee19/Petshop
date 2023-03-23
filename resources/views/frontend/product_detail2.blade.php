@extends('welcome')
@section('content')
<main>
    <div class="mt-4">
      <div class="container">
        <div class="row ">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('productlist',$pet->Breed->TypeProduct->name_type)}}" class="text-capitalize">{{$pet->Breed->TypeProduct->name_type}}</a></li>  
                <li class="breadcrumb-item"><a href="{{route('productlist',[$pet->Breed->TypeProduct->name_type,$pet->Breed->breed_name])}}" class="text-capitalize">{{$pet->Breed->breed_name}}</a></li>  
                <li class="breadcrumb-item active" aria-current="page">{{$pet->product_name}}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <section class="mt-8">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="product" id="product">
              <div class="zoom" onmousemove="zoom(event)" style="background-image: url(resources/image/pet/{{isset($pet->image)? $pet->image: 'no_image.jpg'}}); object-fit: contain;background-repeat: no-repeat" >
                <img src="{{asset('resources/image/pet/'.$pet->image)}}" alt="{{$pet->product_name}}" style="background-color: #ffffff">
              </div>
            </div>
            <div class="product-tools">
              <div class="thumbnails row g-3" id="productThumbnails">
                <div class="col-3">
                  <div class="thumbnails-img">
                    <img src="{{asset('resources/image/pet/'.$pet->image)}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="ps-lg-10 mt-6 mt-md-0">
                <a href="#!" class="mb-4 d-block">{{$pet->Breed->breed_name}}</a>
                <h1 class="mb-1">{{$pet->product_name}}</h1>
                <div class="mb-4 text-warning">
                  @for ($i = 0; $i < $pet->rating; $i++)
                  <i class="bi bi-star-fill"></i>
                  @endfor
                  @for ($i = 0; $i < 5-$pet->rating; $i++)
                  <i class="bi bi-star"></i>
                  @endfor
                  <a href="#comments" class="ms-2">({{$pet->sold}} solds)</a></div>
                <div class="fs-4">
                  <span class="fw-bold text-dark">${{$pet->per_price}}</span> 
                  {{-- <span class="text-decoration-line-through text-muted">$35</span><span><small class="fs-6 ms-2 text-danger">26% Off</small></span> --}}
                </div>
                <hr class="my-6">
                {{-- <div class="mb-5">
                  <button type="button" class="btn btn-outline-secondary">250g</button>
                  <button type="button" class="btn btn-outline-secondary">500g</button>
                  <button type="button" class="btn btn-outline-secondary">1kg</button>
                </div> --}}
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
                    <button type="submit"class="btn btn-success text-light mt-3 pt-2 mx-auto px-4 w-auto shadow">
                        <i class="fa-sharp fa-solid fa-cart-plus"></i>
                        <span class="ms-3 h5 text-light">Add to Cart</span>
                    </button>
                </form>
                
                <div class="col-md-4 col-4">
                  <a class="btn btn-light " href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                  <a class="btn btn-light {{Auth::check()? 'addFav':''}}" 
                                {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pet->id_product"}} >
                                <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$pet->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                </div>
              </div>
              <hr class="my-6">
              <div>
                <table class="table table-borderless mb-0">
                  <tbody>
                    <tr>
                      <td>Product Code:</td>
                      <td>{{$pet->id_product}}</td>
                    </tr>
                    <tr>
                      <td>Availability:</td>
                      <td>{{$pet->quantity>0? "In Stock": "Sold"}}</td>
                    </tr>
                    <tr>
                      <td>Type:</td>
                      <td>{{$pet->Breed->TypeProduct->name_type}}</td>
                    </tr>
                    <tr>
                        <td>Breed:</td>
                        <td>{{$pet->Breed->breed_name}}</td>
                      </tr>
                    <tr>
                      <td>Shipping:</td>
                      <td><small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="mt-8">
                <div class="dropdown">
                  <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Share
                  </a>
                  <ul class="dropdown-menu" >
                    <li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="mt-lg-14 mt-8 ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">Product Details</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Information</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                <div class="my-8">
                  <div class="mb-5">
                    <h4 class="mb-1">Favourite Foods:</h4>
                    <p class="mb-0">{{$pet->food}}.</p>
                  </div>
                  <div class="mb-5">
                    <h5 class="mb-1">Storage Tips</h5>
                    <p class="mb-0">{{$pet->description}}
                    </p>
                  </div>
                  <div class="mb-5">
                    <h5 class="mb-1">Unit</h5>
                    <p class="mb-0">{{$pet->quantity}} units</p>
                  </div>
                  <div>
                    <h5 class="mb-1">Disclaimer</h5>
                    <p class="mb-0">Image shown is a representation and may slightly vary from the actual product. Every
                      effort
                      is made to maintain accuracy of all information displayed.</p>
                  </div>
                </div>
              </div>
              <!-- tab pane -->
              <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                <div class="my-8">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="mb-4">Details</h4>
                    </div>
                    <div class="col-12 col-lg-6">
                      <table class="table table-striped">
                        <!-- table -->
                        <tbody>
                          <tr>
                            <th>Gender</th>
                            <td>{{$pet->gender == 1?"Male":($pet->gender == 2? "Female": "Unknow")}}</td>
                          </tr>
                          <tr>
                            <th>Pet Type</th>
                            <td>{{$pet->Breed->TypeProduct->name_type}}</td>
                          </tr>
                          <tr>
                            <th>Breed</th>
                            <td>{{$pet->Breed->breed_name}}</td>
                          </tr>
                          <tr>
                            <th>Quantity</th>
                            <td>{{$pet->quantity}}</td>
                          </tr>
                          <tr>
                            <th>Status</th>
                            <td>{{$pet->status}}</td>
                          </tr>
                          <tr>
                            <th>Food</th>
                            <td>{{$pet->food}}</td>
                          </tr>
                          <tr>
                            <th>Weight</th>
                            <td>{{$pet->weight}} kg</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12 col-lg-6">
                      <table class="table table-striped">
                        <!-- table -->
                        <tbody>
                          <tr>
                            <th>ASIN</th>
                            <td>{{$pet->id_product}}</td>
                          </tr>
                          <tr>
                            <th>Date First Available</th>
                            <td>{{$pet->created_at}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                <div class="my-8">
                  <div class="row">
                    <!-- col -->
                    <div class="col-md-8 mx-auto">
                      <div class="mb-10">
                        <div class="d-flex justify-content-between align-items-center mb-8">
                          <div>
                            <h4>Comment</h4>
                          </div>
                        </div>
                        @if (count($pet->Comment) ==0)
                            <div class="text-center">
                              <h4>There are no comment</h4>
                            </div>
                        @endif
                        @foreach ($pet->Comment as $cmt)     
                        <div class="d-flex border-bottom pb-6 mb-6">
                          <img src="{{asset('resources/image/user/'.($cmt->User->image != null? $cmt->User->image: "user.png"))}}" alt="" class="rounded-circle avatar-lg">
                          <div class="ms-5">
                            <h6 class="mb-1">
                              {{$cmt->User->name}}
                            </h6>
                            <p class="small"> <span class="text-muted">{{$cmt->created_at}}</span>
                              <span class="text-primary ms-3 fw-bold">Verified Purchase</span></p>
                            <!-- rating -->
                            <div class=" mb-2">
                              @if (isset($cmt->rating))
                              @for ($i = 0; $i < $cmt->rating; $i++)
                              <i class="bi bi-star-fill text-warning"></i>                                  
                              @endfor
                              @for ($i = 0; $i < 5-$cmt->rating; $i++)
                              <i class="bi bi-star text-warning"></i>
                              @endfor
                              @endif
                            </div>
                            <!-- text-->
                            <p>{{$cmt->context}}</p>
                            <!-- icon -->
                            <div class="d-flex justify-content-end mt-4">
                              <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                              <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                                abuse</a>
                            </div>
                          </div>
                        </div>
                        
                        @endforeach
                      </div>
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
                      @else 
                      <div class="text-center">
                        <h3><a href="{{route('signin')}}">Sign in</a> or <a href="{{route('signup')}}">Sign up</a> to create comment for pet</h3>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
  
  
              </div>
              <!-- tab pane -->
              <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab"
                tabindex="0">...</div>
            </div>
          </div>
        </div>
      </div>
  
  
  
    </section>
  
    <!-- section -->
    <section class="my-lg-14 my-14">
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-12">
            <!-- heading -->
            <h3>Related Items</h3>
          </div>
        </div>
        <!-- row -->
        <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
          <!-- col -->
          @foreach ($list_relate as $pet)
          <div class="col" >
            <div class="card card-product" style="height: 380px">
              <div class="card-body">
                <div class="text-center position-relative d-flex flex-column justify-content-center align-items-center" style="height: 70%">
                    <div class=" position-absolute top-0 start-0">
                      <span class="badge bg-danger">Sale</span>
                    </div>
                    <a href="{{route('productdetail',$pet->id_product)}}">
                      <img src="{{asset('resources/image/pet/'.$pet->image)}}" alt="{{$pet->product_name}}"class="mb-3 img-fluid"></a>
                    <div class="card-product-action">
                      <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                          class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a class="btn-action {{Auth::check()? 'addFav':''}}" 
                          {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pet->id_product"}} >
                          <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$pet->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                      <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                          class="bi bi-arrow-left-right"></i></a>
                    </div>
                </div>
                <div class="text-small mb-1"><a href="{{route('productlist',[$pet->Breed->TypeProduct->name_type,$pet->Breed->breed_name])}}" class="text-decoration-none text-muted"><small>{{$pet->Breed->breed_name}}</small></a></div>
                <h2 class="fs-6"><a href="{{route('productdetail',$pet->id_product)}}" class="text-inherit text-decoration-none">{{$pet->product_name}}</a></h2>
                <div>
                  <small class="text-warning">
                    @for ($i = 0; $i < $pet->rating; $i++)
                    <i class="bi bi-star-fill"></i>
                    @endfor
                    @for ($i = 0; $i < 5-$pet->rating; $i++)
                    <i class="bi bi-star"></i>
                    @endfor
                    </small> 
                    <span class="text-muted small">{{$pet->rating}}({{$pet->sold}} sold)</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                      <span class="text-dark">${{$pet->per_price}}</span> 
                      {{-- <span class="text-decoration-line-through text-muted">$24</span> --}}
                    </div>
                    <div>
                        <a href="" class="btn btn-primary btn-sm">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                          </svg> Add
                        </a>
                    </div>
                </div>
              </div>
            </div>
          </div>    
          @endforeach
        </div>
      </div>
    </section>
  
  </main>
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
      $('.addFav').click(function(){
                $(this).children().toggleClass('bi-heart').toggleClass('bi-heart-fill text-danger');
                $.get(window.location.origin+'/index.php/ajax/favourite/'+$(this).data('bsIdproduct'),function(data){
                  $('.countFav').html(data);
                });
      });
  })
</script>
@endsection