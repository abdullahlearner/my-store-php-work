<?php 
include_once("conn.php");

include_once "header.php";

$select = "SELECT * FROM products";

$result = $conn->query($select);


?>
<style>
    p{
        color:red;
    }
</style>

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product List</h4>
                    <?php if(isset($_GET['msg'])){
                      
                        echo "<p>".  $_GET['msg'] . "</p>";
        
                      }?>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code>
                    </p> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Image </th>
                          <th>Title </th>
                          <th> Price </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  if($result->num_rows > 0) { 
                            
                            while($row = $result->fetch_assoc()){
                                // echo "<pre>";
                                // print_r($row);
                                ?>
                                <tr>
                                <td class="py-1">
                                  <img src="assets/uploads/<?php echo $row['product_image']; ?>" alt="image">
                                </td>
                                <td> <?php echo $row['product_title']; ?></td>
                                <td> $ <?php echo $row['product_price']; ?> </td>
                               
                                <td>
                                  <a href="update_product.php?id=<?php echo $row['product_id']; ?>"> <button>Update</button> </a>

                                  <a href="action/delete_product.php?id=<?php echo $row['product_id']; ?>">delete</a>
                                </td>
                              </tr>
                           
                            
                         <?php 
                         } }else{
                            echo "<p>No Product Found</p>";
                        }
                        ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
</div>

<?php 
include_once "footer.php";
?>