{% extends 'adminTemplate.php' %}

{% block content %}

    <div class="row">
        <div class="col-sm-3 sidebar">
        <nav>
        <h2>Administration</h2>
        <ul>
            <a href="indexAdmin.php?action=home"><li>Accueil</li></a>
            <a href="indexAdmin.php?action=addChapter"><li>Ajouter un chapitre</li></a>
            <a href="indexAdmin.php?action=adminListChapters"><li>Modifier/supprimer un chapitre</li></a>
            <a href="indexAdmin.php?action=adminComments"><li>Gérer les commentaires</li></a>
        </ul>
    </nav>
            {% block sidebar %}{% endblock %}
        </div>
        <div class="col-sm-9 content">
            {% block main %}{% endblock %}
        </div>
    </div>


{% endblock %}