<?php 
	/*
	Contact Class
	*/
	class Contact
	{
		private $name;
		private $phone;
		private $address;
		
		/* Constructor for the Contact Class
			Takes three variables that set the name, phone and
			address of the contact
		*/
		function __construct($name, $phone, $address)
		{
			$this->name = $name;
			$this->phone = $phone;
			$this->address = $address;
		}
		/*
		Getters and Setters for each of the private variables 
		of the contact class. Each setter takes one variable and
		sets it to the private variable it is setting to 
		*/
		function setName($new_name)
		{
			$this->name = $new_name;
		}
		
		function getName()
		{
			return $this->name;
		}
		
		function setPhone($new_phone)
		{
			$this->phone = $new_phone;
		}
		
		function getPhone()
		{
			return $this->phone;
		}
		
		function setAddress($new_address)
		{
			$this->address = $new_address;
		}
		
		function getAddress()
		{
			return $this->address;
		}
		/*
		Saves  a new instance of Contact into the array of Contacts created
		by each use session.
		*/
		function save()
		{
			array_push($_SESSION['list_of_contacts'], $this);
		}
		
		/*
		Returns all the intances of Contacts saved in the users cookie
		*/
		static function getAll()
		{
			return $_SESSION['list_of_contacts'];
		}
		
		/*
		Deletes all the intances of Contacts saved in the users cookie
		*/
		static function deleteAll()
		{
			$_SESSION['list_of_contacts'] = array();
		}
	}
?>