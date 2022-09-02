// console.log('working');
$(document).ready(function () {

    // FORCUSTOM DROPDOWN IN PURCHASE PAGE
    $('#category_card + div').hide();
    $('#supplier_card + div').hide();
    $('#category_card + div').removeClass('d-none');
    $('#supplier_card + div').removeClass('d-none');
    // END

    if ($('#email').val() == '') {}
    else $('#email').addClass('is-focused is-filled')

    if ($('#password').val() == '') {}
    else $('#password').addClass('is-focused is-filled')

    // FIXED FLUGIN
    $(this).on('click', '#purple', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
        $(".card .card-header-primary .card-icon,.card .card-header-primary .card-text,.card .card-header-primary:not(.card-header-icon):not(.card-header-text),.card.bg-primary,.card.card-rotate.bg-primary .front,.card.card-rotate.bg-primary .back").css('background-color', selected_color);
        $('.text-primary').css('color', selected_color);
        $('.c-btn-primary').css('background-color', selected_color);
    });

    $(this).on('click', '#azure', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
        $(".card .card-header-primary .card-icon,.card .card-header-primary .card-text,.card .card-header-primary:not(.card-header-icon):not(.card-header-text),.card.bg-primary,.card.card-rotate.bg-primary .front,.card.card-rotate.bg-primary .back").css('background-color', selected_color);
        $('.text-primary').css('color', selected_color);
        $('.c-btn-primary').css('background-color', selected_color);
    });

    $(this).on('click', '#green', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
        $(".card .card-header-primary .card-icon,.card .card-header-primary .card-text,.card .card-header-primary:not(.card-header-icon):not(.card-header-text),.card.bg-primary,.card.card-rotate.bg-primary .front,.card.card-rotate.bg-primary .back").css('background-color', selected_color);
        $('.text-primary').css('color', selected_color);
        $('.c-btn-primary').css('background-color', selected_color);
    });

    $(this).on('click', '#orange', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
        $(".card .card-header-primary .card-icon,.card .card-header-primary .card-text,.card .card-header-primary:not(.card-header-icon):not(.card-header-text),.card.bg-primary,.card.card-rotate.bg-primary .front,.card.card-rotate.bg-primary .back").css('background-color', selected_color);
        $('.text-primary').css('color', selected_color);
        $('.c-btn-primary').css('background-color', selected_color);
    });

    $(this).on('click', '#danger', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
        $(".card .card-header-primary .card-icon,.card .card-header-primary .card-text,.card .card-header-primary:not(.card-header-icon):not(.card-header-text),.card.bg-primary,.card.card-rotate.bg-primary .front,.card.card-rotate.bg-primary .back").css('background-color', selected_color);
        $('.text-primary').css('color', selected_color);
        $('.c-btn-primary').css('background-color', selected_color);
    });

    $(this).on('click', '#rose', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
        $(".card .card-header-primary .card-icon,.card .card-header-primary .card-text,.card .card-header-primary:not(.card-header-icon):not(.card-header-text),.card.bg-primary,.card.card-rotate.bg-primary .front,.card.card-rotate.bg-primary .back").css('background-color', selected_color);
        $('.text-primary').css('color', selected_color);
        $('.c-btn-primary').css('background-color', selected_color);
    });
    // END

    $(this).on('click', '#data_entry_form .form-group', function () {
        $('#data_entry_form .is-focused').removeClass('is-focused');
        $(this).addClass('is-focused');
    });

    // EDIT BUTTON IN TEMPORARY TABLE
    $(this).on('click', '.temp_edit_btn', function () {
        var $row = $(this).closest("tr");
        $('#temp_p_name_field'  ).parent().addClass('is-focused');
        $('#temp_p_code_field'  ).parent().addClass('is-focused');
        $('#temp_p_price_field' ).parent().addClass('is-focused');
        $('#temp_s_price_field' ).parent().addClass('is-focused');
        $('#temp_ws_price_field').parent().addClass('is-focused');
        $('#temp_quantity_field').parent().addClass('is-focused');

        $('#temp_p_name_field'  ).val($row.find("td:eq(1)").text());
        $('#temp_p_code_field'  ).val($row.find("td:eq(2)").text());
        $('#temp_p_price_field' ).val($row.find("td:eq(3)").text().slice(0, -2));
        $('#temp_s_price_field' ).val($row.find("td:eq(4)").text().slice(0, -2));
        $('#temp_ws_price_field').val($row.find("td:eq(5)").text().slice(0, -2));
        $('#temp_quantity_field').val($row.find("td:eq(6)").text());
        $('#temp_p_id_field'    ).val($row.find("td:eq(7)").text());
        $('#purchase_form_btn'  ).text('Update');
        $('#purchase_form_btn'  ).attr('id', 'purchase_form_update_btn');
        $('#category_name').text($row.find("td:eq(8)").text())
        $('#temp_category_field').val($row.find("td:eq(9)").text())
    });

    $(this).on('click', '#category_card', function () {
        $('#category_card + div').slideToggle(500);
        $('#category_card i').toggleClass('rotation');
        $('#supplier_card + div').slideUp(500);
        $('#supplier_card i').removeClass('rotation')
        return false;
    });

    $(this).on('click', '#supplier_card', function () {
        $('#supplier_card + div').slideToggle(500);
        $('#supplier_card i').toggleClass('rotation');
        $('#category_card + div').slideUp(500);
        $('#category_card i').removeClass('rotation');
        return false;
    });

    $(document).click(function () {
        $('#category_card + div').slideUp(500);
        $('#supplier_card + div').slideUp(500);
        $('#category_card i').removeClass('rotation')
        $('#supplier_card i').removeClass('rotation')
    });

    $(".categ_list").click(function() {
        var catg = $(this).find(".categ").text();
        $('#category_card h5').text(catg);
        console.log(catg);
    });

    $(".supp_list").click(function() {
        var supp = $(this).find(".supp").text();
        $('#supplier_card h5').text(supp);
    });
    // END

    // WHEN USER SELECT CATEGORY
    $(this).on('click', '.selected_category', function () {
        $('#temp_category_field').val($(this).children('span').text());
    });

    // SEARCH IN THE CATEGORY DROPDOWN FOR CATERGORY
    $(this).on('click','#category_filter',function(){
        $('#category_card + div').slidedown(500);
        $('#supplier_card + div').slidedown(500);
        $('#category_card i').addClass('rotation')
        $('#supplier_card i').addClass('rotation')
    })
    // END

    // WHEN USER SELECT SUPPLIER
    $(this).on('click', '.selected_supplier', function () {
        $('#temp_supplier_field').val($(this).children('span').text());
        $('#supplier_input').val($(this).children('span').text());
    });

    // SEARCH IN THE SUPPLIER DROPDOWN FOR SUPPLIER
    $(this).on('click','#supplier_filter',function(){
        $('#category_card + div').slidedown(500);
        $('#supplier_card + div').slidedown(500);
        $('#category_card i').addClass('rotation')
        $('#supplier_card i').addClass('rotation')
    })//END

    // CLEAR THE PURCHASE FORM
    $(this).on('click', '#purchase_form_clear_btn', function (event) {
        event.preventDefault()
        $('#data_entry_form')[0].reset()
        $('#temp_p_name_field'  ).parent().removeClass('is-focused is-filled');
        $('#temp_p_code_field'  ).parent().removeClass('is-focused is-filled');
        $('#temp_p_price_field' ).parent().removeClass('is-focused is-filled');
        $('#temp_s_price_field' ).parent().removeClass('is-focused is-filled');
        $('#temp_ws_price_field').parent().removeClass('is-focused is-filled');
        $('#temp_quantity_field').parent().removeClass('is-focused is-filled');
        $('#purchase_form_update_btn'  ).text('Save')
        $('#purchase_form_update_btn'  ).attr('id', 'purchase_form_btn')
    })
    // END


    $(this).on('click','#discount',function(){
        if($(this).val() == '0/-')
            $(this).val('')
        else
            $(this).val( $(this).val().slice(0,-2) )
    })

    $(this).on('keyup','#discount',function(){
        if($(this).val() == ''){
            $('#net_amount').val( $('#total_amount').val() )
            $('#balance').val( $('#total_amount').val() )
        }
        else{
            var amount =  parseInt($('#total_amount').val()) - parseInt($(this).val())
            $('#net_amount').val(amount + '/-')
            $('#balance').val(amount + '/-')
        }
    })

    $(this).on('focusout','#discount',function(){
        if( $(this).val() == '' )
            $(this).val('0/-')
        else
            $(this).val( $(this).val() + '/-')
    })

    // ---------------------------------

    $(this).on('click','#paid_amount',function(){
        if($(this).val() == '0/-')
            $(this).val('')
        else
            $(this).val( $(this).val().slice(0,-2) )
    })

    $(this).on('keyup','#paid_amount',function(){
        if($(this).val() == '')
            $('#balance').val( $('#net_amount').val() )
        else{
            var amount =  parseInt($('#net_amount').val()) - parseInt($(this).val())
            $('#balance').val(amount + '/-')
        }
    })

    $(this).on('focusout','#paid_amount',function(){
        if( $(this).val() == '' )
            $(this).val('0/-')
        else
            $(this).val( $(this).val() + '/-')
    })


    function payment_check(){
        var discount = parseInt( $('#discount').val().slice(0,-2))
        var balance  = parseInt( $('#balance').val().slice(0,-2))
        var paid     = parseInt( $('#paid_amount').val().slice(0,-2))
        var total = discount + balance + paid
        if(parseInt($('#total_amount').val().slice(0,-2)) == total)
            console.log('ys')
        else{
            console.log('no')
            console.log(total)
        }
    }
    // END

    // TEMPORARY TABLE SEARCH

    // -----------------------------------
    $(this).on('click','#actions_compress',function(){
        $('.temp_table_actions').removeClass('d-none')
        $('#action_heading').removeClass('d-none')
        $('#actions_compress i').addClass('d-none')
        $('#actions_expand i').removeClass('d-none')
    })
    $(this).on('click','#actions_expand',function(){
        $('.temp_table_actions').addClass('d-none')
        $('#action_heading').addClass('d-none')
        $('#actions_expand i').addClass('d-none')
        $('#actions_compress i').removeClass('d-none')
    })
    // -----------------------------------

    $(this).on('focusin','#temp_table_search',function(){
        $(this).css('border-bottom','1px solid #fff')
    })
    $(this).on('focusout','#temp_table_search',function(){
        $(this).css('border-bottom','0px')
    })

    // END


    // <================> SALE PAGE START <================>

    // SEARCH THE PRODUCT IN SALE PRODUCT TABLE
    $("#product_search_input").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#sale_product_table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // WHEN USER SELECT SUPPLIER
    $(this).on('click', '.selected_category', function () {
        // $('#temp_supplier_field').val($(this).children('span').text());
        $('#customer_input').val($(this).children('span').text());
    });

    // REMOVE THE PRODUCT FORM CART
    $(this).on('click','.cart_delete_btn',function(){
        $(this).closest("tr").remove()
        salePriceCard()
    })

    // ADDING PRODUCT TO CART
    $(this).on('click','#sale_product_table .fa-cart-plus',function(){
        var $row      = $(this).closest('tr')
        var $s_no     = $row.find("td:eq(0)").text()
        var $name     = $row.find("td:eq(1)").text()
        var $price    = $row.find("td:eq(5)").text()
        var $quantity = $row.find("td:eq(6)").text()
        var $p_id = $row.find("td:eq(7)").text()
        // console.log($name)
        $('#cart_table tbody').prepend('<tr>\
         <td class="product_id d-none">'+$p_id+'</td>\
         <td>'+$s_no+'</td>\
         <td class="text-left">'+$name+'</td>\
         <td class="col_price">'+$price+'</td>\
         <td class="col_quantity">'+1+'</td>\
         <td class="temp_table_actions">'+ '<button value="' +$p_id+ '" class="cart_delete_btn">\
         <i style = "font-size: 20px" class= "text-rose fa-solid fa-trash-can" ></i>\
         </button>'+ '</td >\         </tr>')
         $('#total_amount').val('0/-')
         salePriceCard()
         $('#product_added_to_cart_alert').click();
         setTimeout(function() {
             $('.alert .close i').click()
            }, 1500);
        })//END
        // <td class="">'+"<i id='' style='font-size: 20px' class='text-info fa-solid fa-pen-to-square'></i>"+'</td>

    // GETTING THE VALUES FROM CART TABLE FOR DISPLAY TO USER
    function salePriceCard() {
        $('#total_amount').val('0/-')
        $('#net_amount').val('0/-')
        $('#balance').val('0/-')
        $('#cart_table tbody tr').each(function () {
            var value = parseInt($(this).children('.col_price').text().slice(0, -2)) * parseInt($(this).children('.col_quantity').text())
            var total = parseInt($('#total_amount').val().slice(0, -2))
            var sub_total = value + total;
            $('#total_amount').val(sub_total + "/-"); //
            $('#net_amount').val(sub_total + "/-"); //
            $('#balance').val(sub_total + "/-"); //
        })
    } // END



    // <================> SALE PAGE END <================>

}); //END OF READY
