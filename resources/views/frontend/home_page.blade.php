@extends('welcome')

@section('content')
<main class="container-fluid">
  @if (Session::has('message'))
    <div class="position-absolute" style="height: 400px; width: 100% ">
      <div class="toast-container p-3 top-50 start-50 translate-middle">
        <div role="alert"  id="toastMessage" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='2500'>
            <div class="toast-body" style="height: 150px; width: 100%;padding:30px 0">
              <div class="row">
                <div class="col-2 mb-3 mx-auto">
                  <i class="fa-regular fa-circle-check text-center" style="color: #26a269; font-size: 4rem"></i>
                </div>
                <h4 class="text-success text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;">{{Session::get('message')}}</h4>
              </div>
            </div>
        </div>
      </div>  
    </div>    
    <script>
      const toastLiveExample = document.getElementById('toastMessage');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()  
    </script>      
  @endif
  <section class="mt-8">
    <div class="container">
      <div class="hero-slider ">
	@foreach($slides as $slide)
        <div style="background: url(/resources/image/slides/{{$slide->image}})no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
          <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
	    	    @if (isset($slide->alert))
		        <span class="badge {{$slide->alert_size}}" style="color: {{$slide->alert_color}}; background-color: {{$slide->alert_bg}}">{{$slide->alert}}</span>
  	        @endif
              <h2 class="display-5 fw-bold mt-4" style="color:{{$slide->title_color}}">{{$slide->title}}</h2>
              <p class="lead" style="color:{{$slide->content_color}}">{{$slide->content}}</p>
              <a href="{{route($slide->link,[$slide->attr1,$slide->attr2])}}" class="btn mt-3" style="color: {{$slide->btn_color}};background-color:{{$slide->btn_bg_color}}">{{$slide->btn_content}} <i class="feather-icon icon-arrow-right ms-1"></i></a>
          </div>
	      </div>
	@endforeach  
      </div>
    </div>
  </section>
  <section class="mb-lg-10 mt-lg-14 my-8">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-6">
            <h3 class="mb-0">Featured Categories</h3>  
          </div>
        </div>
        <div class="category-slider ">
          @foreach ($breeds as $breed)
          <div class="item">
              <a href="{{route('productlist',[$breed->TypeProduct->name_type,$breed->breed_name])}}" class="text-decoration-none text-inherit">
                  <div class="card card-product mb-lg-4">
                    <div class="card-body text-center py-8">
                      <img src="{{asset('resources/image/category/'.$breed->image)}}" alt="Type Pet" class="mb-3 img-fluid mx-auto" style="width: 120px; height:140px; object-fit:contain;">
                      <div class="text-truncate">{{$breed->breed_name}}</div>
                    </div>
                  </div>
              </a>
          </div>
          @endforeach
        </div>
      </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
	@for($i=0;$i<2;$i++)
	    <div class="col-12 col-md-6 mb-3 mb-lg-0">
          <div>
            <div class="py-10 px-8 rounded"
              style="background:url(../resources/image/banner/{{$banners[$i]->image}})no-repeat; background-size: cover; background-position: center;">
              <div>
                <h3 class="fw-bold mb-1" style="color: {{$banners[$i]->title_color}}">{{$banners[$i]->title}}
                </h3>
                <p class="mb-4" style="color: {{$banners[$i]->content_color}}">{{$banners[$i]->content}}</p>
                <a href="{{route($banners[$i]->link, $banners[$i]->attr)}}" class="btn" style="background-color: {{$banners[$i]->btn_bg_color}};color:{{$banners[$i]->btn_color}}">{{$banners[$i]->btn_content}}</a>
              </div>
            </div>
          </div>
	    </div>
	@endfor
       </div>
    </div>
  </section>
  <section class="my-lg-14 my-8">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-6">
          <h3 class="mb-0">Popular Pets</h3>
        </div>
      </div>
      <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
        @foreach ($popular_pets as $pet)
        <div class="col">
          <div class="card card-product">
            <div class="card-body">
                <div class="text-center position-relative ">
                  <div class=" position-absolute top-0 start-0">
                    @if ($pet->sale !=0)
                    <span class="badge bg-success">-{{$pet->sale}}%</span>
                    @endif
                    @php 
                        $today =new DateTime();
                        $pet_createdate = DateTime::createFromFormat('Y-m-d H:i:s',$pet->created_at);
                        if($today->diff($pet_createdate)->format('%a') <4){
                          echo "<span class='badge bg-danger'>HOT</span>";
                        }
                    @endphp
                  </div>
                  <a href="{{route('productdetail',$pet->id_product)}}"> 
                      <img src="{{asset('resources/image/pet/'.$pet->image)}}" alt="{{$pet->product_name}}" class="mb-3 img-fluid mx-auto" style="width: 212px; height: 212px; object-fit: contain">
                  </a>
                  <div class="card-product-action">
                    <a href="#!" class="btn-action btn_modal" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product="{{$pet->id_product}}"><i
                        class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                    <a class="btn-action {{Auth::check()? 'addFav':''}}" 
                    {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pet->id_product"}} >
                      <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$pet->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                    <a role="button" class="btn-action  compare_pet" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"  data-bs-product="{{$pet->id_product}}">
                      <i class="bi bi-arrow-left-right"></i>
                    </a>
                  </div>
                </div>
                <div class="text-small mb-1">
                    <a href="{{route('productdetail',$pet->id_product)}}" class="text-decoration-none text-muted">
                        <small class="text-capitalize">{{$pet->Breed->breed_name}}</small>
                    </a>
                </div>
                <h2 class="fs-6">
                    <a href="{{route('productdetail',$pet->id_product)}}" class="text-inherit text-decoration-none">{{$pet->product_name}}</a>
                </h2>
                <div>
                  <p> 
                    @php
                        $rating = 0;
                        if (count($pet->Comment->where('rating','!=',null)) >0) {
                          foreach ($pet->Comment->where('rating','!=',null) as $cmt) {
                            $rating += $cmt->rating;
                          }
                          $rating /= count($pet->Comment->where('rating','!=',null));
                        }
                    @endphp
                      @for ($i = 0; $i < floor($rating); $i++)
                      <i class="bi bi-star-fill fs-4 text-warning"></i>
                      @endfor
                      @if (is_float($rating))
                      <i class="bi bi-star-half fs-4 text-warning"></i>
                      @endif
                      @for ($i = 0; $i < 5-ceil($rating); $i++)
                      <i class="bi bi-star fs-4 text-warning"></i>
                      @endfor
                      <span class="text-black-50 ms-3">({{$rating}})</span>
                  </p> 
                </div>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div >
                  @if ($pet->sale>0)
                  <span class="fs-4 text-danger">${{$pet->per_price *(1- $pet->sale /100)}}</span>
                    <span class="text-decoration-line-through text-muted">${{$pet->per_price}}</span>
                  @else
                  <span class=" fs-4 text-black">${{$pet->per_price}}</span>
                    @endif
                </div>
                <div>
                    <button data-bs-id="{{$pet->id_product}}" type="button" class="btn btn-primary btn addToCart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-plus">
                      <line x1="12" y1="5" x2="12" y2="19"></line>
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>  
        @endforeach
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-6">
          <h3 class="mb-0">Daily Best Sells</h3>
        </div>
      </div>
      <div class="table-responsive-xl pb-6">
        <div class="row row-cols-lg-4 row-cols-1 row-cols-md-2 g-4 flex-nowrap">
          <div class="col">
            <div class=" pt-8 px-6 px-xl-8 rounded" style="background:url(resources/image/banner/{{$banners[2]->image}})no-repeat; background-size: cover; height: 470px; ">
              <div>
                <h2 class="fw-bold">{{$banners[2]->title}}</h2>
                <p style="color: {{$banners[2]->content_color}}">{{$banners[2]->content}}</p>
                <a href="{{route($banners[2]->link,$banners[2]->attr)}}" class="btn" style="background-color: {{$banners[2]->btn_bg_color}}; color:{{$banners[2]->btn_color}}">{{$banners[2]->btn_content}} <i class="feather-icon icon-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
          @foreach ($sale_pets as $s_pet)
          <div class="col">
            <div class="card card-product h-100">
              <div class="card-body">
                <div class="text-center  position-relative d-flex flex-column justify-content-center align-items-center"> 
                  <a href="{{route('productdetail',$s_pet->id_product)}}">
                    <img src="{{asset('resources/image/pet/'.$s_pet->image)}}" alt="{{$s_pet->product_name}}" class="mb-3 img-fluid" style="object-fit: contain; height: 195px">
                  </a>
                  <div class="card-product-action">
                    <a href="#!" class="btn-action btn_modal" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product="{{$s_pet->id_product}}">
                      <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                    </a>
                    <a class="btn-action {{Auth::check()? 'addFav':''}}" 
                    {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$s_pet->id_product"}} >
                      <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$s_pet->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                    <a role="button" class="btn-action compare_pet" data-bs-toggle="tooltip"  data-bs-html="true" title="Compare"  data-bs-product="{{$s_pet->id_product}}">
                      <i class="bi bi-arrow-left-right"></i>
                    </a>
                  </div>
                </div>
                <div class="text-small mb-1">
                  <hr>
                  <a href="#!" class="text-decoration-none text-muted">
                    <small>{{$s_pet->Breed->breed_name}}</small>
                  </a>
                </div>
                <h2>
                  <a href="{{route('productdetail',$s_pet->id_product)}}" class="text-inherit text-decoration-none">{{$s_pet->product_name}}</a>
                </h2>
                <div class="d-flex justify-content-between align-items-center mt-3">
                  <div>
                    <span class="text-dark">${{$s_pet->per_price * (1-$s_pet->sale/100)}}</span> 
                    <span class="text-decoration-line-through text-muted">${{$s_pet->per_price}}</span>
                  </div>
                  <div> 
                    <p>
                      @php
                          $rating = 0;
                          if (count($s_pet->Comment->where('rating','!=',null)) >0) {
                            foreach ($s_pet->Comment->where('rating','!=',null) as $cmt) {
                              $rating += $cmt->rating;
                            }
                            $rating /= count($s_pet->Comment->where('rating','!=',null));
                          }
                      @endphp
                        @for ($i = 0; $i < $rating; $i++)
                        <i class="bi bi-star-fill text-warning"></i>
                        @endfor
                        @for ($i = 0; $i < 5-$rating; $i++)
                        <i class="bi bi-star text-warning"></i>
                        @endfor
                    </p>
                    <span class="text-muted small">Sold: {{count($s_pet->Comment->where('rating','!=',null))}}</span>
                  </div>
                </div>
                <div class="d-grid mt-2">
                  <button data-bs-id="{{$s_pet->id_product}}" type="button" class="btn btn-primary btn addToCart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-plus">
                      <line x1="12" y1="5" x2="12" y2="19"></line>
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> Add to cart 
                  </button>
                </div>
                <div class="d-flex justify-content-start text-center mt-3">
                  <div class="deals-countdown w-100" data-countdown="2023/5/5 00:00:00"></div>
                </div>
              </div>
            </div>
          </div>      
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <section class="my-lg-14 my-8">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="mb-8 mb-xl-0">
            <div class="mb-6"><img src="{{asset('resources/image/icons/clock.svg')}}" alt=""></div>
            <h3 class="h5 mb-3">
              10 minute grocery now
            </h3>
            <p>Get your order delivered to your doorstep at the earliest from H<sub>2</sub>SO<sub>4</sub> pickup stores near you.</p>
          </div>
        </div>
        <div class="col-md-6  col-lg-3">
          <div class="mb-8 mb-xl-0">
            <div class="mb-6"><img src="{{asset('resources/image/icons/gift.svg')}}" alt=""></div>
            <h3 class="h5 mb-3">Best Prices & Offers</h3>
            <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get best pricess &
              offers.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="mb-8 mb-xl-0">
            <div class="mb-6"><img src="{{asset('resources/image/icons/package.svg')}}" alt=""></div>
            <h3 class="h5 mb-3">Wide Assortment</h3>
            <p>Choose from 5000+ products across food, personal care, household, bakery, veg and non-veg & other
              categories.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="mb-8 mb-xl-0">
            <div class="mb-6"><img src="{{asset('resources/image/icons/refresh-cw.svg')}}" alt=""></div>
            <h3 class="h5 mb-3">Easy Returns</h3>
            <p>Not satisfied with a product? Return it at the doorstep & get a refund within hours. No questions asked
              <a href="#!">policy</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
{{-- @section('modal')
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
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-lg-8 mt-6 mt-lg-0">
              <p class="mb-4 d-block text-primary" id="breedModal"></>
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
              <form action="{{route('productdetail')}}" method="post" class="row">
                @csrf
                <input type="hidden" name="id_pro">
                <input type="hidden" name="max_quan" >
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
<div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
  <div role="alert"  id="toastAdd" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
      <div class="toast-body" style="height: 100px; padding:30px 0">
        <div class="row">
          <div class="col-2 mb-3 mx-auto">
            <i class="fa-solid fa-cart-circle-check" style="color: #2ec27e; font-size: 2.3rem"></i>
          </div>
          <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;">Add pet to cart successully</h4>
        </div>
      </div>
  </div>
</div>
  <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastCompare" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
        <div class="toast-body" style="height: 100px; padding:30px 0">
          <div class="row">
            <div class="col-2 mb-3 mx-auto">
              <i class="fa-solid fa-lightbulb-on " style="color: #f5c211; font-size: 1.3rem"></i>
            </div>
            <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;" id="messCompare"></h4>
          </div>
        </div>
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

@endsection --}}
{{-- @section('script')
    <script>
      
      $(document).ready(function(){
        //?? Rolldown message not working
          // const scrollingElement = document.getElementById("scroller");
          // const config = { childList: true };

          // const callback = function (mutationsList, observer) {
          //   console.log("aACVDDVA");
          //   for (let mutation of mutationsList) {
          //     if (mutation.type === "childList") {
          //       window.scrollTo(0, document.body.scrollHeight);
          //     }
          //   }
          // };
          // const observer = new MutationObserver(callback);
          // observer.observe(scrollingElement, config);
        //
      //     $('.btn_modal').click(function(){
      //       $.get(window.location.origin+"/index.php/ajax/modal/showpet/"+$(this).data('product'),function(data){
      //         let dataProduct = jQuery.parseJSON(data); 
      //         $('#imgModal').css({'background-image':'url(resources/image/pet/'+dataProduct['image']+')','object-fit': 'contain','background-repeat': 'no-repeat'});
      //         $('#imgModal').html(`<image src='resources/image/pet/${dataProduct["image"]}' style="background-color: #ffffff">`);
      //         $('#breedModal').html(dataProduct['breed_name']);
      //         $('#petNameModal').html(dataProduct['product_name']);
      //         $('input[name=max_quan]').val(dataProduct['quantity']);
      //         let strStart ="";
              
      //         for(let i =0; i<dataProduct['rating'];i++){
      //           strStart+="<i class='bi bi-star-fill'></i>"
      //         }
      //         for(let j = 0; j < 5-dataProduct['rating'];j++){
      //           strStart+="<i class='bi bi-star'></i>";
      //         }
      //         strStart += `<span class='ms-3 text-muted'>(${dataProduct["sold"]} solds)</span>`;
      //         $('#modal_Fav').attr("data-bs-idproduct",dataProduct['id_product']);
      //         if(dataProduct["favourite"]){
      //           $('#modal_Fav').html("<i class='bi bi-heart-fill text-danger'></i>")
      //         }else{
      //           $('#modal_Fav').html("<i class='bi bi-heart'></i>")
      //         }
      //         $('#ratingModal').html(strStart.toFixed(2));
      //         $('#soldModal').html(`(${dataProduct["sold"]} sold)`);
      //         if(dataProduct["sale"]>0){
      //           $('.hasSale').removeClass('d-none');
      //           $('#priceModal').html(`$${dataProduct["per_price"]}`);
      //           $('#saleModal').html(`${dataProduct["sale"]}% Off`);
      //           $('#priceAFSModal').html(`$${(dataProduct["per_price"]*(1-dataProduct["sale"]/100)).toFixed(2)}`)
      //         }else{
      //           $('.hasSale').addClass('d-none');
      //           $('#priceAFSModal').html(`$${dataProduct["per_price"]}`);
      //         };
      //         $('#weigthModal').html(dataProduct["weight"]+" kg");
      //         $('#quantityModal').html(dataProduct['quantity']);
      //         $('#idModal').html(dataProduct['id_product']);
      //         $('input[name=id_pro]').val(dataProduct['id_product']);
      //         $('#typeModal').html(dataProduct['type_name']);
      //       });
      //     });
      //     $('.compare_pet').click(function(){
      //       if($('#btn-compare').hasClass('d-none')){
      //         $('#btn-compare').removeClass('d-none');
      //       }
      //       $.get(window.location.origin+"/index.php/ajax/addcompare/"+$(this).data('bsProduct'),function(data){
      //         $('#messCompare').html(data);  
      //       })
      //       const toast = new bootstrap.Toast($('#toastCompare'))
      //       toast.show();
      //     });
      //     $('#show_compare').click(function(){
      //       $.get(window.location.origin+"/index.php/ajax/compare/showcompare",function(data){
      //         $('#compare_detail').html(data);  
      //       })
      //     });
      //     $('.addFav').click(function(){
      //         $(this).children().toggleClass('bi-heart').toggleClass('bi-heart-fill text-danger');
      //       $.get(window.location.href+'/ajax/favourite/'+$(this).data('bsIdproduct'),function(data){
      //         $('.countFav').html(data);
      //       })
      //     });
          
      //     $('#btn_minus').click(function(e){
      //         e.preventDefault();
      //         let current = parseInt($('input[name=quan]').val());
      //         if(current >1){
      //           current--;
      //           $('input[name=quan]').val(current);
      //         }
      //     });
      //     $('#btn_plus').click(function(e){
      //         e.preventDefault();
      //         let max = parseInt($('#quantityModal').text());
      //         let current = parseInt($('input[name=quan]').val());
      //         console.log(current );
      //         if(max>current){
      //           current++;
      //           $('input[name=quan]').val(current);
      //         }
      //     });
      //     $('input[name=quan]').on('focusout',function(e){
      //         e.preventDefault();
      //         let validateNum =/^\d{1,10}$/;
      //         let currentVl = $(this).val();
      //         $(this).val(validateNum.test(currentVl)?currentVl:1);
      //     });
          
      // })
    </script>
@endsection --}}
