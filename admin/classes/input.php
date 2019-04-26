<?php
class input{
	public static function submit($type = 'post'){
		if($type == 'post'){
			if(!empty($_POST)){
				return true;
			}else {
				return false;
			}
		}else if($type == 'get'){
			if(!empty($_GET)){
				return true;
			}else {
				return false;
			}
		}
	}
	public static function get($item){
		if(isset($_POST)){
			return sanetize($_POST[$item]);
		}else if(isset($_GET)){
			return sanetize($_GET[$item]);
		}
	}
}

?>