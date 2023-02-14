<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }

include 'header.php';

$query = "SELECT * FROM `orders` o  join `user` u on o.user_id=u.user_id";
$result = mysqli_query($conn,$query);
?>
<div class="container" style="margin-top:80px;">
<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">orders</h4>
                    
                            <?php 
                            $num=1;
                            while ($row = mysqli_fetch_array($result))
                            {
                                
                                ?>
                                <div class="table-responsive">
                      <table class="table table-light">
                       
                                 <thead>
                          <tr>
                            
                            <th>order id </th> <td> <?php  echo $row['order_id'];?> </td>
                            <th>user Name </th>  <td><?php  echo$row['user_name'];?></td>
                            <th>order date </th>   <td> <?php echo $row['date_of_order'];?> </td>
                            <th>total amount</th> <td> <?php echo $row['total'];?> </td>
                          </tr>
                       
                      
</thead>
<tbody>
                            <?php
          $bd_query="Select * from invoice where order_id=".$row['order_id'];
          $bd_result=mysqli_query($conn,$bd_query);
          ?>
          <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Age</th>
              <th scope="col">Seat Detail ID</th>
              <th scope="col">Charges</th>
            </tr>
          </thead>
          <tbody>
              <?php
              while($bd_row=mysqli_fetch_assoc($bd_result))
              {
              ?>
              <tr>
                <td><?php echo $bd_row['product_name'];?></td>
                <td><?php echo $bd_row['product_price'];?></td>
                <td><?php echo $bd_row['product_quantity'];?></td>
                <td><?php echo $bd_row['product_name'];?></td>
              </tr>
              <?php
              }
              ?>
          </tbody>
          </table>
          <br>
                      <br>
                          </tr>
<?php
                            }
?>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>