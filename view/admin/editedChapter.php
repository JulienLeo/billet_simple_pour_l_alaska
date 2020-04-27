{% extends 'sidebar.php' %}

{% block head %}
    <title>Modification du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Modification d'un chapitre</h2>
    </div>
    
    <div class="modifyChapterDiv">
       <div class="editConfirmation">
           <p>{{ content }}</p>
           <p><h4>Le chapitre {{ chapter.title }} a bien été modifié.</h4></p>
           <p><a href="indexAdmin.php?action=adminListChapters">Retour à la modification/suppression des chapitres</a></p>
           <p><a href="indexAdmin.php?action=">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}