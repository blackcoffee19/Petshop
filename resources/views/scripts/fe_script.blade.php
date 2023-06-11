<script>
    $(document).ready(function(){
//#offcanvasRight List item in Cart
        @if(!Auth::check() || Auth::user()->admin != "2")
        $('.btn_showcart').click(function(){
            $.get(window.location.origin+"/index.php/ajax/cart/listcart",function(data){
                $('#listCartmodal').html(data);
                $('input[name=_token]').val($('meta[name="csrf-token"]').attr('content'));
                let idInterval1,idInterval2;
                $('.btn_minus').mousedown(function(e){
                    e.preventDefault();
                    let current = parseInt($(this).next().val());
                    idInterval1 = setInterval(() => {
                        if(current >1){
                        current--;
                        $(this).next().val(current);
                        }
                        $(this).parent().next().removeClass('d-none');  
                    }, 100);
                });
                $(".btn_minus").mouseup(function(e){
                    e.preventDefault();
                    clearInterval(idInterval1);
                    clearInterval(idInterval2);
                })
                $('.btn_plus').mousedown(function(e){
                    e.preventDefault();
                    let max = parseInt($('#quantityModal').text())?parseInt($('#quantityModal').text()): parseInt($(this).parent().parent().prev().val());
                    let current = parseInt($(this).prev().val());
                    idInterval2 = setInterval(()=> {
                        if(max>current){
                        current++;
                        $(this).prev().val(current);
                        }
                        $(this).parent().next().removeClass('d-none');
                    },100);
                });
                $('.btn_plus').mouseup(function(e){
                    e.preventDefault();
                    clearInterval(idInterval1);
                    clearInterval(idInterval2);
                });
                $('input[name=quan]').on('focusout',function(e){
                    e.preventDefault();
                    let validateNum =/^\d{1,10}$/;
                    let currentVl = $(this).val();
                    $(this).val(validateNum.test(currentVl)?currentVl:1);
                    console.log(currentVl);
                    console.log($(this).val() == parseInt($(this).parent().data('amount')));
                    console.log(parseInt($(this).parent().data('amount')));
                    if(parseInt($(this).parent().data('amount')) != $(this).val()){
                    $(this).parent().next().removeClass('d-none');
                    }else{
                    $(this).parent().next().addClass('d-none');
                    }
                });
                $('#clearCart').click(function(){
                    $('.countCart').html(0);
                  $.get(window.location.origin + "/index.php/ajax/cart/clearcart",function(data){
                      $('#listCartmodal').html(data);
                  });
                });
            })
        });
      @endif
//
      @if(Session::has('verified'))
        let toastverify = new bootstrap.Toast($('#toastVerified'))
        toastverify.show();
      @endif
      @if (Session::has('order_mess') || Session::has('paypal_success'))
        $('#order_message').html("Order successful! We will delivery your order soon.");
        let toastorder = new bootstrap.Toast($('#toastOrder'))
        toastorder.show();
      @endif
      @if (Session::has('feedback_mess'))
        let toastfeedback = new bootstrap.Toast($('#toastFeedback'))
        toastfeedback.show();
      @endif
      const valiquan_cart = (value)=>{
          let validateNum =/^\d{1,10}$/;
          let currentVl = $(this).val();
          $(this).val(validateNum.test(currentVl)?currentVl:value);
      }
      $('.btn_modal').click(function(){
          $.get(window.location.origin+"/index.php/ajax/modal/show-product/"+$(this).data('product'),function(data){
            let dataProduct = jQuery.parseJSON(data);
            let listImage = "";
            let slider_product = "";
            dataProduct['images'].forEach(img => {
              slider_product += `<div class="zoom slider_item" onmousemove="zoom(event)" style="background-image: url('resources/image/pet/${img}');object-fit:contain;background-repeat: no-repeat"><image src='resources/image/pet/${img}' class='img-fluid'></div>`;
              listImage += "<div class='col-3'><div class='thumbnails-img'><img src='resources/image/pet/"+img+"'></div></div>";
            });
            $('#moveProductDetail').attr('href',dataProduct['link']);
            $("#productModal").html(slider_product);
            $('#productModalThumbnails').html(listImage);
            $('#productNameModal').html(dataProduct['product_name']);
            $('input[name=max_quan]').val(dataProduct['quantity']);
            let strStart ="";
            for(let i =0; i<Math.floor(dataProduct['rating']);i++){
              strStart+="<i class='bi bi-star-fill'></i>"
            }
            
            if(parseInt(dataProduct['rating'])%1 !==0){
              strStart+="<i class='bi bi-star-half'></i>";
            }
            for(let j = 0; j < 5-Math.ceil(dataProduct['rating']);j++){
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
            $('#soldModal').html(`(${dataProduct["sold"]} solds)`);
            if(parseInt(dataProduct["sale"])>0){
              $('.hasSale').removeClass('d-none');
              $('#priceModal').html(`$${dataProduct["per_price"]}`);
              $('#saleModal').html(`${dataProduct["sale"]}% Off`);
              $('#priceAFSModal').html(`$${((dataProduct["per_price"])*(1-dataProduct["sale"]/100)).toFixed(2)}`)
            }else{
              $('.hasSale').addClass('d-none');
              $('#priceAFSModal').html(`$${dataProduct["per_price"].toFixed(2)}`);
            };
            $('#quantityModal').html(Math.floor(dataProduct["quantity"]));
            $('#idModal').html(dataProduct['id_product']);
            $('input[name=id_pro]').val(dataProduct['id_product']);
            $('#typeModal').html(dataProduct['type']);
            $('#breedModal').html(dataProduct['breed']);
            let slider = tns({
                container: '.slider_modalproduct',
                items: 1,
                speed: 500,
                autoplay: true,
                axis: "horizontal",
                autoplayButtonOutput:0,
                controls: 0,
                navContainer: '.slider_modalnav',
                navAsThumbnails:true
            });
            $("#compare_product2").click(function(){
              if($('#btn-compare').hasClass('d-none')){
                $('#btn-compare').removeClass('d-none');
              }
              $.get(window.location.origin+"/index.php/ajax/addcompare/"+dataProduct['id_product'],function(data){
                $('#messCompare').html(data);  
              })
              const toast = new bootstrap.Toast($('#toastCompare'))
              toast.show();
            })
          });
      });
      $('.compare_pet').click(function(){
        if($('#btn-compare').hasClass('d-none')){
          $('#btn-compare').removeClass('d-none');
        }
        $.get(window.location.origin+"/index.php/ajax/addcompare/"+$(this).data('bsProduct'),function(data){
          $('#messCompare').html(data);  
        })
        const toast = new bootstrap.Toast($('#toastCompare'))
        toast.show();
      });
      $('#show_compare').click(function(){
        $.get(window.location.origin+"/index.php/ajax/compare/showcompare",function(data){
          $('#compare_detail').html(data);  
        })
      });
      $('.addFav').click(function(){
          $(this).children().toggleClass('bi-heart').toggleClass('bi-heart-fill text-danger');
        $.get(window.location.origin+'/index.php/ajax/add-favourite/'+$(this).data('bsIdproduct'),function(data){
          $('.countFav').html(data);
        })
      });
      @if(Session::has('message_addtocart'))
        const toast = new bootstrap.Toast($('#toastAdd'))
        toast.show();
      @endif
      $('.addToCart').click(function(){
        @if(!Auth::check() || Auth::user()->admin == '0')
        const toast = new bootstrap.Toast($('#toastAdd'))
        toast.show();
        @else
        let toastorder = new bootstrap.Toast($('#toastWarning'))
        toastorder.show();
        @endif
        $.get(window.location.origin+"/index.php/ajax/add-cart/"+$(this).data('bsId'),function(data){
          $('.countCart').html(data);
        });
      });
      let idInterval3,idInterval4;
      $('.btn_minus').mousedown(function(e){
          e.preventDefault();
          let current = parseInt($(this).next().val());
          idInterval3 = setInterval(()=>{
            if(current >1){
              current--;
              $(this).next().val(current);
            }
          },100);
          $(this).parent().parent().next().children().removeClass('d-none');
      }).mouseup(function(e){
        e.preventDefault();
        clearInterval(idInterval3);
      });
      $('.btn_plus').mousedown(function(e){
          e.preventDefault();
          let max = parseInt($('#quantityModal').text())?parseInt($('#quantityModal').text()): parseInt($(this).parent().parent().prev().val());
          let current = parseInt($(this).prev().val());
          idInterval4 =setInterval(()=>{
            if(max>current){
              current++;
              $(this).prev().val(current);
            }
          },100);
          $(this).parent().parent().next().children().removeClass('d-none');

      }).mouseup(function(e){
        e.preventDefault();
        clearInterval(idInterval4)
      });
      $('input[name=quan]').on('focusout',function(e){
          e.preventDefault();
          let validateNum =/^\d{1,10}$/;
          let currentVl = $(this).val();
          $(this).val(validateNum.test(currentVl)?currentVl:1);
          $(this).parent().parent().next().children().removeClass('d-none');
      });
      $('input[name=cart_quant]').on('focusout',function(e){
          e.preventDefault();
          let validateNum =/^\d{1,10}$/;
          let currentVl = $(this).val();
          $(this).val(validateNum.test(currentVl)?currentVl:1);
      });
      $('#modal_password, #modal_email').change(function(){
        if($('#modal_password').val().length>0 && $('#modal_email').val().length>0){
            $('#modal_signin').removeAttr('disabled');
        }else{
            $('#modal_signin').attr('disabled','disabled');
        }
      })
      $('.remove_add').click(function(){
        $.get(window.location.origin+"/index.php/ajax/remove_address/"+$(this).data('idadd'),function(data){
          $("#listAddress").html(data);
        });
      })
      // const ghn_api_province = "https://online-gateway.ghn.vn/shiip/public-api/master-data/province";
      // const ghn_api_district = "https://online-gateway.ghn.vn/shiip/public-api/master-data/district";
      // const ghn_api_ward ="https://online-gateway.ghn.vn/shiip/public-api/master-data/ward";
      // const ghn_api_dev = "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province";
      // const ghn_api_service = "https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services";
      // const ghn_fee = "https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee";
      // const ghtk_api = "https://services-staging.ghtklab.com";
      // $.ajax({
      //   method: "GET",
      //   beforeSend: function (xhr) {
      //       xhr.setRequestHeader('Token', '40c06a9e-ee0f-11ed-a281-3aa62a37e0a5');
      //       xhr.setRequestHeader("Content-Type", "application/json")
      //   },
      //   url: ghn_api_province,
      //   success: function (data) {
      //       $("#province").append('<option>--Select Province --</option>');
      //       data.data.forEach(el=>{
      //         $("#province").append(`<option value="${el.ProvinceID}">${el.ProvinceName}</option>`)
      //       })
      //   },
      //   error: function (request, status, error) {
      //       console.log();(request.responseText);
      //   }
      // });

      $('#province').change(function async(e){
        e.preventDefault();
        $('#district').removeAttr('disabled');
        let str = "<option selected>--Choose District--</option>";
        let strw = '<option selected>--Choose Ward--</option>';
        $('#ward').html(str);
        $.ajax({
          method: "GET",
          beforeSend: function (xhr) {
              xhr.setRequestHeader('Token', '40c06a9e-ee0f-11ed-a281-3aa62a37e0a5');
              xhr.setRequestHeader("Content-Type", "application/json")
          },
          url: ghn_api_district,
          data: {"province_id": $('#province').val()},
          success: function (data) {
            data.data.forEach(value=>{
              str+=`<option value=${value.DistrictID}>${value.DistrictName}</option>`;
            }) 
            $('#district').html(str);
          },
          error: function (request, status, error) {
              console.log(request.responseText);
          }
        });
      });
      $('#district').change(function(e){
          e.preventDefault();
          $('#ward').removeAttr('disabled');
          // $('#province option:selected').val($('#province option:selected').text());
          let str = '<option selected>--Choose Ward--</option>';
          $.ajax({
            method: "GET",
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Token', '40c06a9e-ee0f-11ed-a281-3aa62a37e0a5');
                xhr.setRequestHeader("Content-Type", "application/json")
            },
            url: ghn_api_ward,
            data: {"district_id": $('#district').val()},
            success: function (data) {
              data.data.forEach(value=>{
                str+=`<option value=${value.WardCode}>${value.WardName}</option>`;
              }) 
              $('#ward').html(str);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }
          });
      });
      $('#ward').change(function(){
        @if(Auth::check())
          $("input[name=district_id]").val($('#district option:selected').val());
          $("input[name=ward_id]").val($('#ward option:selected').val());
          $("input[name=province_id]").val($("#province option:selected").val());
        @endif
        $.get(window.location.origin+'/index.php/ajax/ghtk_service/fee?province='+$("#province option:selected").text()+"&district="+$("#district option:selected").text(),function(data6){
          let dataJson = jQuery.parseJSON(data6);
          let check = 0;
          let deliver_method = jQuery.parseJSON(dataJson[1]);
          if(deliver_method['fee']['delivery']){
            let totall = parseInt($("#total").data('subtotal'))+deliver_method['fee']['fee'];
            if(deliver_method['fee']['fee']!=$("input[name=shipment_fee]").val()){
              $("#shippment_fee").html("$"+deliver_method['fee']['ship_fee_only']);
              $("#total").html("$"+totall);
            }
            $(".totalPay").text((totall*0.000043).toFixed(2));
            $("input[name=shipment_fee]").val(deliver_method['fee']['fee']);
            if(deliver_method['fee']['extFees'].length>0){
              let ex_fee = 0;
              let transtalate2 = {"Phụ phí hàng nông sản/thực phẩm khô": "Surcharge for agricultural products/dry food"};
              deliver_method['fee']['extFees'].forEach(el=>{
                ex_fee+=el['amount'];
                $('#extra_ship').html(`<div class='ms-3 text-muted'>${transtalate2[el['title']]}</div>`);
              });
              $("#extra_ship_display").html("+ "+ex_fee+" đ");
              if(ex_fee!=0){
                $('#extra_ship').parent().removeClass('d-none');
              }else{
                $('#extra_ship').parent().addClass('d-none')
              }
            }else{
              $('#extra_ship').parent().addClass('d-none');
            }
          };
          let str1 = "";
          for (let i = 0; i < dataJson.length; i++) {
            var method = jQuery.parseJSON(dataJson[i]);
            if(!method['fee']['delivery']){
              check++;
            }
            let name=["Air Transport","Road Transport","Xfast"]
            str1+=`<option value='${i}' ${i==1?'selected':''}>${name[i]}</option>`;  
          }
          $("#ghtk_service").html(str1);
          if(check == 3){
            $("#error_delivery").html('Sorry we can not delivery to your address.');
          }

          $('#delivery_method').change(function(){
            if(parseInt($('#delivery_method option:selected').val()) <10){
              $("#img_logictic").attr('src',"{{asset('images/icons/ghtk.png')}}");

              $.get(window.location.origin+'/index.php/ajax/ghtk_service/fee?province='+$("#province option:selected").text()+"&district="+$("#district option:selected").text(),function(data1){
                  let dataJson3 = jQuery.parseJSON(data1);
                  let deliver_method4 = jQuery.parseJSON(dataJson3[$('#delivery_method option:selected').val()]);
                  if(deliver_method4['fee']['delivery']){
                    let totall3 = parseInt($("#total").data('subtotal'))+deliver_method4['fee']['fee'];
                    if(deliver_method4['fee']['fee']!=$("input[name=shipment_fee]").val()){
                      $("#shippment_fee").html(deliver_method4['fee']['ship_fee_only']+" đ");
                      $("#total").html(totall3 +" đ");
                    }
                    $(".totalPay").text((totall3*0.000043).toFixed(2));
                    $("input[name=shipment_fee]").val(deliver_method4['fee']['fee']);
                    if(parseInt($('#delivery_method').val()) == 2){
                      $('#extra_ship').parent().addClass('d-none');
                    }else{
                      $('#extra_ship').parent().removeClass('d-none');
                    }
                    if(deliver_method4['fee']['extFees'].length>0){
                      let transtalate2 = {"Phụ phí hàng nông sản/thực phẩm khô": "Surcharge for agricultural products/dry food"};
                      let ex_fee3 = 0;
                      deliver_method4['fee']['extFees'].forEach(el=>{
                        ex_fee3+=el['amount'];
                        $('#extra_ship').html(`<div class='ms-3 text-muted'>${transtalate2[el['title']]}</div>`);
                      });
                      $("#extra_ship_display").html("+ "+ex_fee3+" đ");
                      if(ex_fee3!=0){
                        $('#extra_ship').parent().removeClass('d-none');
                      }else{
                        $('#extra_ship').parent().addClass('d-none')
                      }
                    }
                  };
                })   
            }else{
              $.get(window.location.origin+"/index.php/ajax/ghn_service/fee?ward="+$('#ward option:selected').val()+"&district="+$('#district option:selected').val()+"&service_id="+$('#delivery_method option:selected').val(),function(data5){
                let newdata4 = data5.slice(0,data5.length-1);
                let dataJs4 = jQuery.parseJSON(newdata4);
                if(dataJs4['code']==200){
                  let total_ghn =dataJs4['data']['total']+ parseInt($("#total").data('subtotal'));
                  let shipping = dataJs4['data']['total'];
                  if(shipping!=$("input[name=shipment_fee]").val()){
                    $("#shippment_fee").html(shipping+" đ");
                    $("#total").html(total_ghn +" đ");
                  }
                  $(".totalPay").text((total_ghn*0.000043).toFixed(2));
                  $("input[name=shipment_fee]").val(shipping);
                }else{
                  console.log(dataJs4);
                }
              });
              $("#img_logictic").attr('src',"{{asset('images/icons/GHN2.png')}}");
              $('#extra_ship').parent().addClass('d-none');
            };
          });
        });
        $.get(window.location.origin+"/index.php/ajax/ghn_service/service?district="+$('#district option:selected').val(),function(data){
            let newdata = data.slice(0,data.length-1);
            let dataJs = jQuery.parseJSON(newdata); 
            let str2 = "";
            dataJs['data'].forEach(service =>{
              let translate = "";
              switch(service['short_name']){
                      case "Chuyển phát thương mại điện tử":
                      translate= "E-commerce delivery";
                        break;
                      case "Chuyển phát truyền thống": 
                      translate ="Traditional delivery";
                        break;
                        case "Tiết kiệm":
                        translate= "Saving delivery";
                          break;
                        default:
                        translate =service['short_name'];
                    };
              str2+=`<option value='${service['service_id']}'>${translate}</option>`;
              $.get(window.location.origin+"/index.php/ajax/ghn_service/fee?ward="+$('#ward option:selected').val()+"&district="+$('#district option:selected').val()+"&service_id="+service['service_id'],function(data2){
                let newdata2 = data2.slice(0,data2.length-1);
                let dataJs2 = jQuery.parseJSON(newdata2);
                //Change method
                $('#delivery_method').change(function(){
                  if(parseInt($('#delivery_method option:selected').val()) <10){
                    $("#img_logictic").attr('src',"{{asset('images/icons/ghtk.png')}}");

                    $.get(window.location.origin+'/index.php/ajax/ghtk_service/fee?province='+$("#province option:selected").text()+"&district="+$("#district option:selected").text(),function(data3){
                        let dataJson2 = jQuery.parseJSON(data3);                        
                        let deliver_method2 =  jQuery.parseJSON(dataJson2[$('#delivery_method option:selected').val()]);
                        if(deliver_method2['fee']['delivery']){
                          let totall2 = parseInt($("#total").data('subtotal'))+deliver_method2['fee']['fee'];
                          if(deliver_method2['fee']['fee']!=$("input[name=shipment_fee]").val()){
                            $("#shippment_fee").html(deliver_method2['fee']['ship_fee_only']+" đ");
                            $("#total").html(totall2 +" đ");
                          }
                          $(".totalPay").text((totall2*0.000043).toFixed(2));
                          $("input[name=shipment_fee]").val(deliver_method2['fee']['fee']);
                          if(parseInt($('#delivery_method').val()) == 2){
                            $('#extra_ship').parent().addClass('d-none');
                          }else {
                            $('#extra_ship').parent().removeClass('d-none');
                          }
                          if(deliver_method2['fee']['extFees'].length>0 ){
                            let transtalate2 = {"Phụ phí hàng nông sản/thực phẩm khô": "Surcharge for agricultural products/dry food"};
                            let ex_fee2 = 0;
                            deliver_method2['fee']['extFees'].forEach(el=>{
                              ex_fee2+=el['amount'];
                              $('#extra_ship').html(`<div class='ms-3 text-muted'>${transtalate2[el['title']]}</div>`);
                            });
                            $("#extra_ship_display").html("+ "+ex_fee2+" đ");
                            if(ex_fee2!=0){
                              $('#extra_ship').parent().removeClass('d-none');
                            }else{
                              $('#extra_ship').parent().addClass('d-none')
                            }
                          }
                        };
                      })   
                  }else{
                    $.get(window.location.origin+"/index.php/ajax/ghn_service/fee?ward="+$('#ward option:selected').val()+"&district="+$('#district option:selected').val()+"&service_id="+$('#delivery_method option:selected').val(),function(data4){
                      let newdata3 = data4.slice(0,data4.length-1);
                      let dataJs3 = jQuery.parseJSON(newdata3);
                      let total_ghn =dataJs3['data']['total']+ parseInt($("#total").data('subtotal'));
                      let shipping = dataJs3['data']['total'];
                      if(shipping!=$("input[name=shipment_fee]").val()){
                        $("#shippment_fee").html(shipping+" đ");
                        $("#total").html(total_ghn +" đ");
                      }
                      $(".totalPay").text((total_ghn*0.000043).toFixed(2));
                      $("input[name=shipment_fee]").val(shipping);
                    });
                    $("#img_logictic").attr('src',"{{asset('images/icons/GHN2.png')}}");
                    $('#extra_ship').parent().addClass('d-none');
                  };
                });
              })
            })
            $('#ghn_services').html(str2);
        });
        if($('input[name="nameReciever"]').val().trim().length > 0 && $('input[name="emailReciever"]').val().trim().length >0 && $('input[name="phoneReciever"]').val().trim().length>0 && $('#ward').val() &&(($('#paypal').is(':checked') && $('#paypal_btn').data('success') == "success")|| $("#cashonDelivery").is(':checked'))){
          $('#submit_order').removeAttr('disabled');
        }else{
          $("#submit_order").attr('disabled','disabled');
        };
      });
      $("#submit_order").click(function(){
        $('#delivery_method option:selected').val($('#delivery_method option:selected').parent().attr('label')+" - "+$('#delivery_method option:selected').text());
        @if(!Auth::check())
          $('#province option:selected').val($('#province option:selected').text());
          $('#district option:selected').val($('#district option:selected').text());
          $('#ward option:selected').val($('#ward option:selected').text());
        @endif
      });
      $('.user_editorder').click(function() {
          $.get(window.location.origin + "/index.php/account/ajax/edit_order/" + $(this).data('idorder'),function(data) {
            function toNonAccentVietnamese(str) {
              str = str.replace(/A|Á|À|Ã|Ạ|Â|Ấ|Ầ|Ẫ|Ậ|Ă|Ắ|Ằ|Ẵ|Ặ/g, "A");
              str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
              str = str.replace(/E|É|È|Ẽ|Ẹ|Ê|Ế|Ề|Ễ|Ệ/, "E");
              str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
              str = str.replace(/I|Í|Ì|Ĩ|Ị/g, "I");
              str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
              str = str.replace(/O|Ó|Ò|Õ|Ọ|Ô|Ố|Ồ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ỡ|Ợ/g, "O");
              str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
              str = str.replace(/U|Ú|Ù|Ũ|Ụ|Ư|Ứ|Ừ|Ữ|Ự/g, "U");
              str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
              str = str.replace(/Y|Ý|Ỳ|Ỹ|Ỵ/g, "Y");
              str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
              str = str.replace(/Đ/g, "D");
              str = str.replace(/đ/g, "d");
              // Some system encode vietnamese combining accent as individual utf-8 characters
              str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // Huyền sắc hỏi ngã nặng 
              str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // Â, Ê, Ă, Ơ, Ư
              return str;
            }   
            let data_order = jQuery.parseJSON(data);
            let add = data_order['address'].split(", ");
            const checkChanged = ()=>{
              if($("#edit_cusname").val().trim().length>0 && $("#edit_cusphone").val().trim().length>0 && $("#edit_cusemail").val().length>0 && $("#edit_ward").val().length>0 && $("#edit_province").val().length>0){
                return true;
              }else{
                return false;
              }
            }
            const getListProvince=()=>{
              return new Promise((resolve, reject) => {
                setTimeout(()=> {  
                  $.ajax({
                    method: "GET",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Token', '40c06a9e-ee0f-11ed-a281-3aa62a37e0a5');
                        xhr.setRequestHeader("Content-Type", "application/json")
                    },
                    url: ghn_api_province,
                    success: function (data) {
                      let list_province = "";
                      let selected_province = 0;
                      data.data.forEach(el=>{
                        if(add[add.length-1].includes(toNonAccentVietnamese(el.ProvinceName)) || add[add.length-1].includes(el.ProvinceName)){
                          list_province+=`<option value="${el.ProvinceID}" selected>${el.ProvinceName}</option>`;
                          selected_province = el.ProvinceID;
                        }else{
                          list_province+=`<option value="${el.ProvinceID}">${el.ProvinceName}</option>`;
                        }
                      });
                      $("#edit_province").html(list_province);
                      resolve(selected_province);
                    },
                    error: function (request, status, error) {
                      console.log("Error in ajax province: ");
                        console.log(request.responseText);
                        reject(request.responseText);
                    }
                  });
                })
              })
            }
            const getListDistrict=(id_province)=>{
              return new Promise((resolve, reject) => {
                setTimeout(()=> {  
                  $.ajax({
                    method: "GET",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Token', '40c06a9e-ee0f-11ed-a281-3aa62a37e0a5');
                        xhr.setRequestHeader("Content-Type", "application/json")
                    },
                    url: ghn_api_district,
                    data: {"province_id": id_province},
                    success: function (data) {
                      let list_district = "";
                      list_district+="<option value=''>-- Selected District --</option>";
                      let seleted_district = 0;
                      data.data.forEach(value=>{
                        if(add[add.length-2].includes(toNonAccentVietnamese(value.DistrictName)) || add[add.length-2].includes(value.DistrictName)){
                          list_district+=`<option value="${value.DistrictID}" selected>${value.DistrictName}</option>`;
                          seleted_district = value.DistrictID;
                        }else{
                          list_district+=`<option value="${value.DistrictID}">${value.DistrictName}</option>`;
                        }
                      }) 
                      $('#edit_district').html(list_district);
                      resolve(seleted_district);
                    },
                    error: function (request, status, error) {
                      console.log("Error in ajax district: ");
                        console.log(request.responseText);
                        reject(request.responseText);
                    }
                  });
                })})
            }
            const getListWard =(id_district)=>{
              return new Promise((resolve, reject) => {
                setTimeout(()=> {  
                  $.ajax({
                    method: "GET",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Token', '40c06a9e-ee0f-11ed-a281-3aa62a37e0a5');
                        xhr.setRequestHeader("Content-Type", "application/json")
                    },
                    url: ghn_api_ward,
                    data: {"district_id": id_district},
                    success: function (data) {
                      let list_ward= "";
                      list_ward+="<option value=''>-- Select Ward --</option>";
                      data.data.forEach(value=>{
                        if(add[add.length-3].includes(toNonAccentVietnamese(value.WardName)) || add[add.length-3].includes(value.WardName)){
                          list_ward+=`<option value="${value.WardCode}" selected>${value.WardName}</option>`;
                        }else{
                          list_ward+=`<option value="${value.WardCode}">${value.WardName}</option>`;
                        }
                      }) 
                      $('#edit_ward').html(list_ward);
                      resolve("Success");
                    },
                    error: function (request, status, error) {
                      console.log("Error in ajax ward: ");
                        console.log(request.responseText);
                        reject(request.responseText);
                    }
                  });
                })})
            }
            getListProvince().then((res1)=>{
                                return getListDistrict(res1);})
                              .then((res2)=>{
                                return getListWard(res2);});
            $('#id_orderedit').val(data_order['id_order']);
            $('#edit_cusname').val(data_order['receiver']);
            $('#edit_cusaddr').val(add[0]);
            $('#edit_cusphone').val(data_order['phone']);
            $('#edit_cusemail').val(data_order['email']);
            $('#edit_coupon').val(data_order['code_coupon']);
            $('#name_coupon').html(data_order['name_coupon']);
            $('#deli_method').html(data_order['delivery_method']);
            $('#edit_servicefee').val(data_order['shipping_fee']);
            $("#edit_payment").val(data_order['method']);
            $('#edit_cusname, #edit_cusaddr,#edit_cusphone,#edit_cusemail').change(function(){
                if ($('#edit_cusname').val().length > 0 && $('#edit_cusaddr').val()
                    .length > 0 && $('#edit_cusphone').val().length > 0 && $(
                        '#edit_cusemail').val().length > 0) {
                    $('#submit_order').removeAttr('disabled');
                } else {
                    $('#submit_order').attr('disabled', 'disabled');
                }
            });
            if(data_order['method'] == 'cod'){
              $("#edit_province").removeAttr('disabled');
              $("#edit_district").removeAttr('disabled');
              $("#edit_ward").removeAttr('disabled');
              $("#edit_cusaddr").removeAttr('disabled');
              $("#edit_province").change(function(){
                $('#edit_ward').html("<option value=''>-- Select Ward --</option>");
                getListDistrict($("#edit_province option:selected").val());
                if(checkChanged()){
                  $("#submit_editorder").removeAttr('disabled');
                }else{
                  $("#submit_editorder").attr('disabled','disabled');
                }
              });
              $('#edit_district').change(function(){
                getListWard($("#edit_district option:selected").val());
                if(checkChanged()){
                  $("#submit_editorder").removeAttr('disabled');
                }else{
                  $("#submit_editorder").attr('disabled','disabled');
                }
              });
              $("#edit_ward").change(function(){
                let logictic = data_order['delivery_method'].split(" - ");
                if(logictic[0] == "Giao Hang Tiet Kiem"){
                  let method ="";
                  switch(logictic[1]){
                    case "Road Transport":
                      method = 'road';
                      break;
                    case "Air Transport":
                      method = "fly";
                      break;
                    case "Xfast":
                      method = 'xteam';
                      break;
                  }
                  $.get(window.location.origin+'/index.php/ajax/ghtk_service/fee?province='+$("#edit_province option:selected").text()+"&district="+$("#edit_district option:selected").text()+"&method="+method,function(ghtk_data){
                    let dataJson = jQuery.parseJSON(ghtk_data);
                    let deliver_method = jQuery.parseJSON(dataJson[0]);
                    if(deliver_method['fee']['delivery']){
                      $("#edit_servicefee").parent().parent().next().removeClass('d-none');
                      $('#edit_servicefee').parent().parent().next().next().removeClass('d-none');
                      $("#new_servicefee").val(deliver_method['fee']['fee']+" đ");
                    }else{
                      $("#submit_editorder").attr('disabled','disabled');
                      $("#error_delivery").html('Look like Giao Tiet Kiem didn\'t support this location, Try to choose another province or district or ward near you');
                    };
                  });
                }else{
                  let method ="";
                  switch(logictic[1]){
                    case "E-commerce delivery":
                      method = "Chuyển phát thương mại điện tử";
                      break;
                    case "Traditional delivery":
                      method = "Chuyển phát truyền thống";
                      break;
                    case "Saving delivery":
                      method = "Tiết kiệm";
                      break;
                    default:
                      method =logictic[1];
                  };
                  $.get(window.location.origin+"/index.php/ajax/ghn_service/service?district="+$('#edit_district option:selected').val(),function(ghn_data){
                    let newdata = ghn_data.slice(0,ghn_data.length-1);
                    let dataJs = jQuery.parseJSON(newdata);
                    if(dataJs['code']==400){
                      $("#submit_editorder").attr('disabled','disabled');
                      $("#error_delivery").html('Look like Giao Hang Nhanh didn\'t support this location, Try to choose another province or district or ward near you');
                    }else if(dataJs['code']== 200){
                      $("#error_delivery").html('');
                      dataJs['data'].forEach(ser =>{
                        if(ser['short_name'] == method){
                          $.get(window.location.origin+"/index.php/ajax/ghn_service/fee?ward="+$('#edit_ward option:selected').val()+"&district="+$('#edit_district option:selected').val()+"&service_id="+ser['service_id']+"&weight="+data_order['weight'],function(ghn_fee){
                            let newdata2 = ghn_fee.slice(0,ghn_fee.length-1);
                            let dataJs2 = jQuery.parseJSON(newdata2);
                            $("#edit_servicefee").parent().parent().next().removeClass('d-none');
                            $('#edit_servicefee').parent().parent().next().next().removeClass('d-none');
                            $("#new_servicefee").val(dataJs2['data']['total']+" đ");
                          })
                        }
                      })
                    }else{
                      $("#submit_editorder").attr('disabled','disabled');
                      $("#error_delivery").html('Something wrong. Refresh and try again.');
                      console.log(dataJs);
                    }
                  });
                }
                if(checkChanged()){
                  $("#submit_editorder").removeAttr('disabled');
                }else{
                  $("#submit_editorder").attr('disabled','disabled');
                }
              })
            }else{
              $("#edit_province").attr('disabled','disabled');
              $('#edit_district').attr('disabled','disabled');
              $("#edit_ward").attr('disabled','disabled');
              $('#edit_cusaddr').attr('disabled','disabled');
            }
            let validatePhone = /^[0-9]{9,11}$/;
            let validateEmail = /^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/;
            $('input[name=edit_cusphone]').focusout(function(e){
                e.preventDefault();
                if(!validatePhone.test($(this).val())){
                  $("#submit_editorder").attr('disabled','disabled');
                    $('#edit_valiPhone').text("Invail Phone. Try again");
                    $(this).addClass('is-invalid');
                }else{
                    $(this).removeClass('is-invalid');
                    $('#edit_valiPhone').text('');
                }
            });
            $('input[name=edit_email]').focusout(function(e){
                e.preventDefault();
                if(!validateEmail.test($(this).val())){
                    $('#edit_valiEmail').text("Invaild Email. Try again");
                    $("#submit_editorder").attr('disabled','disabled');
                    $(this).addClass('is-invalid');      
                }else{
                    $(this).removeClass('is-invalid');
                    $('#edit_valiEmail').text('');
                };
            });
            $("#edit_cusname, #edit_cusphone, #edit_cusemail").change(function(){
              if(checkChanged()){
                $("#submit_editorder").removeAttr('disabled');
              }else{
                $("#submit_editorder").attr('disabled','disabled');
              }
            });
            $("#submit_editorder").click(function(){
              let new_province = $("#edit_province option:selected").text();
              let new_district = $("#edit_district option:selected").text();
              let new_ward = $("#edit_ward option:selected").text();
              $("#edit_province option:selected").val(new_province);
              $("#edit_district option:selected").val(new_district);
              $("#edit_ward option:selected").val(new_ward);
            });
            $("#close_editorder").click(function(){
              $("#edit_servicefee").parent().parent().next().addClass('d-none');
              $('#edit_servicefee').parent().parent().next().next().addClass('d-none');
            })
          })
      });
      let valPass = /^(?=.*\d)(?=.*[a-z]).{8,}$/;
      let valiPhone = /^[0-9]{9,11}$/;
      let valiPhone1 = /^\(?\+84\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})?$/;
      let valiEmail = /^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$/;
      $('input[name=phoneReciever]').focusout(function(e){
          e.preventDefault();
          if(!valiPhone.test($(this).val())){
              $('#valiPhone').text("Invail Phone. Try again");
              $('#next').attr('disabled','disabled');      
              $(this).addClass('is-invalid');
          }else{
              $(this).removeClass('is-invalid');
              $('#valiPhone').text('');
          }
      });
      $("input[name='nameReciever']").focusout(function(e){
          e.preventDefault();
          if($(this).val().trim().length==0){
              $('#valiName').text("Please add name for order");
              $('#next').attr('disabled','disabled');      
              $(this).addClass('is-invalid');
          }else{
              $(this).removeClass('is-invalid');
              $('#valiName').text('');
          }
      });
      $('input[name=emailReciever]').focusout(function(e){
          e.preventDefault();
          if(!valiEmail.test($(this).val())){
              $('#valiEmail').text("Invaild Email. Try again");
              $('#next').attr('disabled','disabled');
              $(this).addClass('is-invalid');      
          }else{
              $(this).removeClass('is-invalid');
              $('#valiEmail').text('');
          };
      });
      $('input[name="nameReciever"],input[name="phoneReciever"],input[name="emailReciever"]').on('blur', function(e) {
          e.preventDefault();
          if($('input[name="nameReciever"]').val().trim().length > 0 && $('input[name="emailReciever"]').val().trim().length >0 && $('input[name="phoneReciever"]').val().trim().length>0){
              $("#sendAddress").removeAttr('disabled');
              if($('#ward').val()){
                $('#submit_order').removeAttr('disabled');
              }
          }else{
              $("#sendAddress").attr('disabled','disabled');
              $("#submit_order").attr('disabled','disabled');
          };
      });
      $('#sendAddress').click(function(){
          $('#province option:selected').val($('#province option:selected').text());
          $('#district option:selected').val($('#district option:selected').text());
          $('#ward option:selected').val($('#ward option:selected').text());
      })
      $("input[name=order_method]").change(function(){
        if((($('input[name="nameReciever"]').val().trim().length > 0 && $('input[name="emailReciever"]').val().trim().length >0 && $('input[name="phoneReciever"]').val().trim().length>0) || ($('input[name=select_address]:checked').val())) && (($('#paypal').is(':checked') && $('#paypal_btn').data('success') == "success")|| $("#cashonDelivery").is(':checked'))){
              $('#submit_order').removeAttr('disabled');
          }else{
              $("#submit_order").attr('disabled','disabled');
          };
      })
      $('input[name=register_email]').change(function(){
        if(!valiEmail.test($(this).val())){
          $('#register_email').text("Invaild Email. Try again");
          $('#register_submit').attr('disabled','disabled');
          if($(this).hasClass('is-valid')){
            $(this).removeClass('is-valid');
          }
          $(this).addClass('is-invalid');      
        }else{
          $.get(window.location.origin + '/index.php/ajax/check-email/'+$(this).val(), function(data){
            if(data == "existed"){
              $('input[name=register_email]').addClass('is-invalid');
              $('#register_email').text('This email has signed. Choose another one or signin');
            }else{
              if($('input[name=register_email]').hasClass('is-invalid')){
                $('input[name=register_email]').removeClass('is-invalid');
              }
              $('input[name=register_email]').addClass('is-valid');
              $('#register_email').text('');
            }
          });
        };
      });
      $('input[name=register_phone]').change(function(){
        if(!valiPhone.test($(this).val())){
              if($("#register_phone").hasClass('text-success')){
                $("#register_phone").removeClass('text-success');
                $("#register_phone").addClass('text-danger');
              }
              $('#register_phone').text("Invaild Phone. EX: +84123456789");
              $('#register_submit').attr('disabled','disabled');
              if($(this).hasClass('is-valid')){
                $(this).removeClass('is-valid');
              }
              $(this).addClass('is-invalid');      
          }else{
              if($(this).hasClass("is-invalid")){
                $(this).removeClass('is-invalid');
              }
              $(this).addClass('is-valid');
              $('#register_phone').text('');
          };
      });
      $('input[name=register_password]').change(function(){
        if(!valPass.test($(this).val())){
            $('#register_password').text("Password is invalid. >= 8 characters, at least 1 normal, at least 1 number)");
            $('#register_submit').attr('disabled','disabled');
        }else{
            $('#register_password').text('');
        };
      });
      $('input[name=register_name], input[name=register_phone], input[name=register_email], input[name=register_password], input[name=accepted]').change(function(){
        if($('input[name=register_name]').val().length >0 && $('input[name=register_phone]').val().length >0 && $('input[name=register_email]').val().length> 0 && $('input[name=register_password]').val().length > 0 && $('#accepted').is(':checked')){
          $('#register_submit').removeAttr('disabled');
        }else{
          $('#register_submit').attr('disabled','disabled');
        }
      });
      $("input[name=email_resset]").change(function(){
        if(!valiEmail.test($(this).val())){
          $('#msg_email_resset').text("Invaild Email. Try again");
          $('#email_resset').attr('disabled','disabled');
          if($(this).hasClass('is-valid')){
            $(this).removeClass('is-valid');
          }
          $(this).addClass('is-invalid');      
        }else{
          $.get(window.location.origin + '/index.php/ajax/check-email/'+$(this).val(), function(data){
            if(data == "existed"){
              if($('input[name=email_resset]').hasClass('is-invalid')){
                $('input[name=email_resset]').removeClass('is-invalid');
              }
              $('input[name=email_resset]').addClass('is-valid');
              $('#msg_email_resset').text('');
            }else{
              $('#msg_email_resset').text('Email hasn\'t signed up in Freshshop');
              if($('input[name=email_resset]').hasClass('is-valid')){
                $('input[name=email_resset]').removeClass('is-valid')
              }
              $('input[name=email_resset]').addClass('is-invalid');
            }
          });
        };
      });
      $("input[name=new_password2]").change(function(){
        if(!valPass.test($(this).val())){
          if($(this).hasClass('is-valid')){
            $(this).removeClass('is-valid');
          }
          $(this).addClass('is-invalid');
          $('#msg_register_password').text("Password is invalid. >= 8 characters, at least 1 normal, at least 1 number)");
        }else if($("input[name=reenter_password]").val().trim().length>0 && $(this).val() != $("input[name=reenter_password]").val()){
          if($(this).hasClass('is-valid')){
            $(this).removeClass('is-valid');
          }
          $(this).addClass('is-invalid');
          $("#error_pass").text("Re-enter Password doesn\'t match with Password");
        }else{
          if($(this).hasClass('is-invalid')){
            $(this).removeClass('is-invalid');
          }
          $(this).addClass('is-valid');
          if($("input[name=reenter_password]").hasClass('is-invalid')){
            $("input[name=reenter_password]").removeClass('is-invalid');
          }
          $("input[name=reenter_password]").addClass('is-valid');
          $('#msg_register_password').text('');
          $("#error_pass").text('');
        };
        if($("input[name=reenter_password]").hasClass('is-valid') && $("input[name=new_password]").hasClass('is-valid') && $("input[name=reenter_password]").val() == $("input[name=new_password]").val()){
          $("#submit_newpassword").removeAttr('disabled');
        }else{
          $("#submit_newpassword").attr('disabled','disabled');
        }
      })
      $("input[name=reenter_password]").change(function(){
        if($(this).val() != $("input[name=new_password2]").val()){
          if($(this).hasClass('is-valid')){
            $(this).removeClass('is-valid');
          }
          $(this).addClass('is-invalid');
          
          $("#error_pass").text("Re-enter Password doesn\'t match with Password");
        }else{
          if($(this).hasClass('is-invalid')){
            $(this).removeClass('is-invalid');
          }
          $(this).addClass('is-valid');
          $("#error_pass").text('');
        }
        if($("input[name=reenter_password]").hasClass('is-valid') && $("input[name=new_password2]").hasClass('is-valid') && $("input[name=reenter_password]").val() == $("input[name=new_password2]").val()){
          $("#submit_newpassword").removeAttr('disabled');
        }else{
          $("#submit_newpassword").attr('disabled','disabled');
        }
      })
      $(".modal_coupon").click(function(){
          $.get(window.location.origin+"/index.php/ajax/show_coupon/"+$(this).data('coupon'),function(data){
            let coupon_data = jQuery.parseJSON(data);
            $('#coupon_title_modal').html(coupon_data['title']);
            $('#max_coupon').html(coupon_data['max']);
            $('#code_coupon_modal').val(coupon_data['code']);
            $("#user_used").html(coupon_data['used']);
            $("#coupon_clipboard").click(function(){
              navigator.clipboard.writeText($('#code_coupon_modal').val());
              $('#coupon_clipboard').html("<i class='bi bi-clipboard-check-fill'></i>");
            })
          })
      })
      $(".manager_notificate").click(function(){
        $.get(window.location.origin+"/index.php/manager/ajax/check-notificate/"+$(this).data('order'),function(data){
          let dataJson = jQuery.parseJSON(data);
          $('input[name=id_notificate]').val(dataJson['news']);
          $("#receiver2").html(dataJson['receiver']);
          $("#address2").html(dataJson['address']);
          $('#instruction2').html(dataJson['instruction']);
          $("#phone2").html(dataJson['phone']);
          $('#email_order2').html(dataJson['email']);
          $("#payment_method2").html(dataJson['method']);
          $("#delivery_method2").html(dataJson['delivery_method']);
          if(dataJson['coupon']){
            $("#coupon_title2").html(dataJson['coupon_title']);
            if(dataJson['discount'] >= 10){
              $('#discount2').html("- "+dataJson['discount']+"%");
            }else{
              $('#discount2').html("- "+dataJson['discount']+" đ");
            }
          }
          let list ="";
          let total = 0;
            for (let i = 0; i < dataJson['cart'].length; i++) {
              list+=`<tr><td>${i+1}</td><td><img class='icon-shape icon-xl' src='images/products/${dataJson['image'][i]}'><br>${dataJson['product'][i]}</td><td>${dataJson['cart'][i]['price']} đ</td><td>${dataJson['cart'][i]['sale']}%</td><td>${dataJson["cart"][i]['amount']}g</td></tr>`;
              total+=parseInt(dataJson['cart'][i]['sale']) >0 ?(parseInt(dataJson['cart'][i]['price'])*(1- parseInt(dataJson['cart'][i]['sale'])/100))*(parseInt(dataJson['cart'][i]['amount'])/1000):parseInt(dataJson['cart'][i]['price'])*(parseInt(dataJson['cart'][i]['amount'])/1000);
            };
          $('#listCart2').html(list);
          $("#item_subtotal2").html(total+" đ");
          $('#shipment_fee_modal2').html(dataJson['shipping_fee']+" đ");
          if(parseInt(dataJson['discount']) <10){
            total-= parseInt(dataJson['discount']);
          }else{
            total*=(1- parseInt(dataJson['discount'])/100);
          }
          total+=parseInt(dataJson['shipping_fee']);
          $('#total_order2').html(total+" đ");
          $("#status_order2").html(dataJson['status']);
        })
      })
      $('.check_order').click(function(){
        $.get(window.location.origin+"/index.php/manager/ajax/check-order/"+$(this).data('order'),function(data){
          let dataJson = jQuery.parseJSON(data);
          $('input[name=id_order]').val(dataJson['id_order']);
          $("#receiver").html(dataJson['receiver']);
          $("#address").html(dataJson['address']);
          $('#instruction').html(dataJson['instruction']);
          $("#phone").html(dataJson['phone']);
          $('#email_order').html(dataJson['email']);
          $("#payment_method").html(dataJson['method']);
          $("#delivery_method").html(dataJson['delivery_method'])
          if(dataJson['coupon']){
            $("#coupon_title").html(dataJson['coupon_title']);
            if(dataJson['discount'] >= 10){
              $('#discount').html("- "+dataJson['discount']+"%");
            }else{
              $('#discount').html("- "+dataJson['discount']+" đ");
            }
          }
          let list ="";
          let total = 0;
            for (let i = 0; i < dataJson['cart'].length; i++) {
              list+=`<tr><td>${i+1}</td><td><img class='icon-shape icon-xl' src='images/products/${dataJson['image'][i]}'></td><td>${dataJson['product'][i]}</td><td>${dataJson['cart'][i]['price']} đ</td><td>${dataJson['cart'][i]['sale']}%</td><td>${dataJson["cart"][i]['amount']}g</td></tr>`;
              total+=parseInt(dataJson['cart'][i]['sale']) >0 ?(parseInt(dataJson['cart'][i]['price'])*(1- parseInt(dataJson['cart'][i]['sale'])/100))*(parseInt(dataJson['cart'][i]['amount'])/1000):parseInt(dataJson['cart'][i]['price'])*(parseInt(dataJson['cart'][i]['amount'])/1000);
            };
          $('#listCart').html(list);
          $("#item_subtotal").html(total+" đ");
          $('#shipment_fee_modal').html(dataJson['shipping_fee']+" đ");
          if(parseInt(dataJson['discount']) <10){
            total-= parseInt(dataJson['discount']);
          }else{
            total*=(1- parseInt(dataJson['discount'])/100);
          }
          total+=parseInt(dataJson['shipping_fee']);
          $('#total_order').html(total+" đ");
          $("#status_order option[value="+dataJson['status']+"]").attr("selected", true);
          if(dataJson['status'] == 'unconfirmed'){
            $("#status_order option[value='unconfirmed']").removeAttr('disabled');
            $("#status_order option[value='transaction failed']").attr('disabled','disabled');
            $("#status_order option[value='finished']").attr('disabled','disabled');
          } else if(dataJson['status'] == "delivery"){
            $("#status_order option[value='finished']").removeAttr('disabled');
            $("#status_order option[value='transaction failed']").removeAttr('disabled');
            $("#status_order option[value='unconfirmed']").attr('disabled','disabled');
            $("#status_order option[value='confirmed']").attr('disabled','disabled');
          }else{
            $("#status_order option[value='unconfirmed']").attr('disabled','disabled');
            $("#status_order option[value='confirmed']").removeAttr('disabled');
            $("#status_order option[value='transaction failed']").attr('disabled','disabled');
            $("#status_order option[value='finished']").attr('disabled','disabled');
          }
          $('#order_token').val($('meta[name="csrf-token"]').attr('content'));
          $('#status_order').change(function(){
            $('#save_order').removeAttr('disabled');
          })
        })
      })
      $('.check_order2').click(function(){
        console.log(window.location.origin+"/index.php/ajax/check-order/"+$(this).data('order'));
        $.get(window.location.origin+"/index.php/ajax/check-order/"+$(this).data('order'),function(data){
          let dataJson = jQuery.parseJSON(data);
          console.log(dataJson);
          $('input[name=id_order2]').val(dataJson['id_order']);
          $("#receiver2").html(dataJson['receiver']);
          $("#address2").html(dataJson['address']+","+dataJson['ward']+","+dataJson['district']+","+dataJson['province']);
          $('#instruction2').html(dataJson['instruction']);
          $("#phone2").html(dataJson['phone']);
          $('#email_order2').html(dataJson['email']);
          $("#payment_method2").html(dataJson['method']);
          $("#delivery_method2").html(dataJson['delivery_method'])
          if(dataJson['coupon']){
            $("#coupon_title2").html(dataJson['coupon_title']);
            if(dataJson['discount'] >= 10){
              $('#discount2').html("- "+dataJson['discount']+"%");
            }else{
              $('#discount2').html("- "+dataJson['discount']+" đ");
            }
          }
          let list ="";
          let total = 0;
            for (let i = 0; i < dataJson['cart'].length; i++) {
              list+=`<tr><td>${i+1}</td><td><img class='icon-shape icon-xl' src='images/products/${dataJson['image'][i]}'></td><td>${dataJson['product'][i]}</td><td>${dataJson['cart'][i]['price']} đ</td><td>${dataJson['cart'][i]['sale']}%</td><td>${dataJson["cart"][i]['amount']}g</td></tr>`;
              total+=parseInt(dataJson['cart'][i]['sale']) >0 ?(parseInt(dataJson['cart'][i]['price'])*(1- parseInt(dataJson['cart'][i]['sale'])/100))*(parseInt(dataJson['cart'][i]['amount'])/1000):parseInt(dataJson['cart'][i]['price'])*(parseInt(dataJson['cart'][i]['amount'])/1000);
            };
          $('#listCart2').html(list);
          $("#item_subtotal2").html(total+" đ");
          $('#shipment_fee_modal2').html(dataJson['shipping_fee']+" đ");
          if(parseInt(dataJson['discount']) <10){
            total-= parseInt(dataJson['discount']);
          }else{
            total*=(1- parseInt(dataJson['discount'])/100);
          }
          total+=parseInt(dataJson['shipping_fee']);
          $('#total_order2').html(total+" đ");
          $("#status_order2 option[value="+dataJson['status']+"]").attr("selected", true);
          
          $('#order_token2').val($('meta[name="csrf-token"]').attr('content'));
          $('#status_order2').change(function(){
            $('#save_order2').removeAttr('disabled');
          })
        })
      })
      $(".denied_order").click(function(){
        $.ajax({
          method: "POST",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: window.location.origin+'/index.php/ajax/denied-order',
          data: {'id_order':$(this).data('order')},
          success: function (data) {
            if(data == 0){
              $('#show_acceptorder').css('display','none')
            }
          }
        });
      })
      $(".accept_order").click(function(){
        $.ajax({
          method: "POST",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: window.location.origin+'/index.php/ajax/accept-order',
          data: {'id_order':$(this).data('order')},
          success: function (data) {
            if(data == 0){
              $('#show_acceptorder').css('display','none')
            }
          }
        });
      });
      $('#checkCoupon').click(function() {
            if ($('#giftcard').val().length > 0) {
                $.get(window.location.origin + "/index.php/ajax/add-coupon/" + $('#giftcard').val(),function(data) {
                    let total = parseInt($('#total_items').data('total'));
                    let subtotal = parseInt($('#item_subtotal').data('subtotal'));
                    if (data) {
                        let dataJson = jQuery.parseJSON(data);
                        if (!dataJson['error']) {
                            $('#added_coupon').removeClass('d-none');
                            $('#wrong_code').addClass('d-none');
                            $('#giftcard').removeClass('is-invalid')
                            $('#giftcard').addClass('is-valid');
                            $('#coupon_title').html(dataJson['title']);
                            if (dataJson['code'].includes('FREESHIP')) {
                                $('#discount').html('- $' + dataJson['discount']);
                                total -= parseFloat(dataJson['discount']);
                            } else {
                                $('#discount').html('- ' + dataJson['discount'] + '%');
                                total *= (1 - parseFloat(dataJson['discount']) / 100);
                            };
                            total += 2;
                            $('#total_items').html("$"+Math.floor(total));
                            $('#total_cart').html("$"+Math.floor(total));
                        } else {
                            total += 2;
                            $('#total_items').html("$"+Math.floor(total));
                            $('#total_cart').html("$"+Math.floor(total));
                            $('#added_coupon').addClass('d-none');
                            $('#giftcard').removeClass('is-valid');
                            $('#giftcard').addClass('is-invalid');
                            $('#wrong_code').removeClass('d-none').html(dataJson['error']);
                        }
                    } else {
                        total += 24200;
                        $('#total_items').html("$"+Math.floor(total));
                        $('#total_cart').html("$"+Math.floor(total));
                        $('#added_coupon').addClass('d-none');
                        $('#giftcard').removeClass('is-valid');
                        $('#giftcard').addClass('is-invalid');
                        $('#wrong_code').removeClass('d-none').html("This code is not exited");
                    }

                })
            }
        })
//Chat script
    //   $('#btn_close').click(function(){
    //       $('#chatbox').toggleClass('d-none');
    //   })
    //   $('.show_chat').click(function(){
    //     $('#chatbox').removeClass('d-none');
    //     $('#messages').data('chat',$(this).data('groupcode'));
    //     $('#messages').data('iduser',$(this).data('iduser'));
    //     $.ajax(
    //         {method: "GET",
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url: window.location.origin+'/index.php/ajax/message/show',
    //         data: {'codegroup':$(this).data('groupcode'),'id_user':$(this).data('iduser')},
    //         success: function (data) {
    //           let data_mess  = data.split('-/-');
    //           $('#messages').html(data_mess[0]);
    //           $('#usr_contact').html(data_mess[0]?data_mess[1]:'');
              
    //         }}
    //     )
    //   });
    //   $('.list_mess').click(function(){
    //     if(!$('#chatbox').hasClass('d-none')){
    //       $('#chatbox').addClass('d-none');
    //     }
    //   })
    //   $('.button-submit').click(function(){
    //     let message = $(this).siblings('input[name="send_message"]');
    //     let chatbox = $(this).parents('.input_message').prev();
    //     if(message.val().length>0){
    //       $.ajax({
    //         method: "POST",
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url: window.location.origin+'/index.php/ajax-post/message',
    //         data: {'send_message':message.val(),'code_group':chatbox.data('chat'),'connect_user':chatbox.data('iduser')},
    //         success: function (data) {
    //           let mess_data = jQuery.parseJSON(data);
    //           if(mess_data['message']){
    //               chatbox.append(`<div class="d-flex flex-row mb-4 mx-3"><div class="ms-auto">
    //                 <div class="text-wrap rounded-1 py-1 px-2 bg-light">
    //                   ${mess_data['message']}
    //                 </div>
    //               </div>
    //             </div>`);
    //           }
    //           $('.list_mess').find('span').html(mess_data['unread_mess']);
    //         }
    //       });
    //       message.val('');
    //     };
    //   });
    // $('.show_listchat').click(function() {
    //     let nextDD = $(this).next();
    //     $('.chatbox').not(nextDD).removeClass('show');
    // })

    // function split(val) {
    //     return val.split(/@\s*/);
    // }
    // function extractLast(term) {
    //     return split(term).pop();
    // }
    // let availableTags = [];
    // @if (isset($name_products))
    //     @foreach ($name_products as $key => $value)
    //         var object = new Object();
    //         @foreach ($value as $key2 => $value2)
    //             object['{{ $key2 }}'] = "{{ $value2 }}";
    //         @endforeach
    //         availableTags.push(object);
    //     @endforeach
    // @endif
    // $("input[name=send_message]").autocomplete({
    //   minLength: 0,
    //   source: function(request, response) {
    //       var results, term = request.term;
    //       var aData = $.map(availableTags, function(value, key) {
    //         return {
    //             label: value.name,
    //             value: value.id
    //         }
    //       });
    //       if (term.indexOf("@") >= 0) {
    //         term = extractLast(request.term);
    //         /* If they've typed anything after the "@": */
    //         if (term.length > 0) {
    //             results = $.ui.autocomplete.filter(
    //                 aData, term);
    //         } else {
    //             results = ['Start typing...'];
    //         }
    //       }
    //       response(results);
    //   },
    //   focus: function(event, ui) {
    //       return false;
    //   },
    //   select: function(event, ui) {
    //     let chatbox = $(this).parents('.input_message').prev();
    //     $.ajax({
    //         method: "POST",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
    //                 'content')
    //         },
    //         url: window.location.origin +
    //             '/index.php/ajax-post/message',
    //         data: {
    //             'send_link': ui.item.value,
    //             'code_group': chatbox.data('chat'),
    //             'connect_user': chatbox.data('iduser')
    //         },
    //         success: function(data) {
    //           let mess_data = jQuery.parseJSON(data);
    //           if (mess_data['link']) {
    //               let share = `<div class='row mb-4 mx-3'><div class='col-2 '></div><div class="col-10  rounded-1 border py-1 px-2 "><div class='card my-3'><a href='${mess_data['share_link']}'>
    //                           <div class='row g-0'>
    //                             <div class='col-4'>
    //                               <img src='${mess_data['image']}' class='img-fluid rounded-start' >
    //                             </div>
    //                           <div class='col-8'>
    //                             <div class='card-body'>
    //                             <h5 class='card-title text-uppercase'>${mess_data['name_product']}</h5>
    //                             <p class="card-text">View >> </p>
    //                           </div></div></div></a></div></div>`;
    //               chatbox.append(share);
    //           };
    //           $('.list_mess').find('span').html(mess_data['unread_mess']);
    //         }
    //     });
    //     $("input[name=send_message]").val('');
    //     return false;
    //   }
    // })
    // $('.clear_chat').click(function(e){
    //   e.preventDefault();
    //   let code_gr = $('#messages').data('chat');
    //   window.location.assign(window.location.origin+"/index.php/ajax/message/clear/"+code_gr);
    // })
    $("#share_fb").click(function(e){
      e.preventDefault();
      window.open(`https://www.facebook.com/sharer/sharer.php?u=${window.location.href}`, "_blank")
    });
    $("#share_tw").click(function(e){
      e.preventDefault();
      window.open(`https://twitter.com/intent/tweet?url=${window.location.href}`, "_blank")
    })
  })

</script>
