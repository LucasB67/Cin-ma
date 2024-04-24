<?php

class Movie{

    private string   $_title;
    private DateTime $_releaseDate;
    private int      $_duration;
    private string   $_synopsis;
    private Author   $_author;
    private array    $_genres;
    private array    $_casts;


    function __construct(string $title, string $releaseDate, int $duration, string $synopsis, array $genres, Author $author){

        $this->_title       = $title;
        $this->_releaseDate = new DateTime($releaseDate);
        $this->_duration    = $duration;
        $this->_synopsis    = $synopsis;
        $this->_author      = $author;
        $this->_genres      = $genres;
        $this->_casts       = [];
        foreach($this->_genres as $_genre){
            $_genre->addMovie($this);
        }
        $this->_author->addMovie($this);
    }


    function addCast(Cast $newCast) : void{

        $this->_casts[] = $newCast;
    }


    function addGenre(Genre $genre) : void{

        $this->_genres[] = $genre;
    }


    function deleteGenre(Genre $argGenre) : void{

        $n = 0;
        foreach($this->_genres as $genre){
            if ($genre == $argGenre){
                unset($this->_genres[$n]); 
                return;
            }
            $n++;
        }
        return;
    }


    function showInformations() : string{
        $result = "Film : $this.<br>
                   Année de production : ".$this->getProductionYear().".<br>
                   Directeur :  $this->_author.<br>
                   Durée : $this->_duration minutes.<br>
                   Synopsis : $this->_synopsis<br>
                   Genres :".$this->showGenres()."
                   Casting :".$this->showCast()."<br>";
        return $result;
    }


    function getProductionYear() : string {

        return $this->_releaseDate -> format("Y");
    }


    function showCast() : string {

        if ($this->_casts){
            $result = "<ul>";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast.".</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun casting associé à $this.";
    }


    function showActors() : string {

        if ($this->_casts){
            $result = "Acteurs ayant joués dans $this :<ul>";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast->getActor().".</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun acteur associé à $this.<br>";
    }


    function showRoles() : string {

        if ($this->_casts){
            $result = "Rôles présents dans $this :<ul>";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast->getRole().".</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun rôle associé à $this.<br>";
    }

    
    function showGenres() : string {

        if ($this->_genres){
            $result = "<ul>";
            foreach($this->_genres as $_genre){
                $result .= "<li>".$_genre.".</li>";
            }
            return $result."</ul>";
        }
        else
            return "Aucun genre associé à $this.";
    }


    function setTitle(string $title) : void{
        $this->_title = $title;
    }
    function getTitle() : string{
        return $this->_title;
    }


    function __toString(){

        return "<i>$this->_title</i>";
    }
}

?>
