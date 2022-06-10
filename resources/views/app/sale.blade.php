<x-layout.applayout noHeader  noFooter>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    {{-- ***** SLOT START ***** --}}
    @if(Session::has('success'))
    <div class="">
        <button id="btn2" class="d-none"
        onclick="md.showNotification('top','center','{{Session::get('success')}}','success')"></button>
    </div>
    <script>
        window.onload = function(){
        let button = document.getElementById('btn2');
        button.onclick();
        }
    </script>
@endif

{{--==========> ALERTS <==========--}}
<div id="alert">
    <button id="save_alert" class="d-none"
        onclick="md.showNotification('top','center','Save Successfully...!','success')"></button>
    <button id="delete_alert" class="d-none"
        onclick="md.showNotification('top','center','Deleted Successfully...!','danger')"></button>
    <button id="update_alert" class="d-none"
    onclick="md.showNotification('top','center','Updated Successfully...!','info')"></button>
    <button id="error_alert" class="d-none"
    onclick="md.showNotification('top','center','<h3 style='+'display:inline'+'>Error...! </h3>','danger')"></button>
    <button id="purchase_alert" class="d-none"
    onclick="md.showNotification('top','center','<h4>Products Saved into Inventory...!</h4>','success')"></button>
</div>
{{--==========> ALERTS <==========--}}


{{--==========> ADD PRODUCTS FORM <==========--}}
<div class="container-fluid">
    <div class="row" id="top">
        <div class="col-md-8">
            <form id="data_entry_form">
                @csrf
                <input id="temp_p_id_field" type="hidden" name="p_id">
                <input id="temp_category_field"  type="hidden" name="category_id">
                <input id="temp_supplier_field"  type="hidden" name="supplier_id">
            <x-utilities.banner title="Sale Products" date="{{now()->format('d/m/y ')}}" subtitle="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mt-3">
                            {{-- <h5 class="text-primary" style="font-weight: normal"><span class="mr-2">S-NO </span>{{count($temp_products)+1}}</h5> --}}
                            <h5 class="text-primary" style="font-weight: normal"><span class="mr-2">INVICE-NO </span><span id="s_no">1</span></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Costumer</label>
                            <input id="temp_p_name_field"  type="text" name="product_name" class="form-control" value=""
                            style="@error('product_name'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Purchase Price</label>
                            <input id="temp_p_price_field" type="text" name="p_price" class="form-control" value="{{old('p_price')}}"
                            style="@error('p_price'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Sale Price</label>
                            <input id="temp_s_price_field" type="text" name="s_price" class="form-control" value="{{old('s_price')}}"
                            style="@error('s_price'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Whole Sale Price</label>
                            <input id="temp_ws_price_field" type="text" name="ws_price" class="form-control" value="{{old('ws_price')}}"
                            style="@error('ws_price'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 pt-2">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Quantity</label>
                            <input id="temp_quantity_field" type="text" name="quantity" class="form-control" value="{{old('quantity')}}"
                             style="@error('quantity'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                    </div>

                </div>
                <hr>
                <button id="purchase_form_btn" type="submit" class="c-btn c-btn-primary pull-right">Enter</button>
                <button id="purchase_form_clear_btn" class="c-btn c-btn-secondary pull-right mr-3">Clear</button>
                <div class="clearfix"></div>
            </x-utilities.banner>
            </form>
        </div>
        {{-- PAYMENT CARD --}}
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-body payment-card">
                    <h3 class="card-title m-0 text-left text-primary ">Payment</h3>
                    <hr class="m-0">
                    <div class="px-4 mt-3">
                        {{-- action="purchase/productStore" method="POST" --}}
                        <form id="purchase_payment_form" >
                            @csrf
                            <input id="supplier_input" type="hidden" name="supplier_id" value="">
                            <div class="payment-card-field">
                                <p class="m-0">Total Amount</p>
                                <input type="text" id="total_amount" class="form-control disabled text-primary" name="total_amount" value="0/-">
                            </div>
                            <div class="payment-card-field">
                                <p class="m-0">Discount</p>
                                <input type="text" id="discount" class="form-control" name="discount" autocomplete="off" value="0/-">
                            </div>
                            <div class="payment-card-field">
                                <p class="m-0">Net Amount</p>
                                <input type="text" id="net_amount" class="form-control text-muted disabled" name="net_amount" value="0/-">
                            </div>
                            <div class="payment-card-field">
                                <p class="m-0">Balance</p>
                                <input type="text" id="balance" class="form-control text-muted disabled" name="balance" value="0/-">
                            </div>
                            <div class="payment-card-field mb-3">
                                <p class="m-0">Paid</p>
                                <input type="text" id="paid_amount" class="form-control" autocomplete="off" name="paid_amount" value="0/-">
                            </div>
                            <button id="" type="submit" class="c-btn c-btn-primary pull-center">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--==========> TABLE OF TEMP PRODUCT <==========--}}
<div class="container-fluid">
    {{-- *****  SLOT END  ****** --}}
    <x-slot name="footer">
        <x-layoutUtilities.footer>
        </x-layoutUtilities.footer>
    </x-slot>
    <x-slot name="fixed_plugin">
        <x-layoutUtilities.fixedPlugin>
        </x-layoutUtilities.fixedPlugin>
    </x-slot>
</x-layout.applayout>

