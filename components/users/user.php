<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="flex flex-wrap gap-4 p-4">
        <a class="bg-gray-100 p-4 rounded-lg shadow-md text-center border" href="/users/user.php?id=<?=$user['id']?>">
            <h2 class="font-bold"><?= $user['name']; ?></h2>
            <p><?= $user['email']; ?></p>
            <p><?= $user['mobile']; ?></p>
            <p><?= $user['roles']; ?></p>
        </a>
</body>
</html>