<?php
    include "ProductQuery.php";

    // Tạo object từ ProductQuery mở kết nối tới CSDL
    $productQuery = new ProductQuery();
    
    // Gọi hàm lấy danh sách
    echo "Danh sách sản phẩm: <br>";
    $danhSach = $productQuery->all();
    if(count($danhSach) > 0) {
        var_dump($danhSach);
    } else {
        echo "Danh sách sản phẩm trống";
    }
    echo "<hr>";

    // Gọi hàm lấy thông tin chi tiết
    echo "Chi tiết sản phẩm: <br>";
    $product01 = $productQuery->find(8);
    var_dump($product01);
    echo "<hr>";

    // Gọi hàm xóa 
    echo "Xóa thông tin sản phẩm: <br>";
    $data = $productQuery->delete(2);
    if ($data === 1) {
        echo "Xóa sản phẩm thành công <hr>";
    } else {
        echo "Xóa sản phẩm thất bại <hr>";
    }

    // Gọi hàm thêm
    echo "Thêm mới sản phẩm: <br>";
    $product02 = new Product();
    $product02->name = "OPPO R7";
    $product02->price = 43999;
    $product02->quantity = 150;
    $data01 = $productQuery->insert($product02);
    if($data01 === 1) {
        echo "Thêm thành công <hr>";
    } else {
        echo "Thêm thất bại <hr>";
    }

?>