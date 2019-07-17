{% extends 'sidebar.php' %}

{% block head %}
    <title>Suppression du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Suppression d'un chapitre</h2>
    </div>
    
    <div class="modifyChapterDiv">
       <div class="deleteConfirmation">
           <p><h3>Le chapitre a bien été supprimé.</h3></p>
           <p><a href="indexAdmin.php?p=adminListChapters">Retour à la modification/suppression des chapitres</a></p>
           <p><a href="indexAdmin.php?p=admin">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}