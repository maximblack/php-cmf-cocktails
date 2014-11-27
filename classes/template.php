<?php
	
	class Template {
            
                private static $pathTemplates = 'templates';
	
                //string
		private $template;
	
		public function __construct($template) {
		//file_get_contents=> citeste si transforma tot din fisier in string
			$this->template = file_get_contents(self::$pathTemplates . '/' . $template . '.php');
                        // file_get_contents('templates/template.php');
                        // file_get_contents('tempates/addtag/menu.php');
                        $this->setVariable('url', Url::getInstance()->site());
                        
		}
		
		public function setVariable($variable, $value) {
                    
			$this->template = preg_replace('/\{\$' . $variable . '\}/', $value, $this->template);
			
			return $this;
		
		}
		
		public function setArray($array) {
		
			foreach($array as $key => $value) {
			
				$this->setVariable($key, $value);
			
			}
			
			return $this;
			
		}
		
		public function getHtml() {
		
			return $this->template;
		
		}
		
		public function output() {
		
			echo $this->template;
		
		}
                
                public function __toString() {
                    return $this->template;
                }
		
	}

?>