<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <div class="container">
    <header>Create Account</header>
    <form method="POST" action="{{ route('signup.post') }}">
      @csrf

      <div class="input-field">
        <input type="text" name="name" required>
        <label>Full Name</label>
        @error('name')
          <div style="color: red;">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-field">
        <input type="email" name="email" required value="{{ old('email') }}">
        <label>Email Address</label>
        @error('email')
          <div style="color: red;">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-field">
        <input class="pswrd" type="password" name="password" required>
        <span class="show">SHOW</span>
        <label>Password</label>
      </div>

      <div class="input-field">
        <input class="pswrd-confirm" type="password" name="password_confirmation" required>
        <span class="show">SHOW</span>
        <label>Confirm Password</label>
        @error('password')
          <div style="color: red;">{{ $message }}</div>
        @enderror
      </div>

      <div class="button">
        <div class="inner"></div>
        <button type="submit">REGISTER</button>
      </div>
      
    </form>

    <div class="auth">Or sign up with</div>
    <div class="links">
      <div class="facebook">
        <i class="fab fa-facebook-square"><span>Facebook</span></i>
      </div>
      <div class="google">
        <i class="fab fa-google-plus-square"><span>Google</span></i>
      </div>
    </div>

    <div class="signup">
      Already have an account? <a href="/logein">Login now</a>
    </div>
  </div>

  <script>
    // Select all show buttons
    const showBtns = document.querySelectorAll('.show');

    showBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const input = btn.previousElementSibling; // assumes <span> comes after <input>
        if(input.type === "password") {
          input.type = "text";
          btn.textContent = "HIDE";
          btn.style.color = "#1DA1F2";
        } else {
          input.type = "password";
          btn.textContent = "SHOW";
          btn.style.color = "#111";
        }
      });
    });


  </script>
</body>

</html>