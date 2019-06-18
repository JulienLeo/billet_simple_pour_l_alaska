{% extends 'sidebar.php' %}

{% block head %}
    <title>Ajout d'un chapitre</title>
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
        <i class="fas fa-align-justify"></i>
        <h2>Ajouter un chapitre</h2>
    </div>
    <div class="addedChapterDiv">
       <div class="addingConfirmation">
           <p><h3>Le chapitre {{ chapter.title }} a bien été ajouté.</h3></p>
           <p><a href="indexAdmin.php?p=addChapter">ajouter un nouveau chapitre</a></p>
           <p><a href="indexAdmin.php?p=admin">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}