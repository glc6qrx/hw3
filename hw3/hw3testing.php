<?php
    include("homework3.php");
?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">  
    
  <title>Homework 3 Test File</title>
</head>
<body>
<h1>Homework 3 Test File</h1>

<h2>Problem 1</h2>




<?php
    function calculateGrade($scores, $drop) {
        $sum = 0;
        $min = PHP_INT_MAX;
        $count = 0;

        #for each grade
        foreach ($scores as $value) {
            #get grade percent
            $perc = $value["score"]/$value["max_points"];
            $count += 1;
            $sum += $perc;

            #if found a smaller lowest grade, replace min
            if ($min > $perc) {
                $min = $perc;
            }
        }

        #if dropping min, drop min by subtracting count and min from sum
        if($drop){
            $sum -= $min;
            $count -= 1;
        }

        #Calc average
        return 100*$sum/$count;
        #echo array_search(min($scores), $scores); 
    }

    function gridCorners($width, $height) {
        if($width == 1 && $height == 1){
            return 1;
        }

        $array = array();

        #bottom left: 1,2,1+height
        $array[] = 1;
        $array[] = 2;
        $array[] = 1+$height;

        #top left: height, height-1,height*2
        $array[] = $height;
        $array[] = $height-1;
        $array[] = $height*2;

        #top right: height*width,height*width-1,height*(width-1) 
        $array[] = $height*$width;
        $array[] = ($height*$width)-1;
        $array[] = $height*($width-1);

        #bottom right: height*(width-1)+1,height*(width-1)+2, height*(width-2)+1
        $array[] = $height*($width-1)+1;
        $array[] = $height*($width-1)+2;
        $array[] = $height*($width-2)+1;

        $array = array_unique($array);
        asort($array);
        return $array;
        
        
    }

    echo "Write tests for Problem 1 here <br>";
    $test1 = [ [ "score" => 60, "max_points" => 100 ], [ "score" => 55, "max_points" => 100 ] ];
    echo calculateGrade($test1, false); // should be 55
    echo "<br>";
    $problemTwo = gridCorners(4,5);
    echo '<pre>'; print_r($problemTwo); echo '</pre>';
    //...
?>

<p>...</p>
</body>
</html>