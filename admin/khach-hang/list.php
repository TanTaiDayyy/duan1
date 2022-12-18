<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        .row {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        ul.prod_item {
            padding: 12px 24px;
            width: 100%;
            display: flex;
            list-style: none;
            justify-content: space-between;
            align-items: center;
        }

        ul.prod_item:nth-child(2n +1) {
            background-color: #eee;
        }

        ul.prod_item li {
            text-align: center;
            width: calc(80% /7);
            overflow: hidden;
        }

        ul.prod_item li.prod-sale,
        ul.prod_item li.prod-view,
        ul.prod_item li.prod-action {
            width: 5%;
        }

        ul.prod_item li.user-image {
            width: 100px;
            height: 60px;
            overflow: hidden;
        }

        ul.prod_item li.user-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
         .title{
            text-align: center;
            display: block;
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
            border: 1px solid #1A1A1A;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3B3B3B;
            cursor: pointer;
            display: inline-block;
            font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 14px;
            font-weight: 600;
            line-height: normal;
            margin: 0;
            width: 170px;
            outline: none;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            will-change: transform;
            margin-top: 50px;
            margin: 0 auto;
            height: 44px;
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
        <h1>LIST ACCOUNT CUSTOMER</h1>
    </div>
    <div class="row">
        <ul class="prod_item">
            <li>ID</li>
            <li>Name</li>
            <li></li>
            <li class="user-image">Image</li>
            <li>Email</li>
            <li>Position</li>
            <li>Status</li>
            <li class="prod-action"></li>
            <li class="prod-action"></li>
        </ul>
        <?php
        // $items = hang_hoa_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ma_kh'] ?></li>
                <li><?= $item['ho_ten'] ?></li>
                <li></li>
                <li class="user-image">
                    <img src="<?= "$IMAGE_DIR/users/" . $item['hinh'] ?>" alt="">
                </li>
                <li><?= $item['email'] ?></li>
                <li><?= ($item['vai_tro'] == 1) ? "Admin" : "Customer" ?></li>
                <li><?= ($item['kich_hoat'] == 1) ? "Active" : "Unactive" ?></li>
                <li class="prod-action"><a href="index.php?btn_edit&ma_kh=<?= $item['ma_kh'] ?>"><i class="fa-solid fa-gear"></i></a></li>
                <li class="prod-action"><a href="index.php?btn_delete&ma_kh=<?= $item['ma_kh'] ?>"><i class="fa-solid fa-trash"></i></a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row">
        <a href="index.php" class="btn button-28">Insert</a>
    </div>
</body>

</html>