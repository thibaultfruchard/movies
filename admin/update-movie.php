<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'header.php';

/*
$desc = $db->query('DESC movies')->fetchAll();
foreach($desc as $key => $field) {
	echo $field['Field'].'<br>';
}
*/

$fields = array(
	'slug',
	'title',
	'year',
	'genres',
	'synopsis',
	'directors',
	'actors',
	'writers',
	'runtime',
	'mpaa',
	'rating',
	'popularity',
	'modified',
	'created',
	'poster_flag',
	'cover',
);
?>

<form class="form-horizontal" action="" method="POST" novalidate>

<?php

$slug = !empty($_POST['slug']) ? $_POST['slug'] : '';  
$title = !empty($_POST['title']) ? $_POST['title'] : '';  
$year = !empty($_POST['year']) ? $_POST['year'] : '';  
$genres = !empty($_POST['genres']) ? $_POST['genres'] : '';  
$synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : ''; 
$directors = !empty($_POST['directors']) ? $_POST['directors'] : ''; 
$actors = !empty($_POST['actors']) ? $_POST['actors'] : ''; 
$writers = !empty($_POST['writers']) ? $_POST['writers'] : ''; 
$runtime = !empty($_POST['runtime']) ? $_POST['runtime'] : ''; 
$mpaa = !empty($_POST['mpaa']) ? $_POST['mpaa'] : ''; 
$rating = !empty($_POST['rating']) ? $_POST['rating'] : ''; 
$popularity = !empty($_POST['popularity']) ? $_POST['popularity'] : ''; 
$modified = !empty($_POST['modified']) ? $_POST['modified'] : ''; 
$created = !empty($_POST['created']) ? $_POST['created'] : ''; 
$poster_flag = !empty($_POST['poster_flag']) ? $_POST['poster_flag'] : ''; 
$cover = !empty($_POST['cover']) ? $_POST['cover'] : ''; 


$errors = array();

if (!empty($_POST)) {

if (empty($slug)) {
	$errors['slug'] = 'Vous devez renseigner le slug';
}
if (empty($title)) {
	$errors['title'] = 'Vous devez renseigner le title';
}
if (empty($year)) {
	$errors['year'] = 'Vous devez renseigner le year';
}
if (empty($genres)) {
	$errors['genres'] = 'Vous devez renseigner le genres';
}
if (empty($synopsis)) {
	$errors['synopsis'] = 'Vous devez renseigner le synopsis';
}
if (empty($directors)) {
	$errors['directors'] = 'Vous devez renseigner le directors';
}
if (empty($actors)) {
	$errors['actors'] = 'Vous devez renseigner le actors';
}
if (empty($writers)) {
	$errors['writers'] = 'Vous devez renseigner le writers';
}
if (empty($runtime)) {
	$errors['runtime'] = 'Vous devez renseigner le runtime';
}
if (empty($mpaa)) {
	$errors['mpaa'] = 'Vous devez renseigner le mpaa';
}
if (empty($rating)) {
	$errors['rating'] = 'Vous devez renseigner le rating';
}
if (empty($popularity)) {
	$errors['popularity'] = 'Vous devez renseigner le popularity';
}
if (empty($modified)) {
	$errors['modified'] = 'Vous devez renseigner le modified';
}
if (empty($created)) {
	$errors['created'] = 'Vous devez renseigner le created';
}
if (empty($poster_flag)) {
	$errors['poster_flag'] = 'Vous devez renseigner le poster_flag';
}
if (empty($cover)) {
	$errors['cover'] = 'Vous devez renseigner le cover';
}

if (empty($errors)) {



	$query = $db->prepare('INSERT INTO movies (slug, title, year, genres, synopsis, directors, actors, writers, runtime, mpaa, rating, popularity, modified, created, poster_flag, cover) VALUES (:slug, :title, :year, :genres, :synopsis, :directors, :actors, :writers, :runtime, :mpaa, :rating, :popularity, :modified, :created, :poster_flag, :cover)');

		$query->bindValue('slug', $slug);
		$query->bindValue('title', $title); 
		$query->bindValue('year', $year);
		$query->bindValue('genres', $genres); 
		$query->bindValue('synopsis', $synopsis); 
		$query->bindValue('directors', $directors); 
		$query->bindValue('actors', $actors); 
		$query->bindValue('writers', $writers); 
		$query->bindValue('runtime', $runtime); 
		$query->bindValue('mpaa', $mpaa);
		$query->bindValue('rating', $rating); 
		$query->bindValue('popularity', $popularity); 
		$query->bindValue('modified', $modified);
		$query->bindValue('created', $created); 
		$query->bindValue('poster_flag', $poster_flag); 
		$query->bindValue('cover', $cover); 

		$query->execute();


		$result = $db->lastInsertId();

		if (empty($result)) {
			echo '<div class="alert alert-danger" role="danger">Une erreur est survenue</div>';
		} else {
			echo '<div class="alert alert-success" role="success">Merci :)</div>';
		}
		exit;
	}

}

foreach($fields as $field) {

?>

<div class="form-group">
	<label for="<?= $field ?>" class="col-sm-2 control-label"><?= $field ?></label>
	<div class="col-sm-3">
		<input type="text" id="<?= $field ?>" name="<?= $field ?>" class="form-control" placeholder="<?= $field ?>" value="<?= $$field ?>">
	</div>
</div>

<?php } ?>
<div class="form-group">
		<div class="col-sm-2 control-label">
			<button type="submit" class="btn btn-default">Envoyer le film en base</button>
		</div>
</div>


</form>

<?php include_once 'footer.php'; ?>