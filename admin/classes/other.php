<?php
class other{
	public static $_instance = null;
	
	public static function g(){
		if(!isset(self::$_instance)){
			self::$_instance = new other();
		}
		return self::$_instance;
	}
	
	public static function  dates(){
		$date = gmdate('Y-m-d',time()+(6*60*60));
		return $date;
	}
	public static function  times(){
		$date = gmdate('h:i',time()+(6*60*60));
		return $date;
	}
	public function is_image($filetype){
		if($filetype == 'image/jpeg' || $filetype == 'image/png'){
			return true;
		}else{
			return false;
		}
	}
	public static function invconst(){
		$value = 689568;
		return $value;
	}
	public function accounts_update($uid,$amount,$details,$type,$old_bl,$new_bl,$date,$time){
		$query = query::g()->insert('accounts',
			array(
				'uid' => $uid,
				'amount' => $amount,
				'description' => $details,
				'type' => $type,
				'old_bl' => $old_bl,
				'new_bl' => $new_bl,
				'date' => $date,
				'time' => $time
			)
		);
	}
	public function sendsms($number, $message){
			
			$message = urlencode($message);
		/*// request url
		$url = "http://itext.itechinovation.com/smsapi?api_key=C20030445c46e3865cf5b7.12254215&type=unicode&contacts=+88".$number."&senderid=8801847169884&msg=".$message;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
	    curl_exec($ch);
		curl_close ($ch);
		
		
				 * Created by PhpStorm.
				 * User: ahsuoy
				 * Date: 4/20/2017
				 * Time: 4:40 PM
				 */
				
				// base64 encoded authorization key (username:password)
				$authKey = 'none';
				
				// request url
				$url = "http://itext.itechinovation.com/smsapi?api_key=C20030395c46a1f53f85e4.14051470&type=unicode&contacts=+88".$number."&senderid=8801847169884&msg=".$message;;
				
				// post data
				$data = [
					"from" => 'earnto',
					"to"   => ["88".$number],
					//"to"   => ["8801813404900"],
					"text" => $message,
				];
				
				//print_r($data);
				$ch = curl_init();
				
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				//curl_setopt($ch, CURLOPT_POST, 1);
				
				// header data
				$headers = [];
				$headers[] = "Content-Type: application/json";
				$headers[] = "Accept: application/json";
				$headers[] = "Authorization: Basic " . $authKey;
				
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				
				$result = curl_exec($ch);
				if (curl_errno($ch)) {
					echo 'Error:' . curl_error($ch);
				}
				
				curl_close ($ch);
				
				// convert the response into php array from json
				$result = json_decode($result, true);
				
			   //print_r($result);
			   
				$status = $result['messages']['0']['status']['groupId'];
	}
}


?>