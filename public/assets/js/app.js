// console.log('working');
$(document).ready(function () {

    // FORCUSTOM DROPDOWN IN PURCHASE PAGE
    $('#category_card + div').hide();
    $('#supplier_card + div').hide();
    $('#category_card + div').removeClass('d-none');
    $('#supplier_card + div').removeClass('d-none');
    // END





    if ($('#email').val() == '') {
    }
    else {
        $('#email').addClass('is-focused is-filled')
    }

    if ($('#password').val() == '') {
    }
    else {
        $('#password').addClass('is-focused is-filled')
    }


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
    // END

    // WHEN USER SELECT SUPPLIER
    $(this).on('click', '.selected_supplier', function () {
        $('#temp_supplier_field').val($(this).children('span').text());
        $('#supplier_input').val($(this).children('span').text());
    });
    // END

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
        if($(this).val() == '')
            {$('#net_amount').val( $('#total_amount').val() )
            $('#balance').val( $('#total_amount').val() )
    }else{
            var amount =  parseInt($('#total_amount').val()) - parseInt($(this).val())
            console.log(parseInt($('#total_amount').val()))
            console.log(parseInt($(this).val()))
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
            console.log(parseInt($('#total_amount').val()))
            console.log(parseInt($(this).val()))
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
        {
            console.log('ys')
        }
        else
        {
            console.log('no')
            console.log(total)
        }
    }

    // END




}); //END OF READY
