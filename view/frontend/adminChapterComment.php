{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires du chapitre '{{ chapter.title }}'</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h3>Gestion du commentaire du chapitre</h3>
        <h2>'{{ chapter.title }}'</h2>
        <h4>écrit par {{ comment.author_comment }} le {{ comment.date_comment_fr }}</h4>
    </div>

    <form class="selectedComment" action="index.php?action=editComment&amp;id={{ comment.id }}&amp;chapterId={{ chapter.id }}&amp;token={{ token }}" method="post">
        <p class="modifyItem modifyCommentContent">
            <textarea name="commentText" id="commentText">{{ comment.comment }}</textarea>
        </p>

        <p class="modifyItem modifyCommentItemButtons">
            <input type="submit" id="modifyButton" value="Modifier" />
        </p>
    </form>

    <form action="index.php?action=deleteComment&amp;id={{ comment.id }}&amp;chapterId={{ chapter.id }}&amp;token={{ token }}" method="post">
        <input type="submit" id="deleteButton" value="Supprimer" />
    </form>

    <p id="modificationCaution">(Toute modification ou suppression sera définitive)</p>
{% endblock %}