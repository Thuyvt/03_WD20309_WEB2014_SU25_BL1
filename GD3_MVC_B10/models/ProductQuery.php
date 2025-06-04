<?php
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
                $sql = "SELECT pro.*, cat.name as category_name 
                    FROM product as pro 
                    JOIN category as cat
                    ON pro.category_id = cat.id;";

                // 2. Thực hiện truy vấn và lấy giá trị trả 
                $data = $this->pdo->query($sql)->fetchAll();

                // 3. Convert data sang object Product
                $danhSachSP = [];
                foreach ($data as $value) {
                    $product = new Product();
                    $product->id = $value["id"];
                    $product->name = $value["name"];
                    $product->price  = $value["price"];
                    $product->quantity = $value["quantity"];
                    $product->category_id = $value["category_id"];
                    $product->image_src = $value["image_src"];
                    $product->created_date = $value["created_date"];
                    $product->category_name = $value["category_name"];

                    // thêm object danhsachSP
                    $danhSachSP[] = $product;
                }
                return $danhSachSP;
                
            } catch(Exception $error) {
                echo "Lỗi" .$error->getMessage() . "<br>";
            }
        }

        // Thực hiện xóa trong csdl
        public function delete($id) {
            try {
                // 1. Khai báo câu sql
                $sql = "DELETE FROM product WHERE `product`.`id` = $id";

                // 2. Thực hiện câu sql
                $data = $this->pdo->exec($sql);
                // Lưu ý:$data = 1 nếu thực thi thành công
                
                // 3. Return giá trị cho controller
                return $data;

            } catch(Exception $error) {
                echo "Lỗi:" . $error->getMessage() ."<hr>";
            }
        }

        // hàm insert vào csdl
        public function insert(Product $product) {
            try {
                // 1. Khai báo sql
                $sql = "INSERT INTO `product` (`id`, `name`, `price`, 
                `category_id`, `quantity`, `image_src`, `created_date`) 
                VALUES (NULL, '".$product->name."', '".$product->price."',
                 '".$product->category_id."', '".$product->quantity."',
                  '".$product->image_src."', '".$product->created_date."');";
                // 2. Thực thi
                $data = $this->pdo->exec($sql);
                // 3. Return giá trị cho controller
                return $data;
                
            }catch (Exception $error) {
                echo "Lỗi:" .$error->getMessage();
            }
        }

        // Hàm tìm thông tin bằng id
        public function find($id) {
            try {
                // 1. Câu sql
                $sql = "SELECT * FROM product WHERE id = $id";
                // 2. Thực thi
                $data = $this->pdo->query($sql)->fetch();
                // 3. Convert data sang object
                if ($data != false ) {
                    $product = new Product();
                    $product->id = $data["id"];
                    $product->name = $data["name"];
                    $product->price  = $data["price"];
                    $product->quantity = $data["quantity"];
                    $product->category_id = $data["category_id"];
                    $product->image_src = $data["image_src"];
                    $product->created_date = $data["created_date"];

                    return $product;
                } else  {
                    echo "Không tìm thấy bản ghi, vui lòng thử lại";
                }
            } catch (Exception $error) {
                echo "Lỗi: ". $error ->getMessage();
            }
        }

        // Hàm cập nhật thông tin sản phẩm
        public function update(Product $product) {
            try {
                // 1. Khai báo sql
                $sql = "UPDATE `product` SET `name` = '$product->name',
                `price` = '$product->price', 
                `category_id` = '$product->category_id', 
                `quantity` = '$product->quantity',
                `image_src` = '$product->image_src', 
                `created_date` = '$product->created_date' 
                WHERE `product`.`id` = $product->id;";
                // 2. Thực thi
                $data = $this->pdo->exec($sql);
                // 3. Return giá trị
                return $data;
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage();
            }
        }
    }
?>