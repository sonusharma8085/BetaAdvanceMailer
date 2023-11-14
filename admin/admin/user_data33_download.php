<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
  <table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
              <td>Fullname</td>
              <td>Email</td>
              <td>Mobile Nnumber</td>
              <td>Mailer</td>
              <td>Price</td>
        
            </tr>
            <?php 
               $query = "SELECT * FROM mailer";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $row["id"]; ?></td>
                                              <td><?php echo $row["name"]; ?></td>
                                              <td><?php echo $row["email"]; ?></td>
                                              <td><?php echo $row["mobile"]; ?></td>
                                              
                                              <td><?php echo $row["mailer"]; ?></td>
                                                <td><?php echo $row["planprice"]; ?></td>
                                        
                                            </tr>

                                         <?php
                                           }
                                         ?>
          </table>
