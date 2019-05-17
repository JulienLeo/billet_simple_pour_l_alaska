<!DOCTYPE html>
<html lang="fr">

    <head>
        {% block head %}{% endblock %}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" rel="stylesheet">
        <link rel="stylesheet" href="public/css/style.css">
    </head>

    <body name="top">
        <header>
            <h1 id="bookTitle">Billet Simple Pour l'Alaska</h1>
            <h2 id="bookAuthor">par Jean Forteroche</h2>
        
            <nav>
                <ul class="menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?p=home">Accueil</a></li>
                    <li class="nav-item">
                        <form action="post" method="post">
                            <select class="chapterSelection" name="chapterSelection" id="chapterSelection">
                                <option selected disabled >Chapitres</option>
                                <!--{% for chapter in chapters %}-->
                                    <option class="selection" value="{{ chapter.id }}"><a href="index.php?action=post&amp;id={{ chapter.id }}">{{ chapter.id ~ '. ' ~ chapter.title }}</a></option>
                                <!--{% endfor %}-->
                            </select>
                        </form>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=author">L'auteur</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            {% block content %}{% endblock %}
        </div>

        <footer>
            <p><a href="#top">Retour en haut de page</a></p>
            <p>&copy; 2019 Julien Leo</p></footer>
    </body>

</html>