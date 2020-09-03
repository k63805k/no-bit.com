<?php
	class System_view{
		public function render($fileName,$nav = true){
                    global $config;
			$fileName = $fileName.'.php';
			if(file_exists('views/'.$fileName) && $nav){
                            include 'header.php';
                            include 'views/'.$fileName;
			}
                        else if(file_exists('views/'.$fileName) && !$nav){
                            include 'views/'.$fileName;
                        }
			else{
				echo "no file in views to include";
			}
		}
		
	}

?>