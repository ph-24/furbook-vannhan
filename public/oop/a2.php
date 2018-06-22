<?php 
	/**
	 * summary
	 */
	namespace OOP;

	class A2 extends \OOP\A1
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        
	    }

	    public function getName(){
	    	//Overriding
	    	parent::getName();
	    	echo 'Class A2';
	    }
	}
 ?>