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
            <div class="product position-relative" id="product">
              <div class="zoom" onmousemove="zoom(event)" style="z-index: 0;{{$pet->quantity ==0 ? 'filter: blur(4px)':''}};background-image: url(resources/image/pet/{{isset($pet->Library[0]->image)? $pet->Library[0]->image: 'no_image.jpg'}}); object-fit: contain;background-repeat: no-repeat;max-height: 400px" >
                <img src="{{asset('resources/image/pet/'.$pet->Library[0]->image)}}" alt="{{$pet->product_name}}"  style="background-color: #ffffff; max-height: 400px; object-fit: contain">
              </div>
              @if ($pet->quantity ==0)
                  <div class="position-absolute w-100" style="z-index: 2; top:10px">
                    <img src="{{asset('resources/image/icons/sold-out.svg')}}" style="height:200px" class="img-fluid" alt="">
                  </div>
              @endif
            </div>
            <div class="product-tools ">
              @if (count($pet->Library)>0)
              <div class="thumbnails slider_nav row g-3" id="productThumbnails">
                  @foreach ($pet->Library as $lib)
                      <div class="col-3">
                          <div class="thumbnails-img">
                              <img src="{{ asset('resources/image/pet/' . $lib->image) }}">
                          </div>
                      </div>
                  @endforeach
              </div>
              @endif
          </div>
          </div>
          <div class="col-md-6">
            <div class="ps-lg-10 mt-6 mt-md-0">
                <a href="#!" class="mb-4 d-block">{{$pet->Breed->breed_name}}</a>
                <h1 class="mb-1">{{$pet->product_name}}</h1>
                <div class="mb-4 text-warning">
                  @php
                      $rating = 0;
                      if (count($pet->Comment->where('rating','!=',null)) >0) {
                        foreach ($pet->Comment->where('rating','!=',null) as $cmt) {
                          $rating += $cmt->rating;
                        }
                        $rating /= count($pet->Comment->where('rating','!=',null));
                      }
                  @endphp
                  <p>
                    @for ($i = 0; $i < floor($rating); $i++)
                    <i class="bi bi-star-fill fs-4 text-warning"></i>
                    @endfor
                    @if (is_float($rating))
                    <i class="bi bi-star-half fs-4 text-warning"></i>
                    @endif
                    @for ($i = 0; $i < 5-ceil($rating); $i++)
                    <i class="bi bi-star fs-4 text-warning"></i>
                    @endfor
                    <span class="text-black-50 ms-3">({{round($rating,2)}})</span>
                  </p>
                  <span class="ms-2 text-primary">({{count($pet->Comment->where('rating','!=',null))}} solds)</span>
                </div>
                <div class="fs-4">
                  <span class="fw-bold text-dark fs-4">${{$pet->sale>0? $pet->per_price *(1-$pet->sale/100) : $pet->per_price}}</span> 
                  @if ($pet->sale>0)
                  <span class="text-decoration-line-through text-muted">${{$pet->per_price}}</span><span><small class="fs-6 ms-2 text-danger">{{$pet->sale}}% Off</small></span>
                  @endif
                </div>
                <hr class="my-6">
                <div class="mb-5">
                  <button type="button" class="btn btn-outline-secondary">Left: {{$pet->quantity}}</button>
                </div>
                <form action="{{route('productdetail',[$pet->id_product])}}" method="post">
                    @csrf
                    <input type="hidden" name="id_pro" value="{{ $pet->id_product }}">
                    <input type="hidden" name="max_quan" value="{{ $pet->quantity }}">
                    <div>
                        <div class="d-flex flex-row  ">
                            <button type="button" class="btn btn-outline-secondary btn_minus"
                                style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-dash-lg"></i>
                            </button>
                            <input type="text" name="quan"
                                class="border border-secondary text-center pt-1 fs-4 text-secondary"
                                style="width: 50px;" value="1" />
                            <button type="button" class="btn btn-outline-secondary btn_plus"
                                style="border-radius: 0 10px 10px 0;">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3 row justify-content-start g-2 align-items-center ">
                        <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid ">
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                            </button>
                        </div>
                        <div class="col-md-4 col-4 mx-auto">
                            <a class="btn btn-light compare_product" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Compare"
                                data-bs-product="{{ $pet->id_product }}">
                                <i class="bi bi-arrow-left-right"></i>
                            </a>
                            <a class="btn btn-light {{ Auth::check() ? 'addFav' : '' }}"
                                {{ !Auth::check() ? 'data-bs-toggle=modal data-bs-target=#userModal href=#!' : "data-bs-toggle=tooltip data-bs-html=true title=Wishlist data-bs-idproduct=$pet->id_product" }}>
                                <i class="bi {{ Auth::check() ? (count(Auth::user()->Favourite->where('id_product', '=', $pet->id_product)) > 0 ? 'bi-heart-fill text-danger' : 'bi-heart') : 'bi-heart' }}"></i>
                            </a>
                        </div>
                    </div>
                </form>
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
                    <h5 class="mb-1">Left: </h5>
                    <p class="mb-0">{{$pet->quantity}}</p>
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
                    <div class="col-md-4">
                      <div class="me-lg-12 mb-6 mb-md-0">
                          <div class="mb-5">
                              <h4 class="mb-3">Customer reviews</h4>
                              <span>
                                  <small class="text-warning">
                                      @php
                                          $rating2 = 0;
                                          if (count($pet->Comment->where('rating', '<>', null)) > 0) {
                                              foreach ($pet->Comment->where('rating', '<>', null) as $comt) {
                                                  $rating2 += $comt->rating;
                                              }
                                              $rating2 /= count($pet->Comment->where('rating', '<>', null));
                                          }
                                      @endphp
                                      @for ($i = 0; $i < floor($rating2); $i++)
                                          <i class="bi bi-star-fill"></i>
                                      @endfor
                                      @if (is_float($rating2))
                                          <i class="bi bi-star-half"></i>
                                      @endif
                                      @for ($i = 0; $i < 5 - ceil($rating2); $i++)
                                          <i class="bi bi-star"></i>
                                      @endfor
                                  </small>
                                  <span class="ms-3">{{ number_format($rating2, 2, '.', ' ') }}
                                      out
                                      of 5</span><small
                                      class="ms-3">{{ count($pet->Comment->where('rating', '<>', null)) }}
                                      customer ratings</small>
                              </span>
                          </div>
                          <div class="mb-8">
                              @if (count($pet->Comment->where('rating', '<>', null)) > 0)
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">5</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar"
                                                  style="width: {{ (count($pet->Comment->where('rating', '=', 5)) / count($pet->Comment->where('rating', '!=', null))) * 100 }}%;"
                                                  aria-valuenow="{{ (count($pet->Comment->where('rating', '=', 5)) / count($pet->Comment->where('rating', '!=', null))) * 100 }}"
                                                  aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div>
                                      <span
                                          class="text-muted ms-3">{{number_format((count($pet->Comment->where('rating','=',5))/count($pet->Comment->where('rating','!=',null)))*100,0,'','')}}%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">4</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar"
                                                  style="width: {{ (count($pet->Comment->where('rating', '=', 4)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}%;"
                                                  aria-valuenow="{{ (count($pet->Comment->where('rating', '=', 4)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}"
                                                  aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div><span
                                          class="text-muted ms-3">{{number_format(((count($pet->Comment->where('rating','=',4))/count($pet->Comment->where('rating','<>',null)))*100),0,'','')}}%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">3</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar"
                                                  style="width: {{ (count($pet->Comment->where('rating', '=', 3)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}%;"
                                                  aria-valuenow="{{ (count($pet->Comment->where('rating', '=', 3)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}"
                                                  aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div><span
                                          class="text-muted ms-3">{{number_format(((count($pet->Comment->where('rating','=',3))/count($pet->Comment->where('rating','<>',null)))*100),0,'','')}}%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">2</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar"
                                                  style="width: {{ (count($pet->Comment->where('rating', '=', 2)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}%;"
                                                  aria-valuenow="{{ (count($pet->Comment->where('rating', '=', 2)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}"
                                                  aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div><span
                                          class="text-muted ms-3">{{number_format(((count($pet->Comment->where('rating','=',2))/count($pet->Comment->where('rating','<>',null)))*100),0,'','')}}%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">1</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar"
                                                  style="width: {{ (count($pet->Comment->where('rating', '=', 1)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}%;"
                                                  aria-valuenow="{{ (count($pet->Comment->where('rating', '=', 1)) / count($pet->Comment->where('rating', '<>', null))) * 100 }}"
                                                  aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div><span
                                          class="text-muted ms-3">{{number_format(((count($pet->Comment->where('rating','=',1))/count($pet->Comment->where('rating','<>',null)))*100),0,'','')}}%</span>
                                  </div>
                              @else
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">5</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar" style="width: 0%;"
                                                  aria-valuenow="0" aria-valuemin="0"
                                                  aria-valuemax="100"></div>
                                          </div>
                                      </div>
                                      <span class="text-muted ms-3">0%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">4</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar" style="width: 0%;"
                                                  aria-valuenow="0" aria-valuemin="0"
                                                  aria-valuemax="100"></div>
                                          </div>
                                      </div><span class="text-muted ms-3">0%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">3</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar" style="width: 0%;"
                                                  aria-valuenow="0" aria-valuemin="0"
                                                  aria-valuemax="100"></div>
                                          </div>
                                      </div><span class="text-muted ms-3">0%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">2</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar" style="width: 0%;"
                                                  aria-valuenow="0" aria-valuemin="0"
                                                  aria-valuemax="100"></div>
                                          </div>
                                      </div><span class="text-muted ms-3">0%</span>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                      <div class="text-nowrap me-3 text-muted">
                                          <span
                                              class="d-inline-block align-middle text-muted">1</span>
                                          <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                      </div>
                                      <div class="w-100">
                                          <div class="progress" style="height: 6px;">
                                              <div class="progress-bar bg-warning"
                                                  role="progressbar" style="width: 0%;"
                                                  aria-valuenow="0" aria-valuemin="0"
                                                  aria-valuemax="100"></div>
                                          </div>
                                      </div><span class="text-muted ms-3">0%</span>
                                  </div>
                              @endif
                          </div>
                      </div>
                  </div>
                    <div class="col-md-8 mx-auto d-flex flex-column justify-content-center align-items-start">
                      <div class="mb-10">
                          <h4>Comment</h4>
                      </div>
                      @if (Auth::check())
                      <div class="row mb-3 w-100">
                        <div class="col-md-2 col-lg-1">
                            <img src="../resources/image/user/{{Auth::user()->image ?Auth::user()->image : 'user.png'}}" alt="" class="rounded-circle" width="48px" height="48px" style="object-fit: cover">
                        </div>
                        <div class="col-lg-11 col-md-10 d-flex flex-column ">
                            <form action="{{route('addComment')}}" method="post">
                            @csrf
                                <input type="hidden" name="id_product" value="{{$pet->id_product}}">
                                <div id="printf"></div>
                                <div class="mb-3">
                                    <textarea name="comment" id="comment"rows="3" class="form-control"></textarea>
                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <span class="text-black-50 count-word"></span>
                                    <input type="submit" value="Post" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                      </div>
                      @endif
                      <div class="mb-10 w-100">
                        @if (count($pet->Comment) ==0)
                            <div class="text-center">
                              <h4>There are no comment</h4>
                            </div>
                        @endif
                        @foreach ($comments as $cmt)     
                          <div class="row border-bottom pb-6 mb-6">
                            @if ($cmt->id_user == null)
                              <img src="{{asset('resources/image/user/user.png')}}" alt="" class="rounded-circle col-1" width="48px" height="48px" style="object-fit: cover">
                            @else
                              <img src="{{asset('resources/image/user/'.($cmt->User->image != null? $cmt->User->image: "user.png"))}}" alt=""  class="rounded-circle col-1" width="48px" height="48px" style="object-fit: cover">
                            @endif
                            <div class="ms-5 col-10 mx-auto">
                              <div class="row">
                                <h5 class="col-11">
                                  {{$cmt->id_user == null ? $cmt->name:$cmt->User->name}}
                                </h5>
                                <div class="col-1 dropdown">
                                  <a class="dropdown-toggle commt-edit" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis fa-xl"></i>
                                  </a>
                                  @if (Auth::check()&&$cmt->id_user == Auth::user()->id_user)
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item edit_btn" href="#collapseEdit{{$cmt->id_comment}}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseEdit{{$cmt->id_comment}}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{route('delete_cmt',$cmt->id_comment)}}">Delete</a></li>
                                  </ul>
                                  @endif
                                </div>
                              </div>
                              <p class="small"> <span class="text-muted">{{($cmt->created_at != $cmt->updated_at) && $cmt->updated_at!=null ? $cmt->updated_at ." ( edited )": $cmt->created_at}}</span>
                                @if($cmt->verified)
                                  <span class="text-success ms-3 fw-bold">Verified Purchase</span>
                                @else
                                  <span class="text-danger ms-3 fw-bold">Unverified Purchase</span>	      
                                @endif
                              </p>
                              <div class=" mb-2 current_rating">
                                @if (isset($cmt->rating))
                                @for ($i = 0; $i < $cmt->rating; $i++)
                                <i class="bi bi-star-fill text-warning fs-4"></i>                                  
                                @endfor
                                @for ($i = 0; $i < 5-$cmt->rating; $i++)
                                <i class="bi bi-star text-warning fs-4"></i>
                                @endfor
                                @endif
                              </div>
                              <p class="current_cmt">{{$cmt->context}}</p>
                              <div class="collapse" id="collapseEdit{{$cmt->id_comment}}">
                                <form action="{{route('edit_cmt',$cmt->id_comment)}}" method="post">
                                  @csrf
                                  @if ($cmt->rating!=null && $cmt->verified)
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="hidden" class="stop1">
                                        <input type="radio" name="rating_cmt" class="btn-check" id="rating{{$cmt->id_comment}}-btn1" autocomplete="off" value="1" {{$cmt->rating == 1 ? "checked":''}}>
                                        <label class="btn-cus text-warning" for="rating{{$cmt->id_comment}}-btn1" >
                                            <i class="fa-light fa-star" style="font-size:1.3rem;{{ $cmt->rating >=1 ? 'font-weight: 900':'font-weight: 400'}}"></i>
                                        </label>
                                        <input type="radio" name="rating_cmt" class="btn-check" id="rating{{$cmt->id_comment}}-btn2" autocomplete="off" value="2" {{$cmt->rating == 2 ? "checked":''}}>
                                        <label class="btn-cus text-warning" for="rating{{$cmt->id_comment}}-btn2">
                                            <i class="fa-light fa-star" style="font-size:1.3rem;{{ $cmt->rating >=2 ? 'font-weight: 900':'font-weight: 400'}}" ></i>
                                        </label>
                                        <input type="radio" name="rating_cmt" class="btn-check" id="rating{{$cmt->id_comment}}-btn3" autocomplete="off" value="3" {{$cmt->rating == 3 ? "checked":''}}>
                                        <label class="btn-cus text-warning" for="rating{{$cmt->id_comment}}-btn3">     
                                            <i class="fa-light fa-star" style="font-size:1.3rem; {{ $cmt->rating>=3 ? 'font-weight: 900':'font-weight: 400'}}"></i>                                    
                                        </label>
                                        <input type="radio" name="rating_cmt" class="btn-check" id="rating{{$cmt->id_comment}}-btn4" autocomplete="off" value="4" {{$cmt->rating == 4 ? "checked":''}}>
                                        <label class="btn-cus text-warning" for="rating{{$cmt->id_comment}}-btn4">
                                            <i class="fa-light fa-star" style="font-size:1.3rem;{{ $cmt->rating >=4 ? 'font-weight: 900':'font-weight: 400'}}"></i>
                                        </label>
                                        <input type="radio" name="rating_cmt" class="btn-check" id="rating{{$cmt->id_comment}}-btn5" autocomplete="off" value="5" {{$cmt->rating == 5 ? "checked":''}}>
                                        <label class="btn-cus text-warning" for="rating{{$cmt->id_comment}}-btn5">
                                            <i class="fa-light fa-star" style="font-size:1.3rem; {{ $cmt->rating >=5 ? 'font-weight: 900':'font-weight: 400'}}"></i>
                                        </label>
                                        <input type="hidden" class="stop2">
                                    </div>    
                                  @endif
                                  <div class="mb-3">
                                      <textarea name="content_cmt" rows="3" class="form-control content_fb">{{$cmt->context}}</textarea>
                                  </div>
                                  <div class="mb-3 row">
                                      <button type="button" class="btn btn-secondary col-2 btn-cancel" data-bs-target="#collapseEdit{{$cmt->id_comment}}" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseEdit{{$cmt->id_comment}}">Cancel</button>
                                      <div class="col-1"></div>
                                      <button class="btn btn-primary col-2 btn_submit_edit " type="submit" disabled>Save Change</button>
                                  </div>
                                </form>
                              </div>
                              <div class="d-flex justify-content-between mt-4">
                                <div>
                                  @if (Auth::check())
                                  <a class="like_it me-2" data-idcmt="{{$cmt->id_comment}}" ><i class="{{$cmt->Like->where('id_user','=', Auth::user()->id_user)->first()? 'fa-solid' : 'fa-regular'}} fa-thumbs-up fa-xl"></i></a><span>{{count($cmt->Like)}}</span>
                                  @else
                                  <a href="#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal" ><i class="fa-regular fa-thumbs-up fa-xl me-3"></i> Like</a>
                                  @endif      
                                </div>
                                <div >
                                  @if (Auth::check())
                                  <a class="text-muted" data-bs-toggle="collapse" href="#collapseReply{{$cmt->id_comment}}" role="button" aria-expanded="false" aria-controls="collapseReply" >Reply</a>
                                  @else
                                  <a href="#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal" >
                                    Reply
                                  </a>
                                  @endif
                                  <a href="{{route('contact')}}" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report abuse</a>
                                </div>
                              </div>
                            </div>
                            
                            @if (Auth::check())
                            <div class="collapse mt-6" id="collapseReply{{$cmt->id_comment}}">
                              <div class="row">
                                <div class="col-md-2 col-lg-1 mt-5">
                                  <i class="fa-solid fa-arrow-turn-down-right text-black-50" style="font-size:1.6rem;"></i>
                                </div>
                                  <div class="col-md-2 col-lg-1">
                                    <img src="resources/image/user/{{Auth::user()->image ?Auth::user()->image : 'user.png'}}" alt="" class="rounded-circle" width="48px" height="48px" style="object-fit: cover">
                                </div>
                              <div class="col-lg-10 col-md-8 d-flex flex-column ">
                                  <form action="{{route('addComment',$cmt->id_comment)}}" method="post">
                                  @csrf
                                      <input type="hidden" name="id_product" value="{{$pet->id_product}}">
                                      <div id="printf"></div>
                                      <div class="mb-3">
                                          <textarea name="comment" id="comment"rows="3" class="form-control"></textarea>
                                      </div>
                                      <div class="d-flex flex-row justify-content-between">
                                          <span class="text-black-50 count-word"></span>
                                          <input type="submit" value="Post" class="btn btn-primary">
                                      </div>
                                  </form>
                              </div>
                              </div>                            
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
                            @endforeach
                          @endif
                        @endforeach
                      </div>
                      
                      @if (!Auth::check())
                      <div class="text-center w-100">
                        <h3><a class="h3 text-primary" href="{{route('signin')}}">Sign in</a> or <a class="h3 text-primary" href="{{route('signup')}}">Sign up</a> to create comment for pet</h3>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab"
                tabindex="0">...</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="my-lg-14 my-14">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h3>Related Items</h3>
          </div>
        </div>
        <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
          @foreach ($list_relate as $pet)
          <div class="col" >
            <div class="card card-product" style="height: 380px">
              <div class="card-body">
                <div class="text-center position-relative d-flex flex-column justify-content-center align-items-center">
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
                    <a href="{{route('productdetail',$pet->id_product)}}" >
                      <img src="{{asset('resources/image/pet/'.$pet->Library[0]->image)}}" alt="{{$pet->product_name}}"class="mb-3 img-fluid mx-auto" style="width: 212px; height: 212px; object-fit: contain"></a>
                    <div class="card-product-action">
                      <a href="#!" class="btn-action btn_modal" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-bs-product="{{$pet->id_product}}"><i
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
                  <a href="{{route('productlist',[$pet->Breed->TypeProduct->name_type,$pet->Breed->breed_name])}}" class="text-decoration-none text-muted">
                    <small>{{$pet->Breed->breed_name}}</small>
                  </a>
                </div>
                <h2 class="fs-6">
                  <a href="{{route('productdetail',$pet->id_product)}}" class="text-inherit text-decoration-none">{{$pet->product_name}}</a>
                </h2>
                <div>
                  <p >
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
                    <span class="text-black-50 ms-3">({{number_format($rating,2)}})</span>
                  </p> 
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
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
                          </svg> Add
                        </button>
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
