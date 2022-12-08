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
            margin-top: 30px;
        }

        ul.prod_item {
            padding: 12px 24px;
            width: 100%;
            display: flex;
            list-style: none;
            justify-content: flex-start;
        }

        ul.prod_item:nth-child(2n +1) {
            background-color: #eee;
        }

        ul.prod_item li {
            text-align: center;
            width: calc(100% /3);
            overflow: hidden;
        }
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
        .fa-trash{
            color: red;
        }
        .fa-gear{
            color: green;
        }
    </style>
</head>

<body>
    <div class="row title">
        <h1>LIST OF CATEGORY</h1>
        <ul class="prod_item">
            <li>Category name</li>
            <li></li>
            <li></li>
        </ul>
        <?php
        $items = loai_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ten_loai'] ?></li>
                <li><a href="index.php?btn_edit&ma_loai=<?= $item['ma_loai'] ?>"><i class="fa-solid fa-gear"></i></a></li>
                <li><a href="index.php?btn_delete&ma_loai=<?= $item['ma_loai'] ?>"><i class="fa-solid fa-trash"></i></a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row">
        <a href="index.php" class="btn button-28">Insert</a>
    </div>
</body>

</html>