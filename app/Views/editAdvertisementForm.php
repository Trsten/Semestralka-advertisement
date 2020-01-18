<div class="form-group text-left w-50 p-3 col-6 card bg-light mb-3 rounded mx-auto d-block  ">
    <h3 class="text-center">Edit property: <?= $advertisement->getTitle() ?></h3><br>
    <form action="/property/advertisement/<?= $advertisement->getId() ?>/update" method="post">
        <table class="table">
            <thead clss="thead-dark">
            <tr>
                <th></th>
                <th>Old informations</th>
                <th>New informations</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Title: </th>
                <td><?= $advertisement->getTitle() ?></td>
                <td><label for="edit_title"></label>
                    <input type="text" id="edit_title" placeholder="<?= $advertisement->getTitle() ?>" name="title">
                </td>
            </tr>
            <tr>
                <th scope="row">Location: </th>
                <td><?= $advertisement->getLocation() ?></td>
                <td><label for="edit_username"></label>
                    <input type="text" id="edit_username" placeholder="<?= $advertisement->getLocation() ?>" name="location">
                </td>
            </tr>
            <tr>
                <th scope="row">TypProperty: </th>
                <td><?= $advertisement->getLocation() ?></td>
                <td><label for="typProperty"></label>
                    <select name="typProperty" id="typProperty">
                        <option value="House">House</option>
                        <option value="Flat">Flat</option>
                        <option value="Land">Land</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row">Address: </th>
                <td><?= $advertisement->getAddress() ?></td>
                <td><label for="edit_address"></label>
                    <input type="text" id="edit_address" placeholder="<?= $advertisement->getAddress() ?>" name="address" >
                </td>
            </tr>
            <tr>
                <th scope="row">Area: </th>
                <td><?= $advertisement->getArea() ?></td>
                <td><label for="edit_area"></label>
                    <input type="text" id="edit_area" placeholder="<?= $advertisement->getArea() ?>" name="area" >
                </td>
            </tr>
            <tr>
                <th scope="row">Contact: </th>
                <td><?php echo $advertisement->getContact(); ?></td>
                <td><label for="edit_contact"></label>
                    <input type="text" id="edit_contact" placeholder="<?php echo $advertisement->getContact(); ?>" name="contact" >
                </td>
            </tr>
            <tr>
                <th scope="row">Price: </th>
                <td><?php echo $advertisement->getPrice(); ?></td>
                <td><label for="edit_price"></label>
                    <input type="text" id="edit_price" placeholder="<?php echo $advertisement->getPrice(); ?>" name="price" >
                </td>
            </tr>
            <tr>
                <th scope="row">Description: </th>
                <td><?php echo $advertisement->getDescription(); ?></td>
                <td><label for="edit_description"></label>
                    <textarea  class="form-control" name="edit_description" id="description" cols="50" rows="3" placeholder="Describe property"></textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <input type="submit" class="btn btn-info" name="editUser" value="save">
        <a href="/property/advertisement/<?= $adv->getId() ?>/delete" class="btn btn-info" role="button">delete advertisement</a>
        <a href="/property/advertisement/show" class="btn btn-info" role="button">cancel</a>
    </form>
</div>
<br>
<?php if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser'] == 'admin') {
    foreach($comments as $comment): ?>
        <div class="form-group text-left w-50 p-3 col-6 card bg-light mb-3 rounded mx-auto d-block">
            <div><?= $comment->getFull_name()?></div>
            <div><?= $comment->getTime()?></div>
            <text><?= $comment->getComment()?></text><br><br>
            <form action="/property/comment/<?= $advertisement->getId()?>/delete" method="post">
                <input type="submit" class="btn btn-info" name="delete_comm" value="delete comment" >
                <input type="hidden" id="adv_id"  name="adv_id" value=<?= $comment->getId() ?> >
            </form>
        </div>
    <?php endforeach;
} ?>
