<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Xero</title>
    <style>
      body {
        font-family: 'Inter';

      }
      .sign-up {
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        width: 670px;
        height: 617px;
        
        background: #FFFFFF;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;

      }

  

      .create {
        font-style: normal;
        font-weight: 700;
        font-size: 36px;
        line-height: 44px;
      }

      .get-started {
        font-size: 16px;
      }

      .underline {
        color: #000000;
      }

      .form-control {
        width: 440px;
        border-radius: 0;
        background-color: #f7f7f7;
        border: none;
      }

      label {
        font-weight: bold;
      }

      .btn-dark {
        background-color: #000000;
        width: 440px;
        font-weight: bold;
      }
      .btn-light {
        background-color: #F7F7F7;
        width: 440px;
        font-weight: bold;

      }
    </style>
</head>
<body>
<div class="container-fluid d-flex justify-content-center align-items-center">
  <div class="container sign-up">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="p-5">
          <h1 class="mb-4 create">Welcome to Xero</h1>
          <div class="d-flex mb-5">
            <p class="get-started">Don't have an account?&nbsp;</p>
            <a href="signup.php" class="underline">Create an account</a>
            </div>
            <?php
              require_once "models/UserDB.php";

              if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
                  $result = UserDB::login($email, $password);
                  if ($result) {
                    
                    header("Location: index.php");
                    exit();
                  } else {
                    $error = "Invalid email or password";
                  }
                } else {
                  $error = "Please enter a valid email and password";
                }
              }
              ?>

          <?php if (isset($error)) { ?>
            <div><p><?php echo $error; ?></p></div>
          <?php } ?>
          <form method="post">
            <div class="form-group mb-4">
              <label for="email" class="mb-2">Email address</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group mb-2">
              <label for="password" class="mb-2">Password</label>
              <input type="password" class="form-control mb-4" id="password" name="password">
            </div>
            <div class="form-group mb-4 text-center">
                <a href="#" class="underline">Forgot password</a>
            </div>
            <button type="submit" class="btn btn-dark btn-block text-center mb-4" name="submit">Sign in</button>
            <button type="submit" class="btn btn-light btn-block text-center"><img width="20px" style="margin-right:8px" alt="Google sign-in" 
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />Sign in with google</button>
            <a class="oauth-container btn darken-4 white black-text" href="/users/google-oauth/" style="text-transform:none">
        
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>