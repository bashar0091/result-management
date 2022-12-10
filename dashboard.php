<?php 
  session_start();

  if($_SESSION['session_email'] == TRUE) {} else {
    header('location: login.php');
  }
  
  include('partials/app-header.php');
  include('partials/dashboard-sidebar.php');
?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('partials/header/dashboard-header.php');?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <?php
        $getUserListDB = "SELECT id, user_fname, user_lname, user_email, user_name, user_phone, user_role
        FROM user WHERE user_status = 0
        ";
        $getUserListLoop = mysqli_query($conn, $getUserListDB);
        $getUserListRow = mysqli_num_rows($getUserListLoop);

        if($getUserListRow > 0){
          
          $approveValue = "";
          $errorText = "";

          if(isset($_POST['approve_submit'])){
            if(empty($approveValue)){
              $errorText ="Select Field First !";
            } 
          }

          if(isset($_POST['approve_submit']) && isset($_POST['approve'])) {
            $approveValue = $_POST['approve'];
            if(!empty($approveValue)){
              $errorText ="";
              foreach($approveValue as $approveData) {
                $approveSql = "UPDATE user SET user_status = 1 WHERE id = '$approveData'";
                mysqli_query($conn, $approveSql);

                echo "<meta http-equiv='refresh' content='0'>";
              }
            }
          }
      ?>
        <div class="row">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="col-12">
                <div class="card my-4">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <div class="row align-items-center px-3">
                        <div class="col-6 d-flex align-items-center">
                        <h6 class="text-white text-capitalize">Unapprove User List</h6>
                        </div>
                        <div class="col-6 text-end">
                          <span class="text-white text-capitalize me-2"><?php echo $errorText;?></span>
                          <button type="submit" name="approve_submit" class="btn bg-gradient-info mb-0">Update</button>
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
                            <th class="text-uppercase text-xxs p-3">Email</th>
                            <th class="text-uppercase text-xxs p-3">User Name</th>
                            <th class="text-uppercase text-xxs p-3">Phone</th>
                            <th class="text-uppercase text-xxs p-3">Role</th>
                            <th class="text-uppercase text-xxs p-3">Approve</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach($getUserListLoop as $getUserList){
                          ?>
                          <tr>
                            <td class="p-3">
                              <h6 class="text-sm mb-0"><?php echo $getUserList['user_fname'] . ' ' .$getUserList['user_lname']?></h6>
                            </td>
                            <td class="p-3">
                              <p class="text-sm mb-0"><?php echo $getUserList['user_email'] ?></p>
                            </td>
                            <td class="p-3">
                              <p class="text-sm mb-0"><?php echo $getUserList['user_name'] ?></p>
                            </td>
                            <td class="p-3">
                              <p class="text-sm mb-0"><?php echo '0' . $getUserList['user_phone'] ?></p>
                            </td>
                            <td class="p-3">
                              <span class="badge badge-sm bg-gradient-danger"><?php echo $getUserList['user_role'] ?></span>
                            </td>
                            <td class="p-3">
                                <input type="checkbox" name="approve[]" value="<?php echo $getUserList['id'];?>">
                            </td>
                          </tr>
                          <?php } ?>
            
                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
      <?php } ?>

      <?php
        $getUserListDB = "SELECT id, user_fname, user_lname, user_email, user_name, user_phone, user_role
        FROM user WHERE user_status = 1
        ";
        $getUserListLoop = mysqli_query($conn, $getUserListDB);
        $getUserListRow = mysqli_num_rows($getUserListLoop);

        if($getUserListRow > 0){
      ?>
        <div class="row">
          <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row align-items-center px-3">
                      <div class="col-6 d-flex align-items-center">
                      <h6 class="text-white text-capitalize">User List</h6>
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
                          <th class="text-uppercase text-xxs p-3">Email</th>
                          <th class="text-uppercase text-xxs p-3">User Name</th>
                          <th class="text-uppercase text-xxs p-3">Phone</th>
                          <th class="text-uppercase text-xxs p-3">Role</th>
                          <th class="text-uppercase text-xxs p-3">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach($getUserListLoop as $getUserList){
                        ?>
                        <tr>
                          <td class="p-3">
                            <h6 class="text-sm mb-0"><?php echo $getUserList['user_fname'] . ' ' .$getUserList['user_lname']?></h6>
                          </td>
                          <td class="p-3">
                            <p class="text-sm mb-0"><?php echo $getUserList['user_email'] ?></p>
                          </td>
                          <td class="p-3">
                            <p class="text-sm mb-0"><?php echo $getUserList['user_name'] ?></p>
                          </td>
                          <td class="p-3">
                            <p class="text-sm mb-0"><?php echo '0' . $getUserList['user_phone'] ?></p>
                          </td>
                          <td class="p-3">
                            <span class="badge badge-sm bg-gradient-success"><?php echo $getUserList['user_role'] ?></span>
                          </td>
                          <td class="p-3">
                    
                            <a href="javascript:;" class="badge badge-sm bg-gradient-info" data-toggle="tooltip" data-original-title="Edit user">
                              Edit
                            </a>
                          </td>
                        </tr>
                        <?php } ?>
          
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
      <?php } ?>
    </div>

  </main>
  
<?php include('partials/app-footer.php');?>