{% extends 'sidebar.php' %}

{% block head %}
    <title>Suppression du chapitre {{ chapter.title }}</title>
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
        <i class="far fa-edit"></i>
        <h2>Modification/suppression d'un chapitre</h2>
    </div>
    
    <div class="modifyChapterDiv">
       <div class="deleteConfirmation">
           <p><h3>Le chapitre {{ chapter.title }} a bien été supprimé.</h3></p>
           <p><a href="indexAdmin.php?p=adminListChapters">Retour à la modification/suppression des chapitres</a></p>
           <p><a href="indexAdmin.php?p=admin">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}