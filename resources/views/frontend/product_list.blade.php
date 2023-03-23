@extends('welcome');
@section('content')
<div class="container-fluid position-relative" style="background-color: #f0e9f7; min-height: 680px">
    <div class="row py-3">
        <nav aria-label="breadcrumb col-12">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              @if ($breed_name)
              <li class="breadcrumb-item"><a href="{{route('productlist',$type_name)}}" class="text-capitalize">{{$type_name}}</a></li>  
              <li class="breadcrumb-item active text-capitalize" aria-current="page">{{$breed_name}}</li>  
              @else
              <li class="breadcrumb-item active text-capitalize" aria-current="page">{{$type_name}}</li>    
              @endif
            </ol>
          </nav>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-4 bg-light p-3 rounded shadow " style="height: fit-content;">
            <div class="d-flex flex-column w-100 ps-lg-4 ps-md-1">
                <form action="{{route('productlist')}}" method="GET">
                    <div class="input-group mb-1">
                        <input type="search" name="search2" id="search2" class="form-control" placeholder="SEARCH ITEM">
                        <button type="submit" class="input-group-text bg-white text-primary"><i class="fa-regular fa-magnifying-glass"></i></button>
                    </div>
                </form>
                    <hr>
                <select class="form-select text-black-50 mb-1" id="sort_type" autocomplete="off">
                    <option value="asc" {{$sort_type == "asc"? "selected": ""}}>Ascending</option>
                    <option value="desc" {{$sort_type == "desc"? "selected": ""}}>Descending</option>
                </select>
                <hr>
                <select class="form-select text-black-50" id="select_type">
                    <option selected>CATEGORIES</option>
                    @foreach ($types as $type)
                        <option value="{{$type->name_type}}">{{$type->name_type}}</option>
                    @endforeach
                </select>
                <form action="{{route('productlist')}}" method="GET">
                    @foreach ($types as $type)
                        <div class="w-100 mt-3">
                            <a role="button" class="text-black-50 text-decoration-none fs-5 d-flex flex-row justify-content-between text-capitalize" data-bs-toggle="collapse" href="#{{$type->name_type}}" role="button" aria-expanded="false" aria-controls="{{$type->name_type}}">
                                {{$type->name_type}}
                                <span class="me-2"><i class="fa-regular fa-chevron-down"></i></span>
                            </a>
                            <div class="collapse {{count($type->Breed->whereIn('id_breed',$breed_get))>0|| count($type->Breed->where('breed_name','=',$breed_name))>0? 'show':''}}"id="{{$type->name_type}}">
                                <div class="form-check form-check-reverse">
                                    @foreach ($type->Breed as $breed)
                                    <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                        <label class="form-check-label" for="breed">{{$breed->breed_name}}</label>
                                        <input class="form-check-input" type="checkbox" name="breed[]" value="{{$breed->id_breed}}" {{$breed->breed_name == $breed_name ? "checked": ''}} {{in_array($breed->id_breed,$breed_get) ? 'checked':''}}>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="w-100 mt-3">
                        <a role="button" class="text-black-50 text-decoration-none fs-5 d-flex flex-row justify-content-between" data-bs-toggle="collapse" href="#age" role="button" aria-expanded="false" aria-controls="color">Age<span class="me-2"><i class="fa-regular fa-chevron-down"></i></span></span></a>
                        <div class="collapse {{$age_get != 0? 'show':''}}"id="age">
                            <div class="form-check form-check-reverse">
                                <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                    <label class="form-check-label" for="age">Young (<= 3 month old)</label>
                                    <input class="form-check-input" type="radio" name="age" value="3" {{$age_get == 3 ?"checked":''}}>
                                </div>
                                <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                    <label class="form-check-label" for="age">Mature (<= 6 month)</label>
                                    <input class="form-check-input" type="radio" name="age" value="6" {{$age_get == 6 ?"checked":''}}>
                                </div>
                                <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                    <label class="form-check-label" for="age">Old (> 12 years)</label>
                                    <input class="form-check-input" type="radio" name="age" value="12"{{$age_get == 12 ?"checked":''}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 mt-3">
                        <a role="button" class="text-black-50 text-decoration-none fs-5 d-flex flex-row justify-content-between" data-bs-toggle="collapse" href="#price" role="button" aria-expanded="false" aria-controls="price">Price<span class="me-2"><i class="fa-regular fa-chevron-down"></i></span></span></a>
                        <div class="collapse {{$price_get != 0? 'show':''}}"id="price">
                            <div class="form-check form-check-reverse">
                                <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                    <label class="form-check-label" for="price">0 - $10</label>
                                    <input class="form-check-input" type="radio" name="price" value="10" {{$price_get==10?"checked":''}}>
                                </div>
                                <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                    <label class="form-check-label" for="price">$10 - $20</label>
                                    <input class="form-check-input" type="radio" name="price" value="20" {{$price_get==20?"checked":''}}>
                                </div>
                                <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                    <label class="form-check-label" for="price">$20 - $30</label>
                                    <input class="form-check-input" type="radio" name="price" value="30" {{$price_get==30?"checked":''}}>
                                </div>
                                <div class="d-flex flex-row justify-content-between my-1 ms-lg-5 ms-md-2">
                                    <label class="form-check-label" for="price"> > $30 </label>
                                    <input class="form-check-input" type="radio" name="price" value="99999" {{$price_get==99999?"checked":''}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="w-100 mt-3">
                        <a href="{{route('productlist')}}"class="btn btn-secondary">Reset</a>
                        <input type="submit" value="Filter" class="btn btn-primary" id="sortPet">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 row ms-2" id="list-pets">
            @if (count($list_pets)>0)
                @foreach ($list_pets as $pet)
                    <div class="card col-sm-5 col-md-4 col-lg-3 mx-sm-auto ms-md-2 p-0 mb-3 card-item" >
                        <div class="card-header d-flex flex-row justify-content-between align-items-center">
                            <div>
                            @if ($pet->sale !=0)
                            <span class="badge bg-success me-3">-{{$pet->sale}}%</span>
                            @endif
                            @php 
                                $today =new DateTime();
                                $pet_createdate = DateTime::createFromFormat('Y-m-d H:i:s',$pet->created_at);
                                if($today->diff($pet_createdate)->format('%a') <4){
                                  echo "<span class='badge bg-danger'>HOT</span>";
                                }
                            @endphp
                            </div>
                            <a class="btn-action {{Auth::check()? 'addFav':''}}" 
                                {{!Auth::check() ?'data-bs-toggle=modal data-bs-target=#userModal href=#!': "data-bs-toggle='tooltip' data-bs-html='true' title='Wishlist' data-bs-idproduct=$pet->id_product"}} >
                                <i class="bi {{Auth::check() ? (count(Auth::user()->Favourite->where('id_product','=',$pet->id_product))>0 ? 'bi-heart-fill text-danger' : 'bi-heart'): 'bi-heart'}}"></i></a>
                        </div>
                        <div class="card-img-top h-50 d-flex flex-row justify-content-center align-content-center" style="height: 230px;">
                            <a class="h-100" href="{{route('productdetail',[$pet->id_product])}}">
                                <img src="{{asset('/resources/image/pet/'.$pet['image'])}}" class="rounded-0 img-fluid h-100" style="max-height: 220px;object-fit: cover" alt="{{$pet->id_product}}" >
                            </a>
                        </div>
                        <div class="card-body h-50 d-flex flex-column justify-content-center"  style=" text-align: center;">
                            <a href="{{route('productdetail',[$pet->id_product])}}" class="card-title h4 text-decoration-none text-dark">{{$pet->product_name}}</a>
                            <p class="card-text d-md-none d-lg-block text-black-50 fw-light">Age: {{$pet->age}}
                            <br>Gender: {{$pet->gender}}</p>
                            <p class="card-text text-black-50">Price:
                            <span class="ms-5 fs-5 text-dark">${{$pet->per_price}}</span></p>
                            <div class="d-flex flex-row justify-content-around align-content-center">
                                <p class="text-warning">
                                    @for ($i = 0; $i < $pet->rating; $i++)
                                        <i class="fa-solid text-warning fa-star h5"></i>
                                    @endfor
                                    @for ($i = 0; $i < 5- $pet->rating; $i++)
                                    <i class="fa-solid text-secondary fa-star h5"></i>
                                    @endfor
                                </p>
                                <a href="{{route('productdetail',[$pet->id_product])}}" class="me-2">
                                    <i class="fa-sharp h4 fa-solid fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-8 col-md-10 mx-auto">
                <h3 class="text-center">Can't found pet</h3>    {{-- <img src="{{asset('../resources/image/undraw_void-3-ggn.svg')}" alt="not found" class="img-fluid">                 --}}
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="70%" height="70%" viewBox="0 0 797.5 834.5" xmlns:xlink="http://www.w3.org/1999/xlink"><title>void</title><ellipse cx="308.5" cy="780" rx="308.5" ry="54.5" fill="#3f3d56"/><circle cx="496" cy="301.5" r="301.5" fill="#3f3d56"/><circle cx="496" cy="301.5" r="248.89787" opacity="0.05"/><circle cx="496" cy="301.5" r="203.99362" opacity="0.05"/><circle cx="496" cy="301.5" r="146.25957" opacity="0.05"/><path d="M398.42029,361.23224s-23.70394,66.72221-13.16886,90.42615,27.21564,46.52995,27.21564,46.52995S406.3216,365.62186,398.42029,361.23224Z" transform="translate(-201.25 -32.75)" fill="#d0cde1"/><path d="M398.42029,361.23224s-23.70394,66.72221-13.16886,90.42615,27.21564,46.52995,27.21564,46.52995S406.3216,365.62186,398.42029,361.23224Z" transform="translate(-201.25 -32.75)" opacity="0.1"/><path d="M415.10084,515.74682s-1.75585,16.68055-2.63377,17.55847.87792,2.63377,0,5.26754-1.75585,6.14547,0,7.02339-9.65716,78.13521-9.65716,78.13521-28.09356,36.8728-16.68055,94.81576l3.51169,58.82089s27.21564,1.75585,27.21564-7.90132c0,0-1.75585-11.413-1.75585-16.68055s4.38962-5.26754,1.75585-7.90131-2.63377-4.38962-2.63377-4.38962,4.38961-3.51169,3.51169-4.38962,7.90131-63.2105,7.90131-63.2105,9.65716-9.65716,9.65716-14.92471v-5.26754s4.38962-11.413,4.38962-12.29093,23.70394-54.43127,23.70394-54.43127l9.65716,38.62864,10.53509,55.3092s5.26754,50.04165,15.80262,69.356c0,0,18.4364,63.21051,18.4364,61.45466s30.72733-6.14547,29.84941-14.04678-18.4364-118.5197-18.4364-118.5197L533.62054,513.991Z" transform="translate(-201.25 -32.75)" fill="#2f2e41"/><path d="M391.3969,772.97846s-23.70394,46.53-7.90131,48.2858,21.94809,1.75585,28.97148-5.26754c3.83968-3.83968,11.61528-8.99134,17.87566-12.87285a23.117,23.117,0,0,0,10.96893-21.98175c-.463-4.29531-2.06792-7.83444-6.01858-8.16366-10.53508-.87792-22.826-10.53508-22.826-10.53508Z" transform="translate(-201.25 -32.75)" fill="#2f2e41"/><path d="M522.20753,807.21748s-23.70394,46.53-7.90131,48.28581,21.94809,1.75584,28.97148-5.26754c3.83968-3.83969,11.61528-8.99134,17.87566-12.87285a23.117,23.117,0,0,0,10.96893-21.98175c-.463-4.29531-2.06792-7.83444-6.01857-8.16367-10.53509-.87792-22.826-10.53508-22.826-10.53508Z" transform="translate(-201.25 -32.75)" fill="#2f2e41"/><circle cx="295.90488" cy="215.43252" r="36.90462" fill="#ffb8b8"/><path d="M473.43048,260.30832S447.07,308.81154,444.9612,308.81154,492.41,324.62781,492.41,324.62781s13.70743-46.39439,15.81626-50.61206Z" transform="translate(-201.25 -32.75)" fill="#ffb8b8"/><path d="M513.86726,313.3854s-52.67543-28.97148-57.943-28.09356-61.45466,50.04166-60.57673,70.2339,7.90131,53.55335,7.90131,53.55335,2.63377,93.05991,7.90131,93.93783-.87792,16.68055.87793,16.68055,122.90931,0,123.78724-2.63377S513.86726,313.3854,513.86726,313.3854Z" transform="translate(-201.25 -32.75)" fill="#d0cde1"/><path d="M543.2777,521.89228s16.68055,50.91958,2.63377,49.16373-20.19224-43.89619-20.19224-43.89619Z" transform="translate(-201.25 -32.75)" fill="#ffb8b8"/><path d="M498.50359,310.31267s-32.48318,7.02339-27.21563,50.91957,14.9247,87.79237,14.9247,87.79237l32.48318,71.11182,3.51169,13.16886,23.70394-6.14547L528.353,425.32067s-6.14547-108.86253-14.04678-112.37423A33.99966,33.99966,0,0,0,498.50359,310.31267Z" transform="translate(-201.25 -32.75)" fill="#d0cde1"/><polygon points="277.5 414.958 317.885 486.947 283.86 411.09 277.5 414.958" opacity="0.1"/><path d="M533.896,237.31585l.122-2.82012,5.6101,1.39632a6.26971,6.26971,0,0,0-2.5138-4.61513l5.97581-.33413a64.47667,64.47667,0,0,0-43.1245-26.65136c-12.92583-1.87346-27.31837.83756-36.182,10.43045-4.29926,4.653-7.00067,10.57018-8.92232,16.60685-3.53926,11.11821-4.26038,24.3719,3.11964,33.40938,7.5006,9.18513,20.602,10.98439,32.40592,12.12114,4.15328.4,8.50581.77216,12.35457-.83928a29.721,29.721,0,0,0-1.6539-13.03688,8.68665,8.68665,0,0,1-.87879-4.15246c.5247-3.51164,5.20884-4.39635,8.72762-3.9219s7.74984,1.20031,10.062-1.49432c1.59261-1.85609,1.49867-4.559,1.70967-6.99575C521.28248,239.785,533.83587,238.70653,533.896,237.31585Z" transform="translate(-201.25 -32.75)" fill="#2f2e41"/><circle cx="559" cy="744.5" r="43" fill="#6c63ff"/><circle cx="54" cy="729.5" r="43" fill="#6c63ff"/><circle cx="54" cy="672.5" r="31" fill="#6c63ff"/><circle cx="54" cy="624.5" r="22" fill="#6c63ff"/></svg>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#select_type').change(function(){
                let type = $(this).val();
                window.location.assign("index.php/productlist/"+type);
            })
            $('#sort_type').change(function(){
                let type_sort = $(this).val();
                window.location.assign(window.location.pathname+"?sortT="+type_sort);
            });
            $('.addFav').click(function(){
                $(this).children().toggleClass('bi-heart').toggleClass('bi-heart-fill text-danger');
                $.get(window.location.origin+'/index.php/ajax/favourite/'+$(this).data('bsIdproduct'),function(data){
                  $('.countFav').html(data);
            })
          });
            // $("input[name='breed[]']:checked")change(function(){
            //     if($(this).checked){
            //         console.log($(this).val());
            //     }
            // })
            // $('#sortPet').click(function(){
            //     // console.log($('input[name=age]').val())
            //     // console.log($('input[name=price]').val())
            // })
        })
    </script>
@endsection