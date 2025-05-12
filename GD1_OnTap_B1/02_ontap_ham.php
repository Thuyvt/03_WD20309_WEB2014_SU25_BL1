<?php 
    try {
        $br = "<br>";
        $hr = "<hr>";

        // VD: hàm tính diện tích hình cn
        $chieuDai = 10;
        $chieuRong = 5;

        // 1.1 Sử dựng không tham số, không giá trị trả về
        function hamKieu01() {
            // global để truy cập các biến bên ngoài hàm, trong file
            global $chieuDai, $chieuRong, $br;
            $dienTich = $chieuDai * $chieuRong;
            echo "Diện tích: $dienTich";
            echo $br;
        }

        // Gọi hàm
        hamKieu01();

        //1.2 Sử dụng hàm có tham số, không giá trị trả
        function hamKieu02($thamSoChieuDai, $thamSoChieuRong) {
            $dienTich = $thamSoChieuDai * $thamSoChieuRong;
            echo "Diện tích: $dienTich";
        }
        // gọi hàm
        hamKieu02($chieuDai, $chieuRong);
        echo $br;

        // 1.3 Sử dụng hàm có tham số, có giá trị trả về
        function hamKieu03($thamSoChieuDai, $thamSoChieuRong) {
            // $dienTich = $thamSoChieuDai * $thamSoChieuRong;
            return $thamSoChieuDai*$thamSoChieuRong;
        }
        $dienTich = hamKieu03($chieuDai, $chieuRong);
        echo "Diện tích: $dienTich";
        echo "<br>";
        echo "Diện tích: " . hamKieu03($chieuDai, $chieuRong);

    } catch(Exception $e) {
        echo "Exeption: " .$e->getMessage();
    }
?>