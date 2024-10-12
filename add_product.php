<?php 
include_once("header.php");

?>

<!-- content -->

 <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form method="post" action="action/add_product_action.php" enctype="multipart/form-data"  class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Title</label>
                        <input name="title" type="text" class="form-control" id="exampleInputUsername1" placeholder="Title">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Product Image</label>
                        <input type="file" name="prodcut_img" class="form-control" id="exampleInputUsername1">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>




<?php 

include_once("footer.php");

?>