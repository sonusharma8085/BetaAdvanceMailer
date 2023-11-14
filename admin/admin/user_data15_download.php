<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
 <table class="table table-striped text-center table-bordered">
            <thead>
             <tr>
              <td>SNo.</td>
              <td>Tittle</td>
              <td>Sub Tittle</td>
              <td>Price</td>
              <td>Categories</td>
             </tr>
            </thead>
            <?php  $i=1;
               $query = "SELECT * FROM bulkemailsending";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                   $cat_id = $row['cat_id'];
            ?>
            
            <tbody>
            <tr class="text-center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["tittle"]; ?></td>
                        <td><?php echo $row["sub_tittle"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                                              
                        <?php 
                            $slq1 = "SELECT * FROM `categories` WHERE id='$cat_id'";
                            //print_r($slq1);
                            $mysqlt = mysqli_query($conn,$slq1);
                            $catdata = mysqli_fetch_assoc($mysqlt);
                           // print_r($catdata);
                        ?>
                        <td><?php echo $catdata['categories'] ?></td>
                                              
                        </td>
            </tr>

                                         <?php $i++;
                                           }
                                         ?>
            </tbody>
          </table>
