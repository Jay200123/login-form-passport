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
           @if (count($errors) > 0)
                @include('layouts.flash-messages')
            @endif
            <form class="" action="{{ route('user.login') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i>Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password"><i class="fa fa-key" aria-hidden="true"></i>Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <br>
                    <input type="submit" value="Sign In" class="btn btn-primary">
             </form>
</div>