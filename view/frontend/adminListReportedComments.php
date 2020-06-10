{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires signalés</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h3>Gestion des commentaires signalés</h3>
    </div>

    <article class="listReportedComments">
        {% for reportedComment in reportedComments %}
            <div class="reportedComment">
                <h4>Commentaire de {{ reportedComment.author_comment }} (chapitre {{ reportedComment.title }})</h4>
                <p>"{{ reportedComment.comment }}" <a href="index.php?action=adminChapterComment&amp;id={{ reportedComment.commentId }}&amp;chapterId={{ reportedComment.chapter_id }}"><i>Modifier</i></a> / <a href="index.php?action=chapter&amp;id={{ reportedComment.chapter_id }}#target"><i>Voir la conversation</i></a></p>
            </div>
        {% else %}
            <h4>Pas de commentaires signalés à l'heure actuelle</h4>
        {% endfor %}
    </article>
{% endblock %}