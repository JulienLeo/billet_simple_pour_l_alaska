{% extends 'sidebar.php' %}

{% block sidebar %}
    <nav>
        <h2>Administration</h2>
        <ul>
            <a href="indexAdmin.php?p=admin"><li>Accueil</li></a>
            <a href="indexAdmin.php?p=addChapter"><li>Ajouter un chapitre</li></a>
            <a href="indexAdmin.php?p=modifyChapter"><li>Modifier/supprimer un chapitre</li></a>
            <a href="indexAdmin.php?p=adminComments"><li>Gérer les commentaires</li></a>
            <a href="indexAdmin.php?p=authorPage"><li>Page auteur</li></a>
        </ul>
    </nav>
{% endblock %}

{% block main %}
    <h2>Accueil administration</h2>
    <div class="homeLogos">
        <div class="col-sm-1">
            <p><a href="indexAdmin.php?p=addChapter"><i class="fas fa-align-justify"></i>Ajout d'un chapitre</a></p>
        </div>
        <div class="col-sm-1">
            <p><a href="indexAdmin.php?p=modifyChapter"><i class="far fa-edit"></i>Modification/suppression d'un chapitre</a></p>
        </div>
        <div class="col-sm-1">
            <p><a href="indexAdmin.php?p=adminComments"><i class="far fa-comment-dots"></i>Gestion des commentaires</a></p>
        </div>
        <div class="col-sm-1">
            <p><a href="indexAdmin.php?p=authorPage"><i class="far fa-id-card"></i>Page auteur</a></p>
        </div>
    </div>
{% endblock %}