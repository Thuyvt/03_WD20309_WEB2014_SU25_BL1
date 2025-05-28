<?php       
    // 1. Nhúng tất cả các file cần dùng
    // include "models/Category.php";
    // include "models/CategoryQuery.php";
    include "models/Product.php";
    include "models/ProductQuery.php";

    include "controllers/ProductController.php";

    // 2 Lấy các giá trị cần thiết từ url
    // Lấy giá trị act
    $act = "";
    if(isset($_GET["act"])) {
        $act = $_GET["act"];
    }
    echo "Giá trị act là: $act<hr>";

    $id = "";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    echo "Giá trị id là: $id <hr>";

    // Điều hướng
    match ($act) {
         '' =>  '',
         'product-list' => (new ProductController)->list(),
         'product-create' => (new ProductController)->create(),
         'product-detail' => (new ProductController)->detail($id),
         'product-update' => (new ProductController)->update($id),
         'product-delete' => (new ProductController)->delete($id)
    };


?>