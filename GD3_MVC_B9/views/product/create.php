<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Trang tạo mới sản phẩm</h3>
    <!-- Form nhập liệu -->
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Khu vực tên -->
        <div style="margin-bottom: 16px;">
            <span>Nhập tên:</span>
            <input type="text" name="name" value="">
        </div>
        <!-- Khu vực giá -->
        <div style="margin-bottom: 16px;">
            <span>Nhập giá:</span>
            <input type="text" name="price" value="">
        </div>
        <!-- Khu vực danh mục -->
        <div style="margin-bottom: 16px;">
            <span>Chọn danh mục:</span>
            <select name="category_id" id="">
                <?php foreach($danhSachCategory as $cat) {?>
                    <option value="<?= $cat->id ?>"> <?= $cat->name ?> </option>
                <?php } ?>
            </select>
        </div>
        <!-- Khu vực ảnh -->
        <div style="margin-bottom: 16px;">
            <div>
                <span>Đường dẫn ảnh:</span>
                <input type="text" name="image_src" value="">
            </div>
            <div>
                <span>Chọn ảnh:</span>
                <input type="file" name="file_upload" value="">
            </div>
        </div>
        <!-- Khu vực Số lượng -->
        <div style="margin-bottom: 16px;">
            <span>Nhập số lượng:</span>
            <input type="number" name="quantity" value="">
        </div>
        <!-- Khu vực giá -->
        <div style="margin-bottom: 16px;">
            <span>Nhập ngày tạo:</span>
            <input type="date" name="created_date" value="">
        </div>
        <!-- Khu vực nút -->
        <div style="margin-bottom: 16px;">
            <a href="?act=product-list">Quay lại</a>
            <button type="submit" name="submitForm">Tạo mới</button>
        </div>
        <!-- Khu vực thông báo lỗi -->
        <div style="margin-bottom: 16px; color:red;">
            <span><?= $thongBaoLoi ?></span>
        </div>
        <!-- Khu vực thông báo thành công -->
        <div style="margin-bottom: 16px; color:green;">
            <span><?= $thongBaoThanhCong ?></span>
        </div>
    </form>

</body>
</html>