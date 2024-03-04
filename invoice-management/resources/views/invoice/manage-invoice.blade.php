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
                      <h4 class="card-title">Manage Invoices <small class="float-right btn-info btn-sm" onclick="resetFilter()">Reset</small></h4>
                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Department</label>
                                <select name="departmentFilter" class="form-control" id="departmentFilter" >
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id}}">{{ $department->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="typeFilter" class="form-control" id="typeFilter" >
                                    <option value="">Select Type</option>
                                    <option value="1">Invoice</option>
                                    <option value="2">Quotation</option>
                                    <option value="3">Proforma</option>
                                    <option value="4">Receipt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Month</label>
                                <select name="monthFilter" class="form-control" id="monthFilter" >
                                    <option value="">Select Month</option>
                                    <option value="today">Today</option>
                                    <option value="month">Month</option>
                                    <option value="six">Half Yearly</option>
                                    <option value="year">Yearly</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="statusFilter" class="form-control" id="statusFilter" >
                                    <option value="">Select Status</option>
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>
                        </div>

                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>
             <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                 <div class="table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Company
                                                </th>
                                                <th>
                                                    Issue Date
                                                </th>
                                                <th>
                                                    Due Date
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                   Change Status
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                   <div class="load-more-container justify-content-center text-center m-auto">
                                        <button class="btn  btn-outline-primary load-more-btn" id="loadMoreBtn">Load More</button>
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

<script>

</script>

<script>

function resetFilter()
{

$('table tbody').empty();
// Reset page number
page = 1;
$('#typeFilter, #statusFilter, #departmentFilter,#monthFilter').val('')
fetchMoreData()
}

// Attach onchange event handler to multiple select elements
$('#typeFilter, #statusFilter, #departmentFilter,#monthFilter').change(function() {
    // Clear existing data from the table
    $('table tbody').empty();

    // Reset page number
    page = 1;

    // Fetch data with new filters
    fetchMoreData();
});


    fetchMoreData()

    var page = 1; // Initial page number

    // Function to fetch more data
       function fetchMoreData() {

          var typeFilter = $('#typeFilter').val();
          var statusFilter = $('#statusFilter').val();
          var monthFilter = $('#monthFilter').val();
          var departmentFilter = $('#departmentFilter').val();

          console.log('typeFilter',typeFilter);
          console.log('statusFilter',statusFilter);
          console.log('monthFilter',monthFilter);
          console.log('departmentFilter',departmentFilter);

        $.ajax({
            url: '{{ route("fetch.more.data") }}', // Replace with your route URL
            method: 'GET',
            data: { page: page,department_id: departmentFilter,status:statusFilter,type:typeFilter,month: monthFilter},
            success: function(response) {
                if (response.data.length > 0) {
                    // Iterate over each report in the response and append it to the table
                    response.data.forEach(function(report) {
                        var newRow = '<tr>' +
                            '<td>' + report.company_name + '</td>' +
                            '<td>' + report.invoice_date + '</td>' +
                            '<td>' + report.due_date + '</td>' +
                            '<td>' + getReportTypeLabel(report.report_type) + '</td>' +
                            '<td>' + getStatusLabel(report.status) + '</td>' +
                            '<td>' +
                            '<select class="typeahead h-25 changeStatus" data-report-id="' + report.id + '" id="">' +
                            '<option value="open"' + (report.status === 'open' ? ' selected' : '') + '>Open</option>' +
                            '<option value="close"' + (report.status === 'close' ? ' selected' : '') + '>Close</option>' +
                            '</select>' +
                            '</td>' +
                            '<td>' +
                            '<a href="{{ url('report') }}/' + report.id + '/mail" class="btn btn-warning btn-sm " target="_blank"><i class="ti-email"></i></a> <a href="{{ url('report') }}/' + report.id + '/view" class="btn btn-info btn-sm " target="_blank"><i class="ti-eye"></i></a><a href="{{ url('report') }}/' + report.id + '/edit" class="btn btn-info btn-sm mx-1"><i class="ti-pencil"></i></a>' +
                            '<a href="" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>' +
                            '</td>' +
                            '</tr>';

                        $('table tbody').append(newRow); // Append new row to the table
                    });

                    if (response.data.length < 10)
                    {
                        $('#loadMoreBtn').hide();
                    }

                    page++; // Increment page number for the next fetch
                } else {

                      var newRow = '<tr>' +
                        '<td class="text-center bg-light" colspan="7"><h6> No Data Found</h6></td>'
                        + '</tr>';


                     $('table tbody').append(newRow);
                    // No more data available, hide the "Load More" button
                    $('#loadMoreBtn').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Function to convert report type to label
    function getReportTypeLabel(reportType) {
        switch (reportType) {
            case '1':
                return '<span>Invoice</span>';
            case '2':
                return '<span>Quotation</span>';
            case '3':
                return '<span>Pro forma</span>';
            case '4':
                return '<span>Receipt</span>';
            default:
                return '';
        }
    }

    // Function to get status label
    function getStatusLabel(status) {
        return status === 'open' ? '<span class="text-success font-weight-bold">Open</span>' : '<span class="text-danger font-weight-bold">Close</span>';
    }

    // Load more data when the "Load More" button is clicked
    $('#loadMoreBtn').click(function() {
        fetchMoreData();
    });

   $('table').on('change', '.changeStatus', function() {
        var selectedOption = $(this).val();
         var reportId = $(this).data('report-id');
       var postData= { 'status':selectedOption,'report_id':reportId }
        $.ajax({
            type: 'GET',
            url: '{{url("report/status")}}',
            data: {
                '_token': '{{ csrf_token() }}',
                'data': postData
            },
            success: function(response) {
                // Update the result div with processed data
                console.log("change status",response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });


    });

</script>


</html>

