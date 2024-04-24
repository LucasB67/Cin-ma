<h1> Exercice Cinéma</h1>

<?php 

spl_autoload_register(function($class) {
    include $class . '.php';
});

$genres = ["scienceFiction" => new Genre("Science fiction"),
           "horreur"        => new Genre("Horreur")];

$spielberg = new Author("Spielberg", "Steven", "18-12-1946", "M");

$actor1 = new Actor("Neill", "Sam", "14-09-1947", "M");
$actor2 = new Actor("Dern", "Laura", "10-02-1967", "F");

$role1 = new Role("Pr Alan Grant");
$role2 = new Role("Pr Ellie Sattler");


$movie1 = new Movie("Jurassic Park", "01-01-1993", 120, "Film sur des dinosaures.", [$genres["scienceFiction"], $genres["horreur"]], $spielberg);
$movie2 = new Movie("Le Monde Perdu", "01-01-1997", 120, "Suite de Jurassic Park.", [$genres["scienceFiction"], $genres["horreur"]], $spielberg);

// $movie1->setTitle("Jurassique Parc");

$movie1->addCast(new Cast($actor1, $role1, $movie1));
$movie1->addCast(new Cast($actor2, $role2, $movie1));
$movie2->addCast(new Cast($actor1, $role1, $movie2));

// $genres["scienceFiction"]->deleteMovie($movie1);

echo $movie1->showInformations();
echo $genres["scienceFiction"]->showInformations();

echo "<br>".$spielberg->showMovies();

echo "<br>".$actor1->showMovies();
echo "<br>".$actor1->showRoles();

echo "<br>".$role1->showActors();
echo "<br>".$role2->showMovies();

echo "<br>".$movie1->showActors();
echo "<br>".$movie1->showRoles();
?>
