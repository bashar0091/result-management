<?php
  session_start();
  if(isset($_SESSION['session_email']) == true) {
    header('location: dashboard.php');
  }
  include('partials/app-header.php');
  include('partials/header/home-header.php');
  $login_email = "";
  $login_pass = "";
  $failed_error = "";

  //error function
  function errorText($varName, $errorText="Field") {
    if(isset($_POST['login_submit'])) {
      if(empty($varName)) {
        echo "$errorText";
      }
    }
  }

  if(isset($_POST['login_submit'])) {
    $login_email = $_POST["login_email"];
    $login_pass = $_POST["login_pass"];

    if(empty($login_email) || empty($login_pass)){
      $failed_error = "";
    } else {
      $login_pass = md5($_POST["login_pass"]);
      $userPassGet = "SELECT * FROM user WHERE user_email = '$login_email' AND user_pass = '$login_pass' AND user_status = 1";
      $userPassQuery = mysqli_query($conn, $userPassGet);
      $userPassArray = mysqli_fetch_array($userPassQuery, MYSQLI_ASSOC);
      $userPasscount = mysqli_num_rows($userPassQuery);
  
      if($userPasscount == 1) {
        $failed_error = "User Name & Password match";
        $_SESSION['session_email'] = $login_email;
        header('location: dashboard.php');
      } else {
        $failed_error = "Username & Password dosen't match";
      }
    }  
  }
?>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body">
                <form  class="text-start" action="login.php" method="post">
                  <p style="color: red;"><?php echo $failed_error;?></p>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="login_email">
                  </div>
                  <p style="color: red;"><?php errorText($login_email, "Enter your email");?></p>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="login_pass">
                  </div>
                  <p style="color: red;"><?php errorText($login_pass, "Enter your password");?></p>

                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login_submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="signup.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php include('partials/app-footer.php');?>