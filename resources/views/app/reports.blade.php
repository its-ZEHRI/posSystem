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
    <h3 class="px-5 pt-2 m-0">Summary Reports</h3>
    <div class="row">
        <div class="col-md-1"></div>
        <!-- Purchases Summary -->
        <div class="col-md-4 p-3 card purchase-summary-report">
            <p class="mb-2">Purchases</p>
            <hr class="m-0">
            <div class="report-wrapper pt-3">
                <div class="mb-2">
                    <h6>Total</h6>
                    <h6>{{ $purchases->sum('total_amount') }}/-</h6>
                </div>
                <div class="mb-2">
                    <h6>Discount</h6>
                    <h6>{{ $purchases->sum('discount') }}/-</h6>
                </div>
                <div class="mb-2">
                    <h6>Balance</h6>
                    <h6>{{ $purchases->sum('balance') }}/-</h6>
                </div>
                <div class="mb-2">
                    <h6>Paid</h6>
                    <h6>{{ $purchases->sum('paid_amount') }}/-</h6>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
         <!-- Sales Summary -->
        <div class="col-md-4 p-3 card sale-summary-report">
            <p class="mb-2">Sales</p>
            <hr class="m-0">
            <div class="report-wrapper pt-3">
                <div class="mb-2">
                    <h6>Total</h6>
                    <h6>{{ $sales->sum('total_amount') }}/-</h6>
                </div>
                <div class="mb-2">
                    <h6>Discount</h6>
                    <h6>{{ $sales->sum('discount') }}/-</h6>
                </div>
                <div class="mb-2">
                    <h6>Balance</h6>
                    <h6>{{ $sales->sum('balance') }}/-</h6>
                </div>
                <div class="mb-2">
                    <h6>Paid</h6>
                    <h6>{{ $sales->sum('paid_amount') }}/-</h6>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plai">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Reports Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover temp-table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>S-NO</th>
                                        {{-- <th>Invoice</th> --}}
                                        <th>Total Amount</th>
                                        <th>Net Amount</th>
                                        <th>Balance</th></th>
                                        <th>Paid Amount</th>
                                        <th>Date</th>
                                        {{-- <th>Details</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sales as $sale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $sale-> }}</td> --}}
                                        <td>{{ $sale->total_amount }}/-</td>
                                        <td>{{ $sale->net_amount }}/-</td>
                                        <td>{{ $sale->balance }}/-</td>
                                        <td>{{ $sale->paid_amount }}/-</td>
                                        <td>{{ $sale->created_at }}</td>
                                        {{-- <td><a href="view-report/{{ $sale->id }}"><i data-id="{{ $sale->id }}" style= "font-size: 20px;cursor: pointer;" class= "text-info fa-solid fa-eye" ></i></a></td> --}}
                                    </tr>
                                    @empty
                                    <tr>
                                        No Invoice yet ...
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ***** SLOT END *****  -->
    <x-slot name="footer">
        <x-layoutUtilities.footer>
        </x-layoutUtilities.footer>
    </x-slot>
    <x-slot name="fixed_plugin">
        <x-layoutUtilities.fixedPlugin>
        </x-layoutUtilities.fixedPlugin>
    </x-slot>
</x-layout.applayout>
