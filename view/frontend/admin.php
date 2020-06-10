{% extends 'sidebar.php' %}


{% block main %}
    <h2 class="pageTitle">Accueil administration</h2>

    <section class="row homeLogos">
        <article class="col-sm-6">
            <a href="index.php?action=addChapter">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="fas fa-align-justify"></i></p>
                    <p class="paraText">Ajout d'un chapitre</p>
                </span>
            </a>
        </article>

        <article class="col-sm-6">
            <a href="index.php?action=adminListChapters">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="far fa-edit"></i></p>
                    <p class="paraText">Modification d'un chapitre</p>
                </span>
            </a>
        </article>
        
        
        <article class="col-sm-6">
            <a href="index.php?action=adminComments">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="far fa-comment-dots"></i></p>
                    <p class="paraText">Gestion des commentaires</p>
                </span>
            </a>
        </article>
    </section>
{% endblock %}