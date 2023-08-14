<link href=" {{asset('assets/css/bootstrap.min.css')}} " rel="stylesheet">
<form action="{{url('user/register')}}" method="POST">
    @csrf
  <!-- Email input -->
  <h1>User Register</h1>
  <div class="form-outline mb-4">
    
    <label class="form-label" for="form2Example1">Name</label>
    <input type="text" id="name" name="name" class="form-control"  />
  </div>
  <div class="form-outline mb-4">
    
    <label class="form-label" for="form2Example1">Email address</label>
    <input type="email" id="email" name="email" class="form-control"  />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    
    <label class="form-label" for="form2Example2">Password</label>
    <input type="text" id="password" name="password" class="form-control"  />
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      
    </div>

   
  </div>

  <!-- Submit button -->
 <button class="btn btn-primary btn-block mb-4" type="submit">Register</button>
</form>