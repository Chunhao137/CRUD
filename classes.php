<?php

class MyClass{

	public $hello="hello world"; 
	
	
	public function result() {
	
	   echo $this->hello; 
	
	}


}

$objectMyClass=new MyClass(); 
$objectMyClass-> result(); 

?>
