<?php 
    class Product {

        // Khai báo thuộc tính
        public $id;
        public $name;
        public $price;
        public $quantity;
        public $category_id;
        public $image_src;
        public $created_date;
        public $category_name;

        // Bỏ qua khai báo hàm _construct __destruct nếu
        // hàm không chứa nội dung, php sẽ mặc định hiểu ngầm
        // đối tượng này có sẵn 2 hàm __construct và __destruct
    }
?>