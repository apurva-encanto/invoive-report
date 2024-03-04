@include('layouts.header')
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

            <div class="col-12 grid-margin stretch-card">
              <div class="card">

                <div class="row">
                 <div class="col-md-12">
                    <div class="card-body">
                      <h4 class="card-title">Manage Projects</h4>

                    </div>
                  </div>

                </div>
              </div>
            </div>
             <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                 <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Project
                                                </th>

                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Actions
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($projects as $project)

                                            <tr>
                                                <td class="py-1">
                                                    {{ $project->project_name }}
                                                </td>

                                                <td>
                                                  {{ $project->currency == 'INR' ? '₹' : ($project->currency == 'USD' ? '$' : 'EUR') }}
                                                  {{ $project->price }}

                                                </td>
                                                <td>
                                                   <a  href="{{ url('project/'.$project->id.'/edit') }}" class="btn btn-info btn-sm"><i class="ti-pencil"></i></a>
                                                   <a href="" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

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

  <!-- plugins:js -->
@include('layouts.footer')
  <!-- End custom js for this page-->
</body>

</html>

