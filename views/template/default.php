<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" />
    <title>PHP FrameWork</title>
    <style>
        li {
            display: inline-block;
            margin-top: 1em;
        }

        a {
            text-decoration: none;
            font-size: 1.2em;
            margin-right: 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <nav>
                <ul>
                    <li><a href="/mynewproject">Home</a></li>
                    <li><a href="/mynewproject/blog">Blog</a></li>
                    <li><a href="/mynewproject/login">Se connecter</a></li>
                    <li><a href="/mynewproject/admin">Panel d'administration</a></li>
                </ul>
            </nav>
            <?= $content ?>
        </div>
    </div>
</body>
</html>