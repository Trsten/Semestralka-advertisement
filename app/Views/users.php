<div class="col-md-8">
    <table class="table">
        <thead clss="thead-dark">
           <tr>
               <th scope="col">#</th>
               <th scope="col">Username</th>
               <th scope="col">Full Name</th>
           </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <th scope="row"><?= $user->getId() ?></th>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getFullname() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>