<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


	<div class="container">
		<form action="php/create.php" 
		      method="post">
		   <h4 class="display-4 text-center">Account Maken</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">Naam</label>
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" 
		           placeholder="Naam">
		   </div>
		   <div class="form-group">
		     <label for="pw">Wachtwoord</label>
		     <input type="password" 
		           class="form-control" 
		           id="pw" 
		           name="pw" 
		           value="<?php if(isset($_GET['pw']))
		                           echo($_GET['pw']); ?>" 
		           placeholder="Wachtwoord">
		   </div>
		   <div class="form-group">
		     <label for="hpw">Herhaal Wachtwoord</label>
		     <input type="password" 
		           class="form-control" 
		           id="pw" 
		           name="hpw" 
		           value="<?php if(isset($_GET['hpw']))
		                           echo($_GET['hpw']); ?>" 
		           placeholder="Herhaal Wachtwoord">
		   </div>
		   <div class="form-group">
		     <label for="email">Email</label>
		     <input type="email" 
		           class="form-control" 
		           id="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))
		                           echo($_GET['email']); ?>"
		           placeholder="Email">
		   </div>

		   <button type="submit" 
		          class="btn btn-success"
		          name="create">Bevestig</button>
		    <a href="read.php" class="btn btn-danger">Annuleer</a>
	    </form>
	</div>
</body>
</html>