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
      <!-- partial:partials/_settings-panel.html -->
      {{-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> --}}
      {{-- <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="{{ asset('images/faces/face1.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('images/faces/face2.jpg')}}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('images/faces/face3.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('images/faces/face4.jpg')}}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('images/faces/face5.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{ asset('images/faces/face6.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div> --}}
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     @include('layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class=" d-flex">
                        <div class="calender-picker d-flex">
                            <div><img src="{{ asset('images/calendar.svg') }}" alt=""></div>
                            <div class="mx-2"><small> 01.11.2023 -</small> </div>
                            <div><small>01.12.2023</small> </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex download-btn">
                    <button ><img src="{{ asset('images/download-icon.svg') }}" alt=""> Download Data</button>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

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
                      <p class="fs-30 mt-3 mb-2">100</p>
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
                      <p class="fs-30 mt-3 mb-2">145</p>
                      {{-- <p>0.22% (30 days)</p> --}}
                    </div>
                  </div>
                </div>

            </div>
          </div>
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Finance Activity</p>
                                        <select name="" class="form-control chart-dropdown"  id="">
                                            <option value="">Today</option>
                                            <option value="">Weekly</option>
                                            <option value="">Monthly</option>
                                        </select>
                                    </div>

                                <canvas id="linechart-multi"></canvas>
                                </div>
                            </div>
                    </div>

                      <div class="col-md-12 mt-3">
                            <div class="card">
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
                                 <div class="table-responsive">
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
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">All Projects</p>
                  <a href="#" class="text-info"> <i class="ti-download menu-icon"></i></a>
                 </div>

                 <ul class="icon-data-list mt-3">
                    <li>
                      <div class="d-flex mb-2">
                        <img src="images/faces/face1.jpg" alt="user">
                        <div>
                          <div class="text-info mb-1">Isabella Becker  <small class="float-right text-muted">9:30 am</small></div>

                          <p class="mb-0 text-muted">Sales dashboard have been created</p>

                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex mb-2">
                        <img src="images/faces/face2.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Adam Warren <small class=" float-right text-muted">9:00 am</small></p>
                          <p class="mb-0 text-muted ">You have done a great job #TW111</p>

                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex mb-2">
                      <img src="images/faces/face3.jpg" alt="user">
                     <div>
                      <p class="text-info mb-1">Leonard Thornton  <small class="float-right text-muted">10:30 am</small></p>
                      <p class="mb-0 text-muted">Sales dashboard have been created</p>
                     </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex mb-2">
                        <img src="images/faces/face4.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">George Morrison <small class="float-right text-muted">8:50 am</small></p>
                          <p class="mb-0 text-muted">Sales dashboard have been created</p>

                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex mb-2">
                        <img src="images/faces/face5.jpg" alt="user">
                        <div>
                        <div class="text-info mb-1">Ryan Cortez <small class=" float-right text-muted">9:00 am</small></div>
                        <p class="mb-0 text-muted">Herbs are fun and easy to grow.</p>

                        </div>
                      </div>
                    </li>
                      <li>
                      <div class="d-flex mb-2">
                        <img src="images/faces/face1.jpg" alt="user">
                        <div>
                          <div class="text-info mb-1">Isabella Becker  <small class="float-right text-muted">9:30 am</small></div>

                          <p class="mb-0 text-muted">Sales dashboard have been created</p>

                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex mb-2">
                        <img src="images/faces/face2.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Adam Warren <small class=" float-right text-muted">9:00 am</small></p>
                          <p class="mb-0 text-muted ">You have done a great job #TW111</p>

                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex mb-2">
                      <img src="images/faces/face3.jpg" alt="user">
                     <div>
                      <p class="text-info mb-1">Leonard Thornton  <small class="float-right text-muted">10:30 am</small></p>
                      <p class="mb-0 text-muted">Sales dashboard have been created</p>
                     </div>
                      </div>
                    </li>
                    <li>

                      <div class="d-flex mb-2">
                        <img src="images/faces/face4.jpg" alt="user">
                        <div class="flex-grow-1">
                            <div class="text-info mb-1">George Morrison</div>
                            <p class="mb-0 text-muted">IVN55635653</p>
                        </div>
                        <small class="text-muted">25 Aug 2023</small>
                    </div>
                    </li>
                    <li>
                     <div class="d-flex mb-2">
                        <img src="images/faces/face5.jpg" alt="user">
                        <div class="flex-grow-1">
                            <div class="text-info mb-1">Ryan Cortez</div>
                            <p class="mb-0 text-muted">IVN55635653</p>
                        </div>
                        <small class="text-muted">25 Aug 2023</small>
                    </div>
                    </li>

                  </ul>
                  <div class="text-center">
                      <button type="button" class="btn btn-primary btn-sm">See All ></button>
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
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
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

