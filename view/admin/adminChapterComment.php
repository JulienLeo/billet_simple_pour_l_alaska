{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires du chapitre '{{ chapter.title }}'</title>
{% endblock %}

{% block sidebar %}
    <nav>
        <h2>Administration</h2>
        <ul>
            <a href="indexAdmin.php?p=admin"><li>Accueil</li></a>
            <a href="indexAdmin.php?p=addChapter"><li>Ajouter un chapitre</li></a>
            <a href="indexAdmin.php?p=adminListChapters"><li>Modifier/supprimer un chapitre</li></a>
            <a href="indexAdmin.php?p=adminComments"><li>Gérer les commentaires</li></a>
            <a href="indexAdmin.php?p=authorPage"><li>Page auteur</li></a>
        </ul>
    </nav>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h3>Gestion des commentaires du chapitre</h3>
        <h2>'{{ chapter.title }}'</h2>
    </div>
    <div class="selectedComment">
        <div class="modifyItem modifyCommentContent">
            <textarea name="commentText" id="commentText">{{ comment.comment }}</textarea>
        </div>

        <div class="modifyItem modifyCommentItemButtons">
            <a href="indexAdmin.php?p=editComment&amp;id={{ comment.id }}"><input type="submit" id="modifyButton" value="Modifier" /></a>
            <a href="indexAdmin.php?p=deleteComments&amp;id={{ comment.id }}"></a><input type="submit" id="deleteButton" value="Supprimer" /></a>
            <p>(Toute modification ou suppression sera définitive)</p>
        </div>
    </div>
{% endblock %}