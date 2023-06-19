<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body p-8">
          <div class="position-absolute top-0 end-0 me-3 mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="slide_wrapper">
                <div class="slider_modalproduct product" id="productModal" style="height: 500px">
                </div>
              </div>
              <div class="product-tools">
                <div class="thumbnails slider_modalnav row g-3" id="productModalThumbnails">                  
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="ps-lg-8 mt-6 mt-lg-0">
                <p class="mb-4 d-block text-primary text-uppercase " id="breedModal"></p>
                <a id="moveProductDetail">
                  <h2 class="mb-1 h1 text-capitalize" id="productNameModal"></h2>
                </a>
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
                  <button type="button" class="btn btn-outline-secondary">
                    Left: <span id="quantityModal"></span>
                  </button> 
                </div>
                <form action="{{route('productdetail')}}" method="post" class="row">
                  @csrf
                  <input type="hidden" name="id_pro">
                  <input type="hidden" name="max_quan" >
                <div>
                  <div class="input-group input-spinner ">
                    <button type="button" class="btn btn-outline-secondary btn_minus" style="border-radius: 10px 0 0 10px;"  data-field="quantity" >
                      <i class="bi bi-dash-lg"></i>
                    </button>
                    <input type="text" name="quan" class="border border-secondary text-center pt-1 fs-4 text-secondary" style="width: 50px;" value="1"/>
                    <button type="button" class="btn btn-outline-secondary btn_plus" style="border-radius: 0 10px 10px 0;" >
                      <i class="bi bi-plus-lg"></i>
                    </button>
                    <p class="ms-5 fw-bold align-self-end mb-1"></p>
                  </div>
                </div>
                <div class="mt-3 row justify-content-start g-2 align-items-center">
  
                  <div class="col-lg-4 col-md-5 col-6 d-grid">
                    <button type="submit" class="btn btn-primary">
                      <i class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                    </button>
                  </div>
                  <div class="col-md-4 col-5">
                    <a class="btn btn-light" id="compare_product2" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"  >
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
        <div class="toast-body" style=" padding:10px">
          <div class="row">
            <div class="col-2 mb-2 mx-auto">
              <i class="bi bi-bag-check" style="color: #2ec27e; font-size: 2.3rem"></i>
            </div>
            <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;">Add to cart successully</h4>
          </div>
        </div>
    </div>
  </div>
  
    <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
      <div role="alert"  id="toastCompare" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
          <div class="toast-body" style="padding:10px">
            <div class="row">
              <div class="col-2 mb-2 mx-auto">
                <i class="bi bi-lightbulb " style="color: #f5c211; font-size: 1.7rem"></i>
              </div>
              <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;" id="messCompare"></h4>
            </div>
          </div>
      </div>
    </div>  
  <div data-bs-toggle="tooltip"  title="Show Compare" class="position-fixed rounded-circle bottom-0 start-0 p-3 animate__animated animate__heartBeat animate__infinite {{!Session::has('compare')?'d-none':''}}" id="btn-compare">
    <button role="button" class="btn btn-primary shadow" id="show_compare" data-bs-toggle="modal" data-bs-target="#compareProduct">
      <i class="bi bi-arrow-left-right"></i>
    </button>
  </div>
  <div class="modal fade" id="compareProduct" tabindex="-1" aria-hidden="true">
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
  <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastVerified" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
        <div class="toast-body" style=" padding:10px">
          <div class="row">
            <div class="col-2 mb-2 mx-auto">
              <img src="{{asset('resources/image/icons/verified.png')}}" height="50" class="img-fluid">
            </div>
            <h4 class="text-center" style="font-family: 'Quicksand', sans-serif;">{{Session::has('verified')?Session::get('verified'):''}}</h4>
          </div>
        </div>
    </div>
  </div>
  <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastFeedback" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='1500'>
        <div class="toast-body" style=" height: 200px; padding:30px 20px">
          <div class="row">
            <div class="mb-3 col-6 mx-auto">
              <img src="{{asset('resources/image/svg-graphics/for_review.svg')}}" height="100" alt="">
            </div>
            <h4 class="text-center text-uppercase" style="font-family: 'Quicksand', sans-serif;">{{Session::has('feedback_mess')?Session::get('feedback_mess'):''}}</h4>
          </div>
        </div>
    </div>
  </div>
  <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastOrder" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='2500'>
        <div class="toast-body" style="height: 200px; padding:30px 20px">
          <div class="row">
            <div class="mb-3 col-6 mx-auto">
              <img src="{{asset('resources/image/svg-graphics/order_delivered.svg')}}" height="100" alt="">
            </div>
            <h5 class="text-center text-capitalize" style="font-family: 'Quicksand', sans-serif;" id="order_message">Order successully!</h5>
          </div>
        </div>
    </div>
  </div>
  <div class="toast-container position-fixed h-100 p-3 top-100 start-50 translate-middle">
    <div role="alert"  id="toastWarning" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="true" data-bs-delay='2500'>
        <div class="toast-body" style="height: 150px; padding:30px 20px">
          <div class="row">
            <div class="col-2 mb-3 mx-auto">
              <i class="bi bi-exclamation-triangle"  style="color: #c2732e; font-size: 2.3rem"></i>
            </div>
            <h5 class="text-center text-capitalize" style="font-family: 'Quicksand', sans-serif;" >Sorry Admin and Manager cannot use this feature.<br>Change to normal account to do this</h5>
          </div>
        </div>
    </div>
  </div>
  <div class="modal fade" id="editOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content" style="overflow: scroll">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Edit Delivery</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('user_editorder')}}" id="edit_order" method="post">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 row mt-3">
                      <input type="hidden" name="id_orderedit" id="id_orderedit">
                      <div class="mb-3 row">
                          <label class="col-lg-4 col-md-3 col-form-label" for="edit_cusname">Reciver Name</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="text" name="edit_cusname" id="edit_cusname" class="form-control" required>
                          </div>
                      </div>
                      <div class="mb-3 row">
                        <label class=" col-lg-4 col-md-3 col-form-label" for="edit_province">Province</label>
                        <div class="col-lg-8 col-md-9">
                            <select name="edit_province" id="edit_province" class="form-select" required>
                            </select>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label class=" col-lg-4 col-md-3 col-form-label" for="edit_district">District</label>
                        <div class="col-lg-8 col-md-9">
                            <select name="edit_district" id="edit_district" class="form-select" required>
                            </select>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label class=" col-lg-4 col-md-3 col-form-label" for="edit_ward">Ward</label>
                        <div class="col-lg-8 col-md-9">
                            <select name="edit_ward" id="edit_ward" class="form-select" required>
                            </select>
                        </div>
                      </div>
                      <div class="mb-3 row">
                          <label class=" col-lg-4 col-md-3 col-form-label" for="edit_cusaddr">Address</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="text" name="edit_cusaddr" id="edit_cusaddr" class="form-control" required>
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label class="col-lg-4 col-md-3 col-form-label" for="edit_cusphone">Phone</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="text" name="edit_cusphone" id="edit_cusphone" class="form-control" required>
                              <span id="edit_valiPhone" class="text-danger"></span>
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label class=" col-lg-4 col-md-3 col-form-label" for="edit_cusemail">Email</label>
                          <div class="col-lg-8 col-md-9">
                              <input type="email" name="edit_email" id="edit_cusemail" class="form-control" required>
                              <span id="edit_valiEmail" class="text-danger"></span>
                          </div>
                      </div>
                      <div class="mb-3 row">
                        <div class="col-lg-4 col-md-6">
                          <label for="edit_coupon">Coupon
                          <span id="name_coupon" class="ms-4"></span>
                          </label>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="text" class="form-control" name="edit_coupon" id="edit_coupon" disabled >
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="edit_payment" class="col-lg-4 col-md-6">Payment Method</label>
                        <div  class="col-lg-4 col-md-6">
                          <input type="text" class="form-control" name="edit_payment" id="edit_payment" disabled>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <div class="col-12 my-2">
                          <p>Delivery Method: <span class="text-dark fs-5" id="deli_method"></span>
                          <br><span class="text-danger">You can not change delivery method but service fee could be change if you changed Address</span>
                          </p>
                        </div>
                        <label class="col-form-label col-lg-4 col-md-3">Service fee</label>
                        <div class="col-lg-3 col-md-4">
                          <div class=" input-group">
                            <label class="input-group-text" for="edit_servicefee" >$</label>
                            <input type="text" class="form-control" name="edit_servicefee" id="edit_servicefee" disabled >
                          </div>
                        </div>
                        <div class="col-1 d-none">
                            <i class="bi bi-forward fs-3"></i>
                        </div>
                        <div class="col-lg-3 col-md-4 d-none">
                          <div class=" input-group">
                            <input type="text" class="form-control text-danger fw-bold" name="new_servicefee" id="new_servicefee" readonly >
                            <label class="input-group-text" for="new_servicefee" >đ</label>
                          </div>
                        </div>
                        <span class="text-danger" id="error_delivery"></span>
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_editorder"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_editorder" class="btn btn-primary" disabled>Save Change</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <!-- modal body -->
        <div class="modal-body p-6">
            <div class="d-flex justify-content-between mb-5">
              <!-- heading -->
              <div>
                <h5 class="h6 mb-1" id="addAddressModalLabel">New Shipping Address</h5>
                <p class="small mb-0">Add new shipping address for your order delivery.</p>
              </div>
              <div>
                <!-- button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <form action="{{route('post_address')}}" method="post">
              @csrf
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" class="form-control" name="nameReciever" placeholder="Reciever name"  required="">
                </div>
                <div class="col-6">
                  <input type="text" class="form-control" name="phoneReciever" placeholder="Phone number"  required="">
                </div>
                <div class="col-6">
                  <input type="text" class="form-control" name="emailReciever" placeholder="Email">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control" name="addressReciever" placeholder="Address">
                </div>
                <div class="col-12">
                  <select class="form-select" id="province" name="province">
                  </select>
                </div>
                <div class="col-12">
                  <select class="form-select" id="district" name="district" disabled>
                  </select>
                </div>
                <div class="col-12">
                  <select class="form-select" id="ward" name="ward" disabled>
                  </select>
                </div>
                <input type="hidden" name="district_id">
                <input type="hidden" name="ward_id">
                <input type="hidden" name="province_id">
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="saveAddress" id="saveAddress"> 
                    <label class="form-check-label" for="saveAddress">
                      Set as Default
                    </label>
                  </div>
                </div>
                <div class="col-12 text-end">
                  <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                  <button class="btn btn-primary" type="submit" id="sendAddress" disabled >Save Address</button>
                </div>
              </div>
            </form>
        </div>
  
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewModalOrder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content ">
        <form action="" method="POST">
          @csrf
        <div class="modal-body p-8" >
          <div class="position-absolute top-0 end-0 me-3 mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
          </div>
          <div class="row">
            <div class="col-6 col-md-4 col-lg-6 ">
              <table class="table">
                <thead>
                  <tr>
                    <th rowspan="2" >No</th>
                    <th rowspan="2" >&nbsp;</th>
                    <th rowspan="2">Item</th>
                    <th colspan="2"class="text-center">Price</th>
                    <th  rowspan="2" >Amount</th>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <th>Sale</th>
                  </tr>
                </thead>
                <tbody id="listCart">
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">Item Subtotal</td>
                    <td colspan="3" class="text-center" id="item_subtotal"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Shipping Fee</td>
                    <td colspan="3" class="text-center" id="shipment_fee_modal"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Discount</td>
                    <td colspan="3" class="text-center" id="discount"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Total</td>
                    <td class="3" class="text-center h5" id="total_order"></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="col-5 col-md-6 col-lg-5 mx-auto">
              <p>Reciever: <span id="receiver"></span></p>
              <p>Address: <span id="address"></span></p>
              <p>Phone: <span id="phone"></span></p>
              <p>Email: <span id="email_order"></span></p>
              <p>Instruction: <small id="instruction"></small></p>
              <p>Payment Method: <span id="payment_method"></span></p>
              <p>Delivery Method: <span id="delivery_method"></span></p>
              <p>Coupon: <span id="coupon_title"></span></p>
              <input type="hidden" name="id_order">
              <div class="row">
                <label for="status_order" class="col-form-label col-4">Status</label>
                <div class="col-8">
                  <select name="status_order" id="status_order" class="form-select ">
                    <option value="unconfirmed">Unconfirmed</option>
                    <option value="confirmed">Confirm</option>
                    <option value="delivery">Delivery</option>
                    <option value="finished" disabled>Finished</option>
                    <option value="transaction failed" disabled>Transaction Failed</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class=" modal-footer me-3 mt-3">
          <button type="submit" class="btn btn-warning" id="save_order" disabled>Save Change</button>
        </div>
        </form> 
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewModalOrder2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content ">
        <form action="" method="POST">
          @csrf
        <div class="modal-body p-8" >
          <div class="position-absolute top-0 end-0 me-3 mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
          </div>
          <div class="row">
            <div class="col-6 col-md-4 col-lg-6 ">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th rowspan="2" >No</th>
                    <th rowspan="2">Item</th>
                    <th colspan="2"class="text-center">Price</th>
                    <th  rowspan="2" >Amount</th>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <th>Sale</th>
                  </tr>
                </thead>
                <tbody id="listCart2">
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">Item Subtotal</td>
                    <td colspan="3" class="text-center" id="item_subtotal2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Shipping Fee</td>
                    <td colspan="3" class="text-center" id="shipment_fee_modal2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Discount</td>
                    <td colspan="3" class="text-center" id="discount2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Total</td>
                    <td class="3" class="text-center h5" id="total_order2"></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="col-5 col-md-6 col-lg-5 mx-auto">
              <p>Reciever: <span id="receiver2"></span></p>
              <p>Address: <span id="address2"></span></p>
              <p>Phone: <span id="phone2"></span></p>
              <p>Email: <span id="email_order2"></span></p>
              <p>Instruction: <small id="instruction2"></small></p>
              <p>Payment Method: <span id="payment_method2"></span></p>
              <p>Delivery Method: <span id="delivery_method2"></span></p>
              <p>Coupon: <span id="coupon_title2"></span></p>
              <input type="hidden" name="id_notificate">
              <p class="col-form-label col-4">Status: <span id="status_order2" class="fs-5 fw-bold"></span></p>
            </div>
          </div>
        </div>
        <div class=" modal-footer me-3 mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" id="save_order2" >Close and Remove Notifications</button>
        </div>
        </form> 
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewModalOrder3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content ">
        <div class="modal-body p-8" >
          <div class="position-absolute top-0 end-0 me-3 mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
          </div>
          <div class="row">
            <div class="col-6 col-md-4 col-lg-6 ">
              <table class="table">
                <thead>
                  <tr>
                    <th rowspan="2" >No</th>
                    <th rowspan="2" >&nbsp;</th>
                    <th rowspan="2">Item</th>
                    <th colspan="2"class="text-center">Price</th>
                    <th  rowspan="2" >Amount</th>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <th>Sale</th>
                  </tr>
                </thead>
                <tbody id="listCart2">
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">Item Subtotal</td>
                    <td colspan="3" class="text-center" id="item_subtotal2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Shipping Fee</td>
                    <td colspan="3" class="text-center" id="shipment_fee_modal2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Discount</td>
                    <td colspan="3" class="text-center" id="discount2"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Total</td>
                    <td class="3" class="text-center h5" id="total_order2"></td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="col-5 col-md-6 col-lg-5 mx-auto">
              <p>Reciever: <span id="receiver2"></span></p>
              <p>Address: <span id="address2"></span></p>
              <p>Phone: <span id="phone2"></span></p>
              <p>Email: <span id="email_order2"></span></p>
              <p>Instruction: <small id="instruction2"></small></p>
              <p>Payment Method: <span id="payment_method2"></span></p>
              <p>Delivery Method: <span id="delivery_method2"></span></p>
              <p>Coupon: <span id="coupon_title2"></span></p>
              <input type="hidden" name="id_order2">
              
            </div>
          </div>
        </div>
        <div class=" modal-footer me-3 mt-3">
          <button type="submit" class="btn btn-warning" id="save_order3" disabled>Save Change</button>
        </div>
      </div>
    </div>
  </div>
  @if (isset($warning_setting))
  <div class="toast align-items-center border-0 start-50 translate-middle-x position-sticky show" role="alert" aria-live="assertive" aria-atomic="true" style="bottom: 15px;width: fit-content;" id="warning_setting">
    <div class="d-flex">
      <div class="toast-body alert alert-warning m-0">
        <a href="" class="h5 mx-4"><i class="bi bi-exclamation-triangle fs-4 me-4"></i>{{$warning_setting->title}}</a>
      </div>
    </div>
  </div>
  @endif
  @if (isset($check_orders)&&count($check_orders)>0)
    <div data-bs-toggle="tooltip"  title="Show Orders" class="position-sticky rounded-circle p-3 animate__animated animate__heartBeat animate__infinite bottom-0 start-0" id="show_acceptorder">
      <button role="button" class="btn btn-warning shadow rounded" id="show_compare" data-bs-toggle="modal" data-bs-target="#checkOrder0" style="margin-left: 100px">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
      </button>
    </div>
    @for ($i = 0; $i < count($check_orders); $i++)
      <div class="modal fade " id="checkOrder{{$i}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="checkOrderLabel{{$i}}" aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="checkOrderLabel{{$i}}">Is this your orders?</h1>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body row px-5 pb-2">
              <p>We found this order used your assign phone number to order. Tell us is that your order?</p>
              <h5>Order date: {{date_format($check_orders[$i]->created_at,'F j, Y')}}</h5>
              <table class="table col-12">
                <thead>
                  <tr>
                    <th rowspan="2"></th>
                    <th colspan="2" class="text-center">Item</th>
                    <th rowspan="2">Price</th>
                    <th rowspan="2">Sale</th>
                    <th rowspan="2">Amount</th>
                  </tr>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $num = 1;
                      $total = 0;
                  @endphp
                  @foreach ($check_orders[$i]->Cart as $cart)
                      <tr>
                        <td>{{$num}}</td>
                        <td><img src="{{asset('images/products/'.$cart->Product->Library[0]->image)}}"  class='icon-shape icon-xl'  alt="{{$cart->Product->name}}"></td>
                        <td>{{$cart->Product->name}}</td>
                        <td>{{number_format($cart->price,0,'',' ')}} đ/kg</td>
                        <td>{{$cart->sale}}%</td>
                        <td>{{$cart->amount}} grams</td>
                      </tr>
                      @php
                          $num++;
                          $total += $cart->sale>0?$cart->price*(1 - $cart->sale/100)*($cart->amount/1000):$cart->price*($cart->amount/1000);
                      @endphp
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">Shipment Fee</td>
                    <td colspan="3">{{number_format($check_orders[$i]->shipping_fee,0,'',' ')}} đ</td>
                  </tr>
                  <tr>
                    <td colspan="2">Total</td>
                    <td colspan="3">{{number_format($total+$check_orders[$i]->shipping_fee,0,'',' ')}} đ</td>
                  </tr>
                </tfoot>
              </table>
              <div class="col-5 mx-auto">
                <p>Reciever: {{$check_orders[$i]->receiver}}</p>
                <p>Address: {{$check_orders[$i]->address}}</p>
                <p>Phone: {{$check_orders[$i]->phone}}</p>
                <p>Email: {{$check_orders[$i]->email}}</p>
              </div>
              <div class="col-5 mx-auto">
                <p>Instruction: {{$check_orders[$i]->instruction}}</p>
                <p>Payment Method: {{$check_orders[$i]->method}}</p>
                <p>Delivery Method: {{$check_orders[$i]->delivery_method}}</p>
                <h4>Status: <span class="text-danger fs-4">{{$check_orders[$i]->status}}</span></h4>
              </div>
            </div>
            <div class="modal-footer">
              @if (count($check_orders)>1 && $i != count($check_orders)-1)
              <button class="btn btn-outline-secondary denied_order"data-order={{$check_orders[$i]->id_order}} data-bs-target="#checkOrder{{$i+1}}" data-bs-toggle="modal" >Not mine and Next</button>
              <button class="btn btn-primary accept_order" data-bs-target="#checkOrder{{$i+1}}" data-bs-toggle="modal" data-order={{$check_orders[$i]->id_order}}>Accept and Next</button>
              @endif
              @if (count($check_orders)>1 && $i == count($check_orders)-1)
              <button class="btn btn-outline-secondary denied_order" data-order={{$check_orders[$i]->id_order}} data-bs-dismiss="modal">Not mine</button>
              <button class="btn btn-primary accept_order" data-bs-dismiss="modal" data-order={{$check_orders[$i]->id_order}}>Accept</button>
              @endif
              @if (count($check_orders) == 1)
              <button class="btn btn-outline-secondary denied_order" data-order={{$check_orders[$i]->id_order}} data-bs-dismiss="modal" >Not mine</button>
              <button class="btn btn-primary accept_order" data-order={{$check_orders[$i]->id_order}} data-bs-dismiss="modal" >Accept</button>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endfor
  @endif
  
  <div class="modal fade" id="payPalModal" tabindex="-1" data-bs-target="#staticBackdrop" aria-labelledby="confirmPaypalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="confirmPaypalLabel">
            <svg width="112" height="44" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="paypal-light-large">
              <rect id="card_bg" width="32" height="21.3333" rx="4" fill="#DFE3E8"/>
              <g id="paypal">
              <path id="Path" d="M13.5642 16.88L13.7976 15.4133H13.2776H10.8242L12.5309 4.57333C12.5354 4.53975 12.552 4.50895 12.5776 4.48666C12.6044 4.46595 12.637 4.45428 12.6709 4.45333H16.8109C18.1909 4.45333 19.1376 4.74 19.6376 5.30666C19.8588 5.54435 20.0129 5.83653 20.0842 6.15333C20.162 6.53833 20.162 6.935 20.0842 7.32V7.65333L20.3176 7.78666C20.4952 7.8752 20.6555 7.99487 20.7909 8.14C20.9947 8.386 21.1262 8.6837 21.1709 9C21.2208 9.41348 21.2028 9.83234 21.1176 10.24C21.0296 10.7352 20.8559 11.2112 20.6042 11.6467C20.4008 11.9958 20.1259 12.2979 19.7976 12.5333C19.4671 12.7587 19.0991 12.9235 18.7109 13.02C18.2751 13.1299 17.827 13.1837 17.3776 13.18H17.0509C16.8219 13.18 16.6002 13.2602 16.4242 13.4067C16.2473 13.5557 16.1311 13.7644 16.0976 13.9933V14.1267L15.6909 16.7133V16.8133C15.6957 16.8308 15.6957 16.8492 15.6909 16.8667H15.6509L13.5642 16.88Z" fill="#253D80"/>
              <path id="Path_2" d="M20.5361 7.38667L20.4961 7.63333C19.9494 10.4333 18.0761 11.4067 15.6894 11.4067H14.4761C14.1842 11.4063 13.9354 11.6184 13.8894 11.9067L13.2694 15.8533L13.0894 16.9733C13.0759 17.063 13.1019 17.1542 13.1608 17.2232C13.2196 17.2922 13.3054 17.3324 13.3961 17.3333H15.5561C15.8122 17.3331 16.03 17.1464 16.0694 16.8933V16.7867L16.4761 14.2067V14.0667C16.5125 13.8146 16.7281 13.6274 16.9828 13.6267H17.3361C19.4228 13.6267 21.0628 12.78 21.5361 10.2933C21.7922 9.44343 21.6342 8.52258 21.1094 7.80667C20.9429 7.63588 20.7492 7.49394 20.5361 7.38667V7.38667Z" fill="#189BD7"/>
              <path id="Path_3" d="M19.9603 7.16L19.7069 7.09333L19.4269 7.04C19.0739 6.98721 18.7172 6.96268 18.3603 6.96666H15.1069C15.0309 6.96458 14.9555 6.98057 14.8869 7.01333C14.7323 7.0857 14.6246 7.23105 14.6003 7.4L13.9336 11.78V11.9067C13.9795 11.6184 14.2283 11.4063 14.5203 11.4067H15.7336C18.1203 11.4067 19.9936 10.4333 20.5403 7.63333L20.5803 7.38666C20.4367 7.31246 20.2873 7.25003 20.1336 7.2L19.9603 7.16Z" fill="#242E65"/>
              <path id="Path_4" d="M14.6022 7.4C14.6265 7.23105 14.7343 7.08571 14.8889 7.01333C14.9575 6.98058 15.0329 6.96458 15.1089 6.96667H18.3622C18.7191 6.96269 19.0758 6.98721 19.4289 7.04L19.7089 7.09333L19.9622 7.16L20.0889 7.2C20.2426 7.25003 20.3919 7.31246 20.5355 7.38667C20.7522 6.55375 20.5536 5.66745 20.0022 5.00667C19.3355 4.3 18.2422 4 16.8155 4H12.6689C12.3769 3.99965 12.1281 4.2117 12.0822 4.5L10.3555 15.44C10.3401 15.5432 10.3701 15.648 10.4379 15.7273C10.5057 15.8066 10.6046 15.8526 10.7089 15.8533H13.2689L13.9355 11.78L14.6022 7.4Z" fill="#253D80"/>
              </g>
              </g>
            </svg>
            Confirm Payment          
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Receiver Name: <span id="name_pay"></span></p>
          <p>Receiver Phone: <span id="phone_pay"></span></p>
          <p>Email contact: <span id="email_pay"></span></p>
          <p>Delivery instructions: <span id="intruct_pay"></span></p>
          <p>Address: <span id="address_pay"></span><br>
            &nbsp; Ward: <span id="ward_pay"></span><br>
            &nbsp; District: <span id="district_pay"></span><br>
            &nbsp; Province: <span id="province_pay"></span>
          </p>
          <p>Delivery Method: <span id="delivery_by"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary m-3 px-3 h4"  id="confirm_paypal">Pay $<span class="totalPay"></span></button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Coupon-->
  <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="couponModalLabel">Promotion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column justify-content-center align-items-center">
          <h1 id="coupon_title_modal"></h1>
          <p class="fs-4">Maximum used: <span class="text-danger fs-3" id="max_coupon"></span></p>
          <p class="fs-5">You have used <span class="text-danger"  id="user_used"></span> times</p>
          <div class="input-group my-3 w-50">
            <input type="text" class="form-control" id="code_coupon_modal" disabled>
            <button class="input-group-text fs-4" id="coupon_clipboard"><i class="bi bi-clipboard"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  