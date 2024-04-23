<?php

class Cast{

    private Actor    $_actor;
    private Role     $_role;

    function __construct(Actor $actor, Role $role){

        $this->_actor = $actor;
        $this->_role  = $role;
    }


    function __toString(){

        return "<i>$this->_actor dans le rôle de $this->_role</i>";
    }

    function getActor() : Actor {

        return $this->_actor;
    }

    function getRole() : Role {

        return $this->_role;
    }
}

?>