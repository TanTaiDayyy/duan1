<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
            margin-top: 15px;
            margin-left: -50px;
            height: 44px;
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

        .controller {
            display: flex;
            margin-top: 20px;
            margin-left: -150px;
        }
    </style>
</head>

<body>
<div class="row title">
        <h1>PRODUCT ADD ITEM</h1>
    </div>
    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="ten_hh">
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" name="don_gia">
            </div>
            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" name="hinh">
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <textarea type="text" name="mo_ta"></textarea>
            </div>
            <div class="form-group">
                <label for="">Product Speacial</label>
                <input type="text" name="dac_biet">
            </div>
            <div class="form-group">
                <label for="">Time</label>
                <input type="text" name="ngay_nhap" placeholder="yyyy/mm/dd">
            </div>
            <div class="form-group">
                <label for="">Views</label>
                <input type="text" name="so_luot_xem">
            </div>
            <div class="form-group">
                <label for="">Product Category</label>
                <select type="text" name="loai_hang">
                    <?php
                    require_once "../../global.php";
                    require_once "../../pdo.php";
                    require_once "../../dao/loai.php";
                    $items = loai_select_all();
                    foreach ($items as $item) { ?>
                        <option value="<?= $item['ma_loai'] ?>"><?= $item['ten_loai'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="controller">
                <div class="form-group">
                    <button type="submit" name="btn_insert">Add</button>
                </div>
                <div class="row">
                    <a href="index.php?btn_list" class="btn button-28">List of Product</a>
                </div>
            </div>

        </form>
    </div>

</body>

</html>