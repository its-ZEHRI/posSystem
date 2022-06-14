<x-layout.applayout  noFooter>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    {{-- ***** SLOT START ***** --}}
    {{--:users=$users ->pass the data form controller to component --}}
    {{-- <x-utilities.table >
    </x-utilities.table>--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div>
                    <div style="{{-- @error('category_id')'border' bottom: 4px solid red' @enderror--}}">
                        <div class="card card-plain mb-0 mt-4 p-0" style="position: relative">
                            <div id="category_card" class="card-header card-header-primary d-flex justify-content-between align-items-center" style="padding: 5px 15px 3px 15px">
                                <h5 style="height: 1.5rem; overflow-y:hidden; width:90%"
                                 class="card-title">Category</h5>
                                <i id="catg_arrow" class="fa-solid fa-angle-down"></i>
                            </div>
                            <div class="card-body d-none bg-white rounded w-100 custom-dropdown"
                                 style="position: absolute; top:15px; z-index:111">
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
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
              <div class="card card-plai">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Table</h4>
                  <p class="card-category">Inventory</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover temp-table">
                        <thead class="text-primary">
                            <tr>
                                <th>S NO</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Category</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Whole Sale Price</th>
                                <th>Quantity</th>
                                <th>Supplier</th>
                                {{-- <th colspan="2" class="text-center">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody class="ttt">
                            @foreach ($products as $product )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>
                                    @if($product->p_code == '' )
                                     N/A
                                     @else
                                     {{$product->p_code}}
                                    @endif
                                </td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->p_price}}/-</td>
                                <td>{{$product->s_price}}/-</td>
                                <td>{{$product->ws_price}}/-</td>
                                <td>{{$product->quantity}}</td>
                                {{-- <td>{{$product->supplier->name}}</td> --}}
                                {{-- error in supplier name --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


    {{-- ***** SLOT END *****  --}}
    <x-slot name="footer">
        <x-layoutUtilities.footer>
        </x-layoutUtilities.footer>
    </x-slot>
    <x-slot name="fixed_plugin">
        <x-layoutUtilities.fixedPlugin>
        </x-layoutUtilities.fixedPlugin>
    </x-slot>
</x-layout.applayout>
