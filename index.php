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
        
      </style>
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">Xero</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav align-items-center">
            <a class="nav-item nav-link" href="journal.php">Journal</a>
            <a class="nav-item nav-link" href="pricing.php">Pricing</a>
            

            <?php session_start(); ?>
            <?php if (isset($_SESSION['user_id'])) { ?>
              <div class="nav-item dropdown show">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['name']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </div>
            <?php } ?>
            <?php if (!isset($_SESSION['user_id'])) { ?>
            <a class="nav-item nav-link" href="signin.php">Sign in</a>
            <a class="nav-item nav-link btn btn-secondary" href="signup.php">Sign up
            </a>
            <?php } ?>

          </div>
        </div>
    </nav>
    <div class="container landing d-flex flex-column justify-content-center">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="text-center mb-4 display-5"><b>Trade. Journal. Improve.</b></h1>
            <p class="lead text-center">Monitor your trades and improve your strategy</p>
          </div>
          <div class="col-lg-3"></div>
          
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 text-center">
            <?php if (!isset($_SESSION['user_id'])) { ?>
                <a href="signup.php" class="btn btn-outline-secondary btn-lg">Sign up</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container-fluid features">
        <div class="row p-5 align-items-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-3 text-center mt-20">
              <h3 >User Friendly Interface</h3>
              <p>Simple and easy to use interface allows users to enter and monitor trades with ease.</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
              <img class="img-fluid w-75" src="images/1.png" alt="Image description">
            </div>
        </div>
        <div class="row p-5 align-items-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-3 text-center mt-20">
              <h3 >Strategy Analytics</h3>
              <p>Our products offers you a variant of visual and graphic tools to get better understanding of your trade results.</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
              <img class="img-fluid w-75" src="images/home1.png" alt="Image description">
            </div>
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