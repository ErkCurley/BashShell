#!/usr/bin/php

<?php

function center($args,$add = false){

  global $width;
  global $height;
  global $additional;
  
  $additional = $add;

	$COLUMNS = exec('tput cols');
	$LINES = exec('tput lines');

	$width = $COLUMNS - 10;
	$height = $LINES - 10;

	passthru('clear');

	echo "\033[5;5H";

	block($args);


}

function row($args){
  global $additional;
  
	if($additional == "rain" || $additional == "fire"){
	  slowRow($args);
	}else{
	  fastRow($args);
	}
}

function block($args){

  global $height,$width;
  
  global $fromBottom;
  
	for($j=1;$j<$height;$j++){
    $fromBottom = $height - $j;
    row($args);
		$indent = 5 + $j;
    echo "\033[{$indent};5H";
  }

}

function slowRow($args){
  
  global $fromBottom,$height,$width,$additional;
  
  
  $num = 21;
  $line = '';
	for($i=1;$i<$width;$i++){


		if($args=='blue'){
      $num = rand(16,21);
    }elseif($args == 'red'){
      $num = rand(124,129);
    }elseif($args == 'green'){
    	$num = rand(46,51);
    }elseif($args == 'purple'){
    	$num = rand(88,93);
		}
    
		if($additional == "rain"){
			$chance = rand(1,100);
			if($chance < 95){
        			$line .= "\e[48;5;16m \e[0m";
        		}else{
				$line .= "\e[48;5;{$num}m \e[0m";
			}
		}
		if($additional == "fire"){
			$chance = rand(1,$height);
			if($chance < $fromBottom){
        			$line .= "\e[48;5;16m \e[0m";
        		}else{
				$line .= "\e[48;5;{$num}m \e[0m";
			}
		}
	}
	echo "$line $fromBottom";
	usleep(1000000);
}

function fastRow($args)
{
  
  global $fromBottom,$height,$width,$additional;
  
  for($i=1;$i<$width;$i++){
		if($args=='blue'){
      $num = rand(16,21);
    }elseif($args == 'red'){
      $num = rand(124,129);
    }elseif($args == 'green'){
      $num = rand(46,51);
    }elseif($args == 'purple'){
      $num = rand(88,93);
    }else{
      $num = rand(1,256);
    }
    usleep(25000);
    echo "\e[48;5;{$num}m \e[0m";
  }
  echo "$fromBottom";
}

while(true){
	
	if(isset($argv[1])){
	  $program = (string) $argv[1];
	}else{
	  $program = "random";
	}

	if($program == "rain"){
		center('blue','rain');
	}
	if($program == "fire"){
	  center('red','fire');
	}
	if($program == 'blue'){
	  center('blue');
	}
  if($program == 'red'){
	  center('red');
	}
	if($program == 'green'){
	  center('green');
	}
	if($program == 'purple'){
	  center('purple');
	}
	if($program == 'random'){
	  $color = rand(0,10);
	  if($color == 1){
			center('blue');
		}elseif($color == 2){
			center('red');
		}elseif($color == 3){
			center('green');
		}elseif($color == 4){
			center('purple');
		}elseif($color == 5){
			center('blue','rain');
		}elseif($color == 6){
			center('blue','fire');
		}elseif($color == 7){
			center('red','rain');
		}elseif($color == 8){
			center('red','fire');
		}elseif($color == 9){
			center('purple','rain');
		}elseif($color == 10){
			center('purple','fire');
		}else{
			center('');
		}
	}
}