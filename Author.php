<?php

class Author{

    private string   $_name;
    private string   $_firstName;
    private DateTime $_birthDate;
    private String   $_sex;
    private array    $_movies;

    function __construct(string $name, string $firstName, string $birthDate, string $sex){

        $this->_name      = $name;
        $this->_firstName = $firstName;
        $this->_birthDate = new DateTime($birthDate);
        $this->_sex       = $sex;
        $this->_movies    = [];
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


    function showMovies() : string {

        if ($this->_movies){
            $result = "Films de $this:";
            foreach($this->_movies as $movie){
                $result .= "<li>".$movie.".</li>";
            }
            return $result;
        }
        else
            return "<li><i>Aucun film associé à <i>$this.</li>";
    }


    function __toString(){

        return "<i>$this->_firstName $this->_name </i>";
    }
}

?>