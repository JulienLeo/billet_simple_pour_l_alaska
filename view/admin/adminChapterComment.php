{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires du chapitre '{{ chapter.title }}'</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h3>Gestion des commentaires du chapitre</h3>
        <h2>'{{ chapter.title }}'</h2>
    </div>
    <form class="selectedComment" action="indexAdmin.php?p=editComment&amp;id={{ comment.id }}" method="post">
        <div class="modifyItem modifyCommentContent">
            <textarea name="commentText" id="commentText">{{ comment.comment }}</textarea>
        </div>

        <div class="modifyItem modifyCommentItemButtons">
            <input type="submit" id="modifyButton" value="Modifier" />
            <a href="indexAdmin.php?p=deleteComment&amp;id={{ comment.id }}">
                <input type="submit" id="deleteButton" value="Supprimer" />
            </a>
            <p>(Toute modification ou suppression sera définitive)</p>
        </div>
    </form>
{% endblock %}