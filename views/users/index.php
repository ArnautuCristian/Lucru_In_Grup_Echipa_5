<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '../views/navbar.php'; ?> <!-- Asigură-te că ai un navbar pentru navigație -->
    <div class="container mt-5">
        <h3>List of All Users</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($users) > 0): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars($user->id) ?></td>
                                    <td><?= htmlspecialchars($user->nume) ?></td>
                                    <td><?= htmlspecialchars($user->prenume) ?></td>
                                    <td><?= htmlspecialchars($user->email) ?></td>
                                    <td>
                                        <a href="/profile/<?= $user->id ?>" class="btn btn-info btn-sm">View Profile</a>
                                        <!-- Dacă vrei să adaugi și opțiunea de a edita sau șterge utilizatorii -->
                                        <a href="/users/edit/<?= $user->id ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/users/delete/<?= $user->id ?>" method="POST" style="display:inline;">
                                            <input type="hidden" name="_METHOD" value="DELETE"/>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No users found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
