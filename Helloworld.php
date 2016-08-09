#!/usr/bin/php
<?php
passthru('clear');
while(true){
	for($j=0;$j<20;$j++){
		for($i=1;$i<128;$i++){
			$num = rand(0,256);
			echo "\e[48;5;{$num}m \e[0m";
			usleep(100000);
		}
		echo "\n";
	}
	passthru('clear');
}
?>
