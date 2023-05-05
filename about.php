<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
  header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>about</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <div class="heading">
    <h3>about us</h3>
    <p><a href="home.php">home</a>/ about</p>
  </div>


  <section class="about">

    <div class="flex">
      <div class="image">
        <img src="images/about-img.jpg" alt="">
      </div>
      <div class="content">
        <h3>why choose us</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam maiores nemo, nulla possimus sapiente
          libero enim ratione aliquid, vel nam dolorum blanditiis sint necessitatibus molestias consequatur. Amet minima
          doloremque quis.</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint exercitationem commodi, vero minima
          perferendis inventore quaerat officiis quos consequatur porro!</p>
        <a href="contact.php" class="btn">contact us</a>
      </div>
    </div>
  </section>

  <section class="reviews">
    <h1 class="title">client's reviews</h1>

    <div class="box-container">

      <div class="box">
        <img src="images/chicken.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officia unde recusandae! Fuga, sequi? At
          sit esse voluptates illo cumque.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>mrs chicken</h3>
      </div>

      <div class="box">
        <img src="images/fish.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officia unde recusandae! Fuga, sequi? At
          sit esse voluptates illo cumque.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>mrs fish</h3>
      </div>

      <div class="box">
        <img src="images/bird.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officia unde recusandae! Fuga, sequi? At
          sit esse voluptates illo cumque.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>mr bird</h3>
      </div>

      <div class="box">
        <img src="images/cat.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officia unde recusandae! Fuga, sequi? At
          sit esse voluptates illo cumque.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>mrs cat</h3>
      </div>

      <div class="box">
        <img src="images/dog.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officia unde recusandae! Fuga, sequi? At
          sit esse voluptates illo cumque.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>mr dog</h3>
      </div>

      <div class="box">
        <img src="images/monkey.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officia unde recusandae! Fuga, sequi? At
          sit esse voluptates illo cumque.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>babe monkey</h3>
      </div>


    </div>
  </section>

  <section class="authors">

    <h1 class="title">greate authors</h1>
    <div class="box-container">

      <div class="box">
        <img src="images/web.jpg" alt="">
        <div class="share">
          <a href="" class="fab fa-facebook-f"></a>
          <a href="" class="fab fa-twitter"></a>
          <a href="" class="fab fa-instagram"></a>
          <a href="" class="fab fa-linkedin"></a>
        </div>
        <h3>mr. web designer</h3>
      </div>

      <div class="box">
        <img src="images/google.jpg" alt="">
        <div class="share">
          <a href="" class="fab fa-facebook-f"></a>
          <a href="" class="fab fa-twitter"></a>
          <a href="" class="fab fa-instagram"></a>
          <a href="" class="fab fa-linkedin"></a>
        </div>
        <h3>mrs google</h3>
      </div>

      <div class="box">
        <img src="images/lai.jpg" alt="">
        <div class="share">
          <a href="" class="fab fa-facebook-f"></a>
          <a href="" class="fab fa-twitter"></a>
          <a href="" class="fab fa-instagram"></a>
          <a href="" class="fab fa-linkedin"></a>
        </div>
        <h3>le tran dinh lai</h3>
      </div>

      <div class="box">
        <img src="images/trug.jpg" alt="">
        <div class="share">
          <a href="" class="fab fa-facebook-f"></a>
          <a href="" class="fab fa-twitter"></a>
          <a href="" class="fab fa-instagram"></a>
          <a href="" class="fab fa-linkedin"></a>
        </div>
        <h3>nguyen ngoc quoc trung</h3>
      </div>

      <div class="box">
        <img src="images/jesus.jpg" alt="">
        <div class="share">
          <a href="" class="fab fa-facebook-f"></a>
          <a href="" class="fab fa-twitter"></a>
          <a href="" class="fab fa-instagram"></a>
          <a href="" class="fab fa-linkedin"></a>
        </div>
        <h3>le minh tri</h3>
      </div>

      <div class="box">
        <img src="images/buddha.jpg" alt="">
        <div class="share">
          <a href="" class="fab fa-facebook-f"></a>
          <a href="" class="fab fa-twitter"></a>
          <a href="" class="fab fa-instagram"></a>
          <a href="" class="fab fa-linkedin"></a>
        </div>
        <h3>nguyen hai nam</h3>
      </div>
    </div>


  </section>

  <?php
  include 'footer.php';
  ?>
  <script src="js/script.js"></script>
</body>

</html>