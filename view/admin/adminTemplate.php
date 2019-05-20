<!DOCTYPE html>
<html lang="fr">

    <head>
        {% block head %}{% endblock %}
        <title>Administration du site de Jean Forteroche</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/adminStyle.css">
    </head>

    <body name="top">
        <header>
            <h4>Administration du site de Jean Forteroche</h4>
        </header>

        <div class="container">
            
            {% block content %}
                    <div class="col-xs-8">
                        {% block main %}{% endblock %}
                    </div>
                    
            {% endblock %}
        </div>
        <footer>
            <p><a href="#top">Retour en haut de page</a></p>
            <p>&copy; 2019 Julien Leo</p>
        </footer>
    </body>

</html>