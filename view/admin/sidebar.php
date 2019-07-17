{% extends 'adminTemplate.php' %}

{% block content %}

    <div class="row">
        <div class="col-sm-3 sidebar">
        <nav>
        <h2>Administration</h2>
        <ul>
            <a href="indexAdmin.php?p=admin"><li>Accueil</li></a>
            <a href="indexAdmin.php?p=addChapter"><li>Ajouter un chapitre</li></a>
            <a href="indexAdmin.php?p=adminListChapters"><li>Modifier/supprimer un chapitre</li></a>
            <a href="indexAdmin.php?p=adminComments"><li>Gérer les commentaires</li></a>
            <a href="indexAdmin.php?p=authorPage"><li>Page auteur</li></a>
        </ul>
    </nav>
            {% block sidebar %}{% endblock %}
        </div>
        <div class="col-sm-9 content">
            {% block main %}{% endblock %}
        </div>
    </div>


{% endblock %}