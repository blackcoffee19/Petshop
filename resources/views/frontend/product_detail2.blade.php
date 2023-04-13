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
              <div class="zoom" onmousemove="zoom(event)" style="z-index: 0;{{$pet->quantity ==0 ? 'filter: blur(4px)':''}};background-image: url(resources/image/pet/{{isset($pet->image)? $pet->image: 'no_image.jpg'}}); object-fit: contain;background-repeat: no-repeat" >
                <img src="{{asset('resources/image/pet/'.$pet->image)}}" alt="{{$pet->product_name}}" style="background-color: #ffffff">
              </div>
              @if ($pet->quantity ==0)
                  <div class="position-absolute w-100" style="z-index: 2; top:10px">
                    <img src="{{asset('resources/image/icons/sold-out.svg')}}" style="height:200px" class="img-fluid" alt="">
                  </div>
              @endif
            </div>
            {{-- <div class="product-tools">
              <div class="thumbnails row g-3" id="productThumbnails">
                <div class="col-3">
                  <div class="thumbnails-img">
                    <img src="{{asset('resources/image/pet/bapcai2.webp')}}" alt="">
                  </div>
                </div><div class="col-3">
                  <div class="thumbnails-img">
                    <img src="{{asset('resources/image/pet/bapcai3.jpg')}}" alt="">
                  </div>
                </div><div class="col-3">
                  <div class="thumbnails-img">
                    <img src="{{asset('resources/image/pet/bapcai4.jpg')}}" alt="">
                  </div>
                </div><div class="col-3">
                  <div class="thumbnails-img">
                    <img src="{{asset('resources/image/pet/bapcai5.jpg')}}" alt="">
                  </div>
                </div>
              </div>
            </div> --}}
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
                  <button type="button" class="btn btn-outline-secondary">{{$pet->weight}}kg</button>
                </div>
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
                  <a class="btn btn-light compare_pet" role="button" data-bs-toggle="tooltip" title="Compare" data-bs-html="true" aria-label="Compare" data-bs-product="{{$pet->id_product}}"><i class="bi bi-arrow-left-right"></i></a>
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
                    <p class="mb-0">Sos Fresh tomato
                    </p>
                  </div>
                  <div class="mb-5">
                    <h5 class="mb-1">Unit</h5>
                    <p class="mb-0">{{$pet->quantity}} kg</p>
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
                                    <img src="../resources/image/user/{{Auth::user()->image ?Auth::user()->image : 'user.png'}}" alt="" class="rounded-circle" width="48px" height="48px" style="object-fit: cover">
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
                <div class="text-center position-relative d-flex flex-column justify-content-center align-items-center" style="height: 50%">
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
                    <a href="{{route('productdetail',$pet->id_product)}}" class="h-100">
                      <img src="{{asset('resources/image/pet/'.$pet->image)}}" alt="{{$pet->product_name}}"class="mb-3 img-fluid h-100" style="object-fit: contain"></a>
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
                <div class="text-small mb-1"><a href="{{route('productlist',[$pet->Breed->TypeProduct->name_type,$pet->Breed->breed_name])}}" class="text-decoration-none text-muted"><small>{{$pet->Breed->breed_name}}</small></a></div>
                <h2 class="fs-6"><a href="{{route('productdetail',$pet->id_product)}}" class="text-inherit text-decoration-none">{{$pet->product_name}}</a></h2>
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
                    <span class="text-black-50 ms-3">({{$rating}})</span>
                  </p> 
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
            <tbody class="compare_detail">
              
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
      // $('#count-word').text($('#comment').value.length+ " /1000 characters");
      $('#comment').focusout(function(e){
          e.preventDefault();
          let num = $(this).val().length;
          $.get(window.location.href,function(data){
              $('.count-word').text(num + " /1000 characters");
              if(num>1000){
                  $('.count-word').removeClass('text-black-50').addClass('text-danger');
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
      $('.btn_modal').click(function(){
        $.get(window.location.origin+"/index.php/ajax/modal/"+$(this).data('bsProduct'),function(data){
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
          $('.compare_detail').html(data);  
        })
      });
      $('.addToCart').click(function(){
        const toast = new bootstrap.Toast($('#liveToast'))
        toast.show();
        $.get(window.location.origin+"/index.php/ajax/"+$(this).data('bsId'),function(data){
          $('.countCart').html(data);
        });
      });
      $('.like_it').click(function(){
        if($(this).children().hasClass('fa-solid')){
          $(this).children().removeClass('fa-solid');
          $(this).children().addClass('fa-regular');
          let num =parseInt($(this).next().text()); 
          $(this).next().text(num-1);
          $.get(window.location.origin+"/index.php/ajax/delete-like/"+$(this).data('idcmt'),function(data){});
        }else{
          $(this).children().removeClass('fa-regular');
          $(this).children().addClass('fa-solid');
          let num =parseInt($(this).next().text());
          $(this).next().text(num+1);
          $.get(window.location.origin+"/index.php/ajax/add-like/"+$(this).data('idcmt'),function(data){});
        };

      });
      $('.edit_btn').click(function(){
        $(this).parents('.col-10').children('.current_rating').hide();
        $(this).parents('.col-10').children('.current_cmt').hide();
      });
      $('.btn-cancel').click(function(){
        $('.current_rating, .current_cmt').show();
      });
      $('input[name=content_cmt]').change(function(){
        $('.btn_submit_edit').removeAttr('disabled');
      });
      $('input[name=rating_cmt]').change(function(){
        $('.btn_submit_edit').removeAttr('disabled');
      })
  })
</script>
@endsection
