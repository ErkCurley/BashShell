#!/usr/bin/php
<?php

$fire = true;
$fireStrength = 100;

function center($args){

	$COLUMNS = exec('tput cols');
	$LINES = exec('tput lines');

	$width = $COLUMNS - 10;
	$height = $LINES - 10;

	passthru('clear');

	echo "\033[5;5H";

	block($width,$height,$args);


}

function row($width,$args){
	$fire = true;	
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
        	}else{
                	$num = rand(1,256);
        	}        	

		if($fire == true){
			$line .= "\e[48;5;124m \e[0m";
		}

        }
	usleep(2000000);
	echo $line;

}

function block($width,$height,$args){

	for($j=1;$j<$height;$j++){
                row($width,$args);
		$indent = 5 + $j;
               	echo "\033[{$indent};5H";
        }

}
while(true){
	$color = rand(1,5);
	if($color == 1){
		center('blue');	
	}elseif($color == 2){
		center('red');
	}elseif($color == 3){
		center('green');
	}elseif($color == 4){
		center('purple');
	}else{
		center('');
	}
}
