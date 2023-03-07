<div class="container">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="?url=home">Trang chủ</a>
              </li>
              <li class="icon active">
                   <a href="?url=home/register">Đăng ký</a>
              </li>
         </ul>
    </div>
    <div class="row">
         <div class="col-md-3 mt-1 mb-3">
              <div class="heading-lg">
                   <h1>TÀI KHOẢN</h1>
              </div>
              <ul>
                   <li>
                        <a href="?url=home/register" style="font-size:1rem;">
                             <i class="fas fa-sign-in-alt"></i>
                             Đăng ký
                        </a>
                   </li>
                   <li>
                        <a href="?url=home/login" style="font-size:1rem;">
                             <i class="fas fa-sign-in-alt"></i>
                             Đăng nhập
                        </a>
                   </li>
              </ul>
         </div>
         <div class="col-md-9 mt-1 mb-3">
              <div class="heading-lg">
                   <h1>ĐĂNG KÝ TÀI KHOẢN</h1>
              </div>
              <div class="form-checkout">
                   <?php require_once "./mvc/views/pages/alert_message.php" ?>
                   <form action="?url=home/handleRegister" method="POST" enctype="multipart/form-data">
                        <h2>THÔNG TIN TÀI KHOẢN</h2>
                        <div class="form-group">
                             <div class="row mr-auto ml-auto">
                                  <label for="name" class="col-sm-3" style="font-size:0.9rem;">Họ tên
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="text" class="col-sm-9 form-control" name="name" required>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="email" class="col-sm-3" style="font-size:0.9rem;">Email
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="email" class="col-sm-9 form-control" name="email" required>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="password" class="col-sm-3" style="font-size:0.9rem;">Mật khẩu
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="password" class="col-sm-9 form-control" name="password" required>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="repeatpassword" class="col-sm-3" style="font-size:0.9rem;">Xác nhận mật khẩu
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="password" class="col-sm-9 form-control" name="repeatpassword" required>
                             </div>
                        </div>
                        <h2>THÔNG TIN CÁ NHÂN</h2>
                        <div class="form-group">
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="sex" class="col-sm-3 col-12" style="font-size:0.9rem;">Giới tính
                                       <span class="warning">(*)</span>
                                  </label>
                                  <select name="sex" id="sex" class="col-12 col-sm-9 form-control">
                                       <option value="0">Nam</option>
                                       <option value="1">Nữ</option>
                                  </select>
                             </div>
                             <div class="row mt-4 mr-auto ml-auto">
                                  <label for="phone" class="col-sm-3" style="font-size:0.9rem;">Số điện thoại
                                       <span class="warning">(*)</span>
                                  </label>
                                  <input type="tel" pattern="[0-9]{10}" class="col-sm-9 form-control" name="phone" required>
                             </div>
                        </div>
                        <div class="form-group">
                             <div class="col-sm-8">
                                  <button type="submit" class="btn-checkout">Đăng kí</button>
                             </div>
                        </div>
                   </form>
              </div>
         </div>
    </div>
</div>