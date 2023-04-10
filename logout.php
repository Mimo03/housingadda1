<?php
  include("./partials/conditions.php");
  if(isset($_GET["logout"])){
    if($_GET["logout"] == "true"){
      $_SESSION["cust_id"] = "";
      $_SESSION["username"] = "";
      $_SESSION["role"] = "";
      $_SESSION["status"] = "";
      session_destroy();
      header("Location: /index.php");
    }
  }
?>