<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
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

                                            </tr>

                                         <?php
                                              $i++;
                                           }
                                         ?>
          </table>