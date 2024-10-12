<?php 
include_once("conn.php");

include_once("header.php");

$product_id = $_GET['id'];

$sql = "SELECT * from products where product_id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i",$product_id);
$stmt->execute();

$result = $stmt->get_result();
$product = $result->fetch_assoc();
print_r($product);
?>

<!-- content -->

 <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Product</h4>
                    <form method="post" action="action/update_product_action.php" enctype="multipart/form-data"  class="forms-sample">
                        <input type="text" value="<?php echo $_GET['id']; ?>" name="product_id"/>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title</label>
                        <input name="title" value="<?php echo $product['product_title']  ?>" type="text" class="form-control" id="exampleInputUsername1" placeholder="Title">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4"><?php echo $product['product_desc']  ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">price</label>
                        <input type="number" value="<?php echo $product['product_price']  ?>"  name="price" class="form-control" id="exampleInputPassword1" placeholder="price">
                      </div>
                      <div class="form-group">
                      <label for="exampleInputUsername1">Product Image</label>
                      <img src="assets/uploads/<?php echo $product['product_image']; ?>" alt="image" width="100">
                        
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