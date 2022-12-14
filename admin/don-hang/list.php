<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/hoadon-admin.css">
    <title>Document</title>
    <style>
        .prod_item {
            width: 100%;    
            list-style: none;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 1px black;
        }
    </style>
</head>

<body>
    <div class="row title">
        <h1>RECEIPT OF ORDER</h1>
    </div>
    <div class="row prod-list">
        <?php
        $items = hoa_don_select_all();
        foreach ($items as $item) {
            extract($item)
        ?>
            <form action="" class="update-status-form">
                <input type="hidden" id="ma_kh" name="ma_kh" value="<?= $ma_kh ?>"><input type="hidden" id="ma_hd" name="ma_hd" value="<?= $ma_hd ?>"><input type="hidden" id="ho_ten" name="ho_ten" value="<?= $ho_ten ?>"><input type="hidden" id="dia_chi" name="dia_chi" value="<?= $dia_chi ?>"><input type="hidden" id="so_dien_thoai" name="so_dien_thoai" value="<?= $so_dien_thoai ?>"><input type="hidden" id="total" name="total" value="<?= $total ?>"><input type="hidden" id="ghi_chu" name="ghi_chu" value="<?= $ghi_chu ?>"><input type="hidden" id="ngay_tao" name="ngay_tao" value="<?= $ngay_tao ?>">
                <div class=" prod_item ">
                    <li class="id"><?= $ma_hd ?></li>
                    <li class="user-info"><?= $ho_ten ?></li>
                    <li class="user-info"><?= $so_dien_thoai ?></li>
                    <li class="user-info"><?= $dia_chi ?></li>
                    <li class="products">
                                    <?php $listSP = runSQL("SELECT hoa_don_chi_tiet.don_gia, hoa_don_chi_tiet.so_luong, hoa_don_chi_tiet.ma_hh, hang_hoa.ten_hh, hang_hoa.giam_gia FROM hoa_don_chi_tiet JOIN hang_hoa on hoa_don_chi_tiet.ma_hh = hang_hoa.ma_hh WHERE ma_hd=" . $ma_hd);
                                    foreach ($listSP as $x) : ?>
                                <li>
                                    <div class="receipt-item">
                                        <div class="info">
                                            <h4><a style="text-decoration: none;" href="../../site/trang-chinh/index.php?chi-tiet&ma_hh=<?= $x["ma_hh"] ?>" target="_blank" rel="noopener noreferrer"><?= $x['ten_hh'] ?></a>
                                                <span style="font-weight: lighter; color: #555;"></span>
                                            </h4>
                                            <div class="qty">
                                                <p class="subtotal">
                                                    <?= $x['don_gia'] ?> VNĐ
                                                </p>
                                                <span>
                                                    x <?= $x['so_luong'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    <?php endforeach ?>
                    </li>
                <li class="total"><?= $total ?> VNĐ</li>
                <li class="status">
                    <select name="trang_thai" id="">
                        <option value="0" <?php echo ($trang_thai == 0) ? "selected" : "" ?>>Unconfirm</option>
                        <option value="1" <?php echo ($trang_thai == 1) ? "selected" : "" ?>>Processing</option>
                        <option value="2" <?php echo ($trang_thai == 2) ? "selected" : "" ?>>Delivery</option>
                        <option value="3" <?php echo ($trang_thai == 3) ? "selected" : "" ?>>Finished</option>
                        <option value="4" <?php echo ($trang_thai == 4) ? "selected" : "" ?>>Cancel</option>
                    </select>
                </li>
                <li class="action"><a href=""><i class="fa-regular fa-trash-can"></i></a></li>
                </div>
            </form>
        <?php } ?>
    </div>
    <script>
        const updateStatusForm = document.querySelectorAll('.update-status-form')

        updateStatusForm.forEach(up => {
            up.onsubmit = (e) => {
                e.preventDefault();
            }
            up.querySelector('select').onchange = () => {
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "./update.php?update_status", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            alert(data)
                        }
                    }
                };
                let formData = new FormData(up); //create new formData
                xhr.send(formData); //send formData to PHP
            }
            up.querySelector('.action a').onclick = (e) => {
                e.preventDefault();
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "./delete.php?btn_delete", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            // alert(data)
                            up.remove();
                        }
                    }
                };
                let formData = new FormData(up); //create new formData
                xhr.send(formData); //send formData to PHP
            }
        })
    </script>
</body>

</html>