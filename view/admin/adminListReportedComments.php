{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires du chapitre '{{ chapter.title }}'</title>
{% endblock %}

{% block sidebar %}
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
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h3>Gestion des commentaires signalés</h3>
    </div>

    <div class="listReportedComments">
        {% for reportedComment in reportedComments %}
            <div class="reportedComment">
                <h4>Commentaire n°{{ reportedComment.id }} de {{ reportedComment.author_comment }}</h4>
            </div>
        {% endfor %}
    </div>
{% endblock %}