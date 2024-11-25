<?php
// Lấy ID từ URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Lấy dữ liệu hoa từ file CSV
$flowers = [];
$csv = fopen('datahoa.csv', 'r');
while (($row = fgetcsv($csv)) !== false) {
    // Lưu từng dòng vào mảng
    $flowers[] = $row;
}
fclose($csv);

// Tìm hoa theo ID
$currentFlower = null;
foreach ($flowers as $flower) {
    if ($flower[0] == $id) {
        $currentFlower = $flower;
        break;
    }
}

if (!$currentFlower) {
    // Nếu không tìm thấy hoa theo ID, chuyển hướng về trang quản lý
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hoa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Sửa hoa: <?= $currentFlower[1] ?></h1>
        <form action="save_update.php" method="POST" enctype="multipart/form-data">
            <!-- Truyền ID hoa vào hidden field -->
            <input type="hidden" name="id" value="<?= $currentFlower[0] ?>">
            
            <div class="form-group">
                <label for="name">Tên hoa:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $currentFlower[1] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" required><?= $currentFlower[2] ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="image1">Ảnh 1:</label>
                <input type="file" class="form-control" id="image1" name="image1">
                <img src="flower/<?= $currentFlower[0] ?>-1.jpg" width="100" alt="Ảnh hiện tại">
            </div>
            
            <div class="form-group">
                <label for="image2">Ảnh 2:</label>
                <input type="file" class="form-control" id="image2" name="image2">
                <img src="flower/<?= $currentFlower[0] ?>-2.jpg" width="100" alt="Ảnh hiện tại">
            </div>

            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
</body>
</html>
