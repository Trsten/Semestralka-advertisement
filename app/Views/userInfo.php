<br>
<div class="col-8 card bg-light mb-6 rounded mx-auto d-block">
    <h1 class="text-center">Edit <?php echo $user->getUsername(); ?> </h1>
    <br>
    <form action="/property/user/edit" method="post">
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
                <th scope="row">Full name:</th>
                <td><?php echo $user->getFullName(); ?></td>
                <td><label for="edit_full_name"></label>
                    <input type="text" id="edit_fullname" placeholder="<?php echo $user->getFullName(); ?>" name="full_name">
                </td>
            </tr>
            <tr>
                <th scope="row">Username:</th>
                <td><?php echo $user->getUsername(); ?></td>
                <td><label for="edit_username"></label>
                    <input type="text" id="edit_username" placeholder="<?php echo $user->getUsername(); ?>" name="username">
                </td>
            </tr>
            <tr>
                <th scope="row">Password:</th>
                <td>xxxxxx</td>
                <td><label for="edit_password"></label>
                    <input type="password" id="edit_password" placeholder="xxxxxx" name="password">
                </td>
            </tr>
            <tr>
                <th scope="row">Email address:</th>
                <td><?php echo $user->getEmail(); ?></td>
                <td><label for="edit_email"></label>
                    <input type="email" id="edit_email" placeholder="<?php echo $user->getEmail(); ?>" name="email" >
                </td>
            </tr>
        </tbody>
    </table>
        <input type="submit" class="btn btn-info" name="editUser" value="save">
        <input type="submit" class="btn btn-info" name="editUser" value="cancel">
    </form>
    <br>
</div>
<br>