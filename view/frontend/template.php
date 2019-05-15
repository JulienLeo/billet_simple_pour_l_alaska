<!DOCTYPE html>
<html lang="fr">

    <head>
        {% block head %}{% endblock %}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="public/css/style.css">
    </head>

    <body name="top">
        <header>
            <h1 id="bookTitle">Billet Simple Pour l'Alaska</h1>
            <h2 id="bookAuthor">par Jean Forteroche</h2>
        
            <nav>
                <ul class="menu">
                    <li><a href="index.php">Accueil</a></li>
                    <li>
                        <form action="post" method="post">
                            <select name="chapterSelection" id="chapterSelection">
                                <option value="">Chapitres</option>
                                <option>...</option>  
                            </select>
                        </form>
                    </li>
                    <li>L'auteur</li>
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