<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }
include 'header.php';

$query = "SELECT * FROM `product_details` p join category c on p.category_id = c.cat_id join brands b on p.br_id = b.brand_id where(p.product_status='new' ||  p.product_status='active')";
$result = mysqli_query($conn,$query);
?>
<div class="container" style="margin-top:80px;">
<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <a href="addproducts.php" class="btn btn-primary mb-4">Add Products</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th> Product Id </th>
                            <th> Product Name </th>
                            <th> Product Image  </th>
                            <th> Product Price </th>
                            <th> Product Description </th>
                            <th> Product Quantity  </th>
                            <th> Product Number  </th>
                            <th> Product Code  </th>
                            <th> Product Category </th>
                            <th> Product brand </th>
                            <th> status </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                           
                            while ($row = mysqli_fetch_array($result))
                            {
                                
                                ?>
                          <tr>
                          <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td> <?php echo $row['product_id'];?> </td>
                            <td> <?php echo $row['product_name'];?> </td>
                            <td> <img src="data:image/jpg;base64,<?php  echo base64_encode ($row['product_image']);?>" width="500px" height="300px"></td>
                            <td> <?php echo $row['product_price'];?> </td>
                            <td> <?php echo $row['product_description'];?> </td>
                            <td> <?php echo $row['product_quantity'];?> </td>
                            <td> <?php echo $row['product_number'];?> </td>
                            <td> <?php echo $row['product_code'];?> </td>
                            <td> <?php echo $row['cat_name'];?> </td>
                            <td> <?php echo $row['brand_name'];?> </td>
                            
                            <td> <a href="updateproduct.php?uid=<?php echo $row['product_id'];?>" class="btn btn-success">Update</a> || <a href="delete.php?pid=<?php echo $row[0];?>"  class="btn btn-danger">Delete</a> </td>
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
          