<?php
    include 'config.php';
    
    session_start();
    
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value) {
                if ($value["product_id"] == $_GET["id"]) {
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="mycart.php"</script>';
                }
            }
        }
    }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php';?>

    <h1 class="title2">Shopping Cart Details</h1>
    <div class="table-responsive">
       <table class="table table-bordered">
           <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price Details</th>
              <th>Total Price</th>
              <th>Remove Item</th>
           </tr>

            <?php
               if (!empty($_SESSION["cart"])) {
                  $total = 0;
                  foreach ($_SESSION["cart"] as $key => $value) {
            ?>

            <tr>
                <td><?php echo $value["item_name"]; ?></td>
                <td><?php echo $value["item_quantity"]; ?></td>
                <td>Rs <?php echo $value["product_price"]; ?></td>

                <td>
                    Rs <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                <td><a href="mycart.php?action=delet&id=<?php echo $value["product_id"]; ?>"><span>Remove</span></a></td>
            </tr>
            <?php
                $total = $total + ($value["item_quantity"] * $value["product_price"]);
            }
            ?>
            <tr>
                <td colspan="3">Total</td>
                <th>Rs <?php echo number_format($total, 2); ?></th>
                <td></td>
            </tr>
            <?php
            
            }
            
          ?>
        </table>
    </div>
</body>
</html>