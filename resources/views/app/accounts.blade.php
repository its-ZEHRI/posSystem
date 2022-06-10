<x-layout.applayout>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    {{-- ***** SLOT START ***** --}}
        {{-- <x-utilities.banner title="Create User Account" subtitle=""> --}}
            <div>
                <div class="">
                    <x-utilities.banner title="Add Customer" date="{{now()->format('d/m/y ')}}" subtitle="">
                        <form  id="add_customer_form">
                            @csrf
                            {{-- <div class="mt-3">
                                <h5 class="text-primary" style="font-weight: normal"><span class="mr-2">S-NO </span><span id="s_no">042</span></h5>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-4 form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input id="customer_name"  type="text" name="name" class="form-control" value="{{old('name')}}"
                                style="@error('address'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                            <div class="col-md-2 form-group bmd-form-group">
                                <label class="bmd-label-floating">Contact</label>
                                <input id="customer_contact"  type="text" name="contact" class="form-control" value="{{old('contact')}}"
                                style="@error('contact'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                            <div class="col-md-4 form-group bmd-form-group">
                                <label class="bmd-label-floating">Address</label>
                                <input id="customer_address" type="text" name="address" class="form-control" value="{{old('address')}}"
                                style="@error('address'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                <div>
                                <button id="" type="submit" class="c-btn c-btn-primary pull-righ">Add</button>
                                </div>
                            </div>
                        </div>
                            <div class="clearfix"></div>
                        </form>
                    </x-utilities.banner>
                </div>
            </div>
        {{-- </x-utilities.banner> --}}
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
