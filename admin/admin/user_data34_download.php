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
              <td>Category</td>
              <td>Sub Category</td>
              <td>Massege</td>
              
              <td>Time</td>
            </tr>
            <?php 
               $query = "SELECT * FROM latest_update";
               $sql   = mysqli_query($conn,$query);
               $i=1;
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $i ?></td>
                                              
                                              <td><?php echo $row["name"]; ?></td>
                                              <td><?php echo $row["category"]; ?></td>
                                              <td><?php echo $row["sub_category"];?></td>
                                              <td><?php echo $row["massage"]; ?></td>
                                              
                                              <td><?php echo $row["create_at"]; ?></td>
                                        
                                            </tr>

                                         <?php
                                            $i++;
                                           }
                                         ?>
          </table>
