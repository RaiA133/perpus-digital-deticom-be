<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Update Password</title>
</head>
<body>
  <section class="vh-100" style="background-color: #363636;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                    
                  <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <h3 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Update Your Password</h3>
                    <h6 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Please Input New Password!</h6>

                    <div class="form-group" style="display: none">
                      <input type="text" name="token" value="{{ request()->token }}">
                      <input type="text" name="email" value="{{ request()->email }}">
                  </div>

                    <div class="form-group row mb-3">
                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                      <div class="col-md-6">
                          <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                      <div class="col-md-6">
                          <input id="password_confirmation" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                  </div>

                  <div class="pt-4 d-flex justify-content-center mt-3">
                      <button class="btn btn-success btn-lg" type="submit">Update Password</button>
                  </div>                  

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  {{-- validasi confrimsi password harus sama dengan password yang dimasukan  --}}
  <script type="text/javascript">
    window.onload = function () {
        document.getElementById("password").onchange = validatePassword;
        document.getElementById("password_confirmation").onchange = validatePassword;
    }

    function validatePassword(){
    var pass2=document.getElementById("password_confirmation").value;
    var pass1=document.getElementById("password").value;
    if(pass1!=pass2)
        document.getElementById("password_confirmation").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
    else
        document.getElementById("password_confirmation").setCustomValidity('');
    }
</script>

  {{-- script sweet alert  --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('sweetalert::alert')
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
