<?php  
$messageError = "";
$messageSuccess = "";
require_once('class.db.php');
$database = new DB();

$groups = $database->get_results("SELECT * FROM groups WHERE status = 1 ORDER BY id DESC");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userExist = $database->get_row("SELECT id FROM users WHERE username='".$_POST['username']."'", TRUE);
    if($userExist){
        $messageError = "Tài khoản đã tồn tại, vui lòng sử dụng một tài khoản khác!";
    } else {
        //Validation data
        $database->insert('users', $_POST);    
        $messageSuccess = "Tạo tài khoản thành công!";
    }
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
                        <h4 class="page-title">Thêm mới Người dùng</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <!-- <a href="https://themeforest.net/item/elite-admin-the-ultimate-dashboard-web-app-kit-material-design/16750820?ref=suniljoshi" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="user_index.php">Danh sách Người dùng</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <?php if($messageError){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $messageError; ?>
                        </div>
                        <?php }//endif ?>

                        <?php if($messageSuccess){ ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $messageSuccess; ?>
                        </div>
                        <?php }//endif ?>

                        <div class="white-box">
                            <form class="form" method="POST">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Tài khoản <span class="required">*</span></label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Mật khẩu <span class="required">*</span></label>
                                    <div class="col-10">
                                        <input class="form-control" type="password" name="password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Họ và tên <span class="required">*</span></label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="fullname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Email <span class="required">*</span></label>
                                    <div class="col-10">
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Địa chỉ</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Điện thoại</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Nhóm</label>
                                    <div class="col-10">
                                        <select name="group_id">
                                            <?php foreach ($groups as $group): ?>
                                                <option value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Trạng thái</label>
                                    <div class="col-10">
                                        <input type="radio" name="status" value="1" checked id="status_active"> <label for="status_active">Hoạt động</label><br/>
                                        <input type="radio" name="status" value="0" id="status_disable"> <label for="status_disable">Khoá</label> <br/>
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
