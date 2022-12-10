<?php
  session_start();
  if(isset($_SESSION['session_email']) == true) {
    header('location: dashboard.php');
  }
  include("partials/app-header.php");
  include("partials/header/home-header.php");
  
  $user_fname = "";
  $user_lname = "";
  $user_phone = "";
  $user_name = "";
  $user_email = "";
  $user_pass = "";
  $user_confpass = "";
  $user_role = "";
  $failed_error = "";

  //error function
  function errorText($varName, $errorText="Field") {
    if(isset($_POST['sign_up'])) {
      if(empty($varName)) {
        echo "$errorText is Required";
      }
    }
  }

  if(isset($_POST['sign_up'])) {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_phone = $_POST['user_phone'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_confpass = $_POST['user_confpass'];
    $user_role = $_POST['user_role'];

    if(empty($user_fname) && empty($user_phone) && empty($user_name) && empty($user_email) && empty($user_pass) && empty($user_role)) {
      // echo "Field Required, Please check";
    } else if(empty($user_fname) || empty($user_phone) || empty($user_name) || empty($user_email) || empty($user_pass) || empty($user_role)) {
      $failed_error = "One or Two field is empty";
    } else if(strlen($user_pass) < 8 ) {
      $failed_error = "Password atleast 8 character";
    } else if($user_pass !== $user_confpass) {
      $failed_error = "Password dosen't match";
    } else {
      $emailValid = "SELECT * FROM user WHERE user_email = '$user_email'";
      $emailValidQuery = mysqli_query($conn, $emailValid);
      $emailValidArray = mysqli_fetch_array($emailValidQuery, MYSQLI_ASSOC);
      $emailValidCount = mysqli_num_rows($emailValidQuery);

      if($emailValidCount == 1) {
        $failed_error = "Email already exits";
      } else {
        $user_pass = md5($_POST['user_pass']);
        $user_confpass = md5($_POST['user_confpass']);

        $user_add = "
          INSERT INTO user(user_fname, user_lname, user_phone, user_name, user_email, user_pass, user_role) 
          VALUES('$user_fname', '$user_lname', '$user_phone', '$user_name', '$user_email', '$user_pass', '$user_role');
        ";
        mysqli_query($conn, $user_add);

        $failed_error = "Registration Complete";
        header('location: login.php');
      }

    }
    
  }
?>

  <main class="main-content mt-5 pt-5">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-12 col-xl-3"></div>
            <div class="col-12 col-xl-6">
              <div class="card card-plain bg-white">
                <div class="card-header pb-0">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body pt-0">
                  <form role="form" action="signup.php" method="post">
                    <p style="color: red;"><?php echo  $failed_error;?></p>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">First Name</label>
                      <input type="text" class="form-control" name="user_fname" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <p style="color: red;"><?php errorText($user_fname, "First Name");?></p>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Last Name</label>
                      <input type="text" class="form-control" name="user_lname">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Apply As</label>
                      <input type="text" class="form-control" name="user_role">
                    </div>
                    <p style="color: red;"><?php errorText($user_role);?></p>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Phone</label>
                      <input type="tel" class="form-control" name="user_phone">
                    </div>
                    <p style="color: red;"><?php errorText($user_phone, "Phone Number");?></p>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" name="user_name">
                    </div>
                    <p style="color: red;"><?php errorText($user_name, "User Name");?></p>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="user_email">
                    </div>
                    <p style="color: red;"><?php errorText($user_email, "Email");?></p>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="user_pass">
                    </div>   
                    <p style="color: red;"><?php errorText($user_pass, "Password");?></p>
                    
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" name="user_confpass">
                    </div>

                    <div class="text-center">
                      <button type="submit" name="sign_up" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="login.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-3"></div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
<?php include('partials/app-footer.php');?>