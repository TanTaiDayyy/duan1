<?php
require '../../dao/thanh-toan.php';

if (exist_param('buy')) {
    if (isset($_SESSION['user'])) {
        $ma_hh = $_POST['ma_hh'];
        $total = $_POST['total'];
        $ho_ten = $_POST['ho_ten'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $ghi_chu = $_POST['ghi_chu'];
        $ma_kh = $_POST['ma_kh'];
        $trang_thai = 0;
        $ngay_tao = '' . date("Y.m.d");
        $ngay_hoan_thanh = null;

        if (isset($_COOKIE['cart'])) {
            $cookie_data = $_COOKIE['cart'];

            $cart_data = json_decode($cookie_data, true);

            $insert_hoa_don = hoa_don_insert($ma_kh, $dia_chi, $ho_ten, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh);
            if ($insert_hoa_don) {
                $ma_hd = runSQL("SELECT MAX(ma_hd) FROM hoa_don")[0]["MAX(ma_hd)"];
                foreach ($cart_data as $key => $value) {
                    $size = $value['size'];
                    $ma_hh = $value['ma_hh'];
                    $so_luong = $value['quantity'];
                    $don_gia = $value['don_gia'];
                    $insert_hoa_don_chi_tiet = hoa_don_chi_tiet_insert($don_gia, $size, $so_luong, $ma_hd, $ma_hh);
                    if ($insert_hoa_don_chi_tiet) {
                        setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
                        if (isset($_COOKIE['cart'])) {
                            setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
                        }
                    }
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/gio-hang.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/thanh-toan.css">
    <title>Payment</title>
    <style>
        .address-form {
            flex: 0 0 70%;
            max-width: 70%;
            outline: none;
            border: 1px solid #ccc;
        }

        .payment-btn {
            margin-top: 16px;
            min-width: 240px;
            padding: 16px 36px;
            background-color: #000;
            color: #fff;
            font-size: 1.6rem;
            text-transform: uppercase;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="payment-container">
        <div class="row payment-contai">

            <div class="payment-right">
                <div class="payment-details">
                    <h3 class="payment-title">Payment Details</h3>
                    <div class="payment-list">
                        <div class="row">
                            <?php
                            $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE['cart'] : '[]';
                            $cart_data = json_decode($cookie_data, true);
                            // var_dump($cart_data);
                            $total = 0;
                            foreach ($cart_data as $sp) :
                                $giam_gia = $sp['giam_gia'] ? $sp['giam_gia'] : 0;
                                $subtotal = ($sp['don_gia'] - (($sp['don_gia'] * $giam_gia) / 100)) * $sp['quantity'];
                                $total += $subtotal;
                            ?>
                                <form class="payment-item" action="" method="POST">
                                    <input type="hidden" name="ma_hh" value="<?php echo $sp['ma_hh']; ?>">
                                    <input type="hidden" name="size" value="<?php echo $sp['size'] ?>">
                                    <div class="row payment-item">
                                        <div class="payment-img">
                                            <img src="<?= $CONTENT_URL ?>/images/products/<?php echo $sp['hinh']; ?>" alt="">
                                        </div>
                                        <div class="payment-info">
                                            <p class="itemNumber">#QUE-007544-002</p>
                                            <h3><?php echo $sp['ten_hh']; ?></h3>
                                            <div class="size">SIZE: <span><?php echo (($sp['size']) ? $sp['size'] : ''); ?></span></div>
                                            <p>
                                                <span>Quantity:
                                                    <?php echo $sp['quantity'] ?>
                                                </span>
                                                x $<?php echo $sp['don_gia']; ?>
                                            </p>
                                            <p>$<?php echo $subtotal; ?></p>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="payment-sumary">
                    <h3>ORDER SUMARY</h3>
                    <div class="subtotal">
                        <span>Subtotal</span>
                        <span>$<?php echo $total ?></span>
                    </div>
                    <div class="delivery">
                        <span>Estimated Delivery & Handling
                        </span>
                        <span>FREE</span>
                    </div>
                    <div class="total">
                        <p>TOTAL
                            (inclusive of tax 370,370₫)</p>
                        <p>
                            $<?php echo $total ?></p>
                    </div>
                </div>

            </div>
            <div class="payment-left">
                <?php
                $ma_kh = $_SESSION['user']['ma_kh'] ? $_SESSION['user']['ma_kh'] : '';
                $ten_kh = $_SESSION['user']['ho_ten'] ? $_SESSION['user']['ho_ten'] : '';
                $email = $_SESSION['user']['email'] ? $_SESSION['user']['email'] : '';
                ?>
                <form class="payment-form" action="" method="POST">
                    <input type="hidden" name="ma_kh" value="<?php echo $ma_kh ?>">
                    <input type="hidden" name="ma_hh" value="<?php echo $ma_hh ?>">
                    <input type="hidden" name="total" value="<?php echo $total ?>">

                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" name="ho_ten" id="" class="form-control" value="<?php echo $ten_kh ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="Email" name="email" id="" class="form-control" value="<?php echo $email ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="so_dien_thoai" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="dia_chi" id="" rows="4" class="form-control address-form" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">Note</label>
                        <textarea name="ghi_chu" id="" rows="9" class="form-control address-form"></textarea>
                    </div>
                    <input type="hidden" name="total" id="" value="<?= $total ?>">

                    <button type="submit" class="payment-btn" name="buy">Buy</button>
                </form>
            </div>
        </div>

    </div>
    <script>
    </script>
</body>

</html>