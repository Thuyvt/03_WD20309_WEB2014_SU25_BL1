<?php 
    include "Product.php";
    class ProductQuery {

        // Khai báo thuộc tính
        public $pdo;

        // Khai báo phương thức
        public function __construct() {
            try {   
                $this->pdo = new PDO("mysql:host=localhost; port=3306; dbname=03_wd20309_web2014_su25_bl1",
                 "root", "");
                echo "// Kết nối CSDL thành công <hr>";
            } catch (Exception $error) {
                echo "//Lỗi: " . $error-> getMessage();
                echo "<br>";
            }
        }
        public function __destruct() {
            // đóng kết nối với csdl
            $this->pdo = null;
        }

        // Hàm lấy danh sách
        public function all() {
            try {
                // 1. Khai báo câu lện 
                $sql = "SELECT * FROM product";

                // 2. Thực hiện truy vấn và lấy giá trị trả 
                $data = $this->pdo->query($sql)->fetchAll();
                // var_dump($data);

                // 3. Convert data sang object Product
                $danhSachSP = [];
                foreach ($data as $value) {
                    $product = new Product();
                    $product->id = $value["id"];
                    $product->name = $value["name"];
                    $product->price  = $value["price"];
                    $product->quantity = $value["quantity"];

                    // thêm object danhsachSP
                    $danhSachSP[] = $product;
                }
                return $danhSachSP;
                
            } catch(Exception $error) {
                echo "Lỗi" .$error->getMessage() . "<br>";
            }
        }

        // Hàm lấy thông tin chi tiết bằng id
        public function find($id) {
            try {
                // 1. Khai báo sql lấy chi tiết
                $sql = "SELECT * FROM `product` WHERE id = $id";

                // 2. Thực thi truy vấn và lấy giá trị
                $data = $this->pdo->query($sql)->fetch();

                // 3. Convert dữ liệu sang object Product
                // kiểm tra xem bản ghii có tồn tại hay khôn
                // Nếu không tồn tại $data == false
                if ($data !== false) {
                    $product = new Product();
                    $product->id = $data["id"];
                    $product->name = $data["name"];
                    $product->price = $data["price"];
                    $product->quantity = $data["quantity"];
                    return $product;
                } else {
                    echo "// Bản ghi không tồn tại. Vui lòng thử lại <br>";
                    return;
                }
            } catch(Exception $error) {
                echo "Lỗi: " .$error->getMessage(). "<br>";

            }
        }

        // Hàm xóa bản ghi trong csdl
        public function delete($id) {
            try {
                // 1. Câu lệnh sql
                $sql =  "DELETE FROM product WHERE `product`.`id` = $id";

                // 2. thực thi 
                $data = $this->pdo->exec($sql);
                // Lưu ý: $data = 1 nếu thành công
                // Thất bại thì nảy xuống Exception
                return $data;

            } catch(Exception $error) {
                echo "Lỗi: ". $error->getMessage(). "<br>";

            }
        }

        // Hàm xử lý thêm mới sản phẩm
        public function insert(Product $product) {
            try {

                $sql = "INSERT INTO `product` (`id`, `name`, `price`, `quantity`)
                 VALUES (NULL, '".$product->name."', '".$product->price."', '".$product->quantity."');";
                $data = $this->pdo->exec($sql);
                // Lưu ý: $data= 1 nếu thành công
                return $data;

            }catch (Exception $error) {
                echo "Lỗi: " . $error->getMessage();
            }
        }
    }
?>