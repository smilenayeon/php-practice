<?php
declare(strict_types=1);  //just like typescript, it becomes strict to type of data. look at line 123
session_start(); //starting the session so user gets session-id-cookie that website can rember who that user is while the session is open
$_SESSION["username"]="diana"; //then this data will be remember on the server on any page with session_start() 
//session_unset(); // remove all of the session data
//unset($_SESSION["username"]); //remove one session data
session_destroy(); //stop the session from running again on another page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   echo "<h1>" . $_SESSION["username"] . "</h1>";
    ?>

    <h3>Sign up</h3>
    <form action="includes/signupformhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd" placeholder="passowrd">
        <input type="text" name="email" placeholder="email">
        <button>Sign up</button>

    </form>

    <h3>Change Account</h3>
    <form action="includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <input type="text" name="email" placeholder="email">
        <button>Update</button>
    </form>

    <h3>Delete Account</h3>
    <form action="includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <button>Delete</button>
    </form>

    <h3>Search Comments</h3>
    <form class="searchform" action="search.php" method="post">
        <label for="search">search for username: </label>
        <input id="serach" type="text" name="usersearch" placeholder="Search...">
        <button>Search</button>
    </form>

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
echo count($food["meat"])  . "<br>"; //get 3
array_pop($food["meat"]);
print_r($food["meat"]);
echo "<br>";
print_r(array_reverse($food["meat"]));
echo "<br>";

$string = "Hello World!";
echo strlen($string) . "<br>";
echo strpos($string, "o") . "<br>";
echo str_replace("World", "Diana", $string) . "<br>";
echo strtolower($string) . "<br>";
echo strtoupper($string) . "<br>";
echo substr($string, 0, 5) . "<br>";
echo substr($string, 6, -1) . "<br>";
print_r( explode("e", $string)); //get [H] and [llo World!] -- explodes the given letter of the string and give the cut strings into arrays.
echo "<pre>";

$number=-5.5;
echo abs($number) . "<br>"; // give 5.5 --just give the absolute value
echo pow(2,3) . "<br>";
echo sqrt(16)  . "<br>";
echo rand(1,10) . "<br>";


$array1= ["a", "b","c"];
$array2=["d","e","f"];
print_r(array_merge($array1, $array2));
echo "<pre>";

echo date("Y-m-d H:i:s") . "<br>"; // current date year-month-date hour-minuite-second
echo time() . "<br>"; // shows how many seconds passed from 1970. January, 1st--aka unix time stamp
$date = "2023-04-11 12:00:00";
echo strtotime($date); // 1970,January,1st~ the given  date and time in seconds.
echo "<pre>";

$globalScopeVar = "yay";
function sayHello( string $name){    //customed function
    global $globalScopeVar;   //how to bring the global scope data to use in the function. without this it will get error saying, $globalScopeVar is undefined
    return "Hello " .  $name ."!" . $globalScopeVar . "!";
}
$call=sayHello("Diana"); //must put string as the parameter
echo $call . "<br>";

function add (int $num01, int $num02){
    return $result = $num01 + $num02;
}
$doMath = add(1,4);
echo $doMath . "<br>";

function myfunction(){
    static $staticNumber =  0; //by having "static" in front of the var it keeps the changed value
    $staticNumber++;
    return $staticNumber;
}

echo myfunction(); //1
echo myfunction(); //2
echo myfunction();//3

echo "<pre>";

define("PI", 3.14); //defining constant  aka const ,, const always in all Uppercase!
echo PI;
echo "<pre>";

for ($i=0; $i<5; $i++) {
    echo "This is round " . $i . "<br>";
};

$whileNum=5;
while($whileNum<10){
    echo $whileNum;
    $whileNum++;
}
echo "<pre>";

$doWhileNum = 10;
do{    //do while loop, even though the condition is not true, it will spit out one round
    echo $doWhileNum;
    $doWhileNum++;
}while ($doWhileNum<10);
echo"<pre>";

$toys = ["bear", "robot", "blocks", "doll"];
foreach($toys as $toy){
    echo $toy . " ";
}
echo "<pre/>";

$animals = ["rabbit" => "white", "bear"=>"brown", "hippo" => "purple"];
foreach($animals as $animal =>$color){
    echo $animal . " is " . $color . "!" . "<br>";
};


?>
</body>
</html>
