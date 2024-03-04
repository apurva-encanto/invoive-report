@include('layouts.header')

<style>
    .avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;
}

.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}

.avatar-upload .avatar-edit input {
    display: none;
}

.avatar-upload .avatar-edit label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #ffffff;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}

.avatar-upload .avatar-edit label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
}

.avatar-upload .avatar-edit label:after {
    /* content: "\f040";
    font-family: "FontAwesome"; */
    color: #757575;
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
}

.avatar-upload .avatar-preview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #f8f8f8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}

.avatar-upload .avatar-preview > div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper mt-2">

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     @include('layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">


            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Department</h4>
                    @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif

                  <form id="addDepartment" enctype="multipart/form-data" class="form-sample" action="{{ route('department.update', ['id' => $department->id]) }}" method="post">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                             <div class="avatar-upload">
                                                        <div class="avatar-edit form-group">

                                                            <input type='file'  name="image" id="imageUpload" accept="image/*" />
                                                            <label for="imageUpload"><i class="ti-pencil"></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                           <div id="imagePreview" style="background-image: url({{ url('/').'/public/images/'.$department->image }});">
                                                            </div>

                                                        </div>



                                                    </div>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="department_name" value="{{ $department->department_name }}" type="text" class="typeahead" placeholder="Department Name" />
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                            <input name="name" value="{{ $department->name }}" type="text" class="typeahead" placeholder="Name" />
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group ">
                            <input name="phone" value="{{ $department->phone }}" type="text" class="typeahead" placeholder="Phone" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="email" value="{{ $department->email }}" type="text" class="typeahead" placeholder="Email" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="website" value="{{ $department->website }}" type="text" class="typeahead" placeholder="Website" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="acc_holder_name" value="{{ $department->acc_holder_name }}" type="text" class="typeahead" placeholder="Account Holder name" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="acc_number" value="{{ $department->acc_number }}" type="text" class="typeahead" placeholder="Account Number" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="bank_name" value="{{ $department->bank_name }}" type="text" class="typeahead" placeholder="Bank Name" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="swift_code" value="{{ $department->swift_code }}" type="text" class="typeahead" placeholder="Swift Code" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                            <input name="ifsc" value="{{ $department->ifsc }}" type="text" class="typeahead" placeholder="IFSC" />
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group ">
                            <input name="gstin" value="{{ $department->gstin }}" type="text" class="typeahead" placeholder="GSTIN" />
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group ">
                            <textarea name="address" id="" cols="20" rows="5" class="typeahead" placeholder="Address" >{{ $department->address }}</textarea>
                        </div>
                      </div>


                    </div>
                    <div class="row text-center">
                      <div class="col-md-12 ">
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Update Department</button>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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
@include('layouts.validation')
  <!-- End custom js for this page-->

  <script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
</body>

</html>

