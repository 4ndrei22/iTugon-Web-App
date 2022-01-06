<?php
 include 'connect.php';
        if(!empty($_POST)) {
          $user = $_POST['usernameR'];
          $Fname = $_POST['firstname'];
          $Lname = $_POST['lastname'];
          $ContactNum = $_POST['contact_number'];
          $email = $_POST['email'];
          $adminKey = "Staff";
          $password = password_hash($_POST["passwordR"], PASSWORD_DEFAULT);
          $sql = "INSERT INTO accountcreation (adminKey, Firstname, Lastname, Email, Contactnum, Username, Password)
                  VALUES ('$adminKey','$Fname','$Lname','$email','$ContactNum','$user','$password')";
          $sql2 = "INSERT INTO staff_tickets (staff_name,accessLVL) VALUES ('$Fname','$adminKey')"  ;
          
          mysqli_query($con,$sql);
          mysqli_query($con,$sql2);
          
          header('refresh: 1; url = AdminCreation.php');
            
        
        
      }
 
?>