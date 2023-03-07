<div class="container">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="?url=home">Trang chủ</a>
              </li>
              <li class="icon active">
                   <a href="?url=home/changepass">Đổi mật khẩu</a>
              </li>
         </ul>
    </div>
    <div class="row">
         <div class="col-md-3 mt-1 mb-3">
              <div class="heading-lg">
                   <h1>Quản lý cá nhân</h1>
              </div>
              <ul>
                    <li>
                        <a href="?url=home/detail/<?= $_SESSION['customer_id'] ?>">
                            <i class="fas fa-sign-in-alt"></i>
                            Thông tin tài khoản
                        </a>
                    </li>
                    <li>
                        <a href="?url=home/getOrder/<?= $_SESSION['customer_id'] ?>">
                            <i class="fas fa-sign-in-alt"></i>
                            Đơn hàng của tôi
                        </a>
                    </li>
                    <li>
                        <a href="?url=home/logout">
                            <i class="fas fa-sign-in-alt"></i>
                            Thoát
                        </a>
                    </li>
                </ul>
         </div>
         <div class="col-md-9 mt-1 mb-3">
              <?php require_once "./mvc/views/client/alert_message.php" ?>
              <div class="heading-lg">
                   <h1>ĐỔI MẬT KHẨU</h1>
              </div>
              <form class="form-horizontal mt-4" action="?url=home/handleChangePass/<?= $_SESSION['customer_id'] ?>" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                        <label class="control-label col-sm-6" for="current-password">Mật khẩu hiện tại:</label>
                        <div class="col-sm-10">
                             <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Nhập mật khẩu hiện tại" required>
                        </div>
                   </div>
                   <div class="form-group">
                        <label class="control-label col-sm-6" for="new-password">Mật khẩu mới:</label>
                        <div class="col-sm-10">
                             <input type="password" class="form-control" id="new-password" name="new-password" placeholder="Nhập mật khẩu mới" required>
                        </div>
                   </div>
                   <div class="form-group">
                        <label class="control-label col-sm-6" for="password">Xác nhận mật khẩu:</label>
                        <div class="col-sm-10">
                             <input type="password" class="form-control" id="password" name="password" placeholder="Xác nhận mật khẩu" required>
                        </div>
                   </div>
                   <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn-login">Cập nhật</button>  
                        </div>
                   </div>
              </form>      
         </div>
    </div>
</div>