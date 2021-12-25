<?php
include('db_editform.php');
include("db.php");
if(isset($_POST['update']))
{
    $maxsize = 115242880; // 5MB


    

    // Select file type
   

    // Valid file extensions
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    //$image = $_FILES['image']['name'];

    $target_dir = "user/";
    $image = $target_dir . $_FILES["image"]["name"];
    //$image=$_POST['image'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $active=$_POST['active'];
    $extensions_arr = array("jpg", "jpeg", "JPG", "png", "gif", "jpg", "MOV");
//if (isset($_POST['btn btn-primary'])) {
    $maxsize = 115242880; // 5MB


    // Select file type
    $videoFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    // Valid file extensions


    // Check extension
    if (in_array($videoFileType, $extensions_arr)) {

        // Check file size
        if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
        } else {
            // Upload
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
                // Insert record
               // $query = "INSERT INTO users(name,email,sex,active,image) VALUES('" . $name . "','" . $email . "','" . $sex . "','" . $active . "','" . $image . "')";
                $query="UPDATE users SET name='".$name."',email='".$email."',sex='".$sex."',active='".$active."',image='".$image."' WHERE id='".$id."'"; //exit;

                mysqli_query($conn,$query);
                //var_dump($query);
                header('location:registration_entry.php?update=true');
                // exit;
           
            }
        }

    } else {
    include('db_editform.php');

    if(isset($_POST['update']))
    {

        $id=$_POST['id'];
        $name=$_POST['name'];
       // $image=$_POST['image'];
        echo "<img src='".$image."'  width='320px' height='200px' >";
        $email=$_POST['email'];
        $sex=$_POST['sex'];
        $active=$_POST['active'];
        $username=$_POST['username'];
       
        //$s_address=$_POST['s_address'];
        //$s_address1=$_POST['s_address1'];
        //$city=$_POST['city'];
        //$state=$_POST['state'];
        //$country=$_POST['country'];
        //$postal_code=$_POST['postal_code'];
        //$DOB=$_POST['DOB'];
        //$course=$_POST['course'];
        //$branch=$_POST['branch'];
        //$university=$_POST['university'];
        //$comment=$_POST['comment'];
        //$date=date('Y/m/d H:i:s');

    }
    }
}



?>