<div class="container">
          <div class="heading-link mt-3">
               <ul class="item">
                    <li class="home">
                         <a href="?url=home">Trang chủ</a>
                    </li>
                    <li class="icon active">
                         <a href="?url=home/detail/<?= $_SESSION['customer_id'] ?>">Thông tin tài khoản</a>
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
                    <div class="heading-lg">
                         <h1>Thông tin tài khoản</h1>
                    </div>
                    <div class="form-checkout account-detail">
                         <h2>THÔNG TIN TÀI KHOẢN</h2>
                         <p>Họ tên: <?= $data['customer']['name'] ?></p>
                         <p><a href="?url=home/changepass">Đổi mật khẩu</a></p>
                    </div>
                    <div class="heading-lg">
                         <h1>Thông tin cá nhân</h1>
                    </div>
                    <div class="form-checkout">
                         <form action="?url=user/edit" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="id" value="<?= $data['customer']['id'] ?>" />
                              <h2>THÔNG TIN CÁ NHÂN</h2>
                              <div class="form-group">
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="username" class="col-sm-3" style="font-size:1rem;">Họ tên
                                             <span class="warning">(*)</span>
                                        </label>
                                        <input type="text" class="col-sm-9 form-control" name="name" value="<?= $data['customer']['name'] ?>" required>
                                   </div>
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="sex" class="col-sm-3 col-12" style="font-size:1rem;">Giới tính
                                             <span class="warning">(*)</span>
                                        </label>
                                        <select name="sex" id="sex" class="col-12 col-sm-9 form-control">
                                             <?php if ($data['customer']['sex'] == 0): ?>
                                                  <option value="0" selected>Nam</option>
                                                  <option value="1">Nữ</option>
                                             <?php else: ?>
                                                  <option value="0">Nam</option>
                                                  <option value="1" selected>Nữ</option>
                                             <?php endif; ?>
                                        </select>
                                   </div>
                                   <div class="row mt-4 mr-auto ml-auto">
                                        <label for="phone" class="col-sm-3" style="font-size:0.9rem;">Số điện thoại
                                             <span class="warning">(*)</span>
                                        </label>
                                        <input type="tel" class="col-sm-9 form-control" name="phone" value="<?= $data['customer']['phone'] ?>" required>
                                   </div>
                              </div>
                              <div class="form-group">
                                   <div class="col-sm-8">
                                        <button type="submit" class="btn-checkout">Cập nhật</button>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>