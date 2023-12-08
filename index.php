<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="formhandler.php" method="post">
    <label for="firstname">Firstname?</label>
    <input id="firstname" type="text" name="firstname" placeholder="Firstname...">

    <label for="lastname">Lastname?</label>
    <input id="lastname" type="text" name="lastname" placeholder="Lastname...">

    <label for="favouritepet">Favourite Pet?</label>
    <select id="favouritepet" name="favouritepet">
        <option value="none">None</option>
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="bird">Bird</option>
    </select>
    <button type="submit">Submit</button>
</form>

<?php
$a = 2;
$b = 4;

$result=match($a){
    1,3,5 => "matching odd",
    2,4,6 => "matching even",
    default => "no match",
};

echo $result . "<br>";

$fruits = [ "apple", "banana", "cherry"];
echo $fruits[1] . "<br>";
print_r ($fruits);
echo "<br>";
echo count($fruits) . "<br>";

array_splice($fruits,0,1);
echo $fruits[1] . "<br>";

array_splice($fruits, 1, 0, "kiwi");
print_r($fruits);
echo "<br>";

array_push($fruits,"mango");
print_r($fruits);
echo "<br>";

$test = ["fig", "pineapple", "plum"];
array_splice($fruits, 1,0,$test);
print_r($fruits);
echo "<br>";

$tasks = [
    "laundry" => "Daniel",
    "vacuum" => "Gina",
    "trash" => "Frank"
];
echo $tasks["trash"];
print_r($tasks);
echo "<br>";

sort($tasks);
print_r($tasks);
echo "<br>";

$tasks["dusting"] = "Tara";
print_r($tasks);
echo "<br>";

$food = [
    "meat" => array("chicken", "pork", "beef"),
    "vegetable" => array("carrot", "lettuce")
];
echo $food["meat"][0] . "<br>";


$string = "Hello World!";
echo strlen($string) . "<br>";
echo strpos($string, "o") . "<br>";

?>
</body>
</html>