<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

    <title>Magic Tea</title>
</head>
<body>
    <header class="shadow">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-brand text-uppercase">
                    <p class="fw-bold">  User Page </p>
                </div>
            </div>
        </div>
    </header>
    <div class="container d-flex p-5 ">
        <div class=" mx-auto w-50 border rounded p-3 " >
          <div class="container d-flex justify-content-center  ">
            <div class="navbar-brand text-uppercase mb-3">
                <p class="fw-bold">  Magic<span id="logoMark" class="text-light mx-1 px-2 bg-success rounded">Tea</span>  </p>
            </div>
          </div>
            <form action="log.php" method="post" class="d-block">
                <!-- login Error Log -->
                <div >
                    <?php if ( isset($_GET['error']) ) { ?>
                        <p class="text-danger"><?= $_GET['error'] ?></p>
                    <?php } ?>
                </div>
                <!-- login Error Log -->

              <div class="form-floating mb-3">
                <input type="text" name="login" id="inputMail" value="henints" class="form-control" placeholder="" required>
                <label for="inputMail">Login</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="inputPass" value="user" placeholder="" required>
                <label for="inputPass">Password</label>
              </div>

              <div class="d-flex justify-content-between">
                <a href="../../" class=" fs-5 nav-link"> <i class="bi bi-arrow-left"></i></a>
                <button type="submit" class="btn btn-success">Log in</button>
              </div>
            </form>
        </div>
    </div>
</body>
<script src="../../assets/js/bootstrap.min.js"></script>
</html>