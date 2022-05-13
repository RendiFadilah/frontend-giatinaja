<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page | Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/libraries/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/libraries/fontawesome-free/css/all.min.css  " />
    <link rel="stylesheet" href="../assets/libraries/bootstrap/css/sweetalert.css">
</head>
<body>
    
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card" style="border-radius: 1rem;">
          <div class="card-body p-5">
            
            <form action="process.php" method="POST">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h4 class="fw-bold mb-5 text-center">Hallo selamat datang <br>di SMK Jakarta Pusat 1</h4>
                <div class="form-outline form-white mb-4">
                  <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="password" name=
                "password" class="form-control form-control-lg mb-4" placeholder="Password" />
              </div>
              <button class="btn btn-outline-primary w-100  btn-lg px-5" type="submit">Login</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <script src="../assets/libraries/bootstrap/js/sweetalert.min.js"></script>

</body>
</html>