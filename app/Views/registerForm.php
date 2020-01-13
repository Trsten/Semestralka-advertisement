<div class="col-6 card bg-light mb-3 rounded mx-auto d-block">
    <br>
    <form method="POST" action="/property/home/registerUser">
        <div class="form-group">
            <label for="full_name">Full name</label>
            <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Enter full name" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <label for="con_password">confirm password</label>
            <input type="password" id="con_password" class="form-control" name="con_password" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Enter email address" required>
        </div>
        <input type="submit" class="btn btn-info" name="login">
        <br>
        <br>
    </form>

</div>