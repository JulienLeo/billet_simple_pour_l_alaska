{% extends 'sidebar.php' %}

{% block head %}
    <title>Suppression d'un commentaire du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Suppression d'un commentaire</h2>
    </div>
    
    <article class="modifyChapterDiv">
       <div class="deleteConfirmation">
           <p><h3>Le commentaire a bien été supprimé.</h3></p>
           <p><a href="index.php?action=adminComments">Retour à la modification/suppression des commentaires</a></p>
           <p><a href="index.php?action=homeAdmin">Retour à l'accueil</a></p>
       </div>
    </article>
{% endblock %}