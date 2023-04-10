<?php
session_start();
include("connect.php");

if (isset($_SESSION["username"])) {
    $username = htmlspecialchars($_SESSION["username"]);
    global $username;
    $query = "select * from cust_info where username='$username'";

    $res = mysqli_query($conn, $query)->fetch_assoc();
    $name = htmlspecialchars($res["name"]);
}

function getter($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function get_max_district($jsonstring)
{
    $r = json_decode($jsonstring)[0]; // parse your json string

    $items = []; // define empty array

    // Loop through the parsed JSON, counting occurrences
    foreach ($r->PostOffice as $dep) {
        if (array_key_exists($dep->District, $items)) {
            $items[$dep->District] += 1;
        } else {
            $items[$dep->District] = 1;
        }
    }

    // Now reverse sort the array
    arsort($items);

    // Max item is now the first one:
    $max = array_keys($items)[0]; // AMS
    return $max;
}

function upload_image($post_id)
{
    global $conn, $username;
    // echo $username;

    $total = (count($_FILES['images']['name']) > 10 ? 10 : count($_FILES['images']['name']));

    for ($i = 0; $i < $total; $i++) {
        $uploadTo = "images/uploads/";
        $allowImageExt = array('jpg', 'png', 'jpeg', 'gif', 'JPG');
        $imageName = $_FILES['images']['name'][$i];
        $tempPath = $_FILES["images"]["tmp_name"][$i];


        $imageQuality = 60;
        $basename = basename($imageName);
        $originalPath = $uploadTo . $basename;
        $imageExt = strtolower(pathinfo($originalPath, PATHINFO_EXTENSION));
        //echo "<script>console.log('aya andar')</script>";


        if (in_array($imageExt, $allowImageExt)) {
            $compressedImage = compress_image($tempPath, $originalPath, $imageQuality);
            if ($compressedImage) {
                // return $compressedImage;
                $insert_img = "insert into images (post_id, username, path) values ($post_id, '$username', '$compressedImage')";
                //echo $insert_img;
                mysqli_query($conn, $insert_img) or die(mysqli_error($conn));
                //var_dump(mysqli_error($conn));
                // return true;
            } else {
                echo "<script>console.log('Some error !')</script>";
                mysqli_query($conn, "delete from post where post_id=" . $post_id);
                return "Some error !.. check your script";
            }
        } else {
            mysqli_query($conn, "delete from post where post_id=" . $post_id);
            echo "<script>console.log('Image Type not allowed')</script>";
            return "Image Type not allowed";
        }
    }
}

function compress_image($tempPath, $originalPath, $quality)
{   
    // Get image info 
   $imgInfo = getimagesize($tempPath);
    $mime = $imgInfo['mime'];
    $exif = exif_read_data($tempPath);
   
    if (!empty($exif['Orientation'])) {
        $f = $exif['Orientation'];
        // var_dump($f);


    }


    // Create a new image from file 
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($tempPath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($tempPath);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($tempPath);
            break;
        default:
            $image = imagecreatefromjpeg($tempPath);
    }

 if ($f > 1) {
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;

            case 6:
                $image = imagerotate($image, 270, 0);
                break;

            case 8:
                $image = imagerotate($image, 90, 0);
                break;
            default:
                $image = imagerotate($image, 0, 0);
        }
      
    }
    // Save image
 
    imagejpeg($image, $originalPath, $quality);
    
        
        // Return compressed image 
    return $originalPath;
}
