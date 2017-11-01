<?php 

	include 'config.php';
	$query = $pdo->prepare("SELECT * from blog_post ORDER BY id DESC");
	$query->execute();

	$blog_posts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog PHP - Wilder</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Blog PHP</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<?php foreach ($blog_posts as $blog_post): ?>
				<div class="blog-post">
					<h2><?php echo $blog_post["title"] ?></h2>
					<p>Jan 3, 2017 by <a href="#">Wilder</a></p>
					<div class="blog-post-image">
						<img src="" alt="">
					</div>
					<div class="blog-post-content">
						<?php echo $blog_post["content"] ?>
					</div>
				</div>
				<?php endforeach ?>
				<!-- <div class="blog-post">
					<h2>Sample Title 2</h2>
					<p>Jan 3, 2017 by <a href="#">Wilder</a></p>
					<div class="blog-post-image">
						<img src="" alt="">
					</div>
					<div class="blog-post-content">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis eligendi optio aliquid fugit deserunt, deleniti adipisci libero iusto repudiandae debitis molestiae modi asperiores distinctio harum a. Omnis accusantium quidem dolorum.
					</div>
				</div> -->
			</div>
			<div class="col-md-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quia nemo architecto minima impedit quos dolores quam, officiis doloremque, numquam voluptatibus veniam incidunt? Mollitia repellendus maxime, voluptas minus ex accusantium!</div>
		</div>
		<div class="row">
			<footer>This a footer</footer>
		</div>
	</div>
</body>
</html>