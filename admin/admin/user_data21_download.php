<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
              <td>Name</td>
              <td>Email</td>
              <td>Address</td>
              <td>State</td>
              <td>City</td>
              <td>Zipcode</td>
              <td>Country</td>
              <td>Mobile</td>
              <td>Ip</td>
              <td>Plan</td>
            </tr>
            <?php 
               $query = "SELECT * FROM smtp";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $row["id"]; ?></td>
                                              <td><?php echo $row["name"]; ?></td>
                                              <td><?php echo $row["email"]; ?></td>
                                              <td><?php echo $row["address"]; ?></td>
                                              <td><?php echo $row["state"]; ?></td>
                                              <td><?php echo $row["city"]; ?></td>
                                              <td><?php echo $row["zipcode"]; ?></td>
                                              <td><?php echo $row["country"]; ?></td>
                                              <td><?php echo $row["mobile"]; ?></td>
                                              <td><?php echo $row["ip"]; ?></td>
                                              <td><?php echo $row['plan']; ?></td>
                                            </tr>

                                         <?php
                                           }
                                         ?>
          </table>
