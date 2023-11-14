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
            <!-- <td> Catagries</td> -->
            
            </tr>
            <?php 
               $query = "SELECT * FROM whychoose";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                   <td><?php echo $row["id"]; ?></td>
                   <td><?php echo $row["tittle"]; ?></td>
                   <td><?php echo $row["sub_tittle"]; ?></td>
                   <!-- <td><?php echo $row["catagries"]; ?></td> -->
                                            </tr>

              <?php
                    }
             ?>
          </table>