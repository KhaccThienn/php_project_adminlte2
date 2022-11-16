<?php
include "connection/connect.php";

$limit = 3;
$pages = !empty($_GET['pages']) ? $_GET['pages'] : 1;
$start = ($pages - 1) * $limit;
$sql = "SELECT p.id, p.name, p.price, p.sale_price, p.image, c.name AS 'Name', p.status FROM product p INNER JOIN category c ON p.category_id = c.id";

$queryRow =  mysqli_query($connect, $sql);
$count = mysqli_num_rows($queryRow);

$totalPage = ceil($count / $limit);
$sql .= " LIMIT $start, $limit";
$result = mysqli_query($connect, $sql);


?>
<section class="content-header">
  <h1>
    Product Management Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Product Management</a></li>
    <li class="active">Index</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">


  <div class="box">
    <div class="box-header">
      <a href="?page=product/add.php" class="btn btn-success">+ Add New Product</a>

      <div class="box-tools">

        <form class="input-group input-group-sm" style="width: 150px;" method="GET" action="#">
          <input type="text" name="category_search" class="form-control pull-right" placeholder="Search">
          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </form>

      </div>
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
            <th>Options</th>
          </tr>
          <?php if ($result->num_rows > 0) { ?>
            <?php foreach ($result as $key => $value) { ?>
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
                <td>
                  <a href="?page=product/update.php&id=<?= $value['id'] ?>" class="btn btn-success">Sửa</a>
                  <a href="?page=product/delete.php&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('Ban Co Chac Muon Xoa ??')">Xóa</a>
                </td>
              </tr>

            <?php } ?>
          <?php } else { ?>
            <h3 class="text-danger" style="margin-left: 10px;">0 Data Returned</h3>
          <?php } ?>

        </tbody>
      </table>
    </div>
    <div class="pagi text-right">

      <ul class="pagination">
        <li><a href="#">&laquo;</a></li>
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
          <li <?= $i == $page ? 'class="active"' : ''; ?>>
            <a href="?page=product/index.php&pages=<?= $i; ?>"><?= $i; ?></a>
          </li>
        <?php endfor; ?>

        <li><a href="#">&raquo;</a></li>
      </ul>

    </div>
  </div>
  <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>