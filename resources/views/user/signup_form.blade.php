@include('layouts.master')
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Sign  Up Form</title>

<div class="login-form">
    <h3> Sign Up as: </h3>
    <br>
    <h3><i class="fa fa-user" aria-hidden="true"></i>Customer</h3>
    <br>
    <a href="{{route('customer.form')}}" class="button"><strong><i class="fa fa-user" aria-hidden="true"></i>Customer Sign Up</strong></a>
    <br>

    <h3><i class="fa fa-user-md" aria-hidden="true"></i>Employee</h3>
    <br>
    <a href="{{route('employee.form')}}" class="button"><strong><i class="fa fa-user-md" aria-hidden="true"></i>Employee Sign Up</strong></a>
    <br>

    <h5><strong>Already have an account? Sign In</strong></h5>

    <a href="#" class="button"><strong><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</strong></a>

    </div>
    