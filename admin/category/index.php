<?php
include "connection/connect.php";

$sql = "SELECT * FROM category";
$result = $connect->query($sql);
?>
<section class="content-header">
  <h1>
    Category Management Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Category Management</a></li>
    <li class="active">Index</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="?page=category/add.php" class="btn btn-success">+ Add New Category</a>

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
              <th>Status</th>
              <th>Options</th>
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
                  <td>
                    <a href="?page=category/update.php&id=<?= $value['id'] ?>" class="btn btn-success">Sửa</a>
                    <a href="?page=category/delete.php&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('Ban Co Chac Muon Xoa ??')">Xóa</a>
                  </td>
                </tr>

              <?php } ?>
            <?php } else { ?>
              <h3 class="text-danger" style="margin-left: 10px;">0 Data Returned</h3>
            <?php } ?>

          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->

</section>