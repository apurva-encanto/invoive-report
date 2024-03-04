 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script>
     $(document).ready(function($) {

	 $("#addUser").validate({
            rules: {
                full_name: "required",
                user_name: "required",
                password: {
                    required: true,
                    minlength: 6
                },
                 email: {
                    required: true,
                    email: true
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                phone_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                full_name: "Please enter Full Name",
                user_name: "Please enter User Name",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                phone_number: {
                    required: "Please enter a phone number",
                    number: "Please enter a valid phone number",
                    minlength: "Phone number must be 10 digits long",
                    maxlength: "Phone number must be 10 digits long"
                },
                 email: {
                    required: "Please enter a Email",
                },
            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
  </script>


 <script>
     $(document).ready(function($) {

          $.validator.addMethod("notEmptyPassword", function (value, element) {
        // Check if password is not empty
                return value.trim() !== "";
            }, "Please provide a password");

				  $("#editUser").validate({
            rules: {
                full_name: "required",
                user_name: "required",
                password: {
                    minlength: 6
                },
                 email: {
                    required: true,
                    email: true
                },
                confirm_password: {
                   required: function(element) {
                    // Check if password field is not empty
                    return $("#password").val().trim() !== "";
                },
                equalTo: "#password"
                },
                phone_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                full_name: "Please enter Full Name",
                user_name: "Please enter User Name",
                 password: {
                notEmptyPassword: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                phone_number: {
                    required: "Please enter a phone number",
                    number: "Please enter a valid phone number",
                    minlength: "Phone number must be 10 digits long",
                    maxlength: "Phone number must be 10 digits long"
                },
                 email: {
                    required: "Please enter a Email",
                },
            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
  </script>


<script>
     $(document).ready(function($) {

	 $("#addProject").validate({
            rules: {
                name: "required",
                description: "required",
                currency: "required",
                price: "required",
            },
            messages: {
                name: "Please enter Project Name",
                description: "Please write Project Description",
                currency: "Please select Currency",
                price: "Please enter Price",

            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

         $("#addCurrency").validate({
            rules: {
                name: "required",
                symbol: "required",
            },
            messages: {
                name: "Please enter Currency Name",
                symbol: "Please enter Symbol"

            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

             $("#addProfile").validate({
             rules: {
                full_name: "required",
                user_name: "required",
                password: {
                    minlength: 6
                },
                 email: {
                    required: true,
                    email: true
                },
                phone_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                }
            },

              messages: {
                full_name: "Please enter Full Name",
                user_name: "Please enter User Name",
                password: {
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                },
                phone_number: {
                    required: "Please enter a phone number",
                    number: "Please enter a valid phone number",
                    minlength: "Phone number must be 10 digits long",
                    maxlength: "Phone number must be 10 digits long"
                },
                 email: {
                    required: "Please enter a Email",
                },
            },

            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

    });
  </script>


 <script>
     $(document).ready(function($) {

				  $("#addCustomer").validate({
            rules: {
                company_name: "required",
                contact_person: "required",
                currency: "required",
                country: "required",
                full_address: "required",
                email: {
                    required: true,
                    email: true
                },
                phone_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                company_name: "Please enter Company Name",
                contact_person: "Please enter Contact Person",
                currency: "Please enter Currency",
                country: "Please enter Country",
                full_address: "Please enter Full Address",

                phone_number: {
                    required: "Please enter a phone number",
                    number: "Please enter a valid phone number",
                    minlength: "Phone number must be 10 digits long",
                    maxlength: "Phone number must be 10 digits long"
                },
                 email: {
                    required: "Please enter a Email",
                },
            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });


        	  $("#addDepartment").validate({
            rules: {
                image: "required",
                department_name: "required",
                name: "required",
                address: "required",
                acc_holder_name: "required",
                acc_number: "required",
                bank_name: "required",
                swift_code: "required",
                ifsc: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                website: {
                        required: true,
                        // url: true
                    }

            },
            messages: {
                image: "Please enter Company Name",
                department_name: "Please enter Department Name",
                name: "Please enter Name",
                address: "Please enter Full Address",
                acc_holder_name: "Please enter Account Holder Name",
                acc_number: "Please enter Account Number",
                bank_name: "Please enter Bank Name",
                swift_code: "Please enter Swift Code",
                ifsc: "Please enter IFSC Code",
                phone: {
                    required: "Please enter a phone number",
                    number: "Please enter a valid phone number",
                    minlength: "Phone number must be 10 digits long",
                    maxlength: "Phone number must be 10 digits long"
                },
                 email: {
                    required: "Please enter a Email",
                },
                website: {
                required: "Please enter a website URL",
                // url: "Please enter a valid URL"
               },

            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });


    });
  </script>
