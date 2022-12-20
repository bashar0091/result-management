<?php 
  session_start();

  if($_SESSION['session_email'] == TRUE) {} else {
    header('location: login.php');
  }
  
  include('partials/app-header.php');
  include('partials/dashboard-sidebar.php');

  $resultEditIdGet = $_SESSION['result_edit_id'];

  if($resultEditIdGet == TRUE){} else {
    header('location: result.php');
  }

  function markGpa($passingMark) {
    if($passingMark > 79 && $passingMark < 101){
        return 5;
      } else if ($passingMark > 100) {
        return 0;
      } else if($passingMark > 74) {
        return 4.5;
      } else if($passingMark > 69) {
        return 4;
      } else if ( $passingMark > 64) {
        return 3.5;
      } else if ($passingMark > 59) {
        return 3;
      } else if ($passingMark > 54) {
        return 2.5;
      } else if ($passingMark > 49) {
        return 2;
      } else if ($passingMark > 44) {
        return 1.5;
      } else if ($passingMark < 45) {
        return 0;
      } else {
        return 0;
      }
  }

  function markGpa2($passingMark = 0) {
    if($passingMark > 79 && $passingMark < 101){
        return 5;
      } else if ($passingMark > 100) {
        return 0;
      } else if($passingMark > 74) {
        return 4.5;
      } else if($passingMark > 69) {
        return 4;
      } else if ( $passingMark > 64) {
        return 3.5;
      } else if ($passingMark > 59) {
        return 3;
      } else if ($passingMark > 54) {
        return 2.5;
      } else if ($passingMark > 49) {
        return 2;
      } else if ($passingMark > 44) {
        return 1.5;
      } else if ($passingMark < 45) {
        return 0;
      } else {
        return 0;
      }
  }

  $resultEditDb = "SELECT * FROM result WHERE id = $resultEditIdGet";
  $resultEditQuery = mysqli_query($conn, $resultEditDb);
  $resultEditArray = mysqli_fetch_array($resultEditQuery, MYSQLI_ASSOC);

  if(isset($_POST['result_subDel'])) {
    $result_subDelDb = "DELETE FROM result WHERE id = $resultEditIdGet";
    mysqli_query($conn, $result_subDelDb);
    unset($_SESSION['result_edit_id']);
    header('location: result.php');
  }

  if(isset($_POST['result_subUpdate'])) {
    $stud_name = $_POST['stud_name'];
    $stud_roll = $_POST['stud_roll'];
    $stud_reg = $_POST['stud_reg'];

    $sub_java = $_POST['sub_java'];
    $sub_cs = $_POST['sub_cs'];
    $sub_dataSt = $_POST['sub_dataSt'];
    $sub_webDev = $_POST['sub_webDev'];
    $sub_dbM = $_POST['sub_dbM'];
    $sub_ecomM = $_POST['sub_ecomM'];
    $sub_softDev = $_POST['sub_softDev'];
    $sub_bussOrg = $_POST['sub_bussOrg'];

    $stud_stand = "";
    $totalMark = "";

    if($sub_java < 45 || $sub_cs < 45 || $sub_dataSt < 45 || $sub_webDev < 45 || $sub_dbM < 45 || $sub_ecomM < 45 || $sub_softDev < 45 || $sub_bussOrg < 45) {
      $totalMark = 0;
    } else {
      $totalMark = ( markGpa($sub_java) + markGpa($sub_cs) + markGpa($sub_dataSt) + markGpa($sub_webDev) + markGpa($sub_dbM) + markGpa($sub_ecomM) + markGpa($sub_softDev) + markGpa($sub_bussOrg) ) / 8 ;
    }
    
    if($totalMark < 1.5) {
      $stud_stand = "Fail";
    } else {
      $stud_stand = "Pass";
    }

    $studInsert = "UPDATE student 
    SET stud_name = '$stud_name', stud_roll = $stud_roll, stud_reg = $stud_reg
    WHERE id = $resultEditIdGet" ;

    $resultInsert = "UPDATE result
    SET stud_name = '$stud_name', stud_roll = $stud_roll, stud_reg = $stud_reg, sub_java = $sub_java, sub_cs = $sub_cs, sub_dataSt = $sub_dataSt, sub_webDev = $sub_webDev, sub_dbM = $sub_dbM, sub_ecomM = $sub_ecomM, sub_softDev = $sub_softDev, sub_bussOrg = $sub_bussOrg, stud_grade = $totalMark, stud_stand = '$stud_stand'
    WHERE id =$resultEditIdGet ";

    mysqli_query($conn, $studInsert);
    mysqli_query($conn, $resultInsert);
    unset($_SESSION['result_edit_id']);
    header('location: result.php');
  }
?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('partials/header/dashboard-header.php');?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <form action="result-edit.php" method="post">
        <div class="row">
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row align-items-center px-3">
                    <div class="col-6 d-flex align-items-center">
                    <h6 class="text-white text-capitalize">Edit <?php echo $resultEditArray['stud_name']?> Result</h6>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" name="result_subDel" class="btn bg-gradient-success mb-0">Delete</button>
                        <button type="submit" name="result_subUpdate" class="btn bg-gradient-info mb-0">Update</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2 px-3">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group input-group-outline mb-3">
                        <input type="text" class="form-control" name="stud_name" value="<?php echo $resultEditArray['stud_name']?>" placeholder="Student Name">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group input-group-outline mb-3">
                        <input type="number" class="form-control" name="stud_roll" required value="<?php echo $resultEditArray['stud_roll']?>" placeholder="Student Roll">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group input-group-outline mb-3">
                        <input type="number" class="form-control" name="stud_reg" required  value="<?php echo $resultEditArray['stud_reg']?>" placeholder="Registration">
                      </div>
                    </div>
                  </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 w-100">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-xxs p-3">Subject</th>
                        <th class="text-uppercase text-xxs p-3">Number</th>

                        <th class="text-uppercase text-xxs p-3">Subject</th>
                        <th class="text-uppercase text-xxs p-3">Number</th>

                        <th class="text-uppercase text-xxs p-3">Subject</th>
                        <th class="text-uppercase text-xxs p-3">Number</th>

                        <th class="text-uppercase text-xxs p-3">Subject</th>
                        <th class="text-uppercase text-xxs p-3">Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td class="p-3">
                              <h6 class="text-sm mb-0">Java Programming</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_java" required  value="<?php echo $resultEditArray['sub_java']?>" placeholder="Mark">
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">C# Programming</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_cs" required value="<?php echo $resultEditArray['sub_cs']?>" placeholder="Mark">
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Data Structure</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_dataSt" required required value="<?php echo $resultEditArray['sub_dataSt']?>" placeholder="Mark">
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Web Development</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_webDev" required required value="<?php echo $resultEditArray['sub_webDev']?>" placeholder="Mark">
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td class="p-3">
                              <h6 class="text-sm mb-0">Database Manage.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_dbM" required required value="<?php echo $resultEditArray['sub_dbM']?>" placeholder="Mark">
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Ecommerce Manage.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_ecomM" required required value="<?php echo $resultEditArray['sub_ecomM']?>" placeholder="Mark">
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Software Dev.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_softDev" required required value="<?php echo $resultEditArray['sub_softDev']?>" placeholder="Mark">
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Businees Org.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <input type="number" class="form-control" name="sub_bussOrg" required required value="<?php echo $resultEditArray['sub_bussOrg']?>" placeholder="Mark">
                            </div>
                          </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        </form>
    </div>
  </main>
  
<?php include('partials/app-footer.php');?>