{% extends 'adminTemplate.php' %}

{% block content %}

    <section class="row">
        <aside class="col-sm-3 sidebar">
            <nav>
                <h2>Administration</h2>
                <ul>
                    <a href="index.php?action=homeAdmin"><li>Accueil</li></a>
                    <a href="index.php?action=addChapter"><li>Ajouter un chapitre</li></a>
                    <a href="index.php?action=adminListChapters"><li>Modifier/supprimer un chapitre</li></a>
                    <a href="index.php?action=adminComments"><li>Gérer les commentaires</li></a>
                </ul>
            </nav>
            {% block sidebar %}{% endblock %}
        </aside>
        <section class="col-sm-9 content">
            {% block main %}{% endblock %}
        </section>
    </section>


{% endblock %}