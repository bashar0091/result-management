<?php 
  session_start();

  if($_SESSION['session_email'] == TRUE) {} else {
    header('location: login.php');
  }
  
  include('partials/app-header.php');
  include('partials/dashboard-sidebar.php');

  if(isset($_POST['result_edit_submit'])) {
    $_SESSION['result_edit_id'] = $_POST['result_id'];
    header('location: result-edit.php');
  }
?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('partials/header/dashboard-header.php');?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row align-items-center px-3">
                    <div class="col-6 d-flex align-items-center">
                    <h6 class="text-white text-capitalize">Student Result List</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a href="new-result.php" class="btn bg-gradient-info mb-0">New Result</a>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 w-100">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-xxs p-3">Name</th>
                        <th class="text-uppercase text-xxs p-3">Roll</th>
                        <th class="text-uppercase text-xxs p-3">Registration</th>
                        <th class="text-uppercase text-xxs p-3">Department</th>
                        <th class="text-uppercase text-xxs p-3">Result</th>
                        <th class="text-uppercase text-xxs p-3">Stand</th>
                        <th class="text-uppercase text-xxs p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $getResultInfo = "SELECT * FROM result";
                        $getResultQuery = mysqli_query($conn, $getResultInfo);

                        foreach($getResultQuery as $getResult) {
                      ?>
                        <tr>
                        <td class="p-3">
                            <h6 class="text-sm mb-0"><?php echo $getResult['stud_name']?></h6>
                        </td>
                        <td class="p-3">
                            <p class="text-sm mb-0"><?php echo $getResult['stud_roll']?></p>
                        </td>
                        <td class="p-3">
                            <p class="text-sm mb-0"><?php echo $getResult['stud_reg']?></p>
                        </td>
                        <td class="p-3">
                            <p class="text-sm mb-0">CSE</p>
                        </td>
                        <td class="p-3">
                          <p class="text-sm mb-0"><?php echo number_format((float)$getResult['stud_grade'], 2)?></p>
                            <span class="badge badge-sm bg-gradient-danger"></span>
                        </td>
                        <td class="p-3">
                          <?php 
                            if($getResult['stud_stand'] == "Pass") {
                          ?>
                            <span class="badge badge-sm bg-gradient-success"><?php echo $getResult['stud_stand']?></span>
                          <?php
                            }
                          ?>

                          <?php 
                            if($getResult['stud_stand'] == "Fail") {
                          ?>
                            <span class="badge badge-sm bg-gradient-danger"><?php echo $getResult['stud_stand']?></span>
                          <?php
                            }
                          ?>
                        </td>
                        <td class="p-3">
                          <form action="result.php" method="post">
                            <input type="hidden" name="result_id" value="<?php echo $getResult['id']?>">
                            <button type="submit" name="result_edit_submit" class="border-0 badge badge-sm bg-gradient-info">Edit</button>
                          </form>
                        </td>
                        </tr>
                      <?php }?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  
<?php include('partials/app-footer.php');?>