<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <style>
        form {
            display: flex;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 0 0 100%;
            max-width: 100%;
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
        <h1>CATEGORY ADD ITEM</h1>
    </div>
    <div class="row">
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="">Category name</label>
                <input type="text" name="loai_hang">
            </div>
            <div class="controller">
                <div class="form-group">
                    <button type="submit" name="btn_insert" class="btn">Add</button>
                </div>
                <div class="row">
                    <a href="index.php?btn_list" class="btn button-28">List of Category</a>
                </div>
            </div>

        </form>
    </div>

</body>

</html>