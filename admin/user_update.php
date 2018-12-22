<?php
if(array_key_exists('id', $_GET) && is_numeric($_GET['id'])){
    require_once('class.db.php');
    $database = new DB();

    //get id client want update
    $id = $_GET['id'];

    //Update content when client click submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $database->update('users', $_POST, array('id'=>$id));
    }

    //get current data
    $sql = "SELECT * FROM users WHERE id=$id";
    $users = $database->get_row($sql, TRUE);

    //redirect to index if id isn't exist
    if(!$users){
        header("Location: user_index.php"); die;    
    }
} else {
    header("Location: user_index.php"); die;
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
                        <h4 class="page-title">Cập nhật nhóm</h4> </div>
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
                                    <label class="col-2 col-form-label">Nhóm</label>
                                    <div class="col-10">
                                        <select name="group_id">
                                            <?php 
                                            require_once('class.db.php');
                                            $database = new DB();
                                            $groups = $database->get_results("SELECT * FROM groups ORDER BY id DESC" );
                                            foreach( $groups as $group ){ ?>
                                                <option value="<?php echo $group['id']; ?>" <?php echo $users->group_id == $group['id'] ? 'selected' : ''; ?>><?php echo $group['name']; ?></option>
                                            <?php }//end foreach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Người Dùng</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="username" value="<?php echo $users->username; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Mật Khẩu</label>
                                    <div class="col-10">
                                        <input class="form-control" type="password" name="password" value="<?php echo $users->password; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Họ và Tên</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="fullname" value="<?php echo $users->fullname; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">E Mail</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="email" value="<?php echo $users->email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Địa Chỉ</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="address" value="<?php echo $users->address; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Điện Thoại</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="phone" value="<?php echo $users->phone; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Trạng thái</label>
                                    <div class="col-10">
                                        <input type="radio" name="status" value="1" <?php echo $users->status ? 'checked' : ''; ?>> Hoạt động <br/>
                                        <input type="radio" name="status" value="0" <?php echo !$group->status ? 'checked' : ''; ?>> Khoá <br/>
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
