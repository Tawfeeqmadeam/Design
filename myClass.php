<?php
class design
{
    private $DB;
    public function __construct(mysqli $DB)
    {
        $this->DB = $DB;
    }
   
    public function insert(string $proName, string $email,string $pass): bool
    {
        echo $email;
        echo $proName;
        echo $pass;
        if (isset($email) || isset($proName) || isset($pass) ) {
            $query = "INSERT INTO `users` (`Username`, `Email`, `Password`)";
            $query .= "VALUES('" . $proName . "','" . $email . "','" . $pass . "')";
        } else {
            echo 'error';
            exit;
        }
        return $this->DB->query($query);
    }
    
}
