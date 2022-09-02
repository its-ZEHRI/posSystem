<x-layout.applayout>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    <!--<==========> SLOT START <==========>-->
    @if (Session::has('success'))
        <div class="">
            <button id="btn2" class="d-none"
                onclick="md.showNotification('top','center','{{ Session::get('success') }}','success')"></button>
        </div>
        <script>
            window.onload = function() {
                let button = document.getElementById('btn2');
                button.onclick();
            }
        </script>
    @endif

    <!-- <==========> ALERTS <==========> -->
    <div id="alert">
        <button id="product_added_to_cart_alert" class="d-none"
            onclick="md.showNotification('top','center','Product Added to Cart...!','info')"></button>
        <button id="product_sale_alert" class="d-none"
            onclick="md.showNotification('top','center','<h4>Products Sale...!</h4>','success')"></button>
    </div>
    <!-- <==========> ALERTS <==========> -->

    <!-- <==========> SALE CARD <==========> -->
    <div class="container-fluid">
        <div class="row" id="">
            <div class="col-md-8">
                <x-utilities.banner title="Sale Products" date="{{ now()->format('d/m/y ') }}" subtitle="">
                    <div class="row">
                        <!-- <=======> CUSTOMER DROPDOWN <=======> -->
                        <div class="col-md-4">
                            <div style=" @error('category_id') {{ 'border-bottom: 4px solid red' }} @enderror">
                                <div class="card card-plain mb-0 mt-4 p-0" style="position: relative">
                                    <div id="category_card"
                                        class="card-header card-header-primary d-flex justify-content-between align-items-center"
                                        style="padding: 5px 15px 3px 15px">
                                        <h5 id="category_name" style="height: 1.5rem; overflow-y:hidden; width:90%"
                                            class="card-title">Select Customer</h5>
                                        <i id="catg_arrow" class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <div class="card-body d-none bg-white rounded w-100 custom-dropdown"
                                        style="position: absolute; top:15px; z-index:111">
                                        <div id="category_filter" class="b">
                                            <div class="input-group no-border ">
                                                <input id="" type="text" value="Invoice Costumer"
                                                    style="" class="form-control"
                                                    placeholder="Search Category...">
                                                <button type=""
                                                    class="btn btn-sm btn-dark btn-round btn-just-icon">
                                                    <i class="material-icons">search</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </div>
                                        </div>
                                        <ul class="costumer-list">
                                            @forelse ($customers as $customer)
                                                <div class="categ_list selected_category">
                                                    <span class="d-none">{{ $customer->id }}</span>
                                                    <li class="categ">{{ $customer->name }}</li>
                                                </div>
                                            @empty
                                                <li>No customer found</li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Costumer Name</label>
                                <input id="" type="text" name="costumer_name" value="Invoice Costumer"
                                    class="form-control"
                                    style="@error('costumer_name') {{ 'border-bottom: 2px solid red; padding-left: 10px!important' }} @enderror">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-3">
                            <div id="product_filter" class="b">
                                <div class="input-group no-border ">
                                    <input id="product_search_input" type="text" value="" style=""
                                        class="form-control" placeholder="Search Product...">
                                    <button type="" class="btn btn-dark btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <==========> TABLE OF PRODUCT <==========> -->
                    <div class="row">
                        <div class="col-md-12 mt-1">
                            <table id="sale_page_product_table" class="table table-hover border">
                                <thead class="text-primary">
                                    <tr>
                                        <th>S NO</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Sale</th>
                                    </tr>
                                </thead>
                                <tbody id="sale_product_table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </x-utilities.banner>
            </div>
            <!-- PAYMENT CARD -->
            <div class="col-md-4">
                <!-- setting of product -->
                <div class="card card-profile">
                    <div class="card-body payment-card">
                        <h3 class="card-title m-0 text-left text-primary ">Setting</h3>
                        <hr class="m-0">
                        <div class="px-4 mt-3">
                            whatever
                        </div>
                    </div>
                </div>
                <!-- end setting of product -->
                <div class="card card-profile">
                    <div class="card-body payment-card">
                        <h3 class="card-title m-0 text-left text-primary ">Payment</h3>
                        <hr class="m-0">
                        <div class="px-4 mt-3">
                            <form id="sale_payment_form">
                                @csrf
                                <input id="customer_input" type="hidden" name="customer_id" value="0">
                                <div class="payment-card-field">
                                    <p class="m-0">Total Amount</p>
                                    <input type="text" id="total_amount" class="form-control disabled text-primary"
                                        name="total_amount" value="0/-">
                                </div>
                                <div class="payment-card-field">
                                    <p class="m-0">Discount</p>
                                    <input type="text" id="discount" class="form-control" name="discount"
                                        autocomplete="off" value="0/-">
                                </div>
                                <div class="payment-card-field">
                                    <p class="m-0">Net Amount</p>
                                    <input type="text" id="net_amount" class="form-control text-muted disabled"
                                        name="net_amount" value="0/-">
                                </div>
                                <div class="payment-card-field">
                                    <p class="m-0">Balance</p>
                                    <input type="text" id="balance" class="form-control text-muted disabled"
                                        name="balance" value="0/-">
                                </div>
                                <div class="payment-card-field mb-3">
                                    <p class="m-0">Paid</p>
                                    <input type="text" id="paid_amount" class="form-control" autocomplete="off"
                                        name="paid_amount" value="0/-">
                                </div>
                                <button id="" type="submit"
                                    class="c-btn c-btn-primary pull-center">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- <==========> CART <==========> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary d-flex justify-content-between lign-items-center">
                        <div>
                            <h4 class="card-title">Cart</h4>
                        </div>
                        <div class="navbar-form  w-50">
                            <div class="input-group no-border ">
                                <input id="temp_table_search" type="text" value="" style="color: #fff"
                                    class="form-control" placeholder="Search...">
                                <button type="" class="btn btn-white btn-round btn-just-icon">
                                    {{-- <div class="d-flex justify-content-center align-items-center"> --}}
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                    {{-- </div> --}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="cart_table" class="table table-hover temp-table">
                                <thead class="text-primary">
                                    <tr>
                                        <th class="text-left">S NO</th>
                                        <th class="text-left">Product</th>
                                        <th>Price</th>
                                        <th class="d-none">Sale Price</th>
                                        <th class="d-none">Whole Sale Price</th>
                                        <th>Quantity</th>
                                        <th class="d-none">category name</th>
                                        <th class="d-none">category id</th>
                                        <th colspan="" class="text-center">Action</th>
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
    <div class="container-fluid">
        <!-- <=======>  SLOT END  <=======> -->
        <x-slot name="footer">
            <x-layoutUtilities.footer>
            </x-layoutUtilities.footer>
        </x-slot>
        <x-slot name="fixed_plugin">
            <x-layoutUtilities.fixedPlugin>
            </x-layoutUtilities.fixedPlugin>
        </x-slot>
</x-layout.applayout>
