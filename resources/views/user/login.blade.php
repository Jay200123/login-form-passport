@include('layouts.master')
<style>
    .form-control{
  border: 1px solid black;
  margin:5px;
  width: 90%;
  justify-content: center;
}

</style>
<div class="login-form">
            <h1><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</h1>
            <form action="{{route('login')}}" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i>Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password"><i class="fa fa-key" aria-hidden="true"></i>Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <br>
                    <button type="submit" class="btn btn-primary">Sign In</button>
             </form>
</div>