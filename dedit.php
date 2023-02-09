<?php  ini_set('display_errors',0);
?>
<html>
<style> p { font-family:'Courier New' }
    .center { margin:auto; width:90%; border:0px solid grey; padding-left:20px;}
 .cent { margin:auto; width:85%; border:0px solid grey; }


input[type="submit"]{
    /* change these properties to whatever you want */
    background-color: lightgrey;
    color: black;
    font-family:'Courier New';
    border-radius: 10px;
    width: 300px;
    height:70px;
    font-size: 1em;}

#del {background-color: indianred;
    color: black;
    border-radius: 10px;
    width: 300px;
    height: 70px;
    font-size: 1em;
    font-family:'Courier New';}



</style>

<body style="background-color:white; font-family:'Courier New'">






<br>
<br>
<div class="center" style="font-size:18px">


<?php

if($_POST["delete"]!=""){
echo $_POST["delete"];
unlink($_POST["delete"]);

echo('<script>window.location.href="dmessenger.php"</script>');

}


function getname($title){return explode("#", $title)[0];}

function gtdate($title){return explode("#", $title)[1];}


echo "On ".gtdate($_POST["name"])." ".getname($_POST["name"])." wrote:";

if($_POST["input"]!=""){
$txt = $_POST["input"];
$loc = 'messages/'.$_POST["name"];

$myfile = fopen($loc,"w");
fwrite($myfile, $txt);
fclose($myfile);

echo('<script>window.location.href="dmessenger.php"</script>');

}

$loc = 'messages/'.$_POST["name"];

$message = file_get_contents($loc);

?>

<script>

var del = "<?php echo($loc);?>";
function retur(){window.location.href="dmessenger.php";}

var deletefile = function delet(x){

var form = document.createElement('form');
form.style.visibility = 'hidden';
form.method = 'POST';
form.action = 'dedit.php';
var input = document.createElement('input');
    input.name = "delete";
    input.value = x;
    form.appendChild(input);
document.body.appendChild(form);
form.submit();
}

function download(filename, text) {
    var pom = document.createElement('a');
    pom.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    pom.setAttribute('download', filename);

    if (document.createEvent) {
        var event = document.createEvent('MouseEvents');
        event.initEvent('click', true, true);
        pom.dispatchEvent(event);
    }
    else {
        pom.click();}
}

function save(){

var con = document.getElementById("input").value;
download(del,con);

}



</script>

<form action="dedit.php" method="post">
<br>
<textarea style="width:1050px;height:650px;font-family:'Courier New';font-size:18px"
 id="input"  name="input">
<?php echo($message); ?></textarea><br>
<input type="submit" value="Repost Message"><div style='height: 0px;width: 0px; overflow:hidden;float:left'>
<input id="name" name ="name" type="text"  value="<?php echo($_POST["name"]);?>"/></div></form>
<button id="del" onclick="deletefile(del)" style="float:left">Delete Message</button>
<button id="del" onclick="save()" style="background-color:lightblue;float:left">Save Message</button>
<button id="del" style="background-color:lightgreen;float:left" onclick="retur()">Return to Messages</button>

<br>
<br><br><br>


<script>


var edit = function edt(){


var form = document.createElement('form');
form.style.visibility = 'hidden';
form.method = 'POST';
form.action = 'dedit.php';
var input = document.createElement('input');
    input.name = "name";
    input.value = name;
    form.appendChild(input);
document.body.appendChild(form);
form.submit();}


 </script>

</div>
<br>
<br>

</html>
