{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires</title>
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
        <h2>Gestion des commentaires</h2>
    </div>
    <div class="row homeLogos">
        <div class="col-sm-6">
            <a href="indexAdmin.php?p=adminListReportedComments">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="fas fa-exclamation-circle"></i></p>
                    <p class="paraText">Gérer les commentaires signalés</p>
                </span>
            </a>
        </div>

        <div class="col-sm-6">
            <a href="indexAdmin.php?p=adminListChaptersComments">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="far fa-comment-dots"></i></p>
                    <p class="paraText">Gérer tous les commentaires</p>
                </span>
            </a>
        </div>
    </div>
{% endblock %}