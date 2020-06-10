{% extends 'sidebar.php' %}

{% block head %}
    <title>Ajout d'un chapitre</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="fas fa-align-justify"></i>
        <h2>Ajouter un chapitre</h2>
    </div>

    <article class="addedChapterDiv">
       <div class="addingConfirmation">
           <h3>Le chapitre a bien été ajouté.</h3>
           <a href="index.php?action=addChapter">Ajouter un nouveau chapitre</a>
           <a href="index.php?action=homeAdmin">Retour à l'accueil</a>
       </div>
    </article>
{% endblock %}