<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>#success_message{ display: none;}</style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">


          <title>Document</title>
</head>
<body>
    <div class="container">

        <form class="well form-horizontal" action="{{ route('AddTeacher') }}" method="post"  id="contact_form">
            @csrf
       <fieldset>
        {{-- @if (Session::has(addteacher))
        <div class="alert alert-success" role="alert">
            {{ Session::get(addteacher) }}
        </div>

        @endif --}}

    <!-- Form Name -->
    <legend><center><h2><b>Registration Form</b></h2></center></legend><br>

    <!-- Text input-->


    <div class="form-group">
      <label class="col-md-4 control-label">Name</label>
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  name="name" placeholder="Your Name" class="form-control"  type="text">
        </div>
      </div>
    </div>

    <!-- Text input-->



      <div class="form-group">
      <label class="col-md-4 control-label">Department / Office</label>
        <div class="col-md-4 selectContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <select name="dept" class="form-control selectpicker">
          <option value="">Select your Department/Office</option>
          <option>CSE</option>
          <option>Math</option>
          <option >Physics</option>
          <option >Chemistry</option>
          <option >Botany</option>
          <option >Sociology</option>
          <option >Economics</option>
          <option >Mayor's Office</option>
          <option >Tourism Office</option>
        </select>
      </div>
    </div>
    </div>





    <!-- Text input-->

    <div class="form-group">
      <label class="col-md-4 control-label" >Password</label>
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input name="password" placeholder="Password" class="form-control"  type="password">
        </div>
      </div>
    </div>

    <!-- Text input-->



    <!-- Text input-->
           <div class="form-group">
      <label class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
        </div>
      </div>
    </div>


    <!-- Text input-->

    <div class="form-group">
      <label class="col-md-4 control-label">Contact No.</label>
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="contact" placeholder="(017..)" class="form-control" type="text">
        </div>
      </div>
    </div>

    <!-- Select Basic -->

    <!-- Success message -->
    <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4"><br>
     <button type="submit" class="btn btn-warning" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
      </div>
    </div>

    </fieldset>
    </form>
    </div>
        </div><!-- /.container -->

        <script>
            $(document).ready(function() {
                $('#contact_form').bootstrapValidator({
                    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        first_name: {
                            validators: {
                                    stringLength: {
                                    min: 2,
                                },
                                    notEmpty: {
                                    message: 'Please enter your First Name'
                                }
                            }
                        },
                        last_name: {
                            validators: {
                                stringLength: {
                                    min: 2,
                                },
                                notEmpty: {
                                    message: 'Please enter your Last Name'
                                }
                            }
                        },
                        user_name: {
                            validators: {
                                stringLength: {
                                    min: 8,
                                },
                                notEmpty: {
                                    message: 'Please enter your Username'
                                }
                            }
                        },
                        user_password: {
                            validators: {
                                stringLength: {
                                    min: 8,
                                },
                                notEmpty: {
                                    message: 'Please enter your Password'
                                }
                            }
                        },
                        confirm_password: {
                            validators: {
                                stringLength: {
                                    min: 8,
                                },
                                notEmpty: {
                                    message: 'Please confirm your Password'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter your Email Address'
                                },
                                emailAddress: {
                                    message: 'Please enter a valid Email Address'
                                }
                            }
                        },
                        contact_no: {
                            validators: {
                            stringLength: {
                                    min: 12,
                                    max: 12,
                                notEmpty: {
                                    message: 'Please enter your Contact No.'
                                }
                            }
                        },
                        department: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select your Department/Office'
                                }
                            }
                        },
                            }
                        }
                    })
                    .on('success.form.bv', function(e) {
                        $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                            $('#contact_form').data('bootstrapValidator').resetForm();

                        // Prevent form submission
                        e.preventDefault();

                        // Get the form instance
                        var $form = $(e.target);

                        // Get the BootstrapValidator instance
                        var bv = $form.data('bootstrapValidator');

                        // Use Ajax to submit form data
                        $.post($form.attr('action'), $form.serialize(), function(result) {
                            console.log(result);
                        }, 'json');
                    });
            });
        </script>

        <script>https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js</script>
        <script>https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js</script>
        <script>https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js</script>

    </body>
</html>
