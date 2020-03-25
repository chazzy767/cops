<!DOCTYPE html>
<?php session_start(); ?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
  box-sizing: border-box;
 
 
}

body {
  background-color: #333;
  
}

#regForm {
  background-color: #333;
  margin: 100px auto;
  margin-top: 50px;
  font-family: Sans-serif;
  border-radius:25px;
  padding: 40px;
  width: 70%;
  min-width: 300px;
  color: white;
}

h1 {
  text-align: center;  
  font-size: 30px;
}
h2 {
 
  font-size: 20 px;
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: darkgray;
  color:blue;
	width:75px;
	height:45px;
	font-size:12px;
	border-radius:15px;
	cursor: pointer;
}


button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: white;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: blue;
}
</style>
<head>
 <title>Sign Up</title>
 <?php include "../scripts/head.php"; ?>
</head>
<body>
	<?php include "../scripts/navbar-logo.php"; ?>	
<form id="regForm" action="../scripts/signup-insert.php" method="post">
  <h1>SIGN UP FOR A HOUSE CHECK:</h1>
  <h2>Please fill in all of the information to confirm you live at the current address and include any other informatoin you would like us to know about</h2>
  <div class="tab">Name:
    <p><input id="inputFName" placeholder="First name..." oninput="this.className = ''" name="fname"></p>
    <p><input id="inputLName" placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
    <p><input id="inputEmail" placeholder="user@website.com" oninput="this.className = ''" name="email"></p>
    <p><input id="inputPhone" placeholder="999-999-9999" oninput="this.className = ''" name="phone"></p>
    
  </div>
  
   <div class="tab">Date of Residence's Absence
    <p><input id="inputLDate" placeholder="Leave Date (YYYY-MM-DD)" oninput="this.className = ''" name="leaveDate"></p>
    <p><input id="inputLTime" placeholder="Leave Time (HH-MM-SS)" oninput="this.className = ''" name="leaveTime"></p>
    <p><input id="inputRDate" placeholder="Return Date (YYYY-MM-DD)" oninput="this.className = ''" name="returnDate"></p>
    <p><input id="inputRTime" placeholder="Return Time (HH-MM-SS)" oninput="this.className = ''" name="returnTime"></p>
  </div>
  <div class="tab">location:
    <p><input placeholder="Address (e.g. 2132 Somerset Dr.)" oninput="this.className = ''" id= "address" name="adress"></p>
    <p><input placeholder="City (e.g. Rochester)" oninput="this.className = ''" id="city" name="city"></p>
    <p><input placeholder="State (e.g. MI)" oninput="this.className = ''" id="state" name="state"></p>
    <p><input placeholder="Zip Code (e.g. 48073)" oninput="this.className = ''" id="zip" name="zip"></p>
  </div>



  <div class="tab">Login Info:
    <p><input placeholder="Username..." oninput="this.className = ''" id="username" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" id="password" name="pword" type="password"></p>
  </div>

  <div style="overflow:auto;">
    <div style="float:bottom;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:20px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    
  </div>
</form>

<script>
var currentTab = 0; 
showTab(currentTab); 

function showTab(n) {

  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";

  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }

  fixStepIndicator(n)
}

function nextPrev(n) {
  
  var x = document.getElementsByClassName("tab");
  
  if (n == 1 && !validateForm()) return false;
 
  x[currentTab].style.display = "none";
  
  currentTab = currentTab + n;
  
  if (currentTab >= x.length) {
    
    document.getElementById("regForm").submit();
    return false;
  }

  showTab(currentTab);
}

function validateForm() {
  
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  for (i = 0; i < y.length; i++) {
    
    if (y[i].value == "" ) {
     
      y[i].className += " invalid";
    
      valid = false;
    }
  }

  
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; 
}

function fixStepIndicator(n) {

  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
 
  x[n].className += " active";
}
</script>

</body>
</html>
