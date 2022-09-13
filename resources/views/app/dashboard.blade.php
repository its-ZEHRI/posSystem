<x-layout.applayout noFooter>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    <!-- ***** SLOT START ***** -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">Sale</p>
                        <h3 class="card-title">{{ $total_sale }}
                            <small>/-</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Total Sale
                            {{-- <a href="#pablo">Get More Space...</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">Customer Arrears</p>
                        <h3 class="card-title">{{ $balance }}
                            <small>/-</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Total
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Fixed Issues</p>
                        <h3 class="card-title">75</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Github
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Followers</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
        {{-- <x-utilities.card>
        </x-utilities.card> --}}
        {{-- <div class="row">
            <div class="col-md-1"></div>
            <!-- Purchases Summary -->
            <div class="col-md-4 p-3 card purchase-summary-report">
                <p class="mb-2">Out of Stocks Products</p>
                <hr class="mb-2 mt-0">
                @forelse ($out_of_stock_products as $prodcuct )
                <h4>{{ $prodcuct->product_name }}</h4>
                @empty
                    <span>No product yet..</span>
                @endforelse
            </div>
            <div class="col-md-1"></div>
             <!-- Sales Summary -->
            <div class="col-md-4 p-3 card sale-summary-report">
                <p class="mb-2">Sales</p>
                <hr class="m-0">

            </div>
            <div class="col-md-2"></div>
        </div> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plai">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Out of Stock Products</h4>
                            {{-- <p class="card-category">Inventory</p> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover temp-table">
                                    <thead class="text-primary">
                                            <tr>
                                              <th>S NO</th>
                                              <th>Product Name</th>
                                              <th>Product Code</th>
                                              {{-- <th>Category</th> --}}
                                              <th>Quantity</th>
                                          </tr>
                                    </thead>
                                    <tbody class="ttt">
                                        @forelse ($out_of_stock_products as $product )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->p_code }}</td>
                                                {{-- <td>{{ $product->category_id->name }}</td> --}}
                                                <td>{{ $product->quantity }}</td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


