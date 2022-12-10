<?php 
  session_start();
  include('partials/app-header.php');

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

  function markStand($passingMark) {
    if($passingMark < 1.5) {
        return "Fail";
    } else{
        return "Pass";
    }
  }
  
  $sesResultRoll = $_SESSION['result_roll'];
  $sesResultReg = $_SESSION['result_reg'];

  if($sesResultRoll == true){} else {
    header('location: student-result.php');
  }

  if(isset($_POST['result_anothShow'])) {
    session_unset();
    header('location: student-result.php');
  }

  $get_resultDb = "SELECT * FROM result WHERE stud_roll = $sesResultRoll AND stud_reg = $sesResultReg";

  $get_resultQuery = mysqli_query($conn, $get_resultDb);
  $get_result = mysqli_fetch_array($get_resultQuery, MYSQLI_ASSOC);
?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="row align-items-center px-3">
                    <div class="col-6 d-flex align-items-center">
                    <h6 class="text-white text-capitalize">
                        <?php 
                            echo $get_result['stud_name'] . ' | ' . $get_result['stud_roll'] . ' | ' .
                                $get_result['stud_reg'] . ' | CSE';
                        ?>
                    </h6>
                    </div>
                    <div class="col-6 text-end">
                        <a href="#" class="btn bg-gradient-success mb-0">Download</a>
                        <form action="#" method="post" class="d-inline">
                            <button type="submit" name="result_anothShow" class="btn bg-gradient-info mb-0">Show Another</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 w-100">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-xxs p-3">Subject Name</th>
                        <th class="text-uppercase text-xxs p-3">Mark</th>
                        <th class="text-uppercase text-xxs p-3">Grade</th>
                        <th class="text-uppercase text-xxs p-3">Stand</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">Java Programming</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_java'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_java']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_java'])?></span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">C# Programming</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_cs'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_cs']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_cs'])?></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">Data Structure</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_dataSt'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_dataSt']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_dataSt'])?></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">Web Development</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_webDev'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_webDev']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_webDev'])?></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">Database Management</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_dbM'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_dbM']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_dbM'])?></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">Ecommerce Management</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_ecomM'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_ecomM']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_ecomM'])?></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">Software Development</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_softDev'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_softDev']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_softDev'])?></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0">Businees Organization</h6>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo $get_result['sub_bussOrg'];?></p>
                            </td>
                            <td class="p-3">
                                <p class="text-sm mb-0"><?php echo markGpa($get_result['sub_bussOrg']);?></p>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo markStand($get_result['sub_bussOrg'])?></span>
                            </td>   
                        </tr>

                        <tr>
                            <td class="p-3">
                                <h6 class="text-sm mb-0"></h6>
                            </td>
                            <td class="p-3">
                                <h5 class="text-sm mb-0">140</h5>
                            </td>
                            <td class="p-3">
                                <h5 class="text-sm mb-0"><?php echo $get_result['stud_grade'];?></h5>
                            </td>
                            <td class="p-3">
                                <span class="badge badge-sm bg-gradient-success"><?php echo $get_result['stud_stand'];?></span>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  
<?php include('partials/app-footer.php');?>