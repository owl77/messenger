<?php session_start();?>
<html>
<style> p { font-family:'Courier New' }
    .center { margin:auto; width:90%; border:0px solid grey; padding-left:10px;}
 .cent { margin:auto; width:80%; border:0px solid grey; }
input[type="submit"]{
    /* change these properties to whatever you want */
    background-color: lightblue;
    color: purple;
    border-radius: 20px;
    width: 300px;
    height: 70px;
    font-size: 1em;
    font-family:'Courier New';}

#edit {

 background-color: lightgrey;
    color: black;
    border-radius: 20px;
    width: 300px;
    height: 70px;
    font-size: 1em;
    font-family:'Courier New';}


#ret {
 background-color: lightgrey;
    color: black;
    border-radius: 20px;
    width:300px;
    height: 70px;
    font-size: 1em;
    font-family:'Courier New';}
    </style>
<body style="background-color:white; font-family:'Courier New';
font-size:20px">
<br>
<br>
<div class="center" style="font-size:20px">

<?php
function getname($title){return explode("#", $title)[0];}

function gtdate($title){return explode("#", $title)[1];}


echo "On ".gtdate($_POST["name"])." ".getname($_POST["name"])." wrote:";

$hide = "no";

if(getname($_POST["name"])!= $_SESSION["login"]){$hide = "yes";}

  ?>
<br>
<br>

<div class="center">
<?php
$loc = 'messages/'.$_POST["name"];
$message = file_get_contents($loc);
echo nl2br($message);


?>
<script> var message = "<?php echo($_POST["name"]);?>"
var hide = "<?php echo($hide);?>"
var edit = function edt(){


var form = document.createElement('form');
form.style.visibility = 'hidden';
form.method = 'POST';
form.action = 'dedit.php';
var input = document.createElement('input');
    input.name = "name";
    input.value = message;
    form.appendChild(input);
document.body.appendChild(form);
form.submit();}
function retur(){
window.location.href="dmessenger.php";}



 </script>

</div>
<br>
<br>

<button class = "mess" id="edit" onclick="edit()">Edit Message</button><button class = "mess" id="ret" style="background-color:lightgreen" onclick="retur()" >Return to Messages</button>
<script> if(hide=="yes"){document.getElementById("edit").style.display="none"}
</script>
<br>
<br>
</div>
</html>
