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

                <div class="row m-2">
                 <div class="col-md-12 border-1">
                    <div class="card-body">
                      <h3 class="card-title text-mute">{{$report->invoice_type}} <small class="float-right">Download PDF</small></h3>

                      <div class="row">

                        <div class="col-md-3">
                            <img src="{{ $report->department_img }}" alt="">
                        </div>
                         <div class="col-md-6">
                           <div style="font-size: 28px;font-weight:800;">{{ $report->department_name }}</div>
                        </div>
                        <div class="col-md-2">
                          <h6 class="card-title">#{{ $report->report_no }} </h6>
                          <h6 class="card-title">{{ date('Y-m-d') }} </h6>
                        </div>
                         <div class="col-md-12">
                            <address class="address">
                                305-308, Commerce House, Race Course Road
                                Indore, India-452001 <br>
                                <strong>Phone: </strong>+917803040404<br>
                                <strong>Email: </strong> mukati@omrglobal.com<br>
                                <strong>Website: </strong>omrglobal.com
                            </address>

                            <h5>Bill To:</h5>
                           <address class="address">
                                305-308, Commerce House, Race Course Road
                                Indore, India-452001 <br>
                                <strong>Phone: </strong>+917803040404<br>
                                <strong>Email: </strong> mukati@omrglobal.com<br>
                                <strong>Website: </strong>omrglobal.com
                            </address>
                                </div>

                                <div class="col-md-12">
                                   <div class="table">
                                    <div class="table-row bg-info text-white">
                                        <div class="table-cell description-cell"><strong>DESCRIPTION</strong></div>
                                        <div class="table-cell"><strong>PRICE</strong></div>
                                        <div class="table-cell"><strong>DISCOUNT/COMMISSION (%)</strong></div>
                                        <div class="table-cell"><strong>NET AMOUNT</strong></div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell description-cell">Global Human Capital Management Market 2023</div>
                                        <div class="table-cell">6,625.00</div>
                                        <div class="table-cell">50.00</div>
                                        <div class="table-cell">3,312.50</div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell description-cell">Global Chronic Low Back Pain (CLBP) Treatment Market 2023-2030 Single User License</div>
                                        <div class="table-cell">4,000.00</div>
                                        <div class="table-cell">50.00</div>
                                        <div class="table-cell">2,000.00</div>
                                    </div>
                                    <!-- Add more rows as needed -->
                                </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">

                                            <div class="card-body">
                                                 <div class="card-header bg-info text-white">
                                                OTHER COMMENTS
                                                 </div>
                                                 <div class="m-2">
                                                 <p >Please transfer funds in following Bank Account</p>
                                                <p><strong>Account Holder:</strong> Orion Market Research Pvt. Ltd</p>
                                                <p><strong>ACCOUNT No :</strong> 201000481039</p>
                                                <p>IndusInd Bank, Industry House, Indore</p>
                                                <p><strong>Swift Code:</strong> INDBINBBINA</p>
                                                <p><strong>IFSC:</strong> INDB0000011</p>
                                                 </div>



                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                               <div class="card float-right">

                                            <table class="table">
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                       </div>
                    </div>
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

 @include('layouts.footer')
  <!-- End custom js for this page-->
</body>




</html>

