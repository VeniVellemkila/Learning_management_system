<?php
// config.php file is included to create database connection.
$con = mysqli_connect("localhost","root","","uniquedeveloper");
if (!$con) {
  die("Error : Connection Failed".mysqli_error($con));
}
// if statement to determine if the form has been submitted using the form name.
session_start();
if(isset($_POST['submit']))
{
  // assigning values form the form to the variables.
  $mail=$_POST['email'];
  $pass=$_POST['password'];
  // Query to choose the information from the table to confirm the login information.
  $sql ="select * from login where email='$mail' and password='$pass'";
  $query=mysqli_query($con,$sql);
  // verifying the validity of the entered information.
  if(mysqli_num_rows($query)>0)
  // if the details are valid then
  {
    // displaying a successful login notification as a reminder.
    echo "<script>alert('login successful')</script>";
    // Redirecting to the dashboard page.
    echo "<script>window.open('index.php','_self')</script>";
    $_SESSION['email']=$mail;
    $_SESSION['password']=$pass;
    
  }
  // if the details are invlaid
  else
  {
    // Alerting an Error Message
    echo "<script>alert('Invalid Login details')</script>";
    // Refreshing the login page to re-enter login details.
    echo "<script>window.open('login.php','_self')</script>";
  }

}
if(isset($_POST['login']))
{
  // assigning values form the form to the variables.
  $mail=$_POST['email'];
  $pass=$_POST['password'];
  // Query to choose the information from the table to confirm the login information.
  $sql ="select * from login where email='$mail' and password='$pass'";
  $query=mysqli_query($con,$sql);
  // verifying the validity of the entered information.
  if(mysqli_num_rows($query)>0)
  // if the details are valid then
  {
    // displaying a successful login notification as a reminder.
    echo "<script>alert('login successful')</script>";
    // Redirecting to the dashboard page.
    echo "<script>window.open('admin/admin-main.php','_self')</script>";
    $_SESSION['email']=$mail;
    $_SESSION['password']=$pass;
  }
  // if the details are invlaid
  else
  {
    // Alerting an Error Message
    echo "<script>alert('Invalid Login details')</script>";
    // Refreshing the login page to re-enter login details.
    echo "<script>window.open('login.php','_self')</script>";
  }

} // Admin login validation

?>
