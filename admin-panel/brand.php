<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }

include 'header.php';

$query = "SELECT * FROM `brands` join category on brands.categ_id = category.cat_id where brands.brand_status = 'active'";
$result = mysqli_query($conn,$query);
?>
<div class="container" style="margin-top:80px;">
<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Brands</h4>
                    <a href="addbrand.php" class="btn btn-primary mb-4">Add Brands</a>
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
                            <th>Brand id</th>
                            <th>Brand Name </th>
                            <th>Brand image </th>
                            <th>Brand Category </th>
                            <th>Brand Logo</th>
                            <th>Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $num=1;
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
                            <td> <?php echo $num;?> </td>
                            <td> <?php  echo $row['brand_name'];?> </td>
                            <td> <img src="data:image/jpg;base64,<?php  echo base64_encode ($row['brand_img']);?>" width="500px" height="30px"></td>
                            <td> <?php echo $row['cat_name'];?> </td>
                           
                            <td> <img src="data:image/jpg;base64,<?php  echo base64_encode ($row['brand_logo']);?>" width="500px" height="30px"></td>
                            <td> <a href="update.php?upid=<?php echo $row['brand_id'];?>" class="btn btn-success">Update</a> || <a href="delete.php?bid=<?php echo $row['brand_id'];?>"  class="btn btn-danger">Delete</a> </td>
                          </tr>

                          <?php
                          $num++;
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