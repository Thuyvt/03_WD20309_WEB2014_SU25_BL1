<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    <a href="">Tạo mới</a>
    <!-- <?php 
    echo "<pre>";
    var_dump($danhSach)?> -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Chuyên ngành</th>
                <th>Mã sinh viên</th>
                <th>Ngày sinh</th>
                <th>Hành dộng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($danhSach as $student) :?>
            <tr>
                <td><?= $student->id ?></td>
                <td><?= $student->name ?></td>
                <td><?= $student->major_name ?></td>
                <td><?= $student->account ?></td>
                <td><?= $student->date_of_birth ?></td>
                <td>
                    <a href="?action=student-detail&id=<?=$student->id?>">Chi tiết</a>
                    <a href="?action=student-detail&id=<?=$student->id?>">Sửa</a>
                    <a href="?action=student-detail&id=<?=$student->id?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>