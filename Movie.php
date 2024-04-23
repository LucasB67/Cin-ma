<?php

class Movie{

    private string   $_title;
    private DateTime $_releaseDate;
    private int      $_duration;
    private string   $_synopsis;
    private array    $_genres;
    private array    $_casts;
    private Author   $_author;


    function __construct(string $title, string $releaseDate, int $duration, string $synopsis, array $genres, Author $author){

        $this->_title       = $title;
        $this->_releaseDate = new DateTime($releaseDate);
        $this->_duration    = $duration;
        $this->_synopsis    = $synopsis;
        $this->_genres      = $genres;
        foreach($this->_genres as $_genre){
            $_genre->addMovie($this);
        }
        $this->_casts  = [];
        $this->_author = $author;
        $this->_author->addMovie($this);
    }

    function appendCastMember(Cast $cast) : void{

        $this->_casts[] = $cast;
        $cast->getActor()->addMovie($this);
        $cast->getRole()->addActor($cast->getActor());

    }


    function showInformations() : string{
        $result = "Film : $this<br>
                   Année de production : ".$this->getProductionYear()."<br>
                   Directeur :  $this->_author<br>
                   Durée : $this->_duration minutes<br>
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
            $result = "";
            foreach($this->_casts as $cast){
                $result .= "<li>".$cast.".</li>";
            }
            return $result;
        }
        else
            return "<li><i>Aucun casting associé à <i>$this.</li>";
    }

    
    function showGenres() : string {

        if ($this->_genres){
            $result = "";
            foreach($this->_genres as $_genre){
                $result .= "<li>".$_genre."</li>";
            }
            return $result;
        }
        else
            return "<li><i>Aucun genre associé à <i>$this.</li>";
    }


    function __toString(){

        return "<i>$this->_title </i>";
    }
}

?>