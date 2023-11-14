<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
              <td>Address</td>
              <td>Email</td>
              <td>Contact No.</td>
            </tr>
            <?php 
               $query = "SELECT * FROM contact_us";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                   <td><?php echo $row["id"]; ?></td>
                   <td><?php echo $row["address"]; ?></td>
                   <td><?php echo $row["email"]; ?></td>
                   <td><?php echo $row["contact"]; ?></td>
                                            </tr>

              <?php
                    }
             ?>
          </table>
