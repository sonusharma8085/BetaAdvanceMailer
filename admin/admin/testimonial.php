<?php include('include/header.php'); 
    include('include/sidebar.php');
    include('connection.php');
  ?>
<?php 
  error_reporting(0);
   session_start();

  if (!isset($_SESSION['userid'])){
     echo "<script>location.href='login.php'</script>";
    //('location:login.php');
  }
  ?>
<?php 
    
    if (isset($_POST['submit1'])) {
      //print_r($_FILES);die();

      $fullname      =  $_POST['fullname'];
     // $fullname  =  $_POST['fullname'];
      $massage     =  $_POST['massage'];
      $photo = $_FILES['image'];

      $file        =  $photo['name'];
      $filepath    =  $photo['tmp_name'];
      $filerror   =  $photo['error'];
      

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);


    $sql = "INSERT INTO `testmonial`(`fullname`,`massage`,`image`) VALUES ('$fullname','$massage','$destfile')";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
    //header('location:afiliateimg.php');
    echo '<script type="text/javascript">alert("Succesfully Data Inserted")
        </script>';
    echo "<script>location.href='index.php'</script>";
    }else{

        header('location:testmonial.php');
    echo '<script type="text/javascript">alert("Data not Inserted")
        </script>';
   }

    }

  ?>
 <div class="content-wrapper">
     <section class="content">
      <div class="container-fluid">
           <br>
         <div class="row">

          <div class="col-md-12">
            <h1>Testimonial </h1>
          </div>
           <div class="col-md-6">
            <a href="swdevelatest.php" class="text-right" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
          </div> 
        </div>
      </div>
                    <br>
          <div class="row col-sm-6">
          <div class="container">

            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                  <label>Tittle :-</label>
                  <input class="form-control" type="text" name="fullname" required="" placeholder="plz enter Tittle"></input>
                </div>
               <!--  <div class="col-sm-6">
                  <label >FullName :-</label>
                  <input class="form-control"  type="text" name="fullName" required="" placeholder="plz enter FullName"></input>
                </div>  -->
              </div>
              <div class="row">
               <div class="col-sm-6">
                  <label class="form-label"> Message :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="text" name="massage"placeholder="plz enter Message"></input>
                </div>
                <div class="col-sm-6">
                  <label>Choose Images :-</label>
                  <input type="file" name="image"></input>
                </div>
              </div>
              <br>
              <button type="submit1" name="submit1" class="btn btn-primary ">Submit</button>
            </form>

          </div>
        </div>
         </div><!-- /.container-fluid -->

    </section>
  </div>


         <?php include('include/footer.php'); ?>