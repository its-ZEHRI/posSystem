$(document).ready(function () {

    refresh_Temp_Product_table();
    refresh_Supplier_table();
    refresh_Customers_table();
    loadProductIntoSaleTable();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    })
// <================================================================>
// <====================>  PURCHASE PAGE START <====================>
// <================================================================>

    // ENTRY FORM OF PURCHASE
    $(this).on('click', '#purchase_form_btn', function (e) {
        e.preventDefault();
        if($('#temp_category_field').val() == 0){
            $('#msg_alert').click();
            setTimeout(function() {
                $('.alert .close i').click()
            }, 1500);
            return
        }
        var data = {
            'product_name': $('#temp_p_name_field').val(),
            'p_code'      : $('#temp_p_code_field').val(),
            'p_price'     : $('#temp_p_price_field').val(),
            'ws_price'    : $('#temp_ws_price_field').val(),
            's_price'     : $('#temp_s_price_field').val(),
            'quantity'    : $('#temp_quantity_field').val(),
            'category_id' : $('#temp_category_field').val(),
            'supplier_id' : $('#temp_category_field').val(),
        }
        $("#data_entry_form")[0].reset();
        $.ajax({
            type     : 'POST',
            url      : `/purchase/tempCreateData`,
            dataType : 'json',
            data     : data,
            success: function (response) {
                if (response.status == 200) {
                    refresh_Temp_Product_table()
                    var s_no = parseInt($('#s_no').text())
                    $('#s_no').text(s_no + 1)
                    $("#data_entry_form")[0].reset();
                    $('#save_alert').click();
                    resetForm()
                    setTimeout(function() {
                        $('.alert .close i').click()
                    }, 1500);
                }
                else
                    alert('else wala error')
            },
            error: function (response) {
                $('#error_alert').click();
                // alert('function Error -- error')
            }
        })  // END OF AJAX
    }) // END OF ENTRY FORM OF PURCHASE

    //  UPDATE FORM OF PURCHASE
    $(this).on('click', '#purchase_form_update_btn', function (event) {
        event.preventDefault()
        var FormData = {
            'id'          : $('#temp_p_id_field').val(),
            'product_name': $('#temp_p_name_field').val(),
            'p_code'      : $('#temp_p_code_field').val(),
            'p_price'     : $('#temp_p_price_field').val(),
            'ws_price'    : $('#temp_ws_price_field').val(),
            's_price'     : $('#temp_s_price_field').val(),
            'quantity'    : $('#temp_quantity_field').val(),
            'category_id' : $('#temp_category_field').val(),
        }
        $.ajax({
            type: 'POST',
            url: `/purchase/tempUpdateData`,
            data: FormData,
            success: function (response) {
                if (response.status == 200)
                    refresh_Temp_Product_table()
                    $('#data_entry_form')[0].reset()
                    $('#update_alert').click();
                    $('#purchase_form_update_btn'  ).text('Save');
                    $('#purchase_form_update_btn').attr('id', 'purchase_form_btn');
                    resetForm()
            },
            error: function (response) {
                alert('Ajax function Error...!!')
            }

        }) // END OF AJAX
    }) // END OF UPDATE FORM OF PURCHASE

    $(this).on('click', '.temp_delete_btn', function () {
        var id = $(this).val();
        // alert(id)
        $.ajax({
            type: 'GET',
            url: `/purchase/destroy/${id}`,
            success: function (response) {
                if (response.status == 400) {
                    alert(response.message)
                }
                else if (response.status == 200) {
                    refresh_Temp_Product_table()
                    $('#delete_alert').click();
                }
            }

        })//END OF AJAX
    })//END OF DELETE

    //  FORM OF PAYMENT CARD
    $(this).on('submit', '#purchase_payment_form', function (event) {
        event.preventDefault()
        if($('#supplier_input').val() == 0){
            $('#payment_card_alert').click()
            setTimeout(function() {
                $('.alert .close i').click()
            }, 1500);
            return
        }
        var formData = {
            'total_amount' : $('#total_amount').val().slice(0,-2),
            'discount'     : $('#discount').val().slice(0,-2),
            'net_amount'   : $('#net_amount').val().slice(0,-2),
            'balance'      : $('#balance').val().slice(0,-2),
            'paid_amount'  : $('#paid_amount').val().slice(0,-2),
            'supplier_id'  : $('#supplier_input').val()
        }
        $.ajax({
            type: 'POST',
            url: `/purchase/productStore`,
            data: formData,
            success: function (response) {
                if (response.status == 200)
                    console.log(response.data)
                    $('#purchase_alert').click();
                    setTimeout(function() {
                        $('.alert .close i').click()
                    }, 2000);
                    refresh_Temp_Product_table()
                    $('#discount').val('0/-')
                    $('#net_amount').val('0/-')
                    $('#balance').val('0/-')
                    $('#paid_amount').val('0/-')
            },
            error: function (response) {
                alert('Ajax function Error...!!')
            }

        }) // END OF AJAX
    }) // END OF PAYMENT FORM

    function refresh_Temp_Product_table(e) {
        // alert($('#url').text())
        $.ajax({
            type: 'GET',
            url: `/refreshPurchase`,
            success: function (response) {
                if (response.status == 200) {
                    $('#temp_table tbody').html('')
                    $('#total_amount').val('0/-')
                    $.each(response.products, function (key, item) {
                        $('#temp_table').append('<tr>\
                        <td>'+ (key + 1) + '</td>\
                        <td>'+ item.product_name + '</td>\
                        <td>'+ item.p_code + '</td>\
                        <td class="col_price">'+ item.p_price + '/-</td>\
                        <td>'+ item.ws_price + '/-</td>\
                        <td>'+ item.s_price + '/-</td>\
                        <td class="col_quantity">'+ item.quantity + '</td>\
                        <td class="d-none">'+ item.id + '</td>\
                        <td class="d-non">'+ item.name + '</td>\
                        <td class="d-non">'+ item.category_id + '</td>\
                        <td class="temp_table_actions d-none">'+ "<a href='#top'><i id='' style='font-size: 20px' class='temp_edit_btn text-info fa-solid fa-pen-to-square'></i>" + '</td>\
                        <td class="temp_table_actions d-none">'+ '<button value="' + item.id + '" class="temp_delete_btn">\
                        <i style = "font-size: 20px" class= "text-rose fa-solid fa-trash-can" ></i>\
                        </button>'+ '</td >\
                    </tr> ')
                    })//END OF EACH
                    $('#action_heading').addClass('d-none');
                    $('#actions_expand i').addClass('d-none')
                    $('#actions_compress i').removeClass('d-none')
                    PriceTable()
                }//END OF IF
                else {
                    $('#error_alert').click()
                }
            },//END OF SUCCESS
            error: function (response) {
                $('#error_alert').click()
            }
        })//END OF AJAX
    }//END OF REFRESH

    // RESET ALL THE INPUT FIELD OF DATA ENTRY FORM
    function resetForm() {
        $('#temp_p_name_field'  ).parent().removeClass('is-focused is-filled');
        $('#temp_p_code_field'  ).parent().removeClass('is-focused is-filled');
        $('#temp_p_price_field' ).parent().removeClass('is-focused is-filled');
        $('#temp_s_price_field' ).parent().removeClass('is-focused is-filled');
        $('#temp_ws_price_field').parent().removeClass('is-focused is-filled');
        $('#temp_quantity_field').parent().removeClass('is-focused is-filled');
    }// END

    // GETTING THE VALUES FROM TABLE FOR DISPLAY TO USER
    function PriceTable() {
        $('#total_amount').val("0/-"); //
        $('#net_amount').val("0/-"); //
        $('#balance').val("0/-"); //
        $('#temp_table tbody tr').each(function () {
            var value = parseInt($(this).children('.col_price').text().slice(0, -2)) * parseInt($(this).children('.col_quantity').text())
            var total = parseInt($('#total_amount').val().slice(0, -2))
            var sub_total = value + total;
            $('#total_amount').val(sub_total + "/-"); //
            $('#net_amount').val(sub_total + "/-"); //
            $('#balance').val(sub_total + "/-"); //
        })
    } // END

// <================================================================>
// <=====================>  PURCHASE PAGE END <=====================>
// <================================================================>


// <================================================================>
// <====================>  CUSTOMER PAGE START <====================>
// <================================================================>

    $(this).on('submit', '#add_customer_form', function (event) {
        event.preventDefault()
        var formdata = {
            'name' : $('#customer_name').val(),
            'email' : $('#customer_email').val(),
            'contact' : $('#customer_contact').val(),
            'address': $('#customer_address').val(),
        }
        $.ajax({
            type : 'POST',
            url  : `/customer/createCustomer`,
            data: formdata,
            success: function (response) {
                if (response.status == 200) {
                    $('#add_customer_form')[0].reset()
                    $('#save_alert').click()
                    refresh_Customers_table();
                }
                else
                    $('#error_alert').click()
            },
            error: function (response) {
                $('#error_alert').click()
            },
        })//END OF AJAX
    })//END OF SUBMIT

    function refresh_Customers_table() {
        $.ajax({
            type: 'GET',
            url: `/refreshCustomer`,
            success: function (response) {
                if (response.status == 200) {
                    $('#customer_table tbody').html('')
                    $.each(response.customers, function (key, item) {
                        $('#customer_table').append('<tr>\
                        <td> '+ (key + 1) +    '  </td>\
                        <td> '+ item.name +    '  </td>\
                        <td> '+ item.email +    '  </td>\
                        <td> '+ item.contact + '  </td>\
                        <td> '+ item.address + '  </td>\
                        <td class="d-none">'+ item.id + '</td>\
                    </tr> ')
                    })//END OF EACH
                }//END OF IF
                else {
                    $('#error_alert').click()
                }
            },//END OF SUCCESS
            error: function (response) {
                $('#error_alert').click()
            }
        })//END OF AJAX
    }//END OF REFRESH

// <================================================================>
// <=====================>  CUSTOMER PAGE END <=====================>
// <================================================================>


// <================================================================>
// <====================>  SUPPLIER PAGE START <====================>
// <================================================================>

    $(this).on('submit', '#add_supplier_form', function (event) {
        event.preventDefault()
        var formdata = {
            'name' : $('#supplier_name').val(),
            'contact' : $('#supplier_contact').val(),
            'address': $('#supplier_address').val(),
        }
        $.ajax({
            type : 'POST',
            url  : `supplier/createSupplier`,
            data: formdata,
            success: function (response) {
                if (response.status == 200) {
                    $('#add_supplier_form')[0].reset()
                    $('#save_alert').click()
                    refresh_Supplier_table()
                }
                else
                    $('#error_alert').click()
            },
            error: function (response) {
                $('#error_alert').click()
            },
        })//END OF AJAX
    })//END OF SUBMIT


    function refresh_Supplier_table() {
        $.ajax({
            type: 'GET',
            url: `/refreshSupplier`,
            success: function (response) {
                if (response.status == 200) {
                    $('#supplier_table tbody').html('')
                    $.each(response.suppliers, function (key, item) {
                        $('#supplier_table').append('<tr>\
                        <td> '+ (key + 1) +    '  </td>\
                        <td> '+ item.name +    '  </td>\
                        <td> '+ item.contact + '  </td>\
                        <td> '+ item.address + '  </td>\
                        <td class="d-none">'+ item.id + '</td>\
                    </tr> ')
                    })//END OF EACH
                }//END OF IF
                else {
                    $('#error_alert').click()
                }
            },//END OF SUCCESS
            error: function (response) {
                $('#error_alert').click()
            }
        })//END OF AJAX
    }//END OF REFRESH


// <================================================================>
// <=====================>  SUPPLIER PAGE END <=====================>
// <================================================================>


// <================================================================>
// <======================>  SALE PAGE START <======================>
// <================================================================>

    function loadProductIntoSaleTable(){
        $.ajax({
            type: 'GET',
            url: `sale/loadSaleTable`,
            success: function (response) {
                if (response.status == 200) {
                    $('#sale_product_table').html('')
                    $.each(response.products, function (key, item) {
                        $('#sale_product_table').append('<tr>\
                        <td>'+ (key + 1) + '</td>\
                        <td>'+ item.product_name + '</td>\
                        <td class="d-none">'+ item.p_code + '</td>\
                        <td class="d-none">'+ item.p_price + '/-</td>\
                        <td class="d-none">'+ item.ws_price + '/-</td>\
                        <td class="text-center">'+ item.s_price + '/-</td>\
                        <td class="text-center">'+ item.quantity + '</td>\
                        <td class="d-none">'+ item.id + '</td>\
                        <td class="d-none">'+ item.name + '</td>\
                        <td class="d-none">'+ item.category_id + '</td>\
                        <td class="text-center"><i class="fa-solid fa-cart-plus"></i></td>\
                        <td class="temp_table_actions d-none">'+ '<button value="' + item.id + '" class="temp_delete_btn">\
                        <i style = "font-size: 20px" class= "text-rose fa-solid fa-trash-can" ></i>\
                        </button>'+ '</td >\
                    </tr> ')
                    })//END OF EACH
                }//END OF IF
                else {
                    $('#error_alert').click()
                }
            },//END OF SUCCESS
            error: function (response) {
                $('#error_alert').click()
            }
        })//END OF AJAX
    }

    //  FORM OF PAYMENT CARD
    $(this).on('submit', '#sale_payment_form', function (event) {
        event.preventDefault()
        var products_ids = [];
        var products_quantities = [];
        $('#cart_table tbody tr').each(function(){
            products_ids.push($(this).find('.product_id').text())
            products_quantities.push($(this).find('.col_quantity').text())
        })
        if(products_quantities == ''){
            $('#msg_alert').click()
            setTimeout(function() {
                $('.alert .close i').click()
            }, 1500);
            return
        }
        // console.log(product_list);
        var formData = {
            'total_amount' : $('#total_amount').val().slice(0,-2),
            'discount' : $('#discount').val().slice(0,-2),
            'net_amount' : $('#net_amount').val().slice(0,-2),
            'balance' : $('#balance').val().slice(0,-2),
            'paid_amount' : $('#paid_amount').val().slice(0,-2),
            'customer_id' : $('#customer_input').val(),
            'products_ids' : products_ids,
            'products_quantities' : products_quantities
        }
        // console.log(formData)
        $.ajax({
            type: 'POST',
            url: `/sale/productSale`,
            data: formData,
            success: function (response) {
                if (response.status == 200)
                    loadProductIntoSaleTable()
                    $('#product_sale_alert').click();
                    $('#cart_table tbody').html('')
                    setTimeout(function() {
                        $('.alert .close i').click()
                    }, 1500);
                    $('#total_amount').val('0/-')
                    $('#discount').val('0/-')
                    $('#net_amount').val('0/-')
                    $('#balance').val('0/-')
                    $('#paid_amount').val('0/-')
            },
            error: function (response) {
                alert('Ajax function Error...!!')
            }

        }) // END OF AJAX
    }) // END OF PAYMENT FORM




// <================================================================>
// <======================>  SALE PAGE END <======================>
// <================================================================>

})//END OF READY
