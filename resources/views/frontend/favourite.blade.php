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
                <li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <section class="mt-8 mb-14">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-8">
              <h1 class="mb-1">My Favourite</h1>
              <p>There are {{count($favourites)}} products in this wishlist.</p>
            </div>
            <div>
              <div class="table-responsive">
                <form action="{{route('favourite')}}" method="post">
                  @csrf
                  <table class="table text-nowrap table-with-checkbox">
                    <thead class="table-light">
                      <tr>
                        <th>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAll" name="checkAll">
                            <label class="form-check-label" for="checkAll">
                            </label>
                          </div>
                        </th>
                        <th>Pet Image</th>
                        <th>Pet Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($favourites)== 0)
                        <tr >
                          <td colspan="6">There are no any pet in your favourite list</td>
                        </tr>
                      @else                    
                        @foreach ($favourites as $fav)
                        <tr>
                          <td class="align-middle">
                            <div class="form-check">
                              <input class="form-check-input" name="checkFav[]" type="checkbox" value="{{$fav->id_fa}}" id="checkFav">
                            </div>
                          </td>
                          <td class="align-middle">
                            <a href="{{route('productdetail',$fav->id_product)}}"><img src="{{asset('resources/image/pet/'.$fav->Product->image)}}" class="icon-shape" width="80" height="80" alt="" style="object-fit: cover"></a>
                          </td>
                          <td class="align-middle">
                            <div>
                              <h5 class="fs-6 mb-0"><a href="{{route('productdetail',$fav->id_product)}}" class="text-inherit">{{$fav->Product->product_name}}</a></h5>
                              <small>{{$fav->Product->Breed->TypeProduct->name_type}}</small>
                            </div>
                          </td>
                          <td class="align-middle">${{$fav->Product->per_price}}</td>
                          <td class="align-middle">
                            @if ($fav->Product->quantity>0)
                            <span class="badge bg-success">In Stock</span></td>
                            @else
                            <span class="badge bg-danger">Out of Stock</span>
                            @endif
                          <td class="align-middle">
                            @if ($fav->Product->quantity>0)
                            <div class="btn btn-primary btn-sm"><a  class="addToCart " style="color: #ffffff" data-idpet="{{$fav->id_product}}" >Add to Cart</a></div>
                            @else
                            <div class="btn btn-dark btn-sm"><a>Contact us</a></div>
                            @endif
                          </td>
                        </tr> 
                      @endforeach
                      @endif
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5">
                          <input type="submit" class="btn btn-outline-danger" name="removeFav" value="Remove Selected Pets">
                        </td>
                        <td colspan="1">
                          <input type="submit" class="btn btn-primary fs-4" name="addToCart" value="Buy now" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Caution: You need select which Pet you want before go to order side ">
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>  
@endsection
@section('modal')
<div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
  <div role="alert"  id="toastAdd" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
      <div class="toast-body" style="height: 100px; padding:30px 0">
        <div class="row">
          <div class="col-2 mb-3 mx-auto">
            <i class="fa-solid fa-cart-circle-check" style="color: #2ec27e; font-size: 2.3rem"></i>
          </div>
          <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;" id="messCompare">Add pet to cart successully</h4>
        </div>
      </div>
  </div>
</div>
@endsection
@section('script')
    <script>
      $(document).ready(function(){
          $('.addToCart').click(function(){
            const toast = new bootstrap.Toast($('#toastAdd'))
            toast.show();
            $.get(window.location.origin+"/index.php/ajax/"+$(this).data('idpet'),function(data){
              $('.countCart').html(data);
            });
          });
      })
    </script>
@endsection