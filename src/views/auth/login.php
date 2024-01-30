<?php
$title = 'Login';
include_once '../../partials/header.php';
?>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5">Sign in</h3>
            <!-- <form class="form" action="../../../../db_connection/signup_db.php" method="POST"> -->
            <form class="form" action="../../../db_connection/signup_db.php" method="POST">
              <div class="form-outline mb-4">
                <label class="form-label" for="typeEmailX-2" >Email</label>
                <input name="user_email" type="email" id="typeEmailX-2" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="typePasswordX-2">Password</label>
                <input name="user_password" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
              </div>

              <input type="hidden" name="action" value="login">

              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once '../../partials/footer.php';
?>