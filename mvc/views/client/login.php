<div class="container">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="?url=home">Trang chủ</a>
              </li>
              <li class="icon active">
                   <a href="?url=home/login">Đăng nhập</a>
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
                        <a href="?url=home/login" style="font-size:1rem;">
                             <i class="fas fa-sign-in-alt"></i>
                             Đăng nhập
                        </a>
                   </li>
                   <li>
                        <a href="?url=home/register" style="font-size:1rem;">
                             <i class="fas fa-sign-in-alt"></i>
                             Đăng ký
                        </a>
                   </li>
              </ul>
         </div>
         <div class="col-md-9 mt-1 mb-3">
              <div class="heading-lg">
                   <h1>ĐĂNG NHẬP</h1>
              </div>
              <?php require_once "./mvc/views/client/alert_message.php" ?>
              <form class="form-horizontal mt-4" action="?url=home/handleLogin" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                             <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" required>
                        </div>
                   </div>
                   <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Mật khẩu:</label>
                        <div class="col-sm-10">
                             <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        </div>
                   </div>
                   <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn-login">Đăng nhập</button>  
                        </div>
                   </div>
              </form>      
         </div>
    </div>
</div>