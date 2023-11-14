<?php include('include/header.php'); 
    include('include/sidebar.php');

  error_reporting(0);
   session_start();

  if (!isset($_SESSION['userid'])){
     echo "<script>location.href='login.php'</script>";
    //('location:login.php');
  }
  ?>


  <!-- Main Sidebar Container -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Latest Articles Image</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="latest-articles-img-add.php"><i class="material-icons">add</i></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          
          <table class="table table-striped text-center table-bordered">
            
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Title</th>
              <th>Subtittle</th>
              <th>Action</th>
            </tr>
            
            
                <?php 
                    $sql =  "SELECT * FROM `latest_arti_img`";
                    $sqlikey = mysqli_query($conn,$sql);
                    $i=1;
                    while($result= mysqli_fetch_assoc($sqlikey)){
                        $cat_id = $result['id'];
                    ?>
                    
                    <tr class="text-center">
                        <td><?php echo $i ?></td>
                        <td> <img src="<?php echo $result['image'] ?>" height="50" width="50" ></td>
                        <td><?php echo $result['title'] ?></td>
                        <td><?php echo $result['subtitle'] ?></td>
                        
                        <td><a href="latest-art-img-update.php?id=<?php echo $result["id"]; ?>"><i class='far fa-edit' ></i></a>       
                            <a href="latest-art-img-delete.php?id=<?php echo $result["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
                </tr>
                    <?php 
                        $i++;
                    } ?>
                 
                
                                  

                                        
          </table>

        </div>
       
</div>
<!-- /.container-fluid -->

<br><br>


         

        </div>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
  </div>
    <!-- /.content -->

  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>