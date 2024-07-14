<!-- src/views/user/index.php -->
require '../index.html';

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user['name']) . ' - ' . htmlspecialchars($user['email']); ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="/user/create">Create User</a>
</body>
</html>

