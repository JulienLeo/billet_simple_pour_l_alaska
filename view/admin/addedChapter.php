{% extends 'sidebar.php' %}

{% block head %}
    <title>Ajout d'un chapitre</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="fas fa-align-justify"></i>
        <h2>Ajouter un chapitre</h2>
    </div>
    <div class="addedChapterDiv">
       <div class="addingConfirmation">
           <p><h3>Le chapitre a bien été ajouté.</h3></p>
           <p><a href="indexAdmin.php?action=addChapter">Ajouter un nouveau chapitre</a></p>
           <p><a href="indexAdmin.php">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}