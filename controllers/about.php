<?php
	class About extends System_controller{
		public function tun(){
			//echo "ura";
			$this -> view -> render('blog');
		}
		public function index(){
			echo "index of about";
		}
		public function dom($about = null){/*ete about enq talis anune chi linum*//*chi linum vorovhetev ete metodi anune clasi anunna ashxatuma vorpes autoload*/
			echo "this is dom function with argument >>> $about";
		}
		public function meth($x = "",$y = "",$z = ""){
			echo "$x+$y+$z";
		}
	}
?>