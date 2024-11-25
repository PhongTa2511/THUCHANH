<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}
.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
h1 {
    text-align: center;
    color: #2c3e50; 
    font-size: 2.5em; 
    font-weight: bold; 
    text-transform: uppercase; 
    margin-bottom: 30px;
    letter-spacing: 2px; 
    background: linear-gradient(90deg, #f39c12, #e74c3c);
    background-clip: text;
    -webkit-text-fill-color: transparent; 
    position: relative;
}

h1::after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: #e74c3c;
    margin: 10px auto 0; 
    border-radius: 2px;
}
.flower-card {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding: 15px 0;
}
.flower-card img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
.flower-card img:first-child {
    margin-right: 10px;
}
.flower-info {
    flex: 1;
}
.flower-info h2 {
    margin: 0 0 10px;
    color: #444;
    font-size: 1.5em;
}
.flower-info p {
    margin: 0;
    color: #666;
    line-height: 1.5;
    font-size: 1em;
}

@media (max-width: 768px) {
    .flower-card {
        flex-direction: column;
        align-items: flex-start;
    }

    .flower-card img {
        width: 100%;
        height: auto;
        margin: 0 0 10px;
    }

    .flower-info {
        text-align: left;
    }
}
 </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">User <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>
      
</nav>
    </header>
    <div class="container">
        <h1>Danh sách các loài hoa</h1>
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

                <div class="flower-card">
                    <img src=<?=$strpath1?>>
                    <img src=<?=$strpath2?>>
                    <div class="flower-info">
                        <h2><?php echo($rs[0]);?>.<?php echo($rs[1]);?></h2>
                        <p><?php echo($rs[2]);?></p>
                    </div>
                </div>
        <?php 
    endforeach;
    ?>
        
    </div>
</body>
</html>