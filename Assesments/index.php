<?php
//1 ans
$length = 10;   
$width  = 5;    


$area = $length * $width;
$perimeter = 2 * ($length + $width);
echo "Length: {$length} <br>";
echo "Width:{$width}<br>";
echo "Area :{$area}<br>";
echo "Perimeter:{$perimeter}<br>";
echo"<br>";

//2 ans
$amount = 200;  
$vatRate = 0.15; 
$vat = $amount * $vatRate;

echo "Amount:{$amount}<br>";
echo "VAT (15%):{$vat} <br>";
echo"<br>";
//3 ans
$a=404;
if ($a%2==0) {
    echo "Even number <br>";
} else {
    echo "odd number <br>";
}
echo"<br>";
//4ans

$a = 10;
$b = 25;
$c = 15;

if ($a >= $b && $a >= $c) {
    echo "$a is the larg number.";
} elseif ($b >= $a && $b >= $c) {
    echo "$b is the larg number.";
} else {
    echo "$c is the larg number.";
}
 echo"<br>";

//5 ans

for ($i = 10; $i <= 100; $i++) {
    if ($i%2 != 0) { 
        echo" {$i}  <br>";
    }
}
echo"<br>";

//6 ans

$num = array(5, 10, 15, 20, 25, 30);

$a = 20;
$found = false;
for ($i = 0; $i < count($num); $i++) {
    if ($num[$i] == $a) {
        echo "Element {$a}index {$i}";
        $found = true;
          
    }
}
if (!$found) {
        echo "{$search} not found in the array.";
}
echo"<br>";

//ans 7

for($i=0; $i<4; $i++){
    for($j=0; $j<$i;$j++){
        echo "*";
       
    }
    echo "<br>";
    
}
echo"<br>";
for($i=1; $i<4; $i++){
    for($j=1; $j<(4-$i)+1;$j++){
        echo $j;
        
       
    }
    //echo $i;
    echo "<br>";
    
}
echo"<br>";

//$n=5;

for($i=1;$i<2;$i++){

    for($j=1;$j<=$i;$j++){
        if($j==1){
            echo "A <br>";
            
        }if ($j==1) {
            echo "B C <br>";
            

        }if($j==1){
            echo "D E F <br>";
            
        }
    
    
       // $n++;
    }
        //$n++;
    
    
    echo"<br>";
}




?>







