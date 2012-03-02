<?php
	class plugin {
		final public function description() {
		       echo "Josh is awesome";
		}
		
	}
	
	class basicSettings extends {
		public $companyName;
		public $phoneNumber;
		public $city;
		public $state;
		
		public function serialize($path)
		
		public static function deserialize($path){
			$getBasicSettings = file_get_contents($_SERVER['DOCUMENT_ROOT'].$path);
			$basicSettings = json_decode($getBasicSettings,true);
			$object = new BasicSettings(); 
			foreach ($basicSettings as $object) {
				$object -> $companyName = $object['Company Name'];
				$object -> $phoneNumber = $object['Phone Number'];
				$object -> $city = $object['City'];
				$object -> $state = $object['State'];
			}
			return $object;
		}
		
		
		
		public function draw(){
			
		}
	}
	
?>