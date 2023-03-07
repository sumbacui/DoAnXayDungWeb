<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Css -->
    <link rel="stylesheet" href="./public/assets/css/style.css" media="all" />
	<!-- Fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- jQuery -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title><?= $data['title'] ?></title>
</head>

<body>
	<div class="wrapper">
		<!-- Header -->
		<!-- A grey horizontal navbar that becomes vertical on small screens -->
        <nav class="navbar navbar-expand-lg text-white header">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-list text-white"></i></button>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-phone-alt"></i> Hotline: 0123 45 6789</a></li>
						<?php if (isset($_SESSION['customer_id'])): ?>
							<li class="nav-item"><a href="?url=home/detail/<?= $_SESSION['customer_id'] ?>"  class="nav-link"><i class="far fa-edit"></i><?= $_SESSION['customer_name'] ?></a></li>
						<?php else: ?>
							<li class="nav-item"><a href="?url=home/login" class="nav-link"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
						<?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-4 mb-4 logo">
			<a href="?url=home">
                <img src="./public/assets/img/logo.png" width="200" />
            </a>
            <form method="POST" action="?url=product/search" class="form-search" enctype="multipart/form-data">
                <div class="form-group d-flex">
                    <input type="text" placeholder="Tìm kiếm..." class="search-text-box" name="q" />
                    <button type="submit" class="button-search"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <div class="cart">
                <a href="?url=cart" class="text-dark cart-child">
                    <img src="./public/assets/img/cart/cart.png" alt="cart" width="50"/>
                    <span id="cart-total" class="cart-total ml-2 mr-2 mt-2">
						<?= isset($_SESSION["shopping_cart"]) ? array_sum(array_column($_SESSION["shopping_cart"], 'item_qty')) : 0 ?>
					</span>
                    <i class="fa fa-arrow-right mt-2"></i>
                </a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg text-white bg-dark options">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#product">
                <i class="fas fa-list text-white"></i>
            </button>
            <div class="container">
                <div class="collapse navbar-collapse" id="product">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="?url=home" class="nav-link">TRANG CHỦ</a></li>
						<div class="dropdown">
							<a type="button" class="nav-link dropdown-toggle mt-1" style="font-size:14px;" data-toggle="dropdown">DANH MỤC</a>
							<ul class="dropdown-menu">
								<?php foreach($data['category'] as $row): ?>
									<li><a class="pl-3" href="?url=product/category/<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<li class="nav-item"><a href="?url=article" class="nav-link">TIN TỨC</a></li>
						<li class="nav-item"><a href="?url=introduce" class="nav-link">GIỚI THIỆU</a></li>
                    </ul>
                </div>
            </div>
        </nav>
		<div class="container">
            <?php require_once "./mvc/views/client/" . $data["page"] . ".php" ?>
			<hr />
			<div id="footer" class="container mt-4 mb-4">
				<div class="row">
					<div class="col-lg-9">
						<h6>THÔNG TIN CỬA HÀNG</h6>
						<div class="items">
							<p>Sports</p>
							<p>Cửa hàng chuyên cung cấp các loại quần áo</p>
							<p>Địa chỉ: TP.HCM</p>
							<p>Số điện thoại: 0123456789</p>
							<p>Địa chỉ email: sports@gmail.com</p>
						</div>
					</div>
					<div class="col-lg-3">
						<h6>LIÊN HỆ</h6>
						<div class="contact">
							<div class="google"><i class="fab fa-google-plus-g"></i></div>
							<div class="facebook"><i class="fab fa-facebook-square"></i></div>
							<div class="youtube"><i class="fab fa-youtube"></i></div>
							<div class="skype"><i class="fab fa-skype"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="scrollback" id="scrollback">
				<i class="fas fa-arrow-circle-up float-right"></i>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./public/assets/js/script.js"></script>
	<script>
    // Xóa message sau 1 giây
    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 500);

	</script>
</body>

</html>