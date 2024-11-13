<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/blog/config/config.php';
session_start();

?>

<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'utf-8' />
<meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no' />
<meta name = 'description' content = '' />
<meta name = 'author' content = '' />
<title>Clean Blog - Start Bootstrap Theme</title>
<link rel = 'icon' type = 'image/x-icon' href = "<?php echo base_url; ?>/assets/favicon.ico" />
<!-- Font Awesome icons ( free version )-->
<script src = 'https://use.fontawesome.com/releases/v6.1.0/js/all.js' crossorigin = 'anonymous'></script>
<!-- Google fonts-->
<link href = 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel = 'stylesheet' type = 'text/css' />
<link href = 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel = 'stylesheet' type = 'text/css' />
<!-- Core theme CSS ( includes Bootstrap )-->
<link href = "<?php echo base_url; ?>/css/styles.css" rel = 'stylesheet' />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

</head>
<body>
<!-- Navigation-->
<nav class = 'navbar navbar-expand-lg navbar-light' id = 'mainNav'>
<div class = 'container px-4 px-lg-5'>
<a class = 'navbar-brand' href = 'index.php'>Start Bootstrap</a>
<button class = 'navbar-toggler' type = 'button' data-bs-toggle = 'collapse' data-bs-target = '#navbarResponsive' aria-controls = 'navbarResponsive' aria-expanded = 'false' aria-label = 'Toggle navigation'>
Menu
<i class = 'fas fa-bars'></i>
</button>
<div class = 'collapse navbar-collapse' id = 'navbarResponsive'>
<ul class = 'navbar-nav ms-auto py-4 py-lg-0'>

<?php if ( isset( $_SESSION[ 'username' ] ) ) : ?>

<li class = 'nav-item'><a class = 'nav-link px-lg-3 py-3 py-lg-4' href = '<?php echo base_url; ?>/index.php'>Home</a></li>
<li class = 'nav-item'><a class = 'nav-link px-lg-3 py-3 py-lg-4' href = '<?php echo base_url; ?>/posts/create.php'>create</a></li>

<li class = 'nav-item dropdown mt-3'>
<a class = 'nav-link dropdown-toggle' href = '#' id = 'navbarDropdown' role = 'button' data-bs-toggle = 'dropdown' aria-expanded = 'false'>
<?php echo $_SESSION[ 'username' ];
?>
</a>
<ul class = 'dropdown-menu' aria-labelledby = 'navbarDropdown'>
<li><a class = 'dropdown-item' href = '#'>Profile</a></li>
<li><a class = 'dropdown-item' href = "<?php echo base_url; ?>/auth/logout.php"> LogOut</a></li>
<li><hr class = 'dropdown-divider'></li>
<li><a class = 'dropdown-item' href = '#'>Something else here</a></li>
</ul>
</li>

<?php else : ?>
<li class = 'nav-item'><a class = 'nav-link px-lg-3 py-3 py-lg-4' href = "<?php echo base_url; ?>/auth/login.php">login</a></li>
<li class = 'nav-item'><a class = 'nav-link px-lg-3 py-3 py-lg-4' href = "<?php echo base_url; ?>/auth/register.php">register</a></li>

<?php endif;
?>

<li class = 'nav-item'><a class = 'nav-link px-lg-3 py-3 py-lg-4' href = '<?php echo base_url; ?>/contact.html'>Contact</a></li>
</ul>
</div>
</div>
</nav>
<!-- Page Header-->
<header class = 'masthead' style = "background-image: url('<?php echo base_url; ?>/assets/img/home-bg.jpg')">
<div class = 'container position-relative px-4 px-lg-5'>
<div class = 'row gx-4 gx-lg-5 justify-content-center'>
<div class = 'col-md-10 col-lg-8 col-xl-7'>
<div class = 'site-heading'>
<h1>Clean Blog</h1>
<span class = 'subheading'>A Blog Theme by Start Bootstrap</span>
</div>
</div>
</div>
</div>
</header>

<!-- Main Content-->
<div class = 'container px-4 px-lg-5'>