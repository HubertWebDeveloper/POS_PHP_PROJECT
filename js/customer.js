$(document).ready(function() {
    
    alertify.set('notifier','position','top-right');

    $(document).on('click', '.increment', function() {

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodId').val();
        var productQty = $(this).closest('.qtyBox').find('.prodQty').val();
        var $currentValue = parseInt($quantityInput.val());

        if(!isNaN($currentValue) && $currentValue < productQty){
            var qtyVal = $currentValue + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);// call function
        }
    });
    $(document).on('click', '.decrement', function() {

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodId').val();
        var $currentValue = parseInt($quantityInput.val());

        if(!isNaN($currentValue) && $currentValue > 1){
            var qtyVal = $currentValue - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);// call function
        }
    });

    function quantityIncDec(prodId, qty){
        $.ajax({
            type: "POST",
            url: "InsertCode.php",
            data: {
                'productIncDec': true,
                'product_id': prodId,
                'quantity_up': qty
            },
            success: function (response) {
                var res = JSON.parse(response);
                if(res.status == 200){
                    // window.location.reload();
                    $('#productArea').load(' #productContent');
                    alertify.success(res.message);
                }else{
                    $('#productArea').load(' #productContent');
                    alertify.success(res.message);
                }
            }
        })
    }
    // proceed to place order
    $(document).on('click','.proceedToPlace', function(){
        
        var payment_mode = $('#payment_mode').val();
        var cphone = $('#cphone').val();

        if(payment_mode == ''){
            swal("Select Payment Mode","Select your payment mode","warning");
            return false;
        }
        if(cphone == '' && !$.isNumeric(cphone)){
            swal("Customer Phone Number","Please Enter Customer Phone Number","warning");
            return false;
        }
        var data = {
            'proceedToPlaceBtn': true,
            'cphone': cphone,
            'payment_mode': payment_mode
        };
        $.ajax({
            type: "POST",
            url:"InsertCode.php",
            data: data,
            success: function (response) {
                var res = JSON.parse(response);
                if(res.status == 200){
                    window.location.href = "Order.php";
                }else if(res.status == 404){
                    swal(res.message, res.message, res.status_type, {
                        buttons: {
                            catch: {
                                text: "Add Customer",
                                value: "catch"
                            },
                            cancel: "Cancel"
                        }
                    })
                    .then((value) => {
                        switch(value){
                            case "catch":
                                $('#c_phone').val(cphone);
                                $('#addCustomerModal').modal('show');
                                //console.log('Pop');
                                break;
                            default:
                        }
                    });
                }else{
                    swal(res.message, res.message, res.status_type);
                }
            }
        });
    })
    // proceed to add bonus
    $(document).on('click','#proceedToBonus', function(){

        //$('#addCustomerBonus').show();
    })
    // for saving new customer data
    $(document).on('click','.saveCustomer', function () {
 
        var c_name = $('#c_name').val();
        var c_phone = $('#c_phone').val();
        var c_email = $('#c_email').val();

        if(c_name !='' && c_phone !=''){
           if($.isNumeric(c_phone)){
              var data2 = {
                 'saveCustomerBtn': true,
                 'c_name': c_name,
                 'c_email': c_email,
                 'c_phone': c_phone,
              };
              $.ajax({
                type: "POST",
                url:"InsertCode.php",
                data: data2,
                success: function (response) {
                    var res = JSON.parse(response);
                    if(res.status == 200){
                        swal(res.message, res.message, res.status_type);
                        $('#addCustomerModal').modal('hide');
                    }else if(res.status == 422){
                        swal(res.message, res.message, res.status_type);
                    }else{
                        swal(res.message, res.message, res.status_type);
                    }
                }
              });

           }
        }else{
            swal("please fill required fields","","warning");
        }
    });
})