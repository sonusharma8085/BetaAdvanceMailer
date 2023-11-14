<?php include('include/header.php'); 
    include('include/sidebar.php');
    include('connection.php');
  ?>

  <!-- Main Sidebar Container -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <br>
      <div class="row ">
    
    <!-- Main content -->

      <div class="container-fluid">


        <div class="row col-sm-12">

          <div class="container-fluid">
            <div class="row">
          <div class="col-md-6">
            <h3>Unlimited Email Plan.</h3>
          </div>
          <div class="col-md-6 text-right">
            <a href="user_data27_download.php" class="btn btn-primary" target="_blank">Data Export</a>
            <a class="" href="email_unlimited_add.php" data-placement="top" title="Add" ><i class="material-icons ">add</i></a>
          </div>
        </div>
      </div>
          </div>

          <div style="overflow-y: scroll;">
            <table style='width: 100%;'  class="table table-striped text-center table-bordered">

            
            <tr>
              <td>SNo.</td>
              <td>Tittle</td>
              <td>Unlimited P1</td>
              <td>Speed/hour</td>
              <td>Subscribers</td>
              <td>Subscription</td>
              <td>Dedicated IP Addresses</td>
              <td>Set-Up Delivery Time</td>
              <td>DKIM Setup</td>
              <td>SPF Setup</td>
              <td>DMARC</td>
              <td>FeedBack Loop</td>
              <td>rDNS</td>
              <td>Mail-Tester Report</td>
              <td>Fresh IP</td>
              <td>Unlimited Sending Domains</td>
              <td>Customized Email Template</td>
              <td>Customer Support</td>
              <td>Action</td>
            </tr>
            <?php $i=1;
               $query = "SELECT * FROM emailunlimitedplan";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $i; ?></td>
                                              
                                              <td><?php echo $row["tittle"]; ?></td>
                                              <td><?php echo $row["unlimitedp1"]; ?></td>
                                              <td><?php echo $row["speed_hour"]; ?></td>
                                              <td><?php echo $row["subscribers"]; ?></td>
                                              <td><?php echo $row["subscription"]; ?></td>
                                              <td><?php echo $row["dedicated_ip_addresses"]; ?></td>
                                              <td><?php echo $row["delivery_time"]; ?></td>
                                              <td><?php echo $row["dkim_setup"]; ?></td>
                                              <td><?php echo $row["spf_setup"]; ?></td>
                                              <td><?php echo $row["dmrc"]; ?></td>
                                              <td><?php echo $row["feedBack_loop"]; ?></td>
                                              <td><?php echo $row["rdns"]; ?></td>
                                              <td><?php echo $row["mail_tester_report"]; ?></td>
                                              <td><?php echo $row["fresh_ip"]; ?></td>
                                              <td><?php echo $row["unlimited_sending_domains"]; ?></td>
                                              <td><?php echo $row["customized_email_template"]; ?></td>
                                              <td><?php echo $row["customer_support"]; ?></td>

                                              <td><a data-toggle="tooltip" data-placement="top" title="update" href="emailunltdplan_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                                                  <a data-toggle="tooltip" data-placement="top" title="delete" href="emailunldtplan_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
                                            </tr>

                                         <?php
                                              $i++;
                                           }
                                         ?>
          </table>
        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
<!-- Button trigger modal -->

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