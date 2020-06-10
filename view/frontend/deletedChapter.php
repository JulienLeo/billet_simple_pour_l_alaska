{% extends 'sidebar.php' %}

{% block head %}
    <title>Suppression d'un chapitre</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Suppression d'un chapitre</h2>
    </div>
    
    <article class="modifyChapterDiv">
       <div class="deleteConfirmation">
           <p><h3>Le chapitre a bien été supprimé.</h3></p>
           <p><a href="index.php?action=adminListChapters">Retour à la modification/suppression des chapitres</a></p>
           <p><a href="index.php?action=homeAdmin">Retour à l'accueil</a></p>
       </div>
    </article>
{% endblock %}