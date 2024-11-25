<?php
    $flowers = [];
    $csv = fopen('datahoa.csv','r');
    while(( $rs = fgetcsv($csv)) !== false){
        array_push($flowers,$rs);
    }
    fclose($csv);

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Xử lý upload ảnh
    $so = sizeof($flowers)+1;
    $imagePath1 = '';
    if (!empty($_FILES['image1']['name'])) {
        $targetDir = "flower/";
        $imagePath1 = $targetDir . strtolower($so).'-1.jpg';
        if (!move_uploaded_file($_FILES['image1']['tmp_name'], $imagePath1)) {
            echo "Lỗi khi tải ảnh 1 lên.";
            exit;
        }
    }
    $imagePath2 = '';
    if (!empty($_FILES['image2']['name'])) {
        $targetDir = "flower/";
        $imagePath2 = $targetDir . strtolower($so).'-2.jpg';
        if (!move_uploaded_file($_FILES['image2']['tmp_name'], $imagePath2)) {
            echo "Lỗi khi tải ảnh 2 lên.";
            exit;
        }
    }
    $flower = [sizeof($flowers)+1,$name,$description];
    $csvw = fopen('datahoa.csv','a');
    
        fputcsv($csvw,$flower);

    fclose($csvw);
    header("Location: hoatest.php");
    print_r($flower);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hoa mới</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Tên hoa:</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description" required></textarea>
        <label for="image2">Ảnh 1:</label>
        <input type="file" name="image1" id="image1">
       
        <label for="image2">Ảnh 2:</label>
        <input type="file" name="image2" id="image2">
        <button type="submit">Thêm</button>
    </form>
</body>
</html>