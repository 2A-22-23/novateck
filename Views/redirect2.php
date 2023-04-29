<!DOCTYPE html>
<html>
<head>
	<title>Booking successful</title>
	<style>
		 body {
            background-image: url('header-bg.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #444;
        }
		.container {
			margin: 50px auto;
			padding: 40px 30px;
			background-color: #fff;
			box-shadow: 0 0 20px rgba(0,0,0,0.1);
			border-radius: 10px;
			max-width: 500px;
			text-align: center;
		}
		h1 {
			font-size: 36px;
			margin-bottom: 20px;
			color: #4CAF50;
		}
		p {
			font-size: 24px;
			margin-top: 20px;
			color: #777;
			line-height: 1.5;
		}
		a {
			display: inline-block;
			margin-top: 30px;
			padding: 15px 30px;
			background-color: #4CAF50;
			color: #fff;
			font-size: 18px;
			font-weight: bold;
			text-decoration: none;
			border-radius: 5px;
			transition: all 0.2s ease-in-out;
		}
		a:hover {
			background-color: #3e8e41;
			transform: translateY(-3px);
			box-shadow: 0 5px 10px rgba(0,0,0,0.2);
		}
		.cancel {
			background-color: #f44336;
			margin-left: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Booking successful</h1>
		<p>Your booking has been successfully confirmed.</p>
		<a href="index.php">Back to Homepage</a>
        <a href="afficheannulebook.php" class="cancel">Cancel</a>
	</div>
</body>
</html>
