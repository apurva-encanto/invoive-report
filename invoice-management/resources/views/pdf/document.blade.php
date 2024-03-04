<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $report->invoice_type }}</title>
<style>
  .container {
    width: 100%;
     display: flex;
    justify-content: space-between; /* Distribute space between flex items */

  }
  section{

    background: #F5FAFF;
    padding:20px;
  }

  .box1, .box3 {
    width: 20%; /* Adjust as needed */
    box-sizing: border-box;
    display: inline-block;
  }

 .box5 {
    width: 10%; /* Adjust as needed */
    box-sizing: border-box;
    display: inline-block;
  }

  .box2 {
    width: 65%; /* Adjust as needed */
    box-sizing: border-box;
    display: inline-block;
  }

  .box4 {
    width: 65%; /* Adjust as needed */
    box-sizing: border-box;
    display: inline-block;
    margin-top:40px;
  }
  .table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    font-size: 0.875rem; /* Bootstrap default font size */
    color: #212529; /* Bootstrap default text color */
  }

  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6; /* Bootstrap default border color */
  }

  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6; /* Bootstrap default border color */
  }

  .table tbody + tbody {
    border-top: 2px solid #dee2e6; /* Bootstrap default border color */
  }

  .table .table {
    background-color: #fff; /* Bootstrap default background color for nested tables */
  }
.table-bordered {
  border-collapse: collapse;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
  padding: 8px;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-bordered tbody + tbody {
  border-top: 2px solid #dee2e6;
}

thead, .card-header{
    background:#217CCA;
    color:#fff;
}


 /* Card container */
    .card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 20px;
    }

    /* Card header */
    .card-header {
      font-size: 1.25rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    /* Card body */
    .card-body {
      color: #666;
      font-size: 1rem;
    }

</style>
</head>
<body>
    <section>
        <div class="container"  >
                        <div class="box1">
                              <img src="{{asset('public/images/').'/'.$department->image}}" alt="">
                        </div>

                        <div class="box2">
                            @if($report->department_id != 3 )
                             <h2>{{ $department->department_name }}</h2>
                            @endif
                        </div>

                        <div class="box5">
                            <h4>{{ $report->invoice_type }}</h4>
                        </div>
                        </div>

                        <div class="container">
                            <div class="box4">
                                <address class="address">
                                    {{$department->address}} <br>
                                    <strong>Phone: </strong>+91{{ $department->phone }}<br>
                                    <strong>Email: </strong> {{ $department->email }}<br>
                                    <strong>Website: </strong>{{ $department->website }}
                                </address>

                            </div>
                            <div class="box3">
                               <table >
                                    <tbody>
                                        <tr>
                                            <td><strong>Date :</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{ $report->invoice_date }}</td>
                                        </tr>
                                        @if($report->report_type ==1)
                                         <tr>
                                            <td><strong>Invoice :</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{ $report->report_no }}</td>
                                        </tr>
                                        @endif

                                    </tbody>

                                </table>

                            </div>
                        </div>

                        <div class="container">
                            <div class="box4">

                                <h5>Bill To:</h5>
                            <address class="address">
                                    {{ @$customer->full_address}} <br>
                                    {{ @$customer->country}} <br>
                                    <strong>Phone: </strong>{{ @$customer->phone}}<br>
                                    <strong>Email: </strong> {{ @$customer->email}}<br>
                                </address>

                            </div>
                            <div class="box3">


                            </div>
                        </div>


                        <div class="container">
                                  <table class="table table-bordered">
                            <thead>
                                <tr class="bg-info text-white">
                                <th>DESCRIPTION</th>
                                <th>QTY</th>
                                <th>PRICE</th>
                                <th>DISCOUNT/ <br>COMMISSION (%)</th>
                                <th>GST(%)</th>
                                <th>NET AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalAmt=0;
                                    $discount=0;
                                    $discountAmt=0;
                                    $gst=0;
                                    $gstAmt=0;
                                    $netAmt=0;

                                @endphp
                                @foreach ($projects as $project)
                                 <tr>
                                <td>{{ $project->project_name }} <br> {{ $project->description }}</td>
                                <td>{{ $project->quantity }}</td>
                                <td>{{ $project->r_price }}</td>
                                <td>{{ $project->discount }}</td>
                                <td>{{ $project->gst }}</td>
                                <td>{{ $project->total_amount }}</td>
                                </tr>

                                @php
                                $totalAmt=$totalAmt+$project->r_price;
                                $discount=$discount+$project->discount;
                                $gstAmt=$gstAmt+$project->gst;
                                $netAmt=$netAmt+$project->total_amount;
                                @endphp

                                @endforeach

                            </tbody>
                            </table>


                        </div>

                          <div class="container" style="margin-top: 25px;">
                            <div class="box4">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="bg-info text-white">
                                            <th>OTHER COMMENTS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>Please transfer funds in following Bank Account</td>
                                            </tr>
                                            <tr>
                                            <td><strong>Account Holder:</strong> {{ $department->acc_holder_name }} <br>
                                                    <strong>ACCOUNT No.:</strong> {{ $department->acc_number }}<br>
                                                    {{ $department->bank_name }}<br>
                                                    <strong>Swift Code:</strong> {{ $department->swift_code }}<br>
                                                    <strong>IFSC:</strong> {{ $department->ifsc }}<br>
                                                    </td>
                                            </tr>


                                        </tbody>
                                        </table>

                            </div>
                            <div class="box3" >
                                <table >
                                    <tbody>
                                        <tr>
                                            <td>Total Amount :</td>
                                            <td>{{$totalAmt}}</td>
                                        </tr>
                                        <tr>
                                            <td>Discount :</td>
                                            <td>{{ $discount }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tax (%):</td>
                                            <td>{{ $gstAmt }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tax due :</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Other :</td>
                                            <td>-</td>
                                        </tr>
                                         <tr>
                                            <td><strong>Net Total</strong> :</td>
                                            <td>{{ $netAmt }}</td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>

                        </div>
                        <div class="container" style="text-align: center;position: absolute;bottom:0;">
                                <span style="text-align: center;">
                                    If you have any questions about this <span>{{ $report->invoice_type }}</span>, please contact <br>
                                    [{{ $department->name }}, Phone +91{{ $department->phone }}, E-mail: {{ $department->email }}] <br>
                                   <h3>Thank You For Your Business!</h3>
                                </span>
                            </div>


    </section>



</body>
</html>
