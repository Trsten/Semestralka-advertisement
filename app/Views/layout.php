<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/property/functions.js"></script>
</head>
<body>
<header>

    <div class="p-3 mb-2 bg-info text-white float-right">
            <?php if (empty($_SESSION['loggedUser'])) { ?>
                <a class="btn btn-info " role="button" href="/property/home/login" >Login</a>
                <a class="btn btn-info" role="button" href="/property/home/register">Register</a>
            <?php } else { ?>
                <a class="btn btn-info" role="button" href="/property/home/logoutUser">Logout</a>
            <?php if ($_SESSION['loggedUser'] != 'admin') { ?>
                <a class="btn btn-info" role="button" href="/property/user/show"> <?php echo $_SESSION['loggedUser'];?></a>
            <?php } } ?>
    </div>

    <div class="p-3 mb-2 bg-info text-white">
            <a class="btn btn-info"  href="/property/home" role="button">Home</a>
            <a class="btn btn-info"  href="/property/advertisement" role="button">Advertisement</a>
            <a class="btn btn-info " href="/property/tips" role="button">Tips</a>
        <?php if (!empty($_SESSION['loggedUser']) && $_SESSION['loggedUser'] != 'admin') { ?>
            <a class="btn btn-info"  href="/property/advertisement/show" role="button">My advertisements</a>
        <?php } elseif ( !empty($_SESSION['loggedUser']) && $_SESSION['loggedUser'] == 'admin') { ?>
            <a class="btn btn-info"  href="/property/advertisement/show" role="button">Manage advertisements</a>
        <?php } ?>
    </div>

</header>

<div><?php include($sectionView) ?></div>
<br>
</body>
<br>
<footer>
    <div class="p-3 mb-0 bg-info text-white navbar fixed-bottom">&COPY; 2019 by Trsten developers</div>
</footer>

</html>