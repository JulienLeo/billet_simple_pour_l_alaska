{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires du chapitre '{{ chapter.title }}'</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h3>Gestion des commentaires signalés</h3>
    </div>

    <div class="listReportedComments">
    {% for reportedComment in reportedComments %}
            <div class="reportedComment">
                <h4>Commentaire de {{ reportedComment.author_comment }}</h4>
                <p>{{ reportedComment.comment }} <a href="indexAdmin.php?p=adminChapterComment&amp;id={{ reportedComment.id }}&amp;chapterId={{ chapter.id }}"><i>Modifier</i></a></p>
            </div>
        {% endfor %}
    </div>
{% endblock %}