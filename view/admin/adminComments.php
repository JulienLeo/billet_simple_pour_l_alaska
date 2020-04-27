{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h2>Gestion des commentaires</h2>
    </div>
    <div class="row homeLogos">
        <div class="col-sm-6">
            <a href="indexAdmin.php?action=adminListReportedComments">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="fas fa-exclamation-circle"></i></p>
                    <p class="paraText">Gérer les commentaires signalés</p>
                </span>
            </a>
        </div>

        <div class="col-sm-6">
            <a href="indexAdmin.php?action=adminListChaptersComments">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="far fa-comment-dots"></i></p>
                    <p class="paraText">Gérer tous les commentaires</p>
                </span>
            </a>
        </div>
    </div>
{% endblock %}