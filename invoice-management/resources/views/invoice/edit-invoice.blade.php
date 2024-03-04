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
                         <form method="post" id="myForm" action="{{ route('invoice.update', ['id' => $invoice->id]) }}" class="form-sample">
                            @csrf
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12">


                                            <div class="card-body">
                                                <h4 class="card-title">Select Department</h4>
                                            </div>


                                        </div>

                                        @foreach($departments as $department)
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="companyCard border @if($invoice->department_id == $department->id) selected @endif">
                                                    <img src="{{asset('public/images/').'/'.$department->image}}" alt="" />
                                                    <input required type="radio" name="department_id" @if($invoice->department_id == $department->id) checked @endif class="radio-btn" value="{{ $department->id }}" id="radio1" />
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h4 class="card-title">Type</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <div>
                                                            <label>Select Type</label>

                                                            <select required name="invoice_type" class="form-control">
                                                                <option value="">Select Type</option>

                                                                <option  @if($invoice->report_type == "1") selected @endif  value="1">Invoice</option>
                                                                <option @if($invoice->report_type == "2") selected @endif  value="2">Quotation</option>
                                                                <option @if($invoice->report_type == "3") selected @endif  value="3">Pro forma</option>
                                                                <option @if($invoice->report_type == "4") selected @endif  value="4">Receipt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div id="">
                                                            <label>Select Invoice Date</label>
                                                            <input required class="typeahead" value="{{ $invoice->invoice_date  }}" type="date" name="invoice_date" placeholder="States of USA" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div id="">
                                                            <label>Select Due Date</label>

                                                            <input required class="typeahead" value="{{ $invoice->due_date  }}"  name="due_date" type="date" placeholder="States of USA" />
                                                        </div>
                                                    </div>

                                                     <div class="col">
                                                        <div id="">
                                                            <label>Is Recursive</label>
                                                            <div class="form-group">
                                                               <input class="" value="1" name="is_recursive" type="radio" onclick="showTextInput();" @if($invoice->is_recursive=='1') checked @endif />Yes
                                                               <input class="" value="0" name="is_recursive" type="radio" onclick="hideTextInput();" @if($invoice->is_recursive=='0') checked @endif/>No </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div id="textInputContainer"  @if($invoice->is_recursive=='0') style="display: none;" @endif>
                                                            <label> Recursive Date</label>
                                                            <select name="recursive_date" id="" class="form-control">
                                                                <option value="">Select day of Month</option>
                                                                @for($i=1;$i<=26;$i++)
                                                                <option @if($invoice->recursive_date == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4 class="card-title">Customer Information</h4>
                                                </div>

                                                   <div class="col-md-4">
                                                    <small class="float-right">
                                                        <select name="" class="form-control" id="customer_id_select">
                                                        <option value="">Select Existing Customer</option>
                                                            @foreach($customers as $custm)
                                                                <option @if($custm->id == $customer->id) selected @endif value="{{ $custm->id }}">{{ $custm->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </small>
                                                </div>

                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" required value="{{ $customer->company_name }}" name="company_name" class="typeahead" placeholder="Company Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" required value="{{ $customer->contact_person }}"  name="contact_person" class="typeahead" placeholder="Contact Person" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" required value="{{ $customer->email }}" name="email" class="typeahead" placeholder="Email Address" />
                                                    </div>
                                                </div>

                                                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                         <select name="currency" required class="form-control">
                                                            <option value="">Currency</option>

                                                            @foreach($currencies as $currency)
                                                            <option  @if($customer->currency == $currency->symbol) selected @endif >{{$currency->symbol}}</option>

                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="number" value="{{ $customer->phone }}" required name="phone" class="typeahead" placeholder="Phone Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <div class="custom-dropdown">
                                                        <span class="flag-icon flag-icon-{{ $customer->country }}" id="selected-flag-icon"></span>
                                                        <select name="country" required onchange="changeFlag()">
                                                            <option value="" >Country</option>
                                                           @foreach ($countries as $country)
                                                            <option @if($customer->country == $country->icon) selected @endif value="{{ $country->icon }}" data-icon="{{ $country->icon }}">{{ $country->name }}</option>
                                                            @endforeach
                                                            <!-- Add more countries as needed -->
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <textarea name="full_address" required class="form-control m-2" id="" cols="30" rows="10" placeholder="Full Address">{{ $customer->full_address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row mt-3">
                                                <div class="col-md-12" id="project-sections">
                                                    <div class="row">
                                                          <div class="col-md-8">
                                                            <h4 class="card-title">Edit Project</h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <small class="float-right">
                                                                <select name="project_id" class="form-control" id="c_project_id">
                                                                    <option value="">Select Existsing Project</option>
                                                                     @foreach($projects as $project)
                                                                        <option @if(in_array($project->id, $report_ids)) disabled @endif value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                                     @endforeach
                                                                </select>
                                                            </small>
                                                        </div>
                                                    </div>

                                                    @foreach ($reports as $key=>$report)


                                                    <div class="row mb-2 project-section">



                                                        <div class="col-md-9 mt-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="project_id_{{ $key }}" value="{{ $report->project_id }}" class="project-id-field">
                                                                        <input type="text" value="{{ $report->project_name }}" required name="projectname_{{ $key }}"  class="typeahead project-name-field" placeholder="Add Project Name" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea name="description_{{ $key }}" value="" required class="typeahead project-description-field" placeholder="Project Description" id="" cols="30" rows="25">{{ $report->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-social-icon btn-youtube remove-project" ><i class="ti-trash"></i></button>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <select name="quantity_{{ $key }}" id="" required class="form-control project-quantity-field">
                                                                            <option value="">Quantity</option>
                                                                                <option @if($report->quantity == "1") selected @endif value="1">1</option>
                                                                                <option @if($report->quantity == "2") selected @endif value="2">2</option>
                                                                                <option @if($report->quantity == "3") selected @endif value="3">3</option>
                                                                                <option @if($report->quantity == "4") selected @endif value="4">4</option>
                                                                                <option @if($report->quantity == "5") selected @endif value="5">5</option>
                                                                                <option @if($report->quantity == "6") selected @endif value="6">6</option>
                                                                                <option @if($report->quantity == "7") selected @endif value="7">7</option>
                                                                                <option @if($report->quantity == "8") selected @endif value="8">8</option>
                                                                                <option @if($report->quantity == "9") selected @endif value="9">9</option>
                                                                                <option @if($report->quantity == "10") selected @endif value="10">10</option>
                                                                                <option @if($report->quantity == "11") selected @endif value="11">10+</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" required name="price_{{ $key }}" value="{{ $report->r_price }}" placeholder="Price" class="typeahead project-price-field" id="" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"  name="discount_{{ $key }}" value="{{ $report->discount }}" placeholder="Discount" class="typeahead project-discount-field" id="" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" required name="subtotal_{{ $key }}" value="{{ $report->sub_total }}" placeholder="Sub Total" class="typeahead project-sub_total-field" id="" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"  name="hsncode_{{ $key }}" value="{{ $report->hsn_code }}" placeholder="HSN Code" class="typeahead project-hsn-field" id="" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"  name="gst_{{ $key }}" value="{{ $report->gst }}" placeholder="GST" class="typeahead project-gst-field" id="" />
                                                                    </div>
                                                                    <table class="">

                                                                        <tr>
                                                                            <td><strong>Shipping</strong></td>
                                                                            <td><input type="text" name="shipping_{{ $key }}" value="{{ $report->shipping }}" class="form-control project-shipping-field" placeholder="Shipping" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>TAX/VAT</strong></td>
                                                                            <td><input type="text" name="tax_{{ $key }}" value="{{ $report->tax_vat }}" class="form-control project-tax-field" placeholder="TAX/VAT" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Total Amount</strong></td>
                                                                            <td><input type="text" name="total_{{ $key }}" value="{{ $report->total_amount }}" class="form-control mt-2 project-total-field" placeholder="Total Amount" /></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><small class="">Remove TAX/VAT</small></td>
                                                                            <td><input type="checkbox" name="" class="form-check" id="" /></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr class="section-divider">
                                                        </div>
                                                    </div>


                                                    @endforeach


                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <div class="row">
                                                        <div class="col-md-9 text-center">
                                                            <div class="form-group">
                                                                <button class="btn btn-outline-info" type="button" id="addProjectBtn">Add More Project</button>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3 text-center">


                                                            <div class="form-group">
                                                                <button class="btn btn-info">Update Invoice</button>
                                                            </div>
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
        <!-- End custom js for this page-->

        <script>
            var isFirstChange = false;

            var projectCounter = {{ count($reports) }}-1;

 $(document).ready(function () {


                $(".companyCard").click(function () {
                    // Remove the 'selected' class from all cards
                    $(".companyCard").removeClass("selected");

                    // Add the 'selected' class to the clicked card
                    $(this).addClass("selected");

                    // Find the radio button inside the clicked card and set it to checked
                    $(this).find('input[type="radio"]').prop("checked", true);

                    // Uncheck radio buttons in other cards
                    $(".companyCard").not(this).find('input[type="radio"]').prop("checked", false);
                });



       $("#addProjectBtn").click(function() {
            // Clone the last project section and append it to the container
            const lastProjectSection = $(".project-section:last");
            const clonedSection = lastProjectSection.clone();
            isFirstChange = false;
            // Increment the project counter
            projectCounter++;

            clonedSection.find("input, textarea,select").val('');

                // Update the name attribute of project_id and other fields
                clonedSection.find(".project-id-field").attr('name', 'project_id_' + projectCounter);
                clonedSection.find(".project-name-field").attr('name', 'projectname_' + projectCounter);
                clonedSection.find(".project-description-field").attr('name', 'description_' + projectCounter);
                clonedSection.find(".project-quantity-field").attr('name', 'quantity_' + projectCounter);
                clonedSection.find(".project-price-field").attr('name', 'price_' + projectCounter);
                clonedSection.find(".project-sub_total-field").attr('name', 'subtotal_' + projectCounter);
                clonedSection.find(".project-dicount-field").attr('name', 'discount_' + projectCounter);
                clonedSection.find(".project-tax-field").attr('name', 'tax_' + projectCounter);
                clonedSection.find(".project-hsn-field").attr('name', 'hsncode_' + projectCounter);
                clonedSection.find(".project-gst-field").attr('name', 'gst_' + projectCounter);
                clonedSection.find(".project-shipping-field").attr('name', 'shipping_' + projectCounter);
                clonedSection.find(".project-total-field").attr('name', 'total_' + projectCounter);

                // Update other fields as needed

                // Show the remove button
                clonedSection.find(".remove-project").show();

                // Append the cloned section to the container
                $("#project-sections").append(clonedSection);

        });

        $("#project-sections").on("click", ".remove-project", function() {
            // Remove the clicked project section
            // Retrieve the value of project-id-field
            var projectId = $(this).closest(".project-section").find(".project-id-field").val();

            // If projectId is not blank
            if (projectId.trim() !== "") {
                // Enable the select option with the matching projectId
                $("#c_project_id").find("option[value='" + projectId + "']").prop("disabled", false);
                $("#c_project_id").val('');
            }

            // Remove the clicked project section
            $(this).closest(".project-section").remove();
        });


          $("#c_project_id").on("change",function() {
            var projectId = $(this).val();

             if(projectId) {

                  $.ajax({
                    url: '/invoice-management/project/' + projectId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                         if (isFirstChange) {
                              const clonedSection = $(".project-section");
                                // Update fields in the cloned section with the received data


                                    clonedSection.find(".project-id-field").attr('name', 'project_id_' + projectCounter).val(data.id);
                                    clonedSection.find(".project-name-field").attr('name', 'projectname_' + projectCounter).val(data.project_name);
                                    clonedSection.find(".project-description-field").attr('name', 'description_' + projectCounter).val(data.description);
                                    clonedSection.find(".project-quantity-field").attr('name', 'quantity_' + projectCounter);
                                    clonedSection.find(".project-price-field").attr('name', 'price_' + projectCounter).val(data.price);
                                    clonedSection.find(".project-sub_total-field").attr('name', 'subtotal_' + projectCounter);
                                    clonedSection.find(".project-tax-field").attr('name', 'tax_' + projectCounter);
                                    clonedSection.find(".project-hsn-field").attr('name', 'hsncode_' + projectCounter);
                                    clonedSection.find(".project-discount-field").attr('name', 'discount_' + projectCounter);
                                    clonedSection.find(".project-gst-field").attr('name', 'gst_' + projectCounter);
                                    clonedSection.find(".project-shipping-field").attr('name', 'shipping_' + projectCounter);
                                    clonedSection.find(".project-total-field").attr('name', 'total_' + projectCounter);

                                isFirstChange = false;
                            } else {


                                 const lastProjectSection = $(".project-section:last");
                                const clonedSection = lastProjectSection.clone();
                                 projectCounter++;
                                   clonedSection.find("input, textarea,select").val('');


                                    clonedSection.find(".project-id-field").attr('name', 'project_id_' + projectCounter).val(data.id);
                                    clonedSection.find(".project-name-field").attr('name', 'projectname_' + projectCounter).val(data.project_name);
                                    clonedSection.find(".project-description-field").attr('name', 'description_' + projectCounter).val(data.description);
                                    clonedSection.find(".project-quantity-field").attr('name', 'quantity_' + projectCounter);
                                    clonedSection.find(".project-price-field").attr('name', 'price_' + projectCounter).val(data.price);
                                    clonedSection.find(".project-sub_total-field").attr('name', 'subtotal_' + projectCounter);
                                    clonedSection.find(".project-tax-field").attr('name', 'tax_' + projectCounter);
                                    clonedSection.find(".project-hsn-field").attr('name', 'hsncode_' + projectCounter);
                                    clonedSection.find(".project-discount-field").attr('name', 'discount_' + projectCounter);
                                    clonedSection.find(".project-gst-field").attr('name', 'gst_' + projectCounter);
                                    clonedSection.find(".project-shipping-field").attr('name', 'shipping_' + projectCounter);
                                    clonedSection.find(".project-total-field").attr('name', 'total_' + projectCounter);
                             // Update other fields as needed

                                // Append the cloned section to the container
                                $("#project-sections").append(clonedSection);
                            }
                    }
                });


                    $(this).find("option:selected").prop("disabled", true);

                    }

        });


           $(document).on('change', '.project-price-field, .project-discount-field, .project-gst-field, .project-shipping-field, .project-tax-field', function() {
                    var $projectSection = $(this).closest('.project-section');
                     calculateTotal($projectSection);
                    });

        function calculateTotal($projectSection) {
            var price = parseFloat($projectSection.find('.project-price-field').val()) || 0;
            var discount = parseFloat($projectSection.find('.project-discount-field').val()) || 0;
            var gst = parseFloat($projectSection.find('.project-gst-field').val()) || 0;
            var shipping = parseFloat($projectSection.find('.project-shipping-field').val()) || 0;
            var tax = parseFloat($projectSection.find('.project-tax-field').val()) || 0;

            var subtotal =price- (price * (discount/100));
            $projectSection.find('.project-sub_total-field').val(subtotal.toFixed(2));
            var total = subtotal * (1 + gst / 100) + shipping + tax;
            $projectSection.find('.project-total-field').val(total.toFixed(2));
        }




        function changeFlag() {
            var selectedValue = document.querySelector('.custom-dropdown select').value;
            var flagIconElement = document.getElementById('selected-flag-icon');
            flagIconElement.className = 'flag-icon flag-icon-' + selectedValue;
        }

   });

        </script>

<script>
    $(document).ready(function() {


        $('#customer_id_select').on('change', function() {
            var customerId = $(this).val();
            if(customerId) {
                $.ajax({
                    url: '/invoice-management/customer/' + customerId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data.company_name);
                        // Populate the input fields with the retrieved customer data
                        $('input[name="customer_id"]').val(data.id);
                        $('input[name="company_name"]').val(data.company_name);
                        $('input[name="contact_person"]').val(data.contact_person);
                        $('input[name="email"]').val(data.email);
                        $('select[name="currency"]').val(data.currency);
                        var flagIconElement = document.getElementById('selected-flag-icon');
                        flagIconElement.className = 'flag-icon flag-icon-' + data.country;
                        $('select[name="country"]').val(data.country);
                        $('input[name="phone"]').val(data.phone);
                         $('textarea[name="full_address"]').val(data.full_address);
                        // You can add more fields here as needed
                    }
                });
            }
        });
    });




</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>

     $('#myForm').validate({
        rules: {
            'quantity': {
                required: true
            },
             'price': {
                required: true
            }
        },
        messages: {
            'quantity': {
                required: "Please select a quantity",
            },
            'price': {
                required: "Please select a quantity",
            }
        },
        submitHandler: function (form) {
            // Form submission logic
            form.submit();
        }
    });


     function showTextInput() {
        document.getElementById('textInputContainer').style.display = 'block';
    }

    function hideTextInput() {
        document.getElementById('textInputContainer').style.display = 'none';
    }

</script>
    </body>
</html>