@include('layouts.master')
<h3><i class="fa fa-user" aria-hidden="true"></i>Employee Sign Up</h3>

<div class="container">
<form id="eform" method="#" action="#" enctype ="multipart/form-data">

          <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" class="form-control" name="name" id="name"/>
          </div>

          <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" class="form-control">
          </div>

          <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" class="form-control">
          </div>

          <div class="form-group">
                <label for="password">Confirm Password: </label>
                <input type="password" name="c_password" id="c_password" class="form-control">
          </div>

          <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" id="fname"/>
          </div>

          <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname"/>
          </div>

          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address"/>
          </div>

          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone"/>
          </div>

          <div class="form-group">
              <label for="town">Town</label>
              <input type="text" class="form-control" name="town" id="town"/>
          </div>

          <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" id="city"/>
          </div>

          <div class="form-group">
                <label for="image">Upload Photo: </label>
                <input type="file" name="uploads" id="employee_image" class="form-control">
          </div>


             <button id="employeeSubmit" type="submit" class="btn btn-block btn-danger">Register</button>
      </form>
  </div>