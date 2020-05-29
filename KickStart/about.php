<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php require 'header-links.php' ?>
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
</head>
<body>
<?php require 'navbar.php' ?>

<h2 style="color:#286090">FAQ</h2>

<button class="accordion">1. How to create a class ?</button>
<div class="panel">
  <p>     First Register with your respective email-id and password and then after signing in you can create a class.</p>
</div>

<button class="accordion">2. What type of Classes you can create on KickStart ?</button>
<div class="panel">
  <p>     You can create Online Classes, Live Classes or Youtube Class</p>
</div>

<button class="accordion">3. What is Youtube Class ?</button>
<div class="panel">
  <p>     In Youtube Class you can upload your video on Youtube, provide the link to KickStart and from here you can directly invite your students through Whatsapp.</p>
</div>

<button class="accordion">4. How can we join a class on KickStart ?</button>
<div class="panel">
  <p>     Using your name, meeting id and password you can join any class or meeting on KickStart.</p>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</body>
</html>
