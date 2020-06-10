{% extends 'sidebar.php' %}

{% block head %}
    <title>Modification du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Modification d'un chapitre</h2>
    </div>
    
    <article class="modifyChapterDiv">
       <div class="editConfirmation">
           <p>{{ content }}</p>
           <p><h4>Le chapitre {{ chapter.title }} a bien été modifié.</h4></p>
           <p><a href="index.php?action=adminListChapters">Retour à la modification/suppression des chapitres</a></p>
           <p><a href="index.php?action=homeAdmin">Retour à l'accueil</a></p>
       </div>
    </article>
{% endblock %}