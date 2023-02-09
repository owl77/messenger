<?php
session_start();
 ini_set('display_errors',0);
?>
<!DOCTYPE html>
<html>
<head></head>
<style> p { font-family:'Courier New' }
    .center { margin:auto; width:90%; border:1px solid grey; padding-left:20px;}


input[type="submit"]{
    /* change these properties to whatever you want */
    background-color: lightgreen;
    color: black;
    border-radius: 20px;
    width: 800px;
    height: 200px;
    font-size: 1em;
    font-family:'Courier New';
}
</style>


<?php



if(($_POST["login"]=="owl" && $_POST["pass"]=="owl") ||
($_POST["login"]=="Ozymandias" && $_POST["pass"]=="leftbirdblueLight42"))

{

$_SESSION["auth"]="yes";
if($_POST["login"]=="owl"){$_SESSION["login"]="Clarence";}
if($_POST["login"]=="Ozymandias"){$_SESSION["login"]="Isis";}

echo("<script>window.location.href='messenger.php'</script>");     }


?>
<body style="background-color:white; font-family:'Courier New';font-size:60px">
<br>
<br>
<br>
<br>
<br>

<div class="center" style="color:black">
<br>
<form action="login.php" method="post">
Username: <input type="text" id="login" name="login" style=
"color:black;font-family:'Courier New';font-size:60px">
<br>
<br><br>

 Password: <input type="text" id="pass" name="pass" style="color:black;font-family:'Courier New';font-size:60px"><br><br> &nbsp;
 <input type="submit" value="Login"></form>
<br>

</div>



</body></html>
