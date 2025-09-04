<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="container">
      <header>Login</header>
      <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="input-field">
          <input type="text" name="email" required value="{{ old('email') }}">
          <label>Email or Username</label>
          @error('email')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-field">
          <input class="pswrd" type="password" name="password" required>
          <span class="show">SHOW</span>
          <label>Password</label>
          @error('password')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="button">
          <div class="inner"></div>
          <button type="submit">LOGIN</button>
        </div>
      </form>
      {{-- <div class="auth">Or login with</div>
      <div class="links">
        <div class="facebook">
          <i class="fab fa-facebook-square"><span>Facebook</span></i>
        </div>
        <div class="google">
          <i class="fab fa-google-plus-square"><span>Google</span></i>
        </div>
      </div> --}}
      <div class="signup">
        Not a member? <a href="/signup">Signup now</a>
      </div>
    </div>
    <script>
      var input = document.querySelector('.pswrd');
      var show = document.querySelector('.show');
      show.addEventListener('click', active);
      function active(){
        if(input.type === "password"){
          input.type = "text";
          show.style.color = "#1DA1F2";
          show.textContent = "HIDE";
        }else{
          input.type = "password";
          show.textContent = "SHOW";
          show.style.color = "#111";
        }
      }
    </script>

  </body>
</html>
