<?php  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('class.db.php');
    $database = new DB();

    $database->insert('categories', $_POST);
}
?>

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
                        <h4 class="page-title">Thêm mới nhóm</h4> </div>
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
                            <form class="form" method="POST">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Tên Danh Mục</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Danh Mục Cha</label>
                                    <div class="col-10">
                                        <select name="parrent_id">
                                            <option value="0">Danh mục chính</option>
                                            <?php 
                                            require_once('class.db.php');
                                            $database = new DB();
                                            $categories = $database->get_results("SELECT * FROM categories WHERE parent_id = 0 ORDER BY id DESC" );
                                            foreach( $categories as $category ){ ?>
                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                            <?php }//end foreach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Từ khoá</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="alias">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Mô tả</label>
                                    <div class="col-10">
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Trạng thái</label>
                                    <div class="col-10">
                                        <input type="radio" name="status" value="1"> Hoạt động <br/>
                                        <input type="radio" name="status" value="0"> Khoá <br/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label"></label>
                                    <div class="col-10">
                                        <input type="submit" value="Thêm mới">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once 'includes/footer.php' ?>
</body>

</html>
