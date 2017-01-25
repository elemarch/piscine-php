<?php
session_start();
$log = "";
$pwd = "";

if (isset($_SESSION["login"]))
    $log = $_SESSION["login"];
if (isset($_SESSION["passwd"]))
    $pwd = $_SESSION["passwd"];

if (isset($_GET["login"]) && isset($_GET["passwd"]) && isset($_GET["submit"]))
{
    if ($_GET["submit"] == "OK")
    {
        $_SESSION['login'] = $_GET["login"];
        $_SESSION['passwd'] = $_GET["passwd"];
        $log = $_GET["login"];
        $pwd = $_GET["passwd"];
    }
}

?>


<html>
    <head>
        <title>j04 - ex00</title>
    </head>
    <body>

        <form>
            Login
            <input type="text" name="login" value="<?php echo $log;?>"/>
            <br>
            Password
            <input type="password" name="passwd" value="<?php echo $pwd; ?>">
            <br>
            <input type="submit" name="submit" value="OK">
        </form>

    </body>
</html>