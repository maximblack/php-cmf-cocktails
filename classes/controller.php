<?php

	class Controller {
	
		protected static $template;
                
                protected static $defaultTemplate = 'template';
               
		public function __construct() {
                    
                    $this->setTemplate(self::$defaultTemplate);
                    
                    
		}
                
                protected function setTemplate($template) {
                    //se initializeaza obiectul template
                    self::$template = new Template($template);
                    
                }
		
		protected function setTitle($title) {
		
			self::$template->setVariable('title', $title);
			
			return $this;
		
		}
		
		protected function setBody($template) {
			
			self::$template->setVariable('body', $template->getHtml());
			
			return $this;
		
		}
                //output html afiseaza 
		
		protected function outputHtml() {
			
			self::$template->output();
			
			return $this;
			
		}
	
	}
	
?>