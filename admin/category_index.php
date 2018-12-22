<!DOCTYPE html>
<html lang="en">

<?php include_once 'includes/head.php'; ?>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include_once 'includes/nav-top.php'; ?>
        <!-- END Navigation -->
        <!-- Left navbar-header -->
        <?php include_once 'includes/nav-sidebar.php'; ?>
        <!-- END Left navbar-header -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Danh mục bài viết</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <!-- <a href="https://themeforest.net/item/elite-admin-the-ultimate-dashboard-web-app-kit-material-design/16750820?ref=suniljoshi" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Danh sách danh mục</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>alias</th>
                                            <!-- <th>thumbnail</th> -->
                                            <th>Mô tả</th>
                                            <th>Thư mục cha</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        
                                        <?php 
                                        require_once('class.db.php');
                                        $database = new DB();

                                        $category = $database->get_results("SELECT * FROM categories ORDER BY id DESC" );
                                        foreach( $category as $category ){
                                        ?>
                                        <tr>
                                            <td><?php echo $category['id']; ?></td>
                                            <td><?php echo $category['name']; ?></td>
                                            <td><?php echo $category['alias']; ?></td>
                                            <td><?php echo $category['description']; ?></td>
                                            <td><?php echo $category['parrent_id']; ?></td>
                                            <td><?php echo $category['status']; ?></td>
                                            <!-- echo '<td>'; -->
                          
                                            <td>
                                                <a href="category_update.php?id=<?php echo $category['id']; ?>">Cập nhật</a>
                                                <a href="category_delete.php?id=<?php echo $category['id']; ?>">Xóa</a>
                                            </td>
                                        </tr>
                                        <?php }//end foreach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once 'includes/footer.php' ?>
</body>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>
