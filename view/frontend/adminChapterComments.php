{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h3>Gestion des commentaires du chapitre</h3>
        <h2>'{{ chapter.title }}'</h2>
    </div>

    <article class="listComments">
        {% for comment in chapterComments %}
            <div class="comment">
                <p>"{{ comment.comment }}" écrit par {{ comment.author_comment }} le {{ comment.date_comment_fr }} <a href="index.php?action=adminChapterComment&amp;id={{ comment.id }}&amp;chapterId={{ chapter.id }}"><i>Éditer</i></a></p>
            </div>
        {% else %}
            <h4>Pas de commentaires sur ce chapitre</h4>
        {% endfor %}
    </article>
{% endblock %}