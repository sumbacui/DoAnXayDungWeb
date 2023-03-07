<style>
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

.col-25 {
  -ms-flex: 35%; /* IE10 */
  flex: 35%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 65%; /* IE10 */
  flex: 65%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.input-form-pay {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<div class="container mb-5">
    <div class="heading-link mt-3">
         <ul class="item">
              <li class="home">
                   <a href="?url=home">Trang chủ</a>
              </li>
              <li class="icon">
                   <a style="color:black;" href="?url=cart">Giỏ hàng</a>
              </li>
         </ul>
    </div>
    <div class="heading-lg">
         <h1>THANH TOÁN</h1>
    </div>
    <div class="row mt-4">
        <div class="col-75">
          <div class="container">
            <?php $total = 0; ?>
            <?php foreach($_SESSION['shopping_cart'] as $item): ?>
              <?php $total+= $item['item_price'] * $item['item_qty']; ?>
            <?php endforeach; ?>
            <form action="?url=product/pay" method="POST" id="checkout-form">
              <input type="hidden" name="amount" value="<?= $total ?>" />
              <input type="hidden" name='currency_code' value='VND'> 
              <div class="row">
                <div class="col-50">
                  <h4 class="mb-4">Thông tin người thanh toán</h4>
                  <label for="name"><i class="fa fa-user"></i> Họ tên</label>
                  <input type="text" id="name" name="name" class="input-form-pay" value="<?= $data['customer']['name'] ?>" readonly>
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" class="input-form-pay" value="<?= $data['customer']['email'] ?>" readonly>
                  <label for="phone"><i class="fas fa-phone"></i> Số điện thoại</label>
                  <input type="text" id="phone" name="phone" class="input-form-pay" value="<?= $data['customer']['phone'] ?>" readonly>
                  <label for="address"> Địa chỉ</label>
                  <input type="text" id="address" name="address" class="input-form-pay" required>
                </div>
              </div>
              <input type="submit" name="btnSubmit" value="Đặt hàng" class="btn mt-4">
            </form>
          </div>
        </div>
        <div class="col-25">
          <div class="container">
            <h4>Giỏ hàng <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?= isset($_SESSION['shopping_cart']) ? array_sum(array_column($_SESSION["shopping_cart"], 'item_qty')) : '' ?></b></span></h4>
            <?php $total = 0; foreach ($_SESSION['shopping_cart'] as $product): ?>
                <p><a href="?url=product/detail/<?= $product['item_id'] ?>"><?= strlen($product['item_name']) > 20 ? substr($product['item_name'],0,20)."..." : $product['item_name'] ?></a> <span class="price"><?= number_format($product['item_price'] * $product['item_qty'],-3,',',',') ?> đ</span></p> 
            <?php $total+= $product['item_price'] * $product['item_qty']; endforeach; ?>
            <hr>
            <p>Tổng tiền <span class="total-cart" style="color:black"><b><?= number_format($total,-3,',',',') ?> VND</b></span></p>
          </div>
        </div>
      </div>
</div>