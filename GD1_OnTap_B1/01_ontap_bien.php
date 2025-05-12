<?php 
    // 1. Khai báo biến
    // Sử dụng ký tự $ để bắt đầu khai báo biến
    $tenSanPham = "Bình hoa pha lê"; // string
    $soLuong =  9; // number
    $trangThaiHienThi = true; // boolean

    // 2. In ra giá trị của biến
    // Sử dụng echo
    // Dữ liệu sẽ bị convert về dạng string và in ra trình duyệt
    echo $tenSanPham;
    echo $trangThaiHienThi;
    echo "<br>";

    // Sử dụng var_dump
    // In ra màn hình kiểu dữ liệu và giá trị của biến
    var_dump($tenSanPham);
    var_dump($trangThaiHienThi);
    echo "<br>";

    // sử dụng echo dạng ngắn 1 dòng
    // các biến cách nhau bởi dấu ,
    echo $tenSanPham, $soLuong , $trangThaiHienThi , "<br>";
    echo "<hr>";

    // Sử dụng cho in giá trị biến kết hợp đoạn vân
    // Sử dụng dấu nháy kép để in được giá trị biến
    echo "Tên sản phẩm: $tenSanPham, số lượng: $soLuong";
    echo "<br>";
    echo 'Tên sản phẩm: $tenSanPham, số lượng: $soLuong'; // Lỗi
    echo "<br>";
    // Sử dụng dấu . để nối đoạn văn với giá trị biến
    echo "Tên sản phẩm: " .$tenSanPham. ", số lượng: " .$soLuong;
?>