<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // Cập nhật thông tin trong tệp CSV
    $flowers = [];
    $csv = fopen('datahoa.csv', 'r');
    while (($row = fgetcsv($csv)) !== false) {
        if ($row[0] == $id) {
            $row[1] = $name;
            $row[2] = $description;
        }
        $flowers[] = $row;
    }
    fclose($csv);
    
    // Ghi lại các thay đổi vào tệp CSV
    $csv = fopen('datahoa.csv', 'w');
    foreach ($flowers as $row) {
        fputcsv($csv, $row);
    }
    fclose($csv);
    
    // Chuyển hướng về trang quản lý hoa
    header('Location: admin.php');
    exit;
}
?>
