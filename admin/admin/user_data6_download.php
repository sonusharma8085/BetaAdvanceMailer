<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered" >
              <tr>
                 <td>SNo.</td>
                 <td>Taps</td>
                 <td>Status</td>
             </tr>
                <?php
                 $query = "SELECT * FROM taps";
                 $sql   = mysqli_query($conn,$query);
                 while($row = mysqli_fetch_array($sql)){
                ?>
             <tr class="text-center">
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["taps"]; ?></td>
                <?php 
                    if($row["stats"]==1){ ?>
                    
                <td><input type="checkbox" id ="checkbox" checked  value="<?php echo $row["stats"]; ?>" onclick="myFunction(0,<?php echo $row['id'] ?>)"></td>
                
                <?php }else{ ?>
                	<td><input type="checkbox" id ="checkbox"   value="<?php echo $row["stats"]; ?>" onclick="myFunction(1,<?php echo $row['id'] ?>)"></td>
                
                <?php } ?>
                                              
                <td><a data-toggle="tooltip" id ="checkbox" data-placement="top" title="update" href="taps_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                  <!--<a data-toggle="tooltip" data-placement="top" title="delete" href="taps_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a>-->
                </td>
             </tr>
             <?php } ?>
                
             
           </table>