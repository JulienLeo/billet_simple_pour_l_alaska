{% extends 'sidebar.php' %}

{% block head %}
    <title>Modification d'un commentaire du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Modification d'un commentaire</h2>
    </div>
    
    <div class="modifyChapterDiv">
       <div class="editConfirmation">
           <p>{{ content }}</p>
           <p><h4>Le commentaire du chapitre '{{ chapter.title }}' a bien été modifié.</h4></p>
           <p><a href="indexAdmin.php?p=adminComments">Retour à la gestion des commentaires</a></p>
           <p><a href="indexAdmin.php?p=admin">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}