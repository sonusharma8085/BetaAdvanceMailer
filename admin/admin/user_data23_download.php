<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
              <td>Tittle</td>
              <td>Sub Tittle</td>
              <td>Massege</td>
            </tr>
            <?php 
               $query = "SELECT * FROM webdesign_deve";
               $sql   = mysqli_query($conn,$query);
               $i=1;
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $i ?></td>
                                              <td><?php echo $row["tittle"]; ?></td>
                                              <td><?php echo $row["sub_tittle"]; ?></td>
                                              <td><?php echo $row["massage"]; ?></td>
                 
                                            </tr>

                                         <?php
                                            $i++;
                                           }
                                         ?>
          </table>
