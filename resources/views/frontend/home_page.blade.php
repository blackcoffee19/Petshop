@extends('welcome')

@section('content')
<main class="container-fluid">
  {{-- Slider --}}
  <section class="mt-8">
      @if (Session::has('message'))
        <div class="alert alert-success text-center">{{Session::get('message')}}</div>          
      @endif
      <div class="container">
        <div class="hero-slider ">
          <div style="background: url(/resources/image/slides/slide-1.png)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
              <span class="badge text-bg-warning">Opening Sale Discount 50%</span>
    
              <h2 class="text-dark display-5 fw-bold mt-4">SuperMarket For Fresh Grocery </h2>
              <p class="lead">Introduced a new model for online grocery shopping
                and convenient home delivery.</p>
              <a href="#!" class="btn btn-dark mt-3">Shop Now <i class="feather-icon icon-arrow-right ms-1"></i></a>
            </div>
    
          </div>
          <div class=" "
            style="background: url(/resources/image/slides/slide-2.png)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
              <span class="badge text-bg-warning">Free Shipping - orders over $100</span>
              <h2 class="text-dark display-5 fw-bold mt-4">Free Shipping on <br> orders over <span
                  class="text-primary">$100</span></h2>
              <p class="lead">Free Shipping to First-Time Customers Only, After promotions and discounts are applied.
              </p>
              <a href="#!" class="btn btn-dark mt-3">Shop Now <i class="feather-icon icon-arrow-right ms-1"></i></a>
            </div>
    
          </div>
    
        </div>
      </div>
    </section>
    {{-- Category --}}
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
    {{-- Banner --}}
      <section>
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 mb-3 mb-lg-0">
              <div>
                <div class="py-10 px-8 rounded"
                  style="background:url(../resources/image/banner/banner-1.png)no-repeat; background-size: cover; background-position: center;">
                  <div>
                    <h3 class="fw-bold mb-1">Fruits & Vegetables
                    </h3>
                    <p class="mb-4">Get Upto <span class="fw-bold">30%</span> Off</p>
                    <a href="#!" class="btn btn-dark">Shop Now</a>
                  </div>
                </div>
  
              </div>
  
            </div>
            <div class="col-12 col-md-6 ">
  
              <div>
                <div class="py-10 px-8 rounded"
                  style="background:url(../resources/image/banner/banner-2.png)no-repeat; background-size: cover; background-position: center;">
                  <div>
                    <h3 class="fw-bold mb-1">Freshly Baked
                      Buns
                    </h3>
                    <p class="mb-4">Get Upto <span class="fw-bold">25%</span> Off</p>
                    <a href="#!" class="btn btn-dark">Shop Now</a>
                  </div>
                </div>
  
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- Popular --}}
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
                        <a href="#!" class="btn-action btn_modal" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-bs-product="{{$pet->id_product}}"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                        <a class="btn-action {{Auth::check()? 'addFav':''}}" 
                        {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pet->id_product"}} >
                          <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$pet->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                        <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                            class="bi bi-arrow-left-right"></i></a>
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
                    <small class="text-warning"> 
                        @for ($i = 0; $i < $pet->rating; $i++)
                        <i class="bi bi-star-fill"></i>
                        @endfor
                        @for ($i = 0; $i < 5-$pet->rating; $i++)
                        <i class="bi bi-star"></i>
                        @endfor
                    </small> 
                    <span class="text-muted small">{{$pet->rating}}({{$pet->sold}})</span>
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
              <div class=" pt-8 px-6 px-xl-8 rounded" style="background:url(resources/image/banner/banner-3.jpg)no-repeat; background-size: cover; height: 470px; ">
                <div>
                  <h3 class="fw-bold text-dark-primary">Adopt A Cute Dog.
                  </h3>
                  <p class="text-dark-primary">Get the best dog.</p>
                  <a href="#!" class="btn btn-success">Shop Now <i class="feather-icon icon-arrow-right ms-1"></i></a>
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
                        <a href="#!" class="btn-action btn_modal" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-bs-product="{{$s_pet->id_product}}">
                          <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i>
                        </a>
                        <a class="btn-action {{Auth::check()? 'addFav':''}}" 
                        {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$s_pet->id_product"}} >
                          <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$s_pet->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                        <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare">
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
                          @for ($i = 0; $i < $s_pet->rating; $i++)
                          <i class="bi bi-star-fill text-warning"></i>                              
                          @endfor
                        <span><small>{{$s_pet->rating}}</small></span>
                      </div>
                    </div>
                    <div class="d-grid mt-2"><a href="#!" class="btn btn-primary ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-plus">
                          <line x1="12" y1="5" x2="12" y2="19"></line>
                          <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg> Add to cart </a></div>
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
                <p>Get your order delivered to your doorstep at the earliest from FreshCart pickup stores near you.</p>
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
@section('modal')
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
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
@endsection
@section('script')
    <script>
      $(document).ready(function(){
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
          $('.addFav').click(function(){
              $(this).children().toggleClass('bi-heart').toggleClass('bi-heart-fill text-danger');
            $.get(window.location.href+'/ajax/favourite/'+$(this).data('bsIdproduct'),function(data){
              $('.countFav').html(data);
            })
          });
          $('.addToCart').click(function(){
            const toast = new bootstrap.Toast($('#liveToast'))
            toast.show()
            $.get(window.location.href+"/ajax/"+$(this).data('bsId'),function(data){
              $('.countCart').html(data);
            });
          })
          $('#btn_minus').click(function(e){
              e.preventDefault();
              let current = parseInt($('input[name=quan]').val());
              if(current >1){
                current--;
                $('input[name=quan]').val(current);
              }
          });
          $('#btn_plus').click(function(e){
              e.preventDefault();
              let max = parseInt($('#quantityModal').text());
              let current = parseInt($('input[name=quan]').val());
              console.log(current );
              if(max>current){
                current++;
                $('input[name=quan]').val(current);
              }
          });
          $('input[name=quan]').on('focusout',function(e){
              e.preventDefault();
              let validateNum =/^\d{1,10}$/;
              let currentVl = $(this).val();
              $(this).val(validateNum.test(currentVl)?currentVl:1);
          });
      })
    </script>
@endsection