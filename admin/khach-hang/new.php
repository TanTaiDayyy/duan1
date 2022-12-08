<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            display: flex;
            flex-wrap: wrap;
            max-width: 640px;
        }

        .form-group {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .vai-tro-form {
            display: flex;
            justify-content: center;
            gap: 28px;
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
        <h1>CUSTOMER MANAGEMENT</h1>
    </div>
    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="ma_kh">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="ho_ten">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="mat_khau">
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="hinh">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" />
            </div>
            <div class="form-group">
                <label for="">Position</label>
                <div class="vai-tro-form">
                    <div>
                        <input type="radio" name="vai_tro" value="1">
                        <label for="">Admin</label>
                    </div>
                    <div>
                        <input type="radio" name="vai_tro" value="0">
                        <label for="">Customer</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <select name="kich_hoat" id="">
                    <option value="1" selected>Active</option>
                    <option value="0">Unactive</option>
                </select>
            </div>
            <div class="controller">
                <div class="form-group">
                    <button type="submit" name="btn_insert">Add</button>
                </div>
                <div class="row">
                    <a href="index.php?btn_list" class="btn button-28">Customer list</a>
                </div>
            </div>

        </form>
    </div>

</body>

</html>