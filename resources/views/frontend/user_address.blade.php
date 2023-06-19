@extends('welcome')
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                            <h3 class="fs-5 mb-0">Account Address</h3>
                            <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                                <i class="bi bi-text-indent-left fs-3"></i>
                            </button>
                        </div>
                    </div>
                    @include('layout.nav-left')
                    <!-- col -->
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="py-6 p-md-6 p-lg-10">
                            <div class="d-flex justify-content-between mb-6">
                                <h2 class="mb-0">Address</h2>
                                <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">Add a new address </a>
                            </div>
                            <div class="row">
                                @if (Session::has('message'))
                                    <div class="alert alert-success col-12 mb-2">{{Session::get('message')}}</div>
                                @endif
                                @if (count(Auth::user()->Address)>0)
                                    @foreach (Auth::user()->Address as $add)
                                        <div class="col-lg-5 col-xxl-4 col-12 mb-4">
                                            <div class="card">
                                                <div class="card-body p-6">
                                                    <div class="form-check mb-4">
                                                        <i class="bi bi-box-seam-fill fs-4 text-secondary"></i>

                                                        <span class="ms-4 form-check-label text-dark fw-semi-bold" >
                                                            {{$add->receiver}}
                                                        </span>
                                                    </div>
                                                    <address style="height: 90px">
                                                        {{$add->address .", ".$add->ward.", ".$add->district}}<br>
                                                        {{$add->province}}<br>
                                                        <abbr title="Phone">P: {{$add->phone}}</abbr>
                                                    </address>

                                                    @if ($add->default)
                                                    <a href="#" class="btn btn-info btn-sm">Default address</a>
                                                    @else
                                                    <a href="{{route('setdefault_address',$add->id_address)}}" class="link-primary">Set as Default</a>
                                                    @endif
                                                    <div class="mt-4">
                                                        <a href="{{route('removeAdd',$add->id_address)}}" class="text-danger ms-3" onclick="return confirm('Do you really want delete this Address?');">Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
