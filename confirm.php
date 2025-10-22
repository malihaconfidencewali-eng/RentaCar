<?php include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $stmt=$conn->prepare("INSERT INTO bookings (car_id,name,email,phone) VALUES (?,?,?,?)");
    $stmt->execute([$_POST['car_id'],$_POST['name'],$_POST['email'],$_POST['phone']]);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Booking Confirmed</title>
<style>
body {font-family: Arial; background:#f5f5f5; text-align:center; padding:50px;}
.card {background:white; padding:30px; display:inline-block; border-radius:10px; box-shadow:0 0 10px #ccc;}
</style>
</head>
<body>
<div class="card">
<h2>Booking Confirmed!</h2>
<p>Thank you for booking. We will contact you shortly.</p>
<a href="index.php" style="text-decoration:none; color:#0074D9;">Back to Home</a>
</div>
</body>
</html>
