<?php
    // 1. Khai báo mảng 1 chiều
    $danhSachNamSinh = [2000, 2001, 2004];
    $danhSachTen = array("Nguyễn Văn A", "Nguyễn Thị B", "Trần Văn C");

    // 2. Duyệt mảng 1 chiều
    foreach($danhSachTen as $item ) {
        echo $item;
        echo "<br>";
    }
    echo "<hr>";

    // Khai báo hàm duyệt mảng để dử dụng nhiều lần
    function duyetMang1Chieu($thamSoMang) {
        foreach($thamSoMang as $item ) {
            echo $item;
            echo "<br>";
        }
        echo "<hr>";
    }

    // gọi hàm
    duyetMang1Chieu($danhSachNamSinh);

    // 3. Thêm phần tử vào cuối mảng
    array_push($danhSachTen, "Cuối cùng");
    duyetMang1Chieu($danhSachTen);

    // 4. Xóa phần tử cuối của mảng
    array_pop($danhSachTen);
    duyetMang1Chieu($danhSachTen);

    // 5 Xóa phần tử khỏi mảng theo vị trí/index 
    unset($danhSachTen[1]);
    duyetMang1Chieu($danhSachTen);
?>
