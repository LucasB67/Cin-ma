<?php

class Role{

    private string   $_name;
    private array    $_casts;

    function __construct(string $name){

        $this->_name      = $name;
        $this->_casts    = [];
    }


    function addCast(Cast $cast) : void{

        $this->_casts[] = $cast;
    }


    function showActors() : string {

        if ($this->_casts){
            $result = "Acteurs ayant joués le rôle de $this :<ul>";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast->getActor()." (".$cast->getMovie().").</li>";
            }
            return $result."</ul>";
        }
        else
            return "<li><i>Aucun acteur associé à <i>$this.</li>";
    }


    function showMovies() : string {

        if ($this->_casts){
            $result = "Films où l'on retrouve le rôle de $this :<ul>";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast->getMovie().".</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun film associé à $this.";
    }

    function getName()             : string {return $this->_name   ;}
    function setName(string $name) : void   {$this->_name  = $name ;}


    function __toString(){

        return "<i> $this->_name</i>";
    }
}

?>
