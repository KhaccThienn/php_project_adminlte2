<?php
include "connection/connect.php";

$q = isset($_GET['q']) ? $_GET['q'] : null;
$category_search = isset($_GET['category_search']) ? $_GET['category_search'] : null;
$product_search = isset($_GET['product_search']) ? $_GET['product_search'] : null;

$sql_cate = "SELECT * FROM category WHERE name LIKE '%$q%' OR name LIKE '%$category_search%'";
$result = $connect->query($sql_cate);

$sql_prod = "SELECT p.id, p.name, p.price, p.sale_price, p.image, c.name AS 'Name', p.status FROM product p INNER JOIN category c ON p.category_id = c.id WHERE p.name LIKE '%$q%' OR p.name LIKE '%$product_search%'";
$results = $connect->query($sql_prod);

?>


<section class="content">

  <div class="box">
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
          </tr>
          <?php if ($result->num_rows > 0) { ?>
            <?php foreach ($result as $key => $value) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td>
                  <?php if ($value['status'] == 1) { ?>
                    <span class="label label-success">Show</span>
                  <?php } else { ?>
                    <span class="label label-danger">Hide</span>

                  <?php } ?>
                </td>

              </tr>

            <?php } ?>
          <?php } else { ?>
            <h3 class="text-danger" style="margin-left: 10px;">0 Data Returned On Table Category</h3>
          <?php } ?>

        </tbody>
      </table>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Sale Price ($)</th>
            <th>Image</th>
            <th>Category</th>
            <th>Status</th>

          </tr>
          <?php if ($results->num_rows > 0) { ?>
            <?php foreach ($results as $key => $value) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= number_format($value['price'], 2, ',', '.') ?></td>
                <td><?= number_format($value['sale_price'], 2, ',', '.') ?></td>
                <td style="width: 20%;">
                  <img src="uploads/<?= $value['image'] ?>" alt="" style="width: 100%;">
                </td>
                <td><?= $value['Name'] ?></td>

                <td>
                  <?php if ($value['status'] == 1) { ?>
                    <span class=" label label-success">In Stock</span>
                  <?php } else { ?>
                    <span class="label label-danger">Out Of Stock</span>

                  <?php } ?>
                </td>

              </tr>

            <?php } ?>
          <?php } else { ?>
            <h3 class="text-danger" style="margin-left: 10px;">0 Data Returned On Table Product</h3>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
  <!-- /.box-body -->
  <!-- /.box -->
</section>