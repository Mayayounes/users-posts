<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single post</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="flex gap-2 mb-9 mt-3" href="/posts/post.php?id=<?= $post['id']?>">
        <div class="border w-screen bg-gray-200">
            <h1 class="text-center font-semibold text-neutral-700 mb-4"><?=$post['id'] .']'.$post['title']?></h1>
            <p><?=$post['body']?></p>
        </div>
    </div>
</body>
</html>