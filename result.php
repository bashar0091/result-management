<?php 
  include('partials/app-header.php');
  include('partials/dashboard-sidebar.php');

  function abc($a) {
    if($a > 79 && $a < 101){
        return 5;
      } else if ($a > 100) {
        return 0;
      } else if($a > 74) {
        return 4.5;
      } else if($a > 69) {
        return 4;
      } else if ( $a > 64) {
        return 3.5;
      } else if ($a > 59) {
        return 3;
      } else if ($a > 54) {
        return 2.5;
      } else if ($a > 49) {
        return 2;
      } else if ($a > 44) {
        return 1.5;
      } else if ($a < 45) {
        return 0;
      } else {
        return 0;
      }
  }

  echo ( abc (80) + abc(78) ) / 2;
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
                        <tr>
                        <td class="p-3">
                            <h6 class="text-sm mb-0">Shona Khan</h6>
                        </td>
                        <td class="p-3">
                            <p class="text-sm mb-0">20011</p>
                        </td>
                        <td class="p-3">
                            <p class="text-sm mb-0">1923598</p>
                        </td>
                        <td class="p-3">
                            <p class="text-sm mb-0">CSE</p>
                        </td>
                        <td class="p-3">
                            <span class="badge badge-sm bg-gradient-danger">3.50</span>
                        </td>
                        <td class="p-3">
                            <span class="badge badge-sm bg-gradient-danger">pass</span>
                        </td>
                        <td class="p-3">
                          <a href="javascript:;" class="badge badge-sm bg-gradient-info" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
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