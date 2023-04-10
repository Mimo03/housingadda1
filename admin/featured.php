<?php
 include("../partials/conditions.php");
 include("../partials/connect.php");


 if(isset($_POST['updateId'])){
    $updateId = $_POST['updateId'];

    $get_status="select * from post where post_id=$updateId";

    $res = mysqli_query($conn,$get_status);
    
    if(mysqli_num_rows($res) > 0 ){
        while($r= $res->fetch_assoc()){
            if($r['featured'] == 1){
                $u_status="update post set featured=0 where post_id=$updateId";
                $u_res = mysqli_query($conn,$u_status);
                echo 'no';
            }
            elseif($r['status'] == 0){
                $u_status="update post set featured=1 where post_id=$updateId";
                $u_res = mysqli_query($conn,$u_status);
                echo 'yes';
            }
            else{
                echo "something went wrong";
            }

        }
    }else{
        echo 'No Customers to Display';
    }



 }
?>