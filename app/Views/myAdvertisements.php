<?php if ( !empty($_SESSION['loggedUser']) && $_SESSION['loggedUser'] != 'admin') { ?>
<h1 class="text-center">My advertisements</h1><br>
<?php } else { ?>
<h1 class="text-center">Manage advertisements</h1>
<?php }
foreach($advertisements as $adv): ?>

    <div class="form-group text-left w-50 p-3 col-6 card bg-light mb-3 rounded mx-auto d-block " style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $adv->getTitle() ?></h5>
            <h6 class="card-subtitle mb-2 text-muted float-right"><?= $adv->getAddress() ?></h6>
            <h6 class="card-subtitle mb-2 text-muted"><?= $adv->getLocation() ?></h6>
            <p class="card-text"><?= $adv->getTypProperty() ?></p>
            <p class="card-text"><?= $adv->getPrice() . ""?> &#8364;</p>
            <a class="btn btn-info" type="submit" href="/property/advertisements/<?= $adv->getId() ?>/edit" role="button">edit</a>
        </div>
    </div>

<?php endforeach; ?>

<?php if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser'] != 'admin') {  ?>
    <form class="text-center" action="advertisement/create" method="post">
        <input type="submit" class="btn btn-info" name="createAdvertisement" value="create new">
    </form>
<?php } ?>