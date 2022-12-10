<?php
  session_start();
  if(isset($_SESSION['session_email']) == true) {
    header('location: dashboard.php');
  }
  
  include('partials/app-header.php');
  include('partials/header/home-header.php');
?>
<main class="main-content  mt-0">
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <h1 class="text-center text-white">
          Welcome Result Management 
          <br> 
          Please login or Register
          <br>
          Or Click Result to 
          <br>
          show student Result
        </h1>
      </div>
    </div>
  </div>
</main>

<?php include('partials/app-footer.php');?>