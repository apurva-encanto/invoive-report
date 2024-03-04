@include('layouts.header')
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper mt-2">
                <!-- partial:partials/_settings-panel.html -->

                <!-- partial -->
                <!-- partial:partials/_sidebar.html -->
                @include('layouts.sidebar')
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">

                            <form id="addCustomer" class="form-sample" action="{{ route('add.customer') }}" method="post">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                         @csrf
                                        <div class="card-body">
                                    <h4 class="card-title">Customer Information</h4>
                                                @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="typeahead" placeholder="Company Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="contact_person" value="{{ old('contact_person') }}" class="typeahead" placeholder="Contact Person" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" name="email" value="{{ old('email') }}" class="typeahead" placeholder="Email Address" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select name="currency" class="form-control">
                                                            <option value="">Currency</option>
                                                                @foreach($currencies as $currency)
                                                                  <option>{{$currency->symbol  }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="typeahead" placeholder="Phone Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">


                                                    <div class="custom-dropdown">
                                                        <span class="flag-icon" id="selected-flag-icon"></span>
                                                        <select name="country"  onchange="changeFlag()">
                                                            <option value="" >Country</option>
                                                            @foreach ($countries as $country)
                                                                 <option value="{{ $country->icon }}" data-icon="{{ $country->icon }}">{{ $country->name }}</option>
                                                            @endforeach

                                                            <!-- Add more countries as needed -->
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <textarea name="full_address" class="form-control m-2" id="" cols="30" rows="10" placeholder="Full Address">{{ old('full_address') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button class="btn btn-info" type="submit">Add Customer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                                Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.
                            </span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
     @include('layouts.footer')
        <!-- End custom js for this page-->


     @include('layouts.validation')
 <script>
 function changeFlag() {
    console.log('test');
    var selectedValue = document.querySelector('.custom-dropdown select').value;
    var flagIconElement = document.getElementById('selected-flag-icon');
    flagIconElement.className = 'flag-icon flag-icon-' + selectedValue;
  }
 </script>


    </body>
</html>
