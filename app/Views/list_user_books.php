<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h2>Tabs</h2>
  <p>Tabs are perfect for single page web applications, or for web pages capable of displaying different subjects. Click on the links below.</p>
</div>

<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" onclick="openCity('London')">Books</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Paris')">Completed Offers History</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Completed Offers History</button>
</div>

<div id="London" class="w3-container city">
  <h2>Books</h2>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="w3-container city" style="display:none">
  <h2>Waiting Offer</h2>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="w3-container city" style="display:none">
  <h2>Completed Offers History</h2>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>

</body>
</html>
