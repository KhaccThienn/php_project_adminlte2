<?php
include "connection/connect.php";

$errors = [];
$sql = "SELECT * FROM product";
$results = $connect->query($sql);

$sql2 = "SELECT * FROM category";
$result = $connect->query($sql2);

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $sale_price = $_POST['sale_price'];
  $status = $_POST['status'];
  $category_id = $_POST['category_id'];

  if (empty($name)) {
    $errors['name_required'] = "Name is required";
  } else {
    foreach ($results as $key => $value) {
      if ($value['name'] == $name) {
        $errors['name_exits'] = "Product " . $name . " already exists";
      }
    }
  }

  if (empty($price)) {
    $errors['price_required'] = "Price is required";
  } else {
    if (!filter_var($price,  FILTER_VALIDATE_FLOAT)) {
      $errors['price_invalid'] = "Price must be a number";
    } elseif ($price <= 0) {
      $errors['greather_price'] = "Price must be greater than zero";
    }
  }

  if (empty($sale_price)) {
    $errors['saleprice_required'] = "Sale Price is required";
  } else {
    if (!filter_var($sale_price,  FILTER_VALIDATE_FLOAT)) {
      $errors['price_invalid'] = "Price must be a number";
    } elseif($sale_price < 0){
      $errors['greather_price'] = "Sale Price must be greater than zero";
    } elseif($sale_price > $price){
      $errors['price_equals'] = "Sale Price must be less than or equal to $price";
    }
  }

  if (!empty($_FILES['image']['name'])) {
    $types = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/webp', 'image/svg'];
    $file = $_FILES['image'];
    if (!in_array($file['type'], $types)) {
      $errors['image_invalid'] = "Invalid image type";
    } else {
      $image = time().$file['name'];
      move_uploaded_file($file['tmp_name'],"uploads/".$image);
    }
  }


  if (!$errors) {
    $sql = "INSERT INTO product (name, price, sale_price, image, status, category_id) VALUES ('$name', $price, $sale_price, '$image', $status, $category_id)";

    $query = $connect->query($sql);

    if ($query) {
      echo "<script>window.open('index.php?page=product/index.php','_self')</script>";
    }
  }
}
?>

<section class="content">
  <!-- Default box -->
  <div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add New Product</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <form method="POST" action="index.php?page=product/add.php" enctype="multipart/form-data">
        <div class="box-body">
          <?php if ($errors) { ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php foreach ($errors as $key => $value) { ?>
                <strong>
                  <?= $value.'<hr>'?>
                </strong>
              <?php } ?>
            </div>
          <?php } ?>


          <div class="form-group">
            <label for="exampleInputEmail1">Product's Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
          </div>

          <div class="form-group">
            <label for="price">Product's Price</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Price">
          </div>

          <div class="form-group">
            <label for="sale_price">Product's Sale Price</label>
            <input type="text" name="sale_price" class="form-control" id="sale_price" placeholder="Sale Price">
          </div>

          <div class="form-group">
            <label for="image">Product's Image</label>
            <input type="file" name="image" class="form-control" id="image"">
          </div>

          <div class=" form-group">
            <label for="input">Choose Product's Status</label>
            <div class="radio">
              <label>
                <input type="radio" name="status" id="input" value="1" checked="checked">
                In Stock
              </label>
              <label>
                <input type="radio" name="status" id="input" value="0">
                Out Of Stock
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="category_id">Product's Category</label>
            <select name="category_id" id="category_id" class="form-control">
              <?php foreach ($result as $key => $value) { ?>
                <option value="<?= $value['id'] ?>">
                  <?= $value['id'] ?> - <?= $value['name'] ?>
                </option>
              <?php } ?>
            </select>
          </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

    <!-- /.box -->

  </div>
  <!-- /.box -->

</section>