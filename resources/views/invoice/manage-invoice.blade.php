<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" />
</head>
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
                      <h4 class="card-title">Manage Invoices</h4>
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
                                                    Customer Name
                                                </th>
                                                <th>
                                                    Company
                                                </th>
                                                <th>
                                                    Phone Number
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Country
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="py-1">
                                                    123
                                                </td>
                                                <td>
                                                    Herman Beck
                                                </td>
                                                <td>
                                                    554
                                                </td>
                                                <td>
                                                    $ 77.99
                                                </td>
                                                <td>
                                                    May 15, 2015
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    2131
                                                </td>
                                                <td>
                                                    Messsy Adam
                                                </td>
                                                <td>
                                                    411
                                                </td>
                                                <td>
                                                    $245.30
                                                </td>
                                                <td>
                                                    July 1, 2015
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    23
                                                </td>
                                                <td>
                                                    John Richards
                                                </td>
                                                <td>
                                                    445
                                                </td>
                                                <td>
                                                    $138.00
                                                </td>
                                                <td>
                                                    Apr 12, 2015
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    412
                                                </td>
                                                <td>
                                                    Peter Meggik
                                                </td>
                                                <td>
                                                    12
                                                </td>
                                                <td>
                                                    $ 77.99
                                                </td>
                                                <td>
                                                    May 15, 2015
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    132
                                                </td>
                                                <td>
                                                    Edward
                                                </td>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    $ 160.25
                                                </td>
                                                <td>
                                                    May 03, 2015
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                   23
                                                </td>
                                                <td>
                                                    John Doe
                                                </td>
                                                <td>
                                                    344
                                                </td>
                                                <td>
                                                    $ 123.21
                                                </td>
                                                <td>
                                                    April 05, 2015
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1">
                                                    111
                                                </td>
                                                <td>
                                                    Henry Tom
                                                </td>
                                                <td>
                                                    34
                                                </td>
                                                <td>
                                                    $ 150.00
                                                </td>
                                                <td>
                                                    June 16, 2015
                                                </td>
                                            </tr>
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
  <script src="{{ asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js')}}"></script>
  <script src="{{ asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('js/template.js')}}"></script>
  <script src="{{ asset('js/settings.js')}}"></script>
  <script src="{{ asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js')}}"></script>
  <script src="{{ asset('js/dashboard.js')}}"></script>
  <script src="{{ asset('js/chart.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>

