<?php
    include('header2.php');
    include('db_editform.php');
$username=@$_GET['username'];
?>

 <div class="container">
     <link rel="stylesheet" type="text/css" href="animated.css">
<h2 class="text-center" style="color:skyblue;"> Register View </h2>

   <!--       <?php if(@$_GET['update']) {?>
          <div class="alert alert-success alert-dismissible">
            <a href="crud.php" class="close">&times;</a>
            <strong>Success!</strong> Update Successfull!
          </div>
          <?php }?>

           <?php if(@$_GET['set']) {?>
          <div class="alert alert-success alert-dismissible">
            <a href="crud.php" class="close">&times;</a>
            <strong>Success!</strong> Delete Successfully!
          </div>
          <?php }?>
 -->
    <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
    <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
            <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                </div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
            </div>
        </div>
    </div>
    <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
    <div class="formbg-outer">
    <div class="formbg">
    <div class="formbg-inner padding-horizontal--48">
        <span class="padding-bottom--15">Ingresa</span>
<!-- for Database data view -->

      <table class="table table-condensed">
        <thead>
          <tr>
            <th>id</th>
            
            
              <th>username</th>
            
          </tr>
        </thead>
        <tbody>

          <?php
          $username=@$_GET['username'];
          //$id=@$_GET['id'];
          $query="Select * from users where username='".$username."'";
              $sno = 1;
              $sql = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($sql))
              {

          ?>
          <tr>
            <td><?php echo $sno;?></td>
           
              <td><?php echo $row['username'];?></td>
            
            <td><a href="update_page.php?id=<?php echo $row['id'];?>"><button type="button" name="edit" class="btn btn-info">Edit</button></a></td>
            
          </tr>
          <?php 
              
              $sno = $sno+1;
            }
          ?>
        </tbody>
      </table>
    </div>


<!-- To Insert Data -->
<?php


  if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
     $email=$_POST['email'];
    $sex=$_POST['sex'];
    $active=$_POST['active'];
      $image=$_POST['image'];
      $username=$_POST['usernname'];
    

  	$query = "INSERT INTO users(name,email,sex,active,image,username)VALUES('".$name."','".$email."','".$sex."','".$active."','".$image."','".$username."')";


  	mysqli_query($conn,$query);

  	header('location:index.php?save=true');

  }

// TO update data



  if(isset($_POST['update']))
  {
      
        $id=$_POST['id'];
     $name=$_POST['name'];
   
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $active=$_POST['active'];
      $image=$_POST['image'];
      $username=$_POST['username'];

  echo  $query="UPDATE users SET name='".$name."',email='".$email."',sex='".$sex."',active='".$active."',image='".$image."',username='".$username."' WHERE id='".$id."'"; //exit;

    mysqli_query($conn,$query);
    //var_dump($query);
    header('location:registration_entry.php?update=true');
     // exit;
  }

// To delete the data

     if(!empty($_GET['id'])){
          $query="DELETE FROM users WHERE id= '".$_GET['id']."'"; //exit;
          $result = mysqli_query($conn,$query);
          header("Location: registration_entry.php?set=true"); 
     }

?>