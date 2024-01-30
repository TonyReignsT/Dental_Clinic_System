<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/signup.css">
    <title>Signin</title>
</head>
<body>
    
    <div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="login">
				<form class="form" action="../../db_connection/signup.php" method="POST">
					<label for="chk" aria-hidden="true">Log in</label>
					<input class="input" type="email" name="user_email" placeholder="Email" required="">
					<input class="input" type="password" name="user_password" placeholder="Password" required="">
					<input type="hidden" name="action" value="login">
					<a href="../../src/views/dash2.html"><button>Log in</button></a>
					
				</form>
			</div>

    <div class="register">
				<form class="form" action="../../db_connection/signup_db.php" method="POST">
					<label for="chk" aria-hidden="true">Sign Up</label>
					<input class="input" type="text" name="user_name" placeholder="Username" required="">
					<input class="input" type="email" name="user_email" placeholder="Email" required="">
					<input class="input" type="text" name="user_phone" placeholder="Phone Number" required>
					<input class="input" type="password" name="user_password" placeholder="Password" required="">
					<input class="input" type="text" name="user_role" placeholder="Role" required>
					<input type="hidden" name="action" value="signup">
					<button>Sign Up</button>
				</form>
			</div>
	</div>
</body>
</html>

