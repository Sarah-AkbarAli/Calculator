<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculator</title>
</head>
<body>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
     <input type ="text" name ="num1" placeholder = "Enter Number 1"/>
     <select name ="operator">
      <option value="add">+</option>
      <option value="minus">-</option>
      <option value="multiply">*</option>
      <option value="divide">/</option>
     </select>
     <input type ="text" name ="num2" placeholder = "Enter Number 2"/>
     <button>Calculate</button>
    </form>
</body>
</html> 

<?php
// Grab data from inputs
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
    $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
    $operator = htmlspecialchars($_POST["operator"]);
// Error handles (maybe check for empty / maximum no. of decimal point/ Letter)
$errors = false;
if(empty($num1) || empty($num2) || empty($operator)){
    echo "<p class='warning'>Fill in All the fields!</p>";
    $errors = true;
}
if(!is_numeric($num1) || !is_numeric($num2)){
    echo "<p class='warning'>Please enter numbers only!</p>";
    $errors = true;
}
//calculate the numbers in no errors 

if(!$errors){
    $result = 0;
switch($operator){
  case "add":
    $result = $num1 + $num2;
    break;
  case "subtract":
     $result = $num1 - $num2;
     break;  
  case "multiply":
     $result = $num1 * $num2;
     break;
  case "divide":
     $result = $num1 / $num2;
      break;
   default:
   echo "<p class='warning'>ERROR!</p>";   
}
 echo "<p class='result'>Result = ". $result . "<p>";
}
}



 