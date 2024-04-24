<?php

class Genre{

    private string   $_name;
    private array    $_movies;

    function __construct(string $name){

        $this->_name   = $name;
        $this->_movies = [];
    }

    
    function showInformations() : string{
        
        if ($this->_movies){
            $result = "Genre : $this<br>Liste des films :<ul>";
            foreach($this->_movies as $_movie){
                $result .= "<li>".$_movie."</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun film associé à $this.<br>";
    }


    function addMovie(Movie $movie) : void{

        $this->_movies[] = $movie;
    }

    function deleteMovie(Movie $argMovie) : void {

        $n = 0;
        foreach($this->_movies as $movie){
            if ($movie == $argMovie){
                $this->_movies[$n]->deleteGenre($this);
                unset($this->_movies[$n]); 
                return;
            }
            $n++;
        }
        return;
    }


    function getName  () : string {return $this->_name  ;}
    function getMovies() : array  {return $this->_movies;}

    function setName  (string $name  ) : void {$this->_name   = $name  ;}
    function setMovies(array  $movies) : void {$this->_movies = $movies;}


    function __toString(){

        return "<i>$this->_name</i>";
    }
}

?>
