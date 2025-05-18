<?php 
    // Muốn sử dụng code 1 file khác phải nhung và file đang dùng bằng include
    include "SinhVien.php";

    // Sử dụng class khởi tạo object sinh viên đầu tiên
    $sinhVien01 = new SinhVien();

    // Gán giá trị cho đối tượng $sinhVien01
    $sinhVien01->hoVaTen = "Sơn Tùng";
    $sinhVien01->namSinh = 2000;
    $sinhVien01->email = "tungsph12345@gmail.com";
    // ...
    
    // Gọi phương thức của objec
    $sinhVien01->gioiThieuBanThan();

    // Khởi tạo object sinh viên thứ 2
    $sinhVien02 = new SinhVien();

    // Gán giá trị cho $sinhVien02
    $sinhVien02->hoVaTen = "Việt Hoàng";
    $sinhVien02->namSinh = 2004;
    //...
    //Gọi phương thức của object
    $sinhVien02->gioiThieuBanThan();

?>