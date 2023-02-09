<?php session_start();
 ini_set('display_errors',0);
?>
<html>
<style> p { font-family:'Courier New' }
    .center { margin:auto; width:90%; border:0px solid grey; padding-left:20px;}
 .cent { margin:auto; width:85%; border:0px solid grey; }


input[type="submit"]{
    /* change these properties to whatever you want */
    background-color: lightpink;
    color: black;
    font-family:'Courier New';
    border-radius: 20px;
    width: 700px;
    height: 200px;
    font-size: 4em;}

#edit {background-color: lightgrey;
    color: black;
    border-radius: 20px;
    width: 700px;
    height: 200px;
    font-size: 4em;
    font-family: 'Courier New';

}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 30px;
  font-family:'Courier New';
  font-size: 3.4em;
  border: 1px solid #888;
  width: 80%;
}




</style>

<body style="background-color:white; font-family:'Courier New'">



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <p>

Are you sure?
Unsaved drafts will be lost.</p><br>
<div class="center">
<button id="edit" onclick="retur2()" style="font-size:1em;
background-color:lightgreen">Return to Messages</button><br>
<br>
<button id="edit" onclick="back()" style="font-size:1em;
background-color:pink">Cancel</button>

</div>
</div>

</div>

<br>
<br>
<div class="center">


<?php
$go="no";
if($_POST["input"]!=""){
$txt = $_POST["input"];
$go ="yes";
$date = date('l dS F Y h:i:s A');
$loc = 'messages/'.$_SESSION["login"]."#".$date;
$myfile = fopen($loc,"a+");
fwrite($myfile, $txt);
fclose($myfile);
}

$loc = 'messages/'.$_POST["name"];

$message = file_get_contents($loc);

?>

<script> var go = "<?php echo($go); ?>" ;


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



function retur(){

var mod = document.getElementById("myModal");
mod.style.display ="block"

//window.location.href="messenger.php";


}

function retur2(){
window.location.href="messenger.php"; }

function back(){


var mod = document.getElementById("myModal");
mod.style.display ="none"
}

if(go=="yes"){
retur2();}

var draft = function drft(){
var d = new Date()
var e = d.getTime()
var n = "draft" + e
var c = document.getElementById("input").value
download(n,c);}

var load = function ld(){
document.getElementById("fileToUpload").click()}

</script>
<form action="new.php" method="post">
<br>
<textarea style="width:850px;height:900px;font-family:'Courier New';font-size:40px"
 id="input"  name="input">
</textarea><br>
<br>
<br>
<div class="cent">
<input type="submit" value="Post Message">

<div style='height: 0px;width: 0px; overflow:hidden;'>

<input id="name" name ="name" type="text"  value="<?php echo($_POST["name"]);?>"/>
</div>
</form></div>
<div class="cent")
<br>
<button id="edit" onclick="draft()">Save Draft</button>
<br>
<br>
<button id="edit" onclick="load()">Load Draft</button>
<br>
<div style='height: 0px;width: 0px; overflow:hidden;'>
<input id="fileToUpload" name = "fileToUpload" type="file" value="upload"  />
</div>
<br>
<button id="edit"  style="background-color:lightgreen" onclick="retur()" >Return to Messages</button>
<br></div>
<br><br><br>


<script>




var edit = function edt(){


var form = document.createElement('form');
form.style.visibility = 'hidden';
form.method = 'POST';
form.action = 'edit.php';
var input = document.createElement('input');
    input.name = "name";
    input.value = name;
    form.appendChild(input);
document.body.appendChild(form);
form.submit();}

var fileInput = document.querySelector('input[type=file]');
fileInput.addEventListener('change', function(event) {
        var file = event.target.files[0];
var reader = new FileReader();
reader.readAsText(file)
reader.onload = function(){document.getElementById("input").value = reader.result;}



});


 </script>

</div>
<br>
<br>

</html>
