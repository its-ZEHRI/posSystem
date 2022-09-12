<x-layout.applayout noFooter >
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
            <div class="col-md-12">
                <div class="card card-plai">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Invoice Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover temp-table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>S-NO</th>
                                        {{-- <th>Invoice</th> --}}
                                        <th>Product name</th>
                                        <th>Net Amount</th>
                                        <th>Balance</th></th>
                                        <th>Paid Amount</th>
                                        <th>Date</th>
                                        <th>Details</th>
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
