<?php include 'db.php';
$id=$_GET['id']??0;
$stmt=$conn->prepare("SELECT * FROM cars WHERE id=?");
$stmt->execute([$id]);
$car=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$car){die("Car not found");}
?>
<!DOCTYPE html>
<html>
<head>
<title>Book Car</title>
<style>
body {font-family: Arial; background:#f5f5f5;}
form {background:white; width:50%; margin:20px auto; padding:20px; border-radius:10px; box-shadow:0 0 10px #ccc;}
input {padding:10px; width:90%; margin:5px; border:1px solid #ccc; border-radius:5px;}
button {padding:12px 20px; background:#0074D9; color:white; border:none; border-radius:5px; cursor:pointer;}
</style>
</head>
<body>
<h2 style="text-align:center;">Book <?php echo $car['brand'].' '.$car['model']; ?></h2>
<form method="post" action="confirm.php">
<input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
<input type="text" name="name" placeholder="Your Name" required><br>
<input type="email" name="email" placeholder="Your Email" required><br>
<input type="text" name="phone" placeholder="Phone Number" required><br>
<button type="submit">Confirm Booking</button>
</form>
</body>
</html>
