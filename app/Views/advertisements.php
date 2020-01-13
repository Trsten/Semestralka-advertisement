<h1>Advertisements</h1>

<?php foreach($advertisements as $adv): ?>

<div class="card " style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $adv->getTitle() ?></h5>
        <h6 class="card-subtitle mb-2 text-muted float-right"><?= $adv->getAddress() ?></h6>
        <h6 class="card-subtitle mb-2 text-muted"><?= $adv->getLocation() ?></h6>
        <p class="card-text"><?= $adv->getTypProperty() ?></p>
        <p class="card-text"><?= $adv->getPrice() . ""?> &#8364;</p>
        <a class="btn btn-info" type="submit" href="/property/advertisements/<?= $adv->getId() ?>/details" role="button">show detals</a>
    </div>
</div>
    <br>
<?php endforeach; ?>