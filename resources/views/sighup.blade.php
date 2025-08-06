<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Animated Sign Up Form</title>
 <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <div class="container">
    <header>Create Account</header>
    <form>
      <div class="input-field">
        <input type="text" required>
        <label>Full Name</label>
      </div>
      <div class="input-field">
        <input type="email" required>
        <label>Email Address</label>
      </div>
      <div class="input-field">
        <input class="pswrd" type="password" required>
        <span class="show">SHOW</span>
        <label>Password</label>
      </div>
      <div class="input-field">
        <input class="pswrd-confirm" type="password" required>
        <span class="show-confirm">SHOW</span>
        <label>Confirm Password</label>
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
      Already have an account? <a href="resources/views/index.blade.php">Login now</a>
    </div>
  </div>

  <script>
    // Show/hide password
    const input = document.querySelector('.pswrd');
    const show = document.querySelector('.show');
    show.addEventListener('click', () => {
      if (input.type === "password") {
        input.type = "text";
        show.textContent = "HIDE";
        show.style.color = "#1DA1F2";
      } else {
        input.type = "password";
        show.textContent = "SHOW";
        show.style.color = "#111";
      }
    });

    // Show/hide confirm password
    const inputConfirm = document.querySelector('.pswrd-confirm');
    const showConfirm = document.querySelector('.show-confirm');
    showConfirm.addEventListener('click', () => {
      if (inputConfirm.type === "password") {
        inputConfirm.type = "text";
        showConfirm.textContent = "HIDE";
        showConfirm.style.color = "#1DA1F2";
      } else {
        inputConfirm.type = "password";
        showConfirm.textContent = "SHOW";
        showConfirm.style.color = "#111";
      }
    });
    
  </script>
</body>
</html>
