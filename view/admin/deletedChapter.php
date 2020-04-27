{% extends 'sidebar.php' %}

{% block head %}
    <title>Suppression d'un chapitre</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Suppression d'un chapitre</h2>
    </div>
    
    <div class="modifyChapterDiv">
       <div class="deleteConfirmation">
           <p><h3>Le chapitre a bien été supprimé.</h3></p>
           <p><a href="indexAdmin.php?action=adminListChapters">Retour à la modification/suppression des chapitres</a></p>
           <p><a href="indexAdmin.php?action=">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}