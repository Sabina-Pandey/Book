<?php
    include 'config.php';
    
    
    session_start();


    $query = "SELECT * FROM product ORDER BY id ASC ";
    $result = mysqli_query($con,$query);
    
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)) {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="mycart.php"</script>';
            } else {
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="mycart.php"</script>';
            }
        } else  {
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>

        <div>
            <a href="mycart.php" class="bton">My Cart</a>
        </div>

    <div class="head">
        <h3>Our Shop</h3>
        <p>Here we have our latest products</p>
        
        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
        
        ?>

            <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
                <div class="product">
                    <img src="Shopping_Cart/<?php echo $row["image"]?>" class="img-responsive">
                    <h4>Name: <?php echo $row["pname"]; ?></h5>
                    <h4>Price: Rs <?php echo $row["price"]; ?></h5>
                    <input type="number" name="quantity">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="submit" name="add" class="btn btn-success" value="Add to Cart">
                    
                </div>
            </form>
       
        <?php

          }
        }
        
        ?>
    </div>
</div>
</body>
</html>