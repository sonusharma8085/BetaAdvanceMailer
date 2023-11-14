<?php include('include/header.php'); 
    include('include/sidebar.php');
    include('connection.php');
    // include('user_auth.php');
  ?>

<?php 

//   $query = mysqli_query($conn,"SELECT * FROM emailunlimitedplan");
//   $sql   = mysqli_query($conn,"SELECT * FROM emailunlimitedplan WHERE id ='".$_GET['id']."'");
//   $row   = mysqli_fetch_array($sql);

    
    if (isset($_POST['submit1'])) {
      //$id = $_GET['id'];
      //print_r($_FILES);die();

      $tittle                    =  $_POST['tittle'];
      $unlimitedp1               =  $_POST['unlimitedp1'];
      $speed_hour                =  $_POST['speed_hour'];
      $subscribers               =  $_POST['subscribers'];
      $subscription              =  $_POST['subscription'];
      $dedicated_ip_addresses    =  $_POST['dedicated_ip_addresses'];
      $delivery_time             =  $_POST['delivery_time'];
      $dkim_setup                =  $_POST['dkim_setup'];
      $spf_setup                 =  $_POST['spf_setup'];
      $dmrc                      =  $_POST['dmrc'];
      $feedBack_loop             =  $_POST['feedBack_loop'];
      $rdns                      =  $_POST['rdns'];
      $mail_tester_report        =  $_POST['mail_tester_report'];
      $fresh_ip                  =  $_POST['fresh_ip'];
      $unlimited_sending_domains =  $_POST['unlimited_sending_domains'];
      $customized_email_template =  $_POST['customized_email_template'];
      $customer_support          =  $_POST['customer_support'];
      
      $sql="INSERT INTO `emailunlimitedplan`( `tittle`, `unlimitedp1`, `speed_hour`, `subscribers`, `subscription`, `dedicated_ip_addresses`, `delivery_time`, `dkim_setup`, `spf_setup`, `dmrc`, `feedBack_loop`, `rdns`, `mail_tester_report`, `fresh_ip`, `unlimited_sending_domains`, `customized_email_template`, `customer_support`) VALUES ('$tittle','$unlimitedp1','$speed_hour','$subscribers','$subscription','$dedicated_ip_addresses','$delivery_time','$dkim_setup','$spf_setup','$dmrc','$feedBack_loop','$rdns','$mail_tester_report','$fresh_ip','$unlimited_sending_domains','$customized_email_template','$customer_support')";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
    //header('location:emailserversetup.php');
        echo '<script type="text/javascript">alert("Succesfully Data Inserted")</script>';
        echo "<script>location.href='email_unlimited.php'</script>";

    }else{

        header('location:emailserverimgsetup.php');
        echo '<script type="text/javascript">alert("Data not Inserted")</script>';
        echo "<script>location.href='emailunltdplan_add.php'</script>";

   }

    }

  ?>
 <div class="content-wrapper">
     <section class="content">
      <div class="container-fluid">
           <br>
         <div class="row">

          <div class="col-md-12">
            <h1>Email Unlimited Plan Add</h1>
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
                  <input class="form-control" type="text" name="tittle" required="" placeholder="Enter Tittle" ></input>
                </div>
                <div class="col-sm-6">
                  <label >Unlimited P1 :-</label>
                  <input class="form-control"  type="text" name="unlimitedp1" required="" placeholder="Enter Sub Unlimited"></input>
                </div> 
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>Speed/hour :-</label>
                  <input class="form-control" type="text" name="speed_hour" required="" placeholder="Enter Speed/Hour"></input>
                </div> 
                <div class="col-sm-6">
                  <label>Subscribers :-</label>
                  <input class="form-control" type="text" name="subscribers" required="" placeholder="Enter Subscribers"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>Subscription :-</label>
                  <input class="form-control" type="text" name="subscription" required="" placeholder="Enter Subscription"></input>
                </div> 
                <div class="col-sm-6">
                  <label>Dedicated IP Addresses :-</label>
                  <input class="form-control" type="text" name="dedicated_ip_addresses" required="" placeholder="Enter Dedicated ip addresses"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>Set-Up Delivery Time :-</label>
                  <input class="form-control" type="text" name="delivery_time" required="" placeholder="Enter Delivery time"></input>
                </div> 
                <div class="col-sm-6">
                  <label>DKIM Setup :-</label>
                  <input class="form-control" type="text" name="dkim_setup" required="" placeholder="Enter dkim setup"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>SPF Setup :-</label>
                  <input class="form-control" type="text" name="spf_setup" required="" placeholder="plz enter spf setup"></input>
                </div> 
                <div class="col-sm-6">
                  <label>DMARC :-</label>
                  <input class="form-control" type="text" name="dmrc" required="" placeholder="Enter DMARC"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>FeedBack Loop :-</label>
                  <input class="form-control" type="text" name="feedBack_loop" required="" placeholder="Enter FeedBack Loop"></input>
                </div> 
                <div class="col-sm-6">
                  <label>rDNS :-</label>
                  <input class="form-control" type="text" name="rdns" required="" placeholder="Enter RDNS"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Mail-Tester Report :-</label>
                  <input class="form-control" type="text" name="mail_tester_report" required="" placeholder="Enter Mail-Tester Report"></input>
                </div> 
                <div class="col-sm-6">
                  <label>Fresh IP :-</label>
                  <input class="form-control" type="text" name="fresh_ip" required="" placeholder="Enter Fresh IP"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Unlimited Sending Domains :-</label>
                  <input class="form-control" type="text" name="unlimited_sending_domains" required="" placeholder="Enter Unlimited Sending Domains" ></input>
                </div> 
                <div class="col-sm-6">
                  <label>Customized Email Template :-</label>
                  <input class="form-control" type="text" name="customized_email_template" required="" placeholder="Enter Customized Email Template"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Customer Support :-</label>
                  <input class="form-control" type="text" name="customer_support" required="" placeholder="Enter Customer Support" ></input>
                </div> 
                <!-- <div class="col-sm-6">
                  <label>Customized Email Template :-</label>
                  <input class="form-control" type="text" name="customized_email_template" required="" placeholder="Enter Customized Email Template"></input>
                </div> -->
              </div>
              <br>
              <button type="submit1" name="submit1" class="btn btn-primary ">Submit</button>
            </form>
<br><br>
          </div>
        </div>
         </div><!-- /.container-fluid -->

    </section>

  </div>



         <?php include('include/footer.php'); ?>