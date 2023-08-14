<link href=" {{asset('assets/css/bootstrap.min.css')}} " rel="stylesheet">
@if(session('message'))
<h5 class="alert alert-success col-6 mb-2">{{session('message')}}</h5>
@endif
<form>
    <!-- Email input -->
    <h1>User Login</h1>
    <div class="form-outline mb-4">

        <label class="form-label" for="form2Example1">Email address</label>
        <input type="email" id="email" name="email" class="form-control" />
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">

        <label class="form-label" for="form2Example2">Password</label>
        <input type="text" id="password" name="password" class="form-control" />
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
        <div class="col d-flex justify-content-center">
            <!-- Checkbox -->

        </div>


    </div>

    <!-- Submit button -->
    <a href="" class="btn btn-primary btn-block mb-4">Login</a>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Not a Customer? <a href="{{url('user/register')}}">Register</a></p>

    </div>
</form>