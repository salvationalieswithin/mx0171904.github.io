<?php
//generic php function to send GCM push notification
	   function sendPushNotificationToGCM($registatoin_ids, $message) {
		//Google cloud messaging GCM-API url
			$url = 'https://android.googleapis.com/gcm/send';
			$fields = array(
				'registration_ids' => $registatoin_ids,
				'data' => $message,
			);
		// Google Cloud Messaging GCM API Key
		define("GOOGLE_API_KEY", "AIzaSyDW3MtGkXtVYN4ZdSiW2__qOoB3GuN1ewk");   
			$headers = array(
				'Authorization: key=' . GOOGLE_API_KEY,
				'Content-Type: application/json'
			);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = curl_exec($ch);      
			if ($result === FALSE) {
				die('Curl failed: ' . curl_error($ch));
			}
			curl_close($ch);
			return $result;
		}
		
		
		function sendnotification($message,$deviceToken)
		{
			$passphrase = '1234';
				
				////////////////////////////////////////////////////////////////////////////////
				
				$ctx = stream_context_create();
				stream_context_set_option($ctx, 'ssl', 'local_cert', 'ipldevck.pem');
				stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
				
				// Open a connection to the APNS server
				$fp = stream_socket_client(
					//'ssl://gateway.sendbox.push.apple.com:2195', $err,
					'ssl://gateway.sandbox.push.apple.com:2195', $err,
					$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
				
				if (!$fp)
					exit("Failed to connect: $err $errstr" . PHP_EOL);
				
				//echo 'Connected to APNS' . PHP_EOL;
				
				// Create the payload body
				$body['aps'] = array(
					'alert' => $message,
					'sound' => 'default'
					);
				
				// Encode the payload as JSON
				$payload = json_encode($body);
				
				// Build the binary notification
				$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
				
				// Send it to the server
				$result = fwrite($fp, $msg, strlen($msg));
				
				
				if(!$result)
					echo 'Message not delivered' . PHP_EOL;
				else
					echo 'Message successfully delivered' . PHP_EOL;
				
				//Close the connection to the server
				fclose($fp);
	
		}
		function sendnotificationblack($message,$deviceToken)
		{
			$passphrase = '1234';
				
				////////////////////////////////////////////////////////////////////////////////
				
				$ctx = stream_context_create();
				stream_context_set_option($ctx, 'ssl', 'local_cert', 'blackipldevck.pem');
				stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
				
				// Open a connection to the APNS server
				$fp = stream_socket_client(
					//'ssl://gateway.sendbox.push.apple.com:2195', $err,
					'ssl://gateway.sandbox.push.apple.com:2195', $err,
					$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
				
				if (!$fp)
					exit("Failed to connect: $err $errstr" . PHP_EOL);
				
				//echo 'Connected to APNS' . PHP_EOL;
				
				// Create the payload body
				$body['aps'] = array(
					'alert' => $message,
					'sound' => 'default'
					);
				
				// Encode the payload as JSON
				$payload = json_encode($body);
				
				// Build the binary notification
				$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
				
				// Send it to the server
				$result = fwrite($fp, $msg, strlen($msg));
				
				
				if(!$result)
					echo 'Message not delivered' . PHP_EOL;
				else
					echo 'Message successfully delivered' . PHP_EOL;
				
				//Close the connection to the server
				fclose($fp);
	
		}
?>