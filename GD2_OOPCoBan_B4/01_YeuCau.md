# THÔNG TIN ĐĂNG NHẬP:
usename: root
password: để trống

# 1. Tạo database
- Tạo db: wd20309
- Tạo table: product
- Tạo column trong table: id, name, price, quantity

# 2. Tạo class thể hiện đối tượng
- Tên class: Product
- Thuộc tính: id, name, price, quantity
- Phương thức: displayProductInfor()

# 3. Tạo class giúp Product tương tác với database
- Tên class: ProductQuery
- Thuộc tính: pdo
- Phương thức: find($id), all()

# 4: Tạo object sử dụng class ProductQuery để kiểm tra các phương thức tương tác với database