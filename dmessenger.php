<?php session_start();?>
<html>
<meta charset="UTF-8">
<body style="background-color:white">
<style>
input[type="submit"]{
    /* change these properties to whatever you want */
    background-color: lightblue;
    color: purple;
    border-radius: 20px;
    width: 200px;
    height:100px;
    font-size: 1em;
    font-family:'Courier New';
}

#mess {

 background-color: lightblue;
    color: black;
    border-radius: 20px;
    width: 900px;
    height: 90px;
    font-size: 1em;
font-family:'Courier New';
}


#messsent {

 background-color: lightgrey;
    color: black;
    border-radius: 20px;
    width: 900px;
    height: 90px;
    font-size: 1em;
font-family:'Courier New';
}

#newmess {
 background-color: lightpink;
    color: green;
    border-radius: 20px;
    width: 900px;
    height: 90px;
    font-size: 2em;


font-family:'Courier New';

}
</style>

<div style="text-align:center; font-size:20px">
<br>
<br>
<br>
<br>
<br>
<script>


var gotonew = function gotn(){

window.location.href='dnew.php';

}
var viewmess = function vm(name){

var form = document.createElement('form');
form.style.visibility = 'hidden';
form.method = 'POST';
form.action = 'dmessview.php';
var input = document.createElement('input');
    input.name = "name";
    input.value = name;
    form.appendChild(input);
document.body.appendChild(form);
form.submit();}

</script>

<?php

if($_SESSION["auth"]!="yes"){

echo("<script>window.location.href='dlogin.php'</script>");     }


function getname($title){return explode("#", $title)[0];}
function gtdate($title){return explode("#", $title)[1];}

function sortFunction( $a, $b ) {
      if($a=="." || $a==".."){return -1;}
if($b=="." || $b==".."){return  1;}
    
    return (strtotime(gtdate($a)) - strtotime(gtdate($b)))   ;
}



$dir = 'messages';
$premessages = scandir($dir);

usort($premessages,"sortFunction");


foreach($premessages as $title){
if($title != "." && $title !=".."){



if(getname($title)==$_SESSION["login"]){
echo('<button id="messsent" name="'.$title.'" onclick="viewmess(this.name)">'.getname($title).' ✉ '.gtdate($title).'</button>');}

if(getname($title)!=$_SESSION["login"]){
echo('<button id="mess" name="'.$title.'" onclick="viewmess(this.name)">'.getname($title).' ✉ '.gtdate($title).'</button>');}






}



}

 ?>
<br>
<br>

<button id="newmess" onclick="gotonew()" style="font-size:22px">Compose Message</button>


</div>
</html>
