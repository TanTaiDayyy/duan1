<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .row {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        ul.prod_item {
            padding: 12px 24px;
            width: 100%;
            display: flex;
            list-style: none;
            justify-content: space-between;
        }

        ul.prod_item:nth-child(2n +1) {
            background-color: #eee;
        }

        ul.prod_item li {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            width: calc(70% / 4);
        }

        ul.prod_item li.prod-price {
            width: 10%;
        }

        ul.prod_item li.prod-sale,
        ul.prod_item li.prod-view,
        ul.prod_item li.prod-action {
            width: 5%;
        }

        ul.prod_item li.prod-image {
            width: 100px;
            height: 60px;
            overflow: hidden;
        }

        ul.prod_item li.prod-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .prod-list {
            height: 85vh;
            overflow-y: auto;
        }

        .title {
            height: 7vh;
        }

        .insert {
            height: 8vh;
            padding: 16px;
        }
        .prod-link{
            text-decoration: none;
        }
        .fa-trash{
            color: red;
        }
        .fa-gear{
            color: green;
        }

        /* CSS */
        .button-28 {
            appearance: none;
            background-color: transparent;
            border: 2px solid #1A1A1A;
            border-radius: 15px;
            box-sizing: border-box;
            color: #3B3B3B;
            cursor: pointer;
            display: inline-block;
            font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 16px;
            font-weight: 600;
            line-height: normal;
            margin: 0;
            min-height: 60px;
            width: 150px;
            outline: none;
            padding: 16px 24px;
            text-align: center;
            text-decoration: none;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            margin: 0 auto;
            will-change: transform;
            margin-bottom: 100px;
        }

        .button-28:disabled {
            pointer-events: none;
        }

        .button-28:hover {
            color: #fff;
            background-color: #1A1A1A;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);
        }

        .button-28:active {
            box-shadow: none;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <div class="row title">
        <h1>LIST PRODUCT</h1>
    </div>
    <div class="row prod-list">
        <ul class="prod_item">
            <li>Name</li>
            <li class="prod-price">Price</li>
            <li class="prod-sale">Sale</li>
            <li class="prod-image">Image</li>
            <li>Date</li>
            <li>Description</li>
            <li class="prod-view">View</li>
            <li>Type Product</li>
            <li class="prod-action"></li>
            <li class="prod-action"></li>
        </ul>
        <?php
        require '../../dao/loai.php';
        $items = hang_hoa_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ten_hh'] ?></li>
                <li class="prod-price"><?= $item['don_gia'] ?> VNĐ</li>
                <li class="prod-sale"><?= $item['giam_gia'] ?></li>
                <li class="prod-image">
                    <img src="<?= "$IMAGE_DIR/products/" . $item['hinh'] ?>" alt="">
                </li>
                <li><?= $item['ngay_nhap'] ?></li>
                <li><?= $item['mo_ta'] ?></li>
                <li class="prod-view"><?= $item['so_luot_xem'] ?></li>
                <li><?= loai_select_by_id($item['ma_loai'])['ten_loai'] ?></li>
                <li class="prod-action"><a class="prod-link" href="index.php?btn_edit&ma_hh=<?= $item['ma_hh'] ?>"><i class="fa-solid fa-gear"></i></a></li>
                <li class="prod-action"><a class="prod-link" href="index.php?btn_delete&ma_hh=<?= $item['ma_hh'] ?>"><i class="fa-solid fa-trash"></i></a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row insert">
        <a href="index.php" class="btn button-28">Insert</a>
    </div>
</body>

</html>