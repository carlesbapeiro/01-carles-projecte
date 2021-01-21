<form action="" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" type="text" name="name" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input id="password" class="form-control-file" type="text" name="password" required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role" id="role">

            <option value="ROLE_ADMIN">Admin</option>
            <option value="ROLE_USER">User</option>

        </select>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
