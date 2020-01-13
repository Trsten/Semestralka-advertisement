<h1>Advertisement: <?= $advertisement->getTitle() ?></h1>
<div class="form-group">
    <div  class="form-group">Location:  <?= $advertisement->getLocation() ?></div>
    <div  class="form-group">Type property: <?= $advertisement->getTypProperty() ?></div>
    <div  class="form-group">Address: <?= $advertisement->getAddress() ?></div>
    <div  class="form-group">Area: <?= $advertisement->getArea() ?></div>
    <div  class="form-group">Price: <?= $advertisement->getPrice() ?></div>
    <div  class="form-group">Contact: <?= $advertisement->getContact() ?></div>
    <div  class="form-group">Desctription: <?= $advertisement->getDescription() ?>
</div>
    <a href="/property/advertisement" class="btn btn-info" role="button">back</a>
<br>
<br>
<h2>comments</h2>
<br>

<?php foreach($comments as $comment): ?>
    <div id="comments">
        <div class="card col-md-9 my-2">
            <div><?= $advertisement->getUsername()?></div>
            <div><?= $comment->getComment()?></div>
            <small><?= $comment->getTime()?></small><br>
        </div>
    </div>
<?php endforeach; ?>

<?php if (empty($_SESSION['loggedUser'])) { ?>
    <span>if u want add comment first you have to registry or login</span>
<?php } else { ?>
    <form method="post">
        <input type="hidden" id="advertisementId" value="<?= $advertisement->getId() ?>">
        <input type="hidden" id="loggedUser" value="<?php echo $_SESSION['loggedUser'] ?>">
        <label for="comment"></label>
        <textarea  id="comment" cols="80" rows="5" name="comment" placeholder="write comment"></textarea><br>
        <input id="addComment" type="submit" class="btn btn-info" name="addComment" value="addComment">
    </form>
<?php }?>
<br>