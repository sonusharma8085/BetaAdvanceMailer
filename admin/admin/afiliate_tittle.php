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

      $tittle      =  $_POST['tittle'];
      $sub_tittle  =  $_POST['sub_tittle'];
      // $massage     =  $_POST['massage'];
      // $photo = $_FILES['image'];

      // $file        =  $photo['name'];
      // $filepath    =  $photo['tmp_name'];
      // $filerror   =  $photo['error'];
      

      // $destfile   = 'upload/'.$file;

      // move_uploaded_file($filepath, $destfile);


    $sql = "INSERT INTO `affiliate_tittle`(`tittle`,`sub_tittle`) VALUES ('$tittle','$sub_tittle')";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
   // header('location:.php');
    echo '<script type="text/javascript">alert("Succesfully Data Inserted")
        </script>';
         echo "<script>location.href='affiliatemarketing.php'</script>";
    }else{

        //header('location:.php');
    echo '<script type="text/javascript">alert("Data not Inserted")
        </script>';
        echo "<script>location.href='affiliate_tittle.php'</script>";
   }

    }

  ?>
 <div class="content-wrapper">
     <section class="content">
      <div class="container-fluid">
           <br>
         <div class="row">

          <div class="col-md-12">
            <h1>SEO Tittle</h1>
          </div>
         <!--  <div class="col-md-6">
            <a href="swdevelatest.php" class="text-right" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
          </div> -->
        </div>
      </div>
                    <br>
          <div class="row col-sm-6">
          <div class="container">

            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                  <label>Tittle :-</label>
                  <input class="form-control" type="text" name="tittle" required="" placeholder="plz enter Tittle"></input>
                </div>
                <div class="col-sm-6">
                  <label >Sub Tittle :-</label>
                  <input class="form-control"  type="text" name="sub_tittle" required="" placeholder="plz enter Sub Tittle"></input>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-sm-6">
                  <label>Massage :-</label>
                  <textarea type="text" name="massage" required="" placeholder="plz enter Massage" rows="4" cols="25"></textarea>
                </div> 
                <div class="col-sm-6">
                  <label>Choose Images :-</label>
                  <input type="file" name="image"></input>
                </div>
              </div> -->
              <br>
              <button type="submit1" name="submit1" class="btn btn-primary ">Submit</button>
            </form>

          </div>
        </div>
         </div><!-- /.container-fluid -->

    </section>
  </div>


         <?php include('include/footer.php'); ?>