{% extends 'sidebar.php' %}


{% block main %}
    <div class="pageTitle">
        <h2>Accueil administration</h2>
    </div>
    <div class="row homeLogos">
        <div class="col-sm-6">
            <a href="indexAdmin.php?action=addChapter">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="fas fa-align-justify"></i></p>
                    <p class="paraText">Ajout d'un chapitre</p>
                </span>
            </a>
        </div>

        <div class="col-sm-6">
            <a href="indexAdmin.php?action=adminListChapters">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="far fa-edit"></i></p>
                    <p class="paraText">Modification d'un chapitre</p>
                </span>
            </a>
        </div>
        
        
        <div class="col-sm-6">
            <a href="indexAdmin.php?action=adminComments">
                <span class="linkSpanner">
                    <p class="paraLogo"><i class="far fa-comment-dots"></i></p>
                    <p class="paraText">Gestion des commentaires</p>
                </span>
            </a>
        </div>
    </div>
{% endblock %}