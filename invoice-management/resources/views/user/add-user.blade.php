@include('layouts.header')
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper mt-2">
                <!-- partial:partials/_sidebar.html -->
                @include('layouts.sidebar')
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">

                            <form  id="addUser" class="form-sample" action="{{ route('add.user') }}" method="post">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        @csrf

                                        <div class="card-body">
                                    <h4 class="card-title">Add User</h4>
                                            @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" value="{{ old('full_name') }}" class="typeahead" name="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="typeahead" placeholder="Enter User's Phone Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" value="{{ old('user_name') }}"  name="user_name" class="typeahead" placeholder="Enter New User Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" value="{{ old('password') }}"  name="password" id="password" class="typeahead" placeholder="Enter New Password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="password"  value="{{ old('confirm_password') }}"   name="confirm_password" class="typeahead" placeholder="Confirm Password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" name="email" value="{{ old('email') }}"  class="typeahead" placeholder="Enter User Email Address" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Select User's Access</label>
                                                          <select class="js-example-basic-multiple w-100" name="user_access[]" multiple="multiple">
                                                                <option {{ old('user_access') == 'project' ? 'selected' : '' }} value="project">Project</option>
                                                                <option {{ old('user_access') == 'user' ? 'selected' : '' }} value="user">User</option>
                                                                <option {{ old('user_access') == 'invoice' ? 'selected' : '' }}  value="invoice">Invoice</option>
                                                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Is Admin</label>
                                                        <br>
                                                        <input type="radio" name="access" value="1"  class=""  />Yes
                                                        <input type="radio" name="access" value="0"   class="" checked  />No
                                                    </div>
                                                </div>

                                                <div class="col-md-12 text-center">
                                                    <button class="btn btn-info" type="submit">Add User</button>
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
  @include('layouts.footer')

        <!-- plugins:js -->
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('public/vendors/select2/select2.min.js')}}"></script>
        <!-- End plugin js for this page -->

        <!-- Custom js for this page-->
        <script src="{{ asset('public/js/select2.js')}}"></script>
       @include('layouts.validation')
        <!-- End custom js for this page-->


    </body>
</html>
