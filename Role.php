<?php

class Role{

    private string   $_name;
    private array    $_actors;

    function __construct(string $name){

        $this->_name      = $name;
        $this->_actors    = [];
    }

    function addActor(Actor $actor) : void{

        $this->_actors[] = $actor;
    }

    function showActors() : string {

        if ($this->_actors){
            $result = "Acteurs ayant joués le rôle de $this:";
            foreach($this->_actors as $actor){
                $result .= "<li>".$actor.".</li>";
            }
            return $result;
        }
        else
            return "<li><i>Aucun acteur associé à <i>$this.</li>";
    }

    function __toString(){

        return "<i> $this->_name</i>";
    }
}

?>