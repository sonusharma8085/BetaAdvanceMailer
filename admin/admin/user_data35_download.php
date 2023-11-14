<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
 <table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
              <td>First Name</td>
              <td>Last Name</td>
              <td>Email</td>
              <td>Contact</td>
              <td>State</td>
              <td>City</td>
              <td>Description</td>
              <td>Date</td>
      
              
             
            </tr>
            <?php 
               $query = "SELECT * FROM maller_contact";
               $sql   = mysqli_query($conmailer,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $row["id"]; ?></td>
                                              <td><?php echo $row["first_name"]; ?></td>
                                              <td><?php echo $row["last_name"]; ?></td>
                                              <td><?php echo $row["email"]; ?></td>
                                              <td><?php echo $row["mobileno"]; ?></td>
                                              <td><?php echo $row["city"]; ?></td>
                                              <td><?php echo $row["state"]; ?></td>
                                              <td><?php echo $row["description"]; ?></td>
                                              <td><?php echo $row['current_date']; ?></td>
      
                                            </tr>

                                         <?php
                                           }
                                         ?>
          </table>
