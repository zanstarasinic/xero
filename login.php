<?php
require_once "models/UserDB.php";

            if (isset($_POST['submit'])) {
              // Form has been submitted
              $name = $_POST['name'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              echo "2";
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  // Invalid email address
                  // Handle the error here
              }
            
              
              // Save the data to a database
              UserDB::register($name, $email, $password);
              
              if (!$result) {
                  // Error saving the data
                  // Handle the error here
              }
              
              // Redirect the user to a success page
              header("Location: index.html");
              exit();
          }
          ?>
    