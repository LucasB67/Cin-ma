<?php

class Cast{

    private Actor    $_actor;
    private Role     $_role;
    private Movie    $_movie;

    function __construct(Actor $actor, Role $role, Movie $movie){

        $this->_actor = $actor;
        $this->_role  = $role;
        $this->_movie = $movie;
        $this->_actor->addCast($this);
        $this->_role->addCast($this);
    }


    function getActor() : Actor {
        return $this->_actor;
    }
    function getRole() : Role {
        return $this->_role;
    }
    function getMovie() : Movie {
        return $this->_movie;
    }

    function __toString(){

        return "<i>$this->_actor dans le rôle de $this->_role.</i>";
    }
}

?>
