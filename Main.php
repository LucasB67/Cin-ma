<h1> Exercice Cinéma</h1>

<?php 

require "Movie.php";
require "Genre.php";
require "Author.php";
require "Role.php";
require "Actor.php";
require "Cast.php";

$genres = ["scienceFiction" => new Genre("Science fiction"),
           "horreur"        => new Genre("Horreur")];

$spielberg = new Author("Spielberg", "Steven", "18-12-1946", "M");

$actor1 = new Actor("Neill", "Sam", "14-09-1947", "M");
$actor2 = new Actor("Dern", "Laura", "10-02-1967", "F");

$role1 = new Role("Pr Alan Grant");
$role2 = new Role("Pr Ellie Sattler");


$movie1 = new Movie("Jurassic Park", "01-01-1993", 120, "Film sur des dinosaures.", [$genres["scienceFiction"], $genres["horreur"]], $spielberg);
$movie1->appendCastMember(new Cast($actor1, $role1));
$movie1->appendCastMember(new Cast($actor2, $role2));

echo $movie1->showInformations();
echo "<br>".$genres["scienceFiction"]->showInformations();

echo "<br>".$spielberg->showMovies();
echo "<br>".$actor1->showMovies();
echo "<br>".$role2->showActors();
?>