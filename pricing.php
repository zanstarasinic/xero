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

        .card {
            width: 280px;
            height: 360px;
            border-radius: 20px;
            border: 1px solid #D9D9D9;  
        }

        .price {
            font-weight: 700;
            font-size: 24px;
            line-height: 29px;
            /* identical to box height */


            color: #000000;
        }

        .header {
            margin: 50px 0 0 30px;
        }


        .main {
            margin: 0 0 0 30px;
        }

        .premium .header {
            margin: 10px 0 0 30px;
        }

        .premium .header p {
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;

            color: #707070;
        }

        .premium .plan-name {
            font-weight: 700;
            font-size: 20px;
            line-height: 24px;

            color: #D9D9D9;
;
        }

        .premium .price {
            color: white;
        }

        .premium .main {
            color: #D9D9D9;
        }

        .plan-name {
            font-weight: 700;
            font-size: 20px;
            line-height: 24px;

            color: #707070;
        }

        .c-btn {
            width:220px;
            background-color: #FFFFFF;
            border: 1px solid #707070;
            color: #707070;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.05);
        }

        .c-btn:hover {
            background-color: #202020;
        }

        .landing {            
            height: 90vh;
        }

        .features {
            background-color: #F7F7F7;
        }

        footer {
            height: 10vh;
            background-color: #000000;
        }

        footer a {
            color: #FFFFFF;
        }
        ul {
            padding: 0;
            margin: 0;
        }
        ul li {
            list-style-type: none;
            margin-left: 0;
            }
        ul li:before {
            content: "";
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 10px;
            background-color: #b7b7b7;
            border-radius: 50%;
        }
        ul {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        li {
        margin-bottom: 5px;
        }

        .premium {
            background: #30333D;
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
    <div class="container landing d-flex flex-column justify-content-center col-lg-7">
        <div class="row mb-5">
          <div class="col-lg-8">
            <h1 class="text-center mb-4"><b>Select a plan that works. Like yours.</b></h1>
            <p class="lead text-center">Read all plans or contact us if you need help.</p>
          </div>
          
        </div>
        <div class="row">
  <div class="col-sm-4">
  <div class="col-sm-4">
    <div class="card">
        <div class="header">
            <h3 class="plan-name">Starter</h3>
            <h3 class="price">Free</h3>
        </div>
        <div class="main text-left">
            <p>Default plan to start</p>
            <ul>
                <li>3 Lists</8li>
                <li>100 trades per list</li>
                <li>Excellent user support</li>
                <li>Basic data analytics</li>
            </ul>
        </div>
            <div class="text-center">
                <a href="signup.php" class="btn btn-primary c-btn">Sign up</a>
            </div>
        </div>
    </div>

  </div>
  <div class="col-sm-4">
  <div class="card premium">
    <div class="header">
        <p>Popular choice</p>
        <h3 class="plan-name">Premium</h3>
        <h3 class="price">5€/month</h3>
    </div>
    <div class="main text-left">
        <p>Default plan to start</p>
        <ul>
            <li>5 Lists</li>
            <li>100 trades per list</li>
            <li>AD free usage</li>
            <li>Basic data analytics</li>
        </ul>
    </div>
    <div class="text-center">
        <a href="#" class="btn btn-primary c-btn">Choose plan</a>
    </div>
    </div>
  </div>
  <div class="col-sm-4">
  <div class="card">
    <div class="header">
        <h3 class="plan-name">All in</h3>
        <h3 class="price">25€/month</h3>
    </div>
    <div class="main text-left">
        <p>Default plan to start</p>
        <ul>
            <li>20 Lists</8li>
            <li>Unlimited trades</li>
            <li>Excellent user support</li>
            <li>Advanced data analytics</li>
        </ul>
    </div>
    <div class=" text-center">
        <a href="#" class="btn btn-primary c-btn">Choose plan</a>
    </div>
    </div>
  </div>
</div>
    </div>

    
    <footer class="text-white d-flex flex-column justify-content-center position-relative">
        <div class="container p-4 pb-0 contact-us">
            <p>Contact us at <a href="mailto:">info@xero.com</a></p>
        </div>
      
      </footer>  
    
    <script src="script.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>