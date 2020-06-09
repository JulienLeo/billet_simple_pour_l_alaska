<!DOCTYPE html>
<html lang="fr">

    <head>
        {% block head %}{% endblock %}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="img/book-icon.png">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body id="top">
        <header>
            <h1 id="bookTitle">Billet Simple Pour l'Alaska</h1>
            <h2 id="bookAuthor">par Jean Forteroche</h2>
        
            <nav>
                <ul class="menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?action=home">Accueil</a></li>
                    <li class="nav-item">
                        <form action="post" method="post">
                            <select class="chapterSelection" name="chapterSelection" id="chapterSelection" onchange="location=this.value">
                                <option selected disabled >Chapitres</option>
                                {% for chapter in navList %}
                                    <option class="selection" value="index.php?action=chapter&amp;id={{ chapter.id }}">
                                        {{ chapter.chapterNumber ~ '. ' ~ chapter.title }}
                                    </option>
                                {% endfor %}
                            </select>
                        </form>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=author">L'auteur</a></li>
                </ul>
            </nav>
        </header>

        <main class="container">
            {% block content %}{% endblock %}
        </main>

        <footer>
            <p><a href="#top">Retour en haut de page</a> - <a href="index.php?action=admin">Admin</a></p>
            <p>&copy; 2019 Julien Leo</p>
        </footer>
    </body>

</html>