<!DOCTYPE html>
<html lang="en">
<head>
	<title>Votre compte</title>
	<link rel="stylesheet" href="../styles/style.css">
</head>
<body>
	<div class="wrapper">
			<nav class="navbar">
				<ul>
					<li><a class="active" href="index.php">Acceuil</a></li>
                    <li><a href="inscription.php">Deconnexion</a></li>
				</ul>
			</nav>
			<div class="center">
            <?php
            $connect = mysqli_connect('localhost','root','', 'login') or die("Erreur de connexion a MySQL");
            $username = mysqli_real_escape_string($connect,$_POST['user']);
            $password = mysqli_real_escape_string($connect,$_POST['pass']);
            mysqli_select_db($connect,'login');
            $result = mysqli_query($connect, "select * from users where username = '$username' and password = '$password'")
            or die("Impossible de récupérer les informations ".mysqli_error());
            $row = mysqli_fetch_array($result);
            if ($row['username'] == $username && $row['password'] == $password ){
                echo '<h2 align="left">Connexion réussie! Bienvenue sur votre compte '.$row['username'],'</h2>' ;
                echo '<table cellpadding="5" cellspacing="5">';
                $conn = mysqli_connect('localhost','root','', 'login');
                if($conn-> connect_error){
                    die("connection failed:". $conn-> connect_error);
                }
                $sql = "SELECT Nom, ingredient, photo FROM recette, users where users.username = recette.idmembre and users.username = '$username'";
                $resul = $conn -> query($sql); 
                echo"<tr><th> Nom </th><th> Ingrédients </th><th> Photo </th></tr>"; 
                if ($resul -> num_rows > 0){
                    while($row = $resul -> fetch_assoc()){
                        echo'<tr bgcolor="lightgray"><td>'. $row["Nom"] . "</td><td>". $row["ingredient"] . '</td><td><img src="data:image;base64,'.base64_encode($row['photo']).'" alt="picture style="width:3%; height:3%;"></td></tr>';
                    }
                    echo"</table>";
                }else {
                    echo" 0 resultats. ";
                }
                $conn -> close();
            }else
            {
                echo "<h2 style=color:'red'>Connexion refusée! Réessayer de nouveau.</h2>";
            }
            ?>
            <style>
                table {
                    width : 100%;
                    color : black;
                    font-family: monospace;
                    font-size: 20px;
                    text-align:left;
                    border = 1;
                    border-color: black;
                }
                th {
                    background-color: #588c7e;
                    color:white;
                }
                
            </style>
		</div>
		</div>
</body>
</html>
