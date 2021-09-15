<!DOCTYPE html>
<html>
    <head>
        <title>Page de connexion</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <img class="logo" src="./images/Logo.png">
        <div id="frm">
            <form action="process.php" method="post">
                <p>
                    <label>Login:</label>
                    <input type="text" id="user" name="user"/>
                </p>
                <p>
                    <label>Password:</label>
                    <input type="password" id="pass" name="pass"/>
                </p>
                <p>
                    <input type="submit" id="btn" value="Login"/>
                </p>
            </form>
        </div>
    </body>
</html>