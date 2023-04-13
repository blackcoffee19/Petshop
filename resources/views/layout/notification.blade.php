<button class="btn position-fixed col-1 position-relative " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="top:15px;right:5px">
    <i class="fa-sharp fa-solid fa-bell fa-shake fa-2xl" style="color: #f5c211;"></i> <span class="position-absolute top-0 translate-middle badge border border-light rounded-circle bg-danger">{{count($news)}}<span class="visually-hidden">unread messages</span></span>
</button>
<div class="collapse" id="collapseExample">
    <div class="toast-container end-0 p-3 " style="top: 40px;max-height: 550px;z-index: 1; overflow-y: scroll">
        @foreach ($news as $new)
        <div class="toast notificate" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="toast-header">
                <strong class="me-auto">{{$new->title}}</strong>
                <small class="text-body-secondary">{{($new->Order->created_at != $new->Order->updated_at) && $new->Order->updated_at ? $new->Order->updated_at : $new->Order->created_at}}</small>
            </div>
            <div class="toast-body">
                Order from urser {{$new->Order->cus_name}}
                <div class="mt-2 pt-2 border-top row">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#confirmOrder" data-idnews="{{$new->id_news}}" class="btn btn-primary btn-sm col-5 mx-3 btn_admin_vieworder">View Order</button>
                    @if ($new->Order->status == 'transaction failed' || $new->Order->status == 'cancel' || $new->Order->status == 'delivery')
                    <button type="button"  data-idnews="{{$new->id_news}}" class="btn btn-primary btn-sm col-5 mx-3 btn_admin_removenews">Remove</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="modal" tabindex="-1" id="confirmOrder" aria-labelledby="confirmOrder" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" >
      <div class="modal-content " style="overflow-x: hidden; overflow-y: scroll;">
        <div class="modal-header">
          <h5 class="modal-title">Order Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('statusOrder')}}" method="post">
            @csrf
            <div class="modal-body">
              <table class="table" id="table_view">

              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="submit_status" disabled>Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastMessage" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
        <div class="toast-body" style="height: 120px; padding:30px 0">
          <div class="row py-3">
            <div class="col-1 mb-2 mx-auto">
              <i class="fa-regular fa-file-check " style="color: #1a5fb4;font-size: 2.4rem"></i>
            </div>
            <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;" id="messConfirm"></h4>
          </div>
        </div>
    </div>
  </div>  
  <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastError" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
        <div class="toast-body" style="height: 120px; padding:30px 0">
          <div class="row py-3">
            <div class="col-1 mb-2 mx-auto">
              <i class="fa-solid fa-file-excel" style="color: #c01c28;font-size: 2.4rem"></i>
            </div>
            <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;" id="messError"></h4>
          </div>
        </div>
    </div>
  </div>  