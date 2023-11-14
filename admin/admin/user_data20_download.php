<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
 <table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
              <td>Domain Name</td>
              <td>Percentage Off</td>
            </tr>
            <?php 
               $query = "SELECT * FROM domainplan";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $row["id"]; ?></td>
                                              <td><?php echo $row["domain_name"]; ?></td>
                                              <td><?php echo $row["off_plan"]; ?></td>
                                            </tr>

                                         <?php
                                           }
                                         ?>
          </table>
