<x-layout.applayout>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    {{--==========> SLOT START  ==========>--}}

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
                <x-utilities.banner title="Add Products" date="{{now()->format('d/m/y ')}}" subtitle="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mt-3">
                                    {{-- <h5 class="text-primary" style="font-weight: normal"><span class="mr-2">S-NO </span>{{count($temp_products)+1}}</h5> --}}
                                    {{-- <h5 class="text-primary" style="font-weight: normal">`<span class="mr-2">S-NO </span><span id="s_no">{{count($temp_products)+1}}</span></h5> --}}
                                </div>
                            </div>
                            {{-- <====> CATEGORY DROPDOWN <=====> --}}
                            <div class="col-md-4">
                                <div style=" @error('category_id') {{'border-bottom: 4px solid red'}} @enderror">
                                    <div class="card card-plain mb-0 mt-4 p-0" style="position: relative">
                                        <div id="category_card" class="card-header card-header-primary d-flex justify-content-between align-items-center" style="padding: 5px 15px 3px 15px">
                                            <h5 id="category_name" style="height: 1.5rem; overflow-y:hidden; width:90%" class="card-title">Category</h5>
                                            <i id="catg_arrow" class="fa-solid fa-angle-down"></i>
                                        </div>
                                        <div class="card-body d-none bg-white rounded w-100 custom-dropdown" style="position: absolute; top:15px; z-index:111">
                                             <div id="category_filter" class="b">
                                                <div class="input-group no-border ">
                                                    <input id="" type="text" value="" style="" class="form-control" placeholder="Search Category...">
                                                    <button type="" class="btn btn-sm btn-dark btn-round btn-just-icon">
                                                    <i class="material-icons">search</i>
                                                    <div class="ripple-container"></div>
                                                    </button>
                                                </div>
                                            </div>
                                            <ul class="category-list">
                                                @forelse ($categories as $category)
                                                <div class="categ_list selected_category">
                                                    <span class="d-none">{{$category->id}}</span>
                                                    <li  class="categ">{{$category->name}}</li>
                                                </div>
                                                @empty
                                                    <li>No Category found</li>
                                                @endforelse

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <====> SUPPLIER DROPDOWN <=====> --}}
                            <div class="col-md-4">
                                <div>
                                    <div class="card card-plain mb-0 mt-4 p-0" style="position: relative">
                                        <div id="supplier_card" class="card-header card-header-primary d-flex justify-content-between align-items-center" style="padding: 5px 15px 3px 15px">
                                            <h5 style="height: 1.5rem; overflow-y:hidden; width:90%"
                                             class="card-title">Supplier</h5>
                                            <i class="fa-solid fa-angle-down"></i>
                                        </div>
                                        <div class="card-body card-wrapper d-none bg-white rounded w-100 custom-dropdown" style="position: absolute; top:15px; z-index:111">
                                             <div id="supplier_filter">
                                                <div class="input-group no-border ">
                                                    <input id="" type="text" value="" style="" class="form-control" placeholder="Search Supplier...">
                                                    <button type="" class="btn btn-sm btn-dark btn-round btn-just-icon">
                                                    <i class="material-icons">search</i>
                                                    <div class="ripple-container"></div>
                                                    </button>
                                                </div>
                                            </div>
                                        <ul class="supplier-list">
                                            @forelse($suppliers as $supplier)
                                                <div class="supp_list selected_supplier">
                                                    <span class="d-none">{{$supplier->id}}</span>
                                                    <li class="supp">{{$supplier->name}}</li>
                                                </div>
                                            @empty
                                                <li>No Supplier found</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Product Name</label>
                                <input id="temp_p_name_field"  type="text" name="product_name" class="form-control" value="{{old('product_name')}}"
                                style="@error('product_name'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Product Code</label>
                                <input id="temp_p_code_field"  type="text" name="p_code" class="form-control">
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
                </form>
            </x-utilities.banner>
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
                                    <p class="m-0 text-muted " style="font-weight: 500">Net Amount</p>
                                    <input type="text" id="net_amount" class="form-control text-muted disabled" name="net_amount" value="0/-">
                                </div>
                                <div class="payment-card-field">
                                    <p class="m-0 text-muted">Balance</p>
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
        <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary d-flex justify-content-between lign-items-center">
                  <div>
                      <h4 class="card-title">Temporary Table</h4>
                      <span class="">Actions </span>
                      <span id="actions_compress" class="actions"><i class="fa-solid fa-compress"></i></span>
                      <span id="actions_expand" class="actions"><i class="fa-solid fa-expand d-none"></i></span>
                    </div>
                    <div class="navbar-form  w-50">
                        <div class="input-group no-border ">
                            <input id="temp_table_search" type="text" value="" style="color: #fff" class="form-control" placeholder="Search...">
                            <button type="" class="btn btn-white btn-round btn-just-icon">
                            {{-- <div class="d-flex justify-content-center align-items-center"> --}}
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                            {{-- </div> --}}
                            </button>
                        </div>
                    </div>
                  {{-- <p class="card-category">Inventory</p> --}}
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="temp_table" class="table table-hover temp-table">
                        <thead class="text-primary">
                            <tr>
                                <th>S NO</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Whole Sale Price</th>
                                <th>Quantity</th>
                                <th>category name</th>
                                <th>category id</th>
                                <th id="action_heading" colspan="2" class="text-center d-none">Action</th>
                                {{-- <th id="actions_compress" colspan="2" class="text-center actions"><i class="fa-solid fa-compress"></i></th>
                                <th id="actions_expand" colspan="2" class="text-center actions"><i class="fa-solid fa-expand d-none"></i></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <x-utilities.banner title="payment" subtitle="sub payment">
            <h4>payment</h4>
        </x-utilities.banner>


    {{--==========>  SLOT END  ==========>--}}

    <x-slot name="footer">
        <x-layoutUtilities.footer>
        </x-layoutUtilities.footer>
    </x-slot>

    <x-slot name="fixed_plugin">
        <x-layoutUtilities.fixedPlugin>
        </x-layoutUtilities.fixedPlugin>
    </x-slot>
</x-layout.applayout>
