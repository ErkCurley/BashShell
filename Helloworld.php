#!/usr/bin/php
<?php

function center($args,$additional = false){

	$COLUMNS = exec('tput cols');
	$LINES = exec('tput lines');

	$width = $COLUMNS - 10;
	$height = $LINES - 10;

	passthru('clear');

	echo "\033[5;5H";

	block($width,$height,$args,$additional);


}

function row($width,$args,$additional = false){
	
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
 		}    	

		if($additional == true){
			$num = rand(16,21);
			$chance = rand(1,100);
			if($chance < 95){
        			$line .= "\e[48;5;16m \e[0m";
        		}else{
				$line .= "\e[48;5;{$num}m \e[0m";
			}
		}

		if($fire == true){
			$line .= "\e[48;5;124m \e[0m";
		}

        }
	usleep(2000000);
	echo $line;
}

function block($width,$height,$args,$additional = false){

	for($j=1;$j<$height;$j++){
                row($width,$args,$additional);
		$indent = 5 + $j;
               	echo "\033[{$indent};5H";
        }

}
while(true){
//	$rain = true;
	if($rain == true){
		center('blue','rain');
	}else{

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
}
