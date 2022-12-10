<?php
  session_start();
  if(isset($_SESSION['session_email']) == true) {
  header('location: dashboard.php');
  }

  include('partials/app-header.php');
  include('partials/header/home-header.php');
  $result_roll = "";
  $result_reg = "";
  $failed_error = "";

  //error function
  function errorText($varName, $errorText="Field") {
    if(isset($_POST['result_submit'])) {
      if(empty($varName)) {
        echo "$errorText";
      }
    }
  }

  if(isset($_POST['result_submit'])) {
    $result_roll = $_POST["result_roll"];
    $result_reg = $_POST["result_reg"];

    if(empty($result_roll) || empty($result_reg)){
      $failed_error = "";
    } else {
      $userPassGet = "SELECT * FROM result WHERE stud_roll = '$result_roll' AND stud_reg = '$result_reg'";
      $userPassQuery = mysqli_query($conn, $userPassGet);
      $userPassArray = mysqli_fetch_array($userPassQuery, MYSQLI_ASSOC);
      $userPasscount = mysqli_num_rows($userPassQuery);
  
      if($userPasscount == 1) {
        $failed_error = "roll & registration match";
        $_SESSION['result_roll'] = $result_roll;
        $_SESSION['result_reg'] = $result_reg;
        header('location: result-show.php');
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
                <h4>Exam Result</h4>
                <form role="form" class="text-start" action="student-result.php" method="post">
                  <p style="color: red;"><?php echo $failed_error;?></p>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Student Roll</label>
                    <input type="number" class="form-control" name="result_roll">
                  </div>
                  <p style="color: red;"><?php errorText($result_roll, "Enter your roll");?></p>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Student Registration</label>
                    <input type="number" class="form-control" name="result_reg">
                  </div>
                  <p style="color: red;"><?php errorText($result_reg, "Enter your registration");?></p>
                  <div class="text-center">
                    <button type="submit" name="result_submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php include('partials/app-footer.php');?>