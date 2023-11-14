<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
  <table class="table table-striped text-center table-bordered">
            
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Subtittle</th>
            </tr>
            
            
                <?php 
                    $sql =  "SELECT * FROM `ourtools_slider`";
                    $sqlikey = mysqli_query($conn,$sql);
                    $i=1;
                    while($result= mysqli_fetch_assoc($sqlikey)){
                        $cat_id = $result['id'];
                    ?>
                    
                    <tr class="text-center">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['title'] ?></td>
                        <td><?php echo $result['subtitle'] ?></td>
                       
                </tr>
                    <?php 
                        $i++;
                    } ?>
                 
                
                                  

                                        
          </table>

            
            
      