<!DOCTYPE html>
<html lang="fr">

    <head>
        {% block head %}{% endblock %}
        <title>Administration du site de Jean Forteroche</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/adminStyle.css">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
        <script>tinymce.init({selector:'.chapterDivItem'});</script>
    </head>

    <body name="top">
        <header>
            <h4>Administration du site de Jean Forteroche</h4>
        </header>

        <div class="container">
            {% block content %}{% endblock %}
        </div>
        
        <footer>
            <p class="footerLinks"><a href="#top">Retour en haut de page</a> - <a href="index.php?p=home">Retour sur le site</a></p>
            <p>&copy; 2019 Julien Leo</p>
        </footer>
    </body>

</html>