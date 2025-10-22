<?php include 'db.php'; 
$location=$_GET['location']??'';
$start=$_GET['start']??'';
$end=$_GET['end']??'';
?>
<!DOCTYPE html>
<html>
<head>
<title>Available Cars</title>
<style>
body {font-family: Arial; background:#f5f5f5;}
header {background:#0074D9; color:white; padding:15px; text-align:center;}
.cars {display:grid; grid-template-columns:repeat(auto-fit, minmax(300px,1fr)); gap:15px; padding:20px;}
.car {background:white; border-radius:10px; padding:15px; box-shadow:0 0 10px #ccc;}
.car img {width:100%; border-radius:10px;}
.car h3 {margin:10px 0;}
.car button {background:#28a745; color:white; border:none; padding:10px; border-radius:5px; cursor:pointer;}
</style>
<script>
function bookCar(id){
    window.location.href='book.php?id='+id;
}
</script>
</head>
<body>
<header><h1>Available Cars in <?php echo htmlspecialchars($location); ?></h1></header>
<div class="cars">
<?php
$stmt=$conn->query("SELECT * FROM cars");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='car'>
    <img src='{$row['image']}' alt='Car'>
    <h3>{$row['brand']} {$row['model']}</h3>
    <p>\${$row['price_per_day']} / day</p>
    <p>{$row['fuel_type']} | {$row['car_type']}</p>
    <button onclick='bookCar({$row['id']})'>Book Now</button>
    </div>";
}
?>
</div>
</body>
</html>
