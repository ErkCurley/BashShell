#!/usr/bin/php
<?php

function center(){

	$COLUMNS = exec('tput cols');
	$LINES = exec('tput lines');

	$width = $COLUMNS - 10;
	$height = $LINES - 10;

	passthru('clear');

	echo "\033[5;5H";

	block($width,$height);


}

function row($width){

	for($i=1;$i<$width;$i++){
        	$num = rand(0,256);
        	echo "\e[48;5;{$num}m \e[0m";
        	usleep(50000);
        }

}

function block($width,$height){

	for($j=1;$j<$height;$j++){
                row($width);
		$indent = 5 + $j;
               	echo "\033[{$indent};5H";
        }

}
while(true){
	center();
}
