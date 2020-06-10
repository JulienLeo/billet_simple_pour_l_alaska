{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h2>Gestion des commentaires</h2>
    </div>

    <section class="row homeLogos">
        <article class="col-sm-6">
            <a href="index.php?action=adminListReportedComments">
                <div class="linkSpanner">
                    <p class="paraLogo"><i class="fas fa-exclamation-circle"></i></p>
                    <p class="paraText">Gérer les commentaires signalés</p>
                </div>
            </a>
        </article>

        <article class="col-sm-6">
            <a href="index.php?action=adminListChaptersComments">
                <div class="linkSpanner">
                    <p class="paraLogo"><i class="far fa-comment-dots"></i></p>
                    <p class="paraText">Gérer tous les commentaires</p>
                </div>
            </a>
        </article>
    </section>
{% endblock %}