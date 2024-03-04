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
            <div class="col-md-3">
                <div>
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">Select Department</option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
            </div>

            <div class="col-md-12 grid-margin transparent">

                <div class="row">

                     <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Earning</p>
                       <p>
                         <div class="progress progress-sm">
                         <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                       </div>
                       </p>
                      <p class="fs-30 mt-3 mb-2">₹ 98,000</p>
                      {{-- <p>10.00% (30 days)</p> --}}
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Invoice</p>
                      <p>
                         <div class="progress progress-sm">
                         <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                       </div>
                       </p>
                      <p class="fs-30 mt-3 mb-2">{{ $invoice_count }}</p>
                      {{-- <p>22.00% (30 days)</p> --}}
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Pending Bills</p>
                      <p>
                         <div class="progress progress-sm">
                         <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                       </div>
                       </p>
                      <p class="fs-30 mt-3 mb-2">₹ 4500.00</p>
                      {{-- <p>2.00% (30 days)</p> --}}
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total Customer</p>
                      <p>
                         <div class="progress progress-sm">
                         <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                       </div>
                       </p>
                      <p class="fs-30 mt-3 mb-2">{{$customer_count}}</p>
                      {{-- <p>0.22% (30 days)</p> --}}
                    </div>
                  </div>
                </div>

            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
                <div class="row ">
                    <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Finance Activity</p>
                                        <select name="" class="form-control chart-dropdown"  id="">
                                            <option value="">Today</option>
                                            <option value="">Weekly</option>
                                            <option value="">Monthly</option>
                                        </select>
                                    </div>

                                <canvas  class="" id="linechart-multi"></canvas>
                                </div>
                            </div>
                    </div>

                      <div class="col-md-12 mt-3">
                            <div class="card w-100">
                                <div class="card-body">
                                   <div class="d-flex justify-content-between">
                                        <p class="card-title">All Customers</p>
                                        <div class="form-group " >
                                            <div class="input-group">
                                            <div class="input-group-prepend search-button">
                                                <i class="input-group-text ti-search"></i>
                                            </div>
                                            <input type="text" class="form-control search-button" placeholder="Search" aria-label="Username">
                                            </div>
                                        </div>
                                         <select name="" class="form-control chart-dropdown mx-0"  id="">
                                            <option selected disabled value="">Sort by</option>
                                            <option value="">Newest</option>
                                            <option value="">Weekly</option>
                                            <option value="">Monthly</option>
                                        </select>

                                        <p><i class="ti-download mt-2" aria-hidden="true"></i></p>

                                    </div>
                                 <div class="table-responsive w-100">
                                    <table class="table table-striped">
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
                                            @foreach($customers as $customer)
                                            <tr>
                                                <td class="py-1">
                                                    {{$customer->contact_person}}
                                                </td>
                                                <td>
                                                    {{$customer->company_name}}
                                                </td>
                                                <td>
                                                    {{$customer->phone}}
                                                </td>
                                                <td>
                                                   {{$customer->email}}
                                                </td>
                                                <td>
                                                   <span class="flag-icon flag-icon-{{$customer->country}}"></span>
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
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">All Projects</p>
                  <a href="{{ route('manage.project') }}" class="text-info"> see all</a>
                 </div>

                 <ul class="icon-data-list mt-3 w-100">

                      @foreach ($projects as $project)
                    <li>
                     <div class="d-flex mb-2 ">
                        <img src="{{ asset('public/images/faces/face5.jpg') }}" alt="user">
                        <div class="flex-grow-1">
                            <div class="text-info mb-1">{{ $project->project_name }}</div>
                            <p class="mb-0 text-muted">IVN55635653</p>
                        </div>
                        <small class="text-muted">25 Aug 2023</small>
                    </div>
                    </li>

                    @endforeach

                  </ul>

                  <div class="text-center">
                      <a href="{{ route('manage.project') }}" class="btn btn-primary btn-sm">See All ></a>
                  </div>


                </div>
              </div>
            </div>
          </div>

          <div class="row">

            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('layouts.footer')
  <!-- End custom js for this page-->
</body>

</html>

