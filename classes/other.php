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
		$date = gmdate('h:i a',time()+(6*60*60));
		return $date;
	}
	public static function  times_span(){
		$date = time()+(6*60*60);
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
	public static function invconst2(){
		$value = 584523;
		return $value;
	}
	public function accounts_update($id,$details,$amount,$fund_type){
		
		if($fund_type == 'cr'){
			$query = query::g()->insert('accounts',
				array(
					'uid' => $id,
					'details' => $details,
					'cr' => $amount,
					'date' => $this->dates(),
					'time' => $this->times_span()
				)
			);
		}else if($fund_type == 'dr'){
			$query = query::g()->insert('accounts',
				array(
					
					'uid' => $id,
					'details' => $details,
					'dr' => $amount,
					'date' => $this->dates(),
					'time' => $this->times_span()
				)
			);
		
		}
	}
	public function checknumber($data){
		if(strlen(strval($data)) > 11){
			return false;
		}else if(strlen(strval($data)) < 11){
			return false;
		}else if(strlen(strval($data)) == 11){
			if(substr(strval($data), 0, 3) == '018'){
				return true;
			}else if(substr(strval($data), 0, 3) == '017'){
				return true;
			}else if(substr(strval($data), 0, 3) == '011'){
				return false;
			}else if(substr(strval($data), 0, 3) == '016'){
				return true;
			}else if(substr(strval($data), 0, 3) == '015'){
				return true;
			}else if(substr(strval($data), 0, 3) == '019'){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function sendsms($number,$message){
	        	
		$message = urlencode($message);
		/*
				 * Created by PhpStorm.
				 * User: ahsuoy
				 * Date: 4/20/2017
				 * Time: 4:40 PM
				 */
				
					// base64 encoded authorization key (username:password)
				//$authKey = base64_encode("genuine:Tasnim1988$");
				
				// request url
				//$url = "http://107.20.199.106/restapi/sms/1/text/single";
				
				$url = "http://itext.itechinovation.com/smsapi?api_key=C20030445c46e3865cf5b7.12254215&type=text&contacts=".$number."&senderid=8801847169884&msg=".$message; 
				// post data
				$data = [
					"from" => 'Genuine',
					"to"   => ["88".$number],
					"text" => $message,
				];
				
				//print_r($data);
				$ch = curl_init();
				
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($ch, CURLOPT_POST, 1);
				
				// header data
				$headers = [];
				$headers[] = "Content-Type: application/json";
				$headers[] = "Accept: application/json";
				//$headers[] = "Authorization: Basic " . $authKey;
				
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
			
	        
	        
	        /*$rand = rand(1000000, 9000000).time();
			$user = "genuine"; 
			$pass = "Genuine123"; 
			$sid = "GenuineEng"; 
			$url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
			$param = "user=$user&pass=$pass
			&sms[0][0]=88".$number."&sms[0][1]=".urlencode($message)."&sms[0][2]=".$rand."
			&sid=$sid";
			$crl = curl_init();
			curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
			curl_setopt($crl,CURLOPT_URL,$url); 
			curl_setopt($crl,CURLOPT_HEADER,0);
			curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($crl,CURLOPT_POST,1);
			curl_setopt($crl,CURLOPT_POSTFIELDS,$param); 
			$response = curl_exec($crl);
			curl_close($crl);
			*/
	}
}


?>