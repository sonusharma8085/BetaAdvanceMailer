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
              <td>Subject</td>
              <td>Message</td>
            
            </tr>
            <?php 
               $query = "SELECT * FROM contact";
               $sql   = mysqli_query($conn,$query);
               $counter = 1;
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $counter; ?></td>
                                              
                                              <td><?php echo $row["firstname"]; ?></td>
                                              
                                              <td><?php echo $row['email']; ?></td>
                                              <td><?php echo $row["subject"]; ?></td>
                                              
                                              <td><?php echo $row['message']; ?></td>
                                              <td>  
                                                  <a data-toggle="tooltip" data-placement="top" title="delete" href="contact_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
                                            </tr>

                                         <?php
                                         $counter++;
                                         
                   
               }
                                         ?>
          </table>