<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css">
    <title>Document</title>
    <style>
        h3 {
            font-size: 30px;
            text-align: center;
        }
        .success-btn{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .success-btn a{
            background-color:black;
            padding: 12px 24px;
            border-radius: 5px;
            color:white;    
            margin:10px;
        }
    </style>
</head>
<body>
    <h3>Order Successfully</h3>
    <div class="success-btn">
    <a href="../trang-chinh">Continue Shopping</a>
    <a href="../trang-chinh/index.php?lich-su">History</a>
    </div>
</body>
</html>