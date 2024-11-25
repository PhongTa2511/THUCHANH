<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Student Data</h1>
    <table>
        <thead>
            <tr>
                <th>Ma sinh vien</th>
                <th>Password</th>
                <th>Ho </th>
                <th>Ten</th>
                <th>City</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include "data.php";
                $rs = getdata();
                foreach($rs as $student ):
            ?>
            <tr>
                <td><?=$student->getMSV();?></td>
                <td><?=$student->getPass();?></td>
                <td><?=$student->getHo();?></td>
                <td><?=$student->getTen();?></td>
                <td><?=$student->getCity();?></td>
                <td><?=$student->getEmail();?></td>
                <td><?=$student->getCourse();?></td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</body>
</html>
