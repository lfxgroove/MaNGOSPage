<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MaNGOSPage</title>
    <meta name="description" content="Registration page for MaNGOS">
    <meta name="keywords" content="World of Warcraft, WoW, registration, page, MaNGOS, MaNGOSPage">
    
    <!-- Do not remove or edit this copyright! -->
    <meta name="author" content="GiantCrocodile">
    <meta name="application-name" content="MaNGOSPage">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS of Bootstrap 3 -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                <form id="registration_form" name="registration" action="index.php" method="POST">
                    Username:
                    <input class="form-control" type="text" name="username" maxlength="32" required> <br>
                    Password:
                    <input class="form-control" type="password" name="password" maxlength="32" required> <br>
                    Email:
                    <input class="form-control" type="email" name="email" required> <br>
                    Expansion: <br>
                    <select class="form-control" name="expansion" size="1" required>
                        <option value="0">Classic</option>
                        <option value="1">Burning Crusade</option>
                        <option value="2">Wrath of the Lich King</option>
                        <option value="3">Cataclysm</option>
                    </select>
                    <br>
                    <button class="btn btn-default" type="submit" name="submit">Register</button>
                    
                <?php
                
                if (isset($_POST["submit"], $_POST["username"], $_POST["password"], $_POST["email"], $_POST["expansion"]))
                    {
                        if (!(preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"]) == '0'))
                        {
                            if (!(preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]) == '0'))
                            {
                                if (!(preg_match('/^[a-zA-Z0-9\.\_\@]+$/', $_POST["email"]) == '0'))
                                {
                                    if (!(preg_match('/^[0-3]+$/', $_POST["expansion"]) == '0'))
                                    {
                                        if (strlen($_POST["username"]) <=32 && strlen($_POST["password"]) <=32)
                                        {
                                            include "mysql.php";
                                            $sql = "SELECT * FROM `account` WHERE `username` = '{$_POST["username"]}'";
                                            $res = $connection->query($sql);
                                            $numrows = $res->num_rows;

                                            if ($numrows === 0)
                                            {
                                                include "functions.php";
                                                add_account();
                                                echo "<div id=\"registration_success\" class=\"alert alert-success\">Your account has been created!</div>\n";
                                            }
                                            else
                                            {
                                                    echo "<div id=\"registration_error\" class=\"alert alert-danger\">Username is already taken!</div>\n";
                                            }
                                        }
                                        else
                                        {
                                            echo "<div id=\"registration_error\" class=\"alert alert-danger\">Username or password too long!</div>\n";
                                        }
                                    }
                                    else
                                    {
                                        echo "<div id=\"registration_error\" class=\"alert alert-danger\">Selected Expansion is invalid!</div>\n";
                                    }
                                }
                                else
                                {
                                    echo "<div id=\"registration_error\" class=\"alert alert-danger\">E-Mail is invalid!</div>\n";
                                }
                            }
                            else
                            {
                                echo "<div id=\"registration_error\" class=\"alert alert-danger\">Password is invalid!</div>\n";
                            }
                        }
                        else
                        {
                            echo "<div id=\"registration_error\" class=\"alert alert-danger\">Username is invalid!</div>\n";
                        }
                    }
                ?>
                </form>
            </div>
        </div>
        
        <!-- Do not remove or edit this copyright! -->
        <div class="row">
            <div class="col-md-12">
                <div id="footer" class="navbar-default navbar-fixed-bottom">
                    &copy; Coded by <a href="https://github.com/giantcrocodile">GiantCrocodile</a> | <a href="http://getmangos.co.uk/">Made for MaNGOS</a> | 2014 | Version: 1.0.0
                </div>
            </div>
        </div>
    </div>
    
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>

</html>