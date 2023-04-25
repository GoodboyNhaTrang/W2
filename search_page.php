<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
  header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` 
  WHERE product_id = '$product_id' AND user_id = '$user_id'") or die('query failed');

  if (mysqli_num_rows($check_cart_numbers) > 0) {
    $message[] = 'already added to cart';
  } else {
    mysqli_query($conn, "INSERT INTO `cart`(user_id, product_id, quantity) 
    VALUES('$user_id', '$product_id','$product_quantity')")
      or die('query failed');
    $message[] = 'product added to cart!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>order</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <div class="heading">
    <h3>search page</h3>
    <p><a href="home.php">order</a>/ search</p>
  </div>

  <section class="search-form">
    <form action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="number" name="min_price" placeholder="min price" class="box-price"><br>
      <input type="number" name="max_price" placeholder="max price" class="box-price"><br>
      <input type="submit" name="submit" value="search" class="btn">
    </form>


  </section>

  <section class="products" style="padding-top: 0;">
    <div class="box-container">
      <?php
      if (isset($_POST['submit'])) {
        if (empty($_POST['min_price']) && empty($_POST['max_price'])) {
          $search_item = $_POST['search'];
          $select_products = mysqli_query($conn, "SELECT * FROM `products`
        WHERE name LIKE '%{$search_item}%'")
            or die('query failed');
          if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {


      ?>
              <form action="" method="post" class="box">
                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                <input type="number" min="1" name="product_quantity" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
              </form>
            <?php
            }
          }
        } else if (!empty($_POST['min_price']) && !empty($_POST['max_price'])) {

          $min_price = $_POST['min_price'];
          $max_price = $_POST['max_price'];
          $search_item = "%" . $_POST['search'] . "%";
          // // Tạo truy vấn SQL để tìm kiếm sản phẩm theo độ dài của khoảng giá
          $sql = "SELECT * FROM `products` WHERE price BETWEEN ? AND ? and name like ? ";
          $stmt = mysqli_prepare($conn, $sql);

          mysqli_stmt_bind_param($stmt, "iis", $min_price, $max_price, $search_item);
          mysqli_stmt_execute($stmt);
          // $result = mysqli_query($conn, "SELECT * FROM `products` 
          // WHERE price BETWEEN " . $min_price . " AND " . $max_price . " 
          // AND name like '%" . $search_item . "%' ");
          $result = mysqli_stmt_get_result($stmt);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <form action="" method="post" class="box">
                <img class="image" src="uploaded_img/<?php echo $row['image']; ?>" alt="">
                <div class="name"><?php echo $row["name"]; ?></div>
                <div class="price">$<?php echo $row["price"]; ?>/-</div>
                <input type="number" min="1" name="product_quantity" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $row["name"]; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row["price"]; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row["image"]; ?>">

                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
              </form>
      <?php
            }
          }
        } else {
          echo '<p class="empty">no result found!</p>';
        }
      } else {
        echo '<p class="empty">search something!</p>';
      }
      ?>

    </div>


  </section>


  <div class="category-container">
    <div class="card">
      <div class="title-menu">
        <h3>Category</h3>
      </div>
      <div class="category-link">
        <ul>
          <?php
          $select_categorys = mysqli_query($conn, "SELECT * FROM `categorys`") or die('query failed');
          if (mysqli_num_rows($select_categorys) > 0) {
            while ($fetch_categorys = mysqli_fetch_assoc($select_categorys)) {
          ?>
              <a href="shop.php?category=<?= $fetch_categorys['category_name'] ?>" value="<?php echo $fetch_categorys['id'] ?>">
                <li><?php echo $fetch_categorys['category_name'] ?></li>
              </a>
          <?php
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </div>


  <?php
  include 'footer.php';
  ?>
  <script src="js/script.js"></script>
</body>

</html>