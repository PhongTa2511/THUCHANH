<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
    <style>
        /* Tổng thể */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        /* Header */
        header {
            background-color: #343a40;  /* Đen */
            padding: 10px 20px;
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: black !important; 
            font-weight: normal;
        }

        .navbar-nav .nav-item.active .nav-link {
            color: #ccc !important;
        }

        .navbar-nav .nav-link:hover {
            color: #555 !important; 
        }

        .container {
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            border-radius: 4px;
            margin-right: 10px;
        }

        .actions a {
            color: #007bff;
            margin-right: 10px;
        }

        .actions a:hover {
            color: #0056b3;
        }

        .actions a:last-child {
            color: #dc3545;
        }

        .actions a:last-child:hover {
            color: #a71d2a;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-add:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="hoatest.php">User</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>Quản lý hoa</h1>
        <a href="create.php" class="btn-add">+ Thêm hoa mới</a>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $flowers = [];
                $csv = fopen('datahoa.csv','r');
                while(( $rs = fgetcsv($csv)) !== false){
                    array_push($flowers,$rs);
                }
                fclose($csv);
            
                foreach($flowers as $rs):
                    $strpath1 = 'flower/'.$rs[0].'-1.jpg';
                    $strpath2 = 'flower/'.$rs[0].'-2.jpg';
                ?>
                    <tr>
                        <td><?php echo $rs[0]; ?></td>
                        <td><?php echo $rs[1]; ?></td>
                        <td><?php echo $rs[2]; ?></td>
                        <td>
                            <img src="<?=$strpath1?>" width="100">
                            <img src="<?=$strpath2?>" width="100">
                        </td>
                        <td class="actions">
                            <a href="update.php?id=<?= $rs[0] ?>">Sửa</a>
                            <a href="delete.php?id=<?= $rs[0] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
