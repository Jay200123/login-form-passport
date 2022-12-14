<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"type="text/css" href="css/style.css">
<nav class="navbar navbar-expand-md"> 
      <a class="navbar-brand" href="{{url('/')}}"> <p><strong>FootWear PH</p></strong></a> 
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
         <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="main-navigation"> 
        <ul class="navbar-nav">

        <li class="nav-item"><a class="nav-link" href="{{route('customer.index')}}"><p><strong><i class="fa fa-user" aria-hidden="true"></i>Customer</strong></p></a> </li>

         <li class="nav-item"> <a class="nav-link" href="{{route('employee.index')}}"><p><strong><i class="fa fa-user-md" aria-hidden="true"></i>Employee</strong></p></a> </li> 

        <li class="nav-item"> <a class="nav-link" href="{{route('service.index')}}"><p><strong><i class="fa fa-phone" aria-hidden="true"></i>Services</strong></p></a> </li>

        <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}"><p><strong><i class="fa fa-product-hunt"  aria-hidden="true"></i>Products</strong></p></a></li>
        </ul>

            <li><a style="color:white" href="{{route('user.form')}}"><span class="glyphicon glyphicon-user"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Sign Up</a></li>
            <li><a style="color:white" href="#"><span class="glyphicon glyphicon-log-in"><i class="fa fa-sign-in" aria-hidden="true"></i></span> Login</a></li>
          
          </ul>
        </div>
        </nav>