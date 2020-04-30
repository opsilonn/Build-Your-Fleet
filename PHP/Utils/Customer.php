<?php
    class Customer
    {
        public $ID;
        public $isAdmin;
        public $fName;
        public $lName;
        public $email;
        public $password;
        public $description;
        public $galaxy;
        public $system;
        public $planet;
        public $address;
    
        function __construct($id)
        {
            // We save the id
            $this->ID = $id;

            // We get the corresponding data from the database
            include("Database.php");
			$request = $DATABASE->prepare("SELECT * FROM customer WHERE Customer_ID = ?");
			$request->execute(array($id));
    
            // We fill the structure
			if($val = $request->fetch())
			{
                $this->isAdmin = $val["Is_Admin"];
                $this->fName = $val["F_Name"];
                $this->lName = $val["L_Name"];
                $this->email = $val["Email"];
                $this->password = $val["Password"];
                $this->description = $val["Description"];
                $this->galaxy = $val["Galaxy"];
                $this->system = $val["System"];
                $this->planet = $val["Planet"];
                $this->address = $val["Address"];
			}
        }


        public function __toString()
        {
            return $this->ID . " : " . $this->fName . " " . $this->lName;
        }
    /*
        public function Couleur($value = "")
        {
            if ($value == "")
            {
                return $this->_couleur;
            }
    
            $this->_couleur = $value;
        }
    
        public function Race($value = "")
        {
            if ($value == "")
            {
                return $this->_race;
            }    
    
            $this->_race = $value;
        }
        */
    }
?>