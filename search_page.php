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
  <!-- search  -->
  <section class="search-form">
    <form action="" method="post" name="frm" id="frm">
      <input type="text" name="search" placeholder="search products..." class="box" value="<?php if(isset($_POST['search'])) echo $_POST['search']?>">
      <select id="categories" name="categories" class="box-price">
        <option value="-1">Category</option>
        <!-- categories -->
        <?php
        $categories = mysqli_query($conn, "SELECT * FROM `categorys`");
        if (mysqli_num_rows($categories) > 0) {
          $s = "";
          while ($fetch_categories = mysqli_fetch_assoc($categories)) {
            if(isset($_POST['categories']) && $_POST['categories'] == $fetch_categories['id'])
              $s .= sprintf('<option value="%s" selected>%s</option>, ', $fetch_categories['id'], $fetch_categories['category_name']);
            $s .= sprintf('<option value="%s">%s</option>, ', $fetch_categories['id'], $fetch_categories['category_name']);
          }
          echo $s;
        }
        ?>
      </select>
      <input type="number" name="min_price" placeholder="min price" class="box-price" value="<?php if(isset($_POST['min_price'])) echo $_POST['min_price']?>"><br>
      <input type="number" name="max_price" placeholder="max price" class="box-price" value="<?php if(isset($_POST['max_price'])) echo $_POST['max_price']?>"><br>
      <input type="submit" name="submit" value="search" class="btn">
    </form>
  </section>

  <section class="products" style="padding-top: 0;">
    <div class="box-container">
      <?php
        if(isset($_GET['page'])){
          var_dump($_GET['page']);
          ?>

        <?php
        }
      $number_of_pages = 0;
      if (isset($_POST['submit'])) {
        // LIMIT $results_per_page OFFSET  $this_page_first_result
        if ($_POST['categories'] != -1) {
          $sql = "SELECT p.* FROM `products` as p, `categorys` as c
          WHERE p.name LIKE '%{$_POST['search']}%' AND p.category_id = c.id and c.id = {$_POST['categories']}";
          if(!empty($_POST['min_price']) && !empty($_POST['max_price'])){
            $min_price = $_POST['min_price'];
            $max_price = $_POST['max_price'];
            $sql .= " AND p.price BETWEEN $min_price AND $max_price";
          }else{
          }
        } 
        else {
          $sql = "SELECT * FROM `products` WHERE name LIKE '%{$_POST['search']}%'";
          if(!empty($_POST['min_price']) && !empty($_POST['max_price'])){
            $min_price = $_POST['min_price'];
            $max_price = $_POST['max_price'];
            $sql .= " AND price BETWEEN $min_price AND $max_price";
          }
        }
        $result = mysqli_query($conn, $sql);
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
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
              </form>
            <?php
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
  
  <?php
  include 'footer.php';

  ?>
  <script src="js/script.js"></script>
</body>

</html>