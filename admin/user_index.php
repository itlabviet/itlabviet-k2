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
                        <h4 class="page-title">Danh sách nhóm</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <!-- <a href="https://themeforest.net/item/elite-admin-the-ultimate-dashboard-web-app-kit-material-design/16750820?ref=suniljoshi" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Danh sách nhóm</a></li>
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
                                            <th>Người Dùng</th>
                                            <th>Mật Khẩu</th>
                                            <th>Họ Và Tên</th>
                                            <th>E Mail</th>
                                            <th>Địa Chỉ</th>
                                            <th>Điện Thoại</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        require_once('class.db.php');
                                        $database = new DB();

                                        $users = $database->get_results("SELECT * FROM users ORDER BY id DESC" );
                                        foreach( $users as $users ){
                                        ?>
                                        <tr>
                                            <td><?php echo $users['id']; ?></td>
                                            <td><?php echo $users['username']; ?></td>
                                            <td><?php echo $users['password']; ?></td>
                                            <td><?php echo $users['fullname']; ?></td>
                                            <td><?php echo $users['email']; ?></td>
                                            <td><?php echo $users['address']; ?></td>
                                            <td><?php echo $users['phone']; ?></td>

                                            <td>
                                                <a href="user_update.php?id=<?php echo $users['id']; ?>">Update</a>
                                                <a href="user_delete.php?id=<?php echo $users['id']; ?>">Delete</a>
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
