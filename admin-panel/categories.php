<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['login'])) 
  {
     header('location: login.php');
  }
include 'header.php';

$query = "SELECT * FROM `category` where `category_status`='active'";
$result = mysqli_query($conn,$query);


?>
<div class="container" style="margin-top:80px;">
<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Categories</h4>
                    <a href="addcategory.php" class="btn btn-primary mb-4">Add Category</a>
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
                            <th>category id</th>
                            <th> category image </th>
                            <th> category Name </th>
                            <th> category Description </th>
                            <th> Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $num=1;
                            while ($row = mysqli_fetch_assoc($result))
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
                            <td><img src="data:image/jpg:base64,<?php echo base64_encode($row['cat_img']);?>"></td>
                            <td> <?php  echo $row['cat_name'];?> </td>
                            <td> <?php  echo $row['cat_des'];?></td>
                            <td> <a href="updatecat.php?catid=<?php echo $row['cat_id'];?>" class="btn btn-success">Update</a> || <a href="delete.php?delcatid=<?php echo $row['cat_id'];?>" class="btn btn-danger">Delete</a> </td>
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