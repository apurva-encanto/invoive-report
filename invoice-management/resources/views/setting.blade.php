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

                            <form id="addProfile" class="form-sample" enctype="multipart/form-data" method="POST" action="{{ route('update.profile') }}">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-5">
                                        @csrf
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">

                                                            <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><i class="ti-pencil"></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            @if($user->profile_img ==null)
                                                            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                                            </div>
                                                            @else

                                                               <div id="imagePreview" style="background-image: url({{ url('/').'/public/images/'.$user->profile_img }});">
                                                            </div>

                                                            @endif
                                                        </div>

                                                        <div class="text-center mt-3">

                                                         <h4>{{ $user->full_name }}</h4>
                                                         <h6 class="text-secondary">{{ $user->email }}</h6>
                                                         <hr>
                                                         <p><strong>Total Invoice :</strong> 100</p>
                                                        </div>

                                                    </div>

                                    </div>
                                    <div class="col-7">
                                          <div class="card">

                                        <div class="card-body">
                                          <h4 class="card-title"> User Profile <button type="submit" class="float-right btn btn-info btn-sm w-25"> Edit Profile </button> </h4>


                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Full Name</label>
                                                        <input type="text" value="{{ $user->full_name }}" name="full_name" class="form-control" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Phone Number</label>
                                                        <input type="text" value="{{ $user->phone }}" name="phone_number" class="form-control" placeholder="Enter Phone Number" />
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Username</label>
                                                        <input type="text" value="{{ $user->user_name }}" name="user_name" class="form-control" placeholder="Enter New User Name" />
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                         <label for="">Email</label>
                                                        <input type="text" value="{{ $user->email }}" name="email" class="form-control" placeholder="Enter User Email Address" />
                                                    </div>
                                                </div>
                                                 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">New Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Enter New Password" />
                                                    </div>
                                                </div>


                                            </div>
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
