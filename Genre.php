<?php

class Genre{

    private string   $_name;
    private array    $_movies;

    function __construct(string $name){

        $this->_name   = $name;
        $this->_movies = [];
    }


    function __toString(){

        return "<i>$this->_name</i>";
    }

    
    function showInformations() : string{
        $result = "Genre : $this<br>Liste :";
        foreach($this->_movies as $_movie){
            $result .= "<li>".$_movie."</li>";
        }
        return $result;
    }


    function addMovie(Movie $movie) : void{

        $this->_movies[] = $movie;
    }

    function deleteMovie(BankAccount $argMovie) : void {

        $n = 0;
        foreach($this->_movies as $movie){
            if ($movie == $argMovie){
                unset($this->_movies[$n]); 
                return;
            }
            $n++;
        }
        return;
    }


    function getName() : string{
        return $this->_name;
    }
    function setName(string $name) : void{
        $this->_name = $name;
    }
}

?>