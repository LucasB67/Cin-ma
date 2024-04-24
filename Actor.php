<?php

class Actor{

    private string   $_name;
    private string   $_firstName;
    private DateTime $_birthDate;
    private String   $_sex;
    private array    $_casts;


    function __construct(string $name, string $firstName, string $birthDate, string $sex){

        $this->_name      = $name;
        $this->_firstName = $firstName;
        $this->_birthDate = new DateTime($birthDate);
        $this->_sex       = $sex;
        $this->_casts    = [];
    }


    function addCast(Cast $cast) : void{

        $this->_casts[] = $cast;
    }


    function deleteCast(Cast $argCast) : void {

        $n = 0;
        foreach($this->_casts as $cast){

            if ($cast == $argCast){
                unset($this->_casts[$n]); 
                return;
            }
            $n++;
        }
        return;
    }


    function showMovies() : string {

        if ($this->_casts){
            $result = "Films dans lesquels $this joue :<ul>";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast->getMovie().".</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun film associé à $this.<br>";
    }


    function showRoles() : string {

        if ($this->_casts){
            $result = "Rôles joués par $this :<ul>";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast->getRole()." (".$cast->getMovie().").</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun rôle associé à $this.<br>";
    }


    function getName     () : string   {return $this->_name      ;}
    function getFirstName() : string   {return $this->_firstName ;}
    function getSex      () : string   {return $this->_sex       ;}
    function getBirthDate() : DateTime {return $this->_birthDate ;}

    function setName     (string $name)      : void {$this->_name      = $name                    ;}
    function setFirstName(string $firstName) : void {$this->_firstName = $firstName               ;}
    function setSex      (string $sex)       : void {$this->_sex       = $sex                     ;}
    function setBirthDate(string $birthDate) : void {$this->_birthDate = new DateTime($birthDate) ;}
    

    function __toString(){

        return "<i>$this->_firstName $this->_name</i>";
    }
}

?>
