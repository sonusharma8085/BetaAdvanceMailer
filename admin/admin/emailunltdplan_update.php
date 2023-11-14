<?php include('include/header.php'); 
    include('include/sidebar.php');
    include('connection.php');
    // include('user_auth.php');
  ?>

<?php 

   $query = mysqli_query($conn,"SELECT * FROM emailunlimitedplan");
  $sql   = mysqli_query($conn,"SELECT * FROM emailunlimitedplan WHERE id ='".$_GET['id']."'");
  $row   = mysqli_fetch_array($sql);

    
    if (isset($_POST['submit1'])) {
      $id = $_GET['id'];
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

      $sql = "update emailunlimitedplan set id = $id, tittle='$tittle', unlimitedp1='$unlimitedp1', speed_hour='$speed_hour', subscribers='$subscribers', subscription='$subscription', dedicated_ip_addresses='$dedicated_ip_addresses', delivery_time='$delivery_time', dkim_setup='$dkim_setup', spf_setup='$spf_setup', dmrc='$dmrc', feedBack_loop='$feedBack_loop', rdns='$rdns', mail_tester_report='$mail_tester_report', fresh_ip='$fresh_ip', unlimited_sending_domains='$unlimited_sending_domains', customized_email_template='$customized_email_template', customer_support='$customer_support' WHERE id =$id";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
    //header('location:emailserversetup.php');
       echo '<script type="text/javascript">alert("Succesfully Data Update")</script>';
       echo "<script>location.href='email_unlimited.php'</script>";

    }else{

        header('location:emailserverimgsetup.php');
        echo '<script type="text/javascript">alert("Data not Inserted")</script>';
        echo "<script>location.href='emailunltdplan_update.php'</script>";

   }

    }

  ?>
 <div class="content-wrapper">
     <section class="content">
      <div class="container-fluid">
           <br>
         <div class="row">

          <div class="col-md-12">
            <h1>Email Unlimited Plan Update</h1>
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
                  <input class="form-control" type="text" name="tittle" required="" placeholder="plz enter Tittle" value="<?php echo $row["tittle"]; ?>"></input>
                </div>
                <div class="col-sm-6">
                  <label >Unlimited P1 :-</label>
                  <input class="form-control"  type="text" name="unlimitedp1" required="" placeholder="plz enter Sub Unlimited" value="<?php echo $row["unlimitedp1"]; ?>"></input>
                </div> 
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>Speed/hour :-</label>
                  <input class="form-control" type="text" name="speed_hour" required="" placeholder="plz enter Speed/Hour" value="<?php echo $row["speed_hour"]; ?>"></input>
                </div> 
                <div class="col-sm-6">
                  <label>Subscribers :-</label>
                  <input class="form-control" type="text" name="subscribers" required="" placeholder="Enter Subscribers" value="<?php echo $row["subscribers"]; ?>"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>Subscription :-</label>
                  <input class="form-control" type="text" name="subscription" required="" placeholder="plz enter Subscription" value="<?php echo $row["subscription"]; ?>"></input>
                </div> 
                <div class="col-sm-6">
                  <label>Dedicated IP Addresses :-</label>
                  <input class="form-control" type="text" name="dedicated_ip_addresses" required="" placeholder="Enter Dedicated ip addresses" value="<?php echo $row["dedicated_ip_addresses"]; ?>"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>Set-Up Delivery Time :-</label>
                  <input class="form-control" type="text" name="delivery_time" required="" placeholder="plz enter Delivery time" value="<?php echo $row["delivery_time"]; ?>"></input>
                </div> 
                <div class="col-sm-6">
                  <label>DKIM Setup :-</label>
                  <input class="form-control" type="text" name="dkim_setup" required="" placeholder="Enter dkim setup" value="<?php echo $row["dkim_setup"]; ?>"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>SPF Setup :-</label>
                  <input class="form-control" type="text" name="spf_setup" required="" placeholder="plz enter spf setup" value="<?php echo $row["spf_setup"]; ?>"></input>
                </div> 
                <div class="col-sm-6">
                  <label>DMARC :-</label>
                  <input class="form-control" type="text" name="dmrc" required="" placeholder="Enter DMARC" value="<?php echo $row["dmrc"]; ?>"></input>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label>FeedBack Loop :-</label>
                  <input class="form-control" type="text" name="feedBack_loop" required="" placeholder="plz enter FeedBack Loop" value="<?php echo $row["feedBack_loop"]; ?>"></input>
                </div> 
                <div class="col-sm-6">
                  <label>rDNS :-</label>
                  <input class="form-control" type="text" name="rdns" required="" placeholder="Enter rDNS" value="<?php echo $row["rdns"]; ?>"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Mail-Tester Report :-</label>
                  <input class="form-control" type="text" name="mail_tester_report" required="" placeholder="plz enter Mail-Tester Report" value="<?php echo $row["mail_tester_report"]; ?>"></input>
                </div> 
                <div class="col-sm-6">
                  <label>Fresh IP :-</label>
                  <input class="form-control" type="text" name="fresh_ip" required="" placeholder="Enter Fresh IP" value="<?php echo $row["fresh_ip"]; ?>"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Unlimited Sending Domains :-</label>
                  <input class="form-control" type="text" name="unlimited_sending_domains" required="" placeholder="plz enter Unlimited Sending Domains" value="<?php echo $row["unlimited_sending_domains"]; ?>"></input>
                </div> 
                <div class="col-sm-6">
                  <label>Customized Email Template :-</label>
                  <input class="form-control" type="text" name="customized_email_template" required="" placeholder="Enter Customized Email Template" value="<?php echo $row["customized_email_template"]; ?>"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Customer Support :-</label>
                  <input class="form-control" type="text" name="customer_support" required="" placeholder="plz enter Customer Support" value="<?php echo $row["customer_support"]; ?>"></input>
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