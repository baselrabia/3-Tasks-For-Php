<?php
print_r($_POST);
echo "</br>";


if (isset($_POST['x'])&&isset($_POST['y'])&&isset($_POST['z'])) {
$x=str_split($_POST['x']);
$y=str_split($_POST['y']);
$z=str_split($_POST['z']);
$multi= [$x,$y,$z];
//var_dump($multi);
$match=array();

for ($i=0; $i < count($multi[0]); $i++) { 
	if ( in_array($multi[0][$i], $multi[1]) && in_array($multi[0][$i], $multi[2]) && !in_array($multi[0][$i], $match) ) {
		$match[]= $multi[0][$i];
		
	}
}
sort($match);
print_r($match);

echo "<h1> Result : </h1> <h2> ----- =>   {";
foreach ($match as $value) {
	echo $value.",";
}

echo"}</h2>";

}






if (isset($_POST['chars'])) {

$chars= $_POST['chars'];
echo "<h1> You Had Enterded : </h1> <h2> ----- =>   ".$chars."</h2>";
echo "</br>";

$arrayStr = str_split($chars); 
$x= count($arrayStr);
echo "</br>";

$new=array();

for ($i=0; $i < $x ; $i++) { 
	if (!in_array($arrayStr[$i] , $new)) {
		$counter[$i]=1;
		$new[]=$arrayStr[$i];
		$new[]=$counter[$i];
	}else{
		for ($k=0; $k < count($new); $k++) { 
			if ($arrayStr[$i] == $new[$k]){
				$coun=0;
				$coun=$k+1;
			}
		}
		$new[$coun]++;
	}

}

$charsStr= implode("",$new);	

echo "<h1> Result : </h1> <h2> ----- =>   ".$charsStr."</h2>";

}