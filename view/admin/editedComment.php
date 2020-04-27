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
           <p><h4>Le commentaire de {{ comment.author_comment }} du chapitre {{ chapter.title }} a bien été modifié.</h4></p>
           <p><a href="indexAdmin.php?action=adminComments">Retour à la gestion des commentaires</a></p>
           <p><a href="indexAdmin.php?action=">Retour à l'accueil</a></p>
       </div>
    </div>
{% endblock %}