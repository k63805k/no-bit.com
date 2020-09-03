<?php
	class System_routes{
		function __construct($aUrl){
			if(isset($aUrl[0]) && !empty($aUrl[0])){
				$ctrl = $aUrl[0];
				if(file_exists('controllers/'.$ctrl.'.php')){
					include 'controllers/'.$ctrl.'.php';
					$ctrl = ucfirst($ctrl);
					if (class_exists($ctrl,false)){
						if(isset($aUrl[1]) && !empty($aUrl[1])){
							$method = $aUrl[1];
							if(method_exists($ctrl, $method)){
								$ctrl_obj = new $ctrl;
								if(isset($aUrl[2]) && !empty($aUrl[2])){
									$params = array_slice($aUrl,2);
									call_user_func_array([$ctrl_obj,$method], $params);
								}
								else{
									$ctrl_obj -> $method();	
								}
							}
							else{
								echo "method not found";
							}
						}
						else{
							$ctrl_obj = new $ctrl;
							$ctrl_obj -> index();
						}
					}
					else{
						echo "class not found";
					}
				}
				else{
					echo "file not found";
				}
			}
			else{
				include 'controllers/home.php';
				$ctrl_obj = new Home;
				$ctrl_obj -> index();
			}
		}
	}
?>