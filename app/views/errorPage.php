<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/css/errorPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
    <div class="central">
        <p id="http-status"> <?= $error ?></p>
        <p id="message"><?= $message ?></p>
        <a href="/" id="link">Back to Homepage</a>
    </div>
</body>
</html>