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
        nav {
          margin: 10px 30px;
        }
        @media (max-width: 980px) {
          body {
            padding-top: 0;
          }
        }
        .navbar-brand {
            position: fixed;
        }

        .landing {
            
            height: 85vh; /* set the height of the container to the height of the viewport */
        }

        .features {
            background-color: #F7F7F7;
        }

        footer {
            height: 100vh;
            background-color: #000000;
            z-index: -1;
        }

        .contact-us {
            top: 350px;
            z-index: -1;
        }
        .underline {
            color: #000000;
        }
      </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="index.html">Xero</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav align-items-center">
            <a class="nav-item nav-link" href="journal.php">Journal</a>
            <a class="nav-item nav-link" href="pricing.php">Pricing</a>
            <a class="nav-item nav-link" href="signin.php">Sign in</a>
            <a class="nav-item nav-link btn btn-secondary" href="signup.php">Sign up
            </a>

          </div>
        </div>
    </nav>
    <div class="container landing d-flex flex-column justify-content-center">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="text-center mb-4"><b>Thank you!</b></h1>
            <p class="lead text-center">Your registration was successful!</p>
            <p class="lead text-center">Head over to <a href="signin.php" class="underline">Sign in</a> page to start.</p>

          </div>
          <div class="col-lg-3"></div>
          
        </div>
    </div>
    <footer class="text-white d-flex flex-column justify-content-center position-relative">
        <div class="container p-4 pb-0 fixed-top contact-us">
            <h2>Contact us</h2>
            <p>info@xero.com</p>
        </div>
      
      </footer>  
    
    <script src="script.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>