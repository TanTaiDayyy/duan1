<?php
require '../../dao/hang-hoa.php';
//-------------------------------//
extract($_REQUEST);
// Truy vấn mặt hàng theo mã
$hang_hoa = hang_hoa_select_by_id($ma_hh);
extract($hang_hoa);
// Tăng số lượt xem lên 1
hang_hoa_tang_so_luot_xem($ma_hh);
// $VIEW_NAME = "hang-hoa/chi-tiet-ui.php";
// require '../layout.php';
if (exist_param('addcart')) {
    $ma_hh = isset($_POST['ma_hh']) ? $_POST['ma_hh'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    $sanpham = hang_hoa_select_by_id($ma_hh);
    extract($sanpham);
    $kh = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    if (isset($_COOKIE['cart'])) {
        // nếu đã tồn tại cookie cart thì lấy giá trị của cookie cart 
        // nếu đã tồn tại cookie cart thì lấy giá trị của cookie cart 
        $cookie_data = $_COOKIE['cart'];
        // chuyển string thành array 
        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }
    $ma_hh_ds = array_column($cart_data, 'ma_hh');

    // kiểm tra ma_hh có tồn tại trong cookie cart chưa s
    if (in_array($ma_hh, $ma_hh_ds)) {
        foreach ($cart_data as $key => $value) {
            // nếu có thì tăng có lượng sản phẩm 

            if ($cart_data[$key]['ma_hh'] == $ma_hh) {
                $cart_data[$key]['quantity'] = $cart_data[$key]['quantity'] + 1;
            }
        }
    } else {
        // nếu chưa có thì thêm vào cookie cart 
        $product_array = array(
            'ma_hh' => $ma_hh,
            'ten_hh' => $ten_hh,
            'don_gia' => $don_gia,
            'giam_gia' => $giam_gia,
            'size' => $size,
            'quantity' => 1,
            'hinh' => $hinh,
            'kh' => $kh

        );
        $cart_data[] = $product_array;
    }

    // chuyển array thành string để lưu vào cookie cart 
    $product_data = json_encode($cart_data);

    // lưu cookie 
    setcookie('cart', $product_data, time() +  3600 * 24 * 30 * 12, '/');
    echo 'successfully';
} else if (exist_param('updateqty')) {
    $ma_hh = $_POST['ma_hh'];
    $prodQty = $_POST['quantity'];
    $size = $_POST['size'];
    $kh = $_SESSION['user'];

    if (isset($_COOKIE['cart'])) {
        $cookie_data = $_COOKIE['cart'];
        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }

    $ma_hh_ds = array_column($cart_data, 'ma_hh');

    if (in_array($ma_hh, $ma_hh_ds)) {
        foreach ($cart_data as $key => $value) {
            if ($cart_data[$key]['ma_hh'] == $ma_hh) {
                $cart_data[$key]['quantity'] =  $prodQty;
            }
        }
    } else {
        $product_array = array(
            'ma_hh' => $ma_hh,
            'ten_hh' => $ten_hh,
            'don_gia' => $don_gia,
            'giam_gia' => $giam_gia,
            'size' => $size,
            'quantity' => 1,
            'hinh' => $hinh,
            'kh' => $kh
        );
        $cart_data[] = $product_array;
    }

    $product_data = json_encode($cart_data);
    setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');
} else if (exist_param('delcart')) {
    if (isset($_COOKIE['cart'])) {
        $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";;
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $key => $value) {
            if ($cart_data[$key]['ma_hh'] == $_POST['ma_hh']) {
                unset($cart_data[$key]);
                $product_data = json_encode($cart_data);

                setcookie("cart", $product_data, time() +  3600 * 24 * 30 * 12, '/');
            }
        }
    }
} else if (exist_param('deleteall')) {
    if (isset($_COOKIE['cart'])) {
        setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
    }
    echo "Delete successfully";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-COFFEE-Product</title>
    <link rel="stylesheet" href="../../content/css/style.css">
    <link rel="stylesheet" href="../../content/css/sanpham-chitiet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="product-slide">
            <p class="product-paragraph">PRODUCT DETAILS</p>
            <p class="product-child">T-COFFEE</p>
        </div>
        <form action="" class="product" method="POST">
            <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
            <div class="product-image">
                <div class="">
                    <img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" width="80%">
                </div>
            </div>
            <div class="product-infor">
                <p class="product-name"><?= $ten_hh ?></p>
                <span>Viewer : <?= $so_luot_xem ?></span> <br />
                REVIEW FOR PRODUCT
                <div class="rate"><a class="rate__star" id="rate-star-1" href="#rate-star-1"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-2" href="#rate-star-2"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-3" href="#rate-star-3"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-4" href="#rate-star-4"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-5" href="#rate-star-5"><i class="fa fa-star"></i></a>
                </div>16 customer rated

                <p class="product-describe"><?= $mo_ta ?></p>
                <p class="product-price"><?= number_format($don_gia, 0) ?> VND</p>
                <div class="button-quantity">
                    <div class="quantity">
                        <span>QUANTITY</span>
                        <input type="number" placeholder="1">
                    </div>
                    <button type="submit" name="addcart" class="button-addcart">ADD TO CART</button>
                </div>
                <div class="product-social">
                    <a class="product-fav" href="#"><i class="fa-solid fa-heart"></i> Add to favorite list</a>
                </div>
            </div>
        </form>
    </div>
    <div class="prod-cung-loai">
        <div class="row">
            <h2 class="title">related products</h2>
        </div>
        <div class="row">
            <?php require 'hang-cung-loai.php'; ?>
        </div>
    </div>
    <div class="comment">
        <div class="row">
            <h2 class="title">Comments</h2>
        </div>
        <div class="row">
            <ul class="comment-list">
                <?php require 'binh-luan.php'; ?>
            </ul>
        </div>
    </div>
</body>

</html>