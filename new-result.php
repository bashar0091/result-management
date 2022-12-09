<?php 
  include('partials/app-header.php');
  include('partials/dashboard-sidebar.php');

  if(isset($_POST['result_sub'])) {
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

    if( empty($stud_name) && empty($stud_roll) && empty($stud_reg) && empty($sub_java) && empty($sub_cs) && empty($sub_dataSt) && empty($sub_webDev) && empty($sub_dbM) && empty($sub_ecomM) && empty($sub_softDev) && empty($sub_bussOrg) ) {
      
    } else {
      $studInsert = "INSERT INTO student(stud_name, stud_roll, stud_reg) 
      VALUES ('$stud_name', $stud_roll, $stud_reg)";

      $resultInsert = "INSERT INTO result(stud_roll, sub_java, sub_cs, sub_dataSt, sub_webDev, sub_dbM, sub_ecomM, sub_softDev, sub_bussOrg) 
      VALUES ($stud_roll, $sub_java, $sub_cs, $sub_dataSt, $sub_webDev, $sub_dbM, $sub_ecomM, $sub_softDev, $sub_bussOrg)";

      mysqli_query($conn, $studInsert);
      mysqli_query($conn, $resultInsert);

      header('location: result.php');
    }
  }
?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('partials/header/dashboard-header.php');?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <form action="new-result.php" method="post">
        <div class="row">
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row align-items-center px-3">
                    <div class="col-6 d-flex align-items-center">
                    <h6 class="text-white text-capitalize">New Result</h6>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" name="result_sub" class="btn bg-gradient-info mb-0">Add New</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2 px-3">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="stud_name" onfocus="focused(this)" onfocusout="defocused(this)" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Roll No</label>
                        <input type="number" class="form-control" name="stud_roll" onfocus="focused(this)" onfocusout="defocused(this)" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Registration No.</label>
                        <input type="number" class="form-control" name="stud_reg" onfocus="focused(this)" onfocusout="defocused(this)" required>
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
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_java" onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">C# Programming</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_cs" onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Data Structure</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_dataSt" onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Web Development</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_webDev" onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td class="p-3">
                              <h6 class="text-sm mb-0">Database Manage.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_dbM" onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Ecommerce Manage.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_ecomM" onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Software Dev.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_softDev" onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                          </td>

                          <td class="p-3">
                              <h6 class="text-sm mb-0">Businees Org.</h6>
                          </td>
                          <td class="p-3">
                            <div class="input-group input-group-outline mb-3">
                              <label class="form-label">Number</label>
                              <input type="number" class="form-control" name="sub_bussOrg" onfocus="focused(this)" onfocusout="defocused(this)" required>
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