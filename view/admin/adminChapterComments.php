{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires du chapitre {{ chapter.title }}</title>
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

    <div class="listComments">
        {% for comment in chapterComments %}
            <div class="comment">
                <p>"{{comment.comment}}" écrit par {{comment.author_comment}} le {{comment.date_comment_fr}} <a href="indexAdmin.php?p=adminChapterComment&amp;id={{ chapter.id }}"><i>Éditer</i></a></p>
            </div>
        {% endfor %}
    </div>
{% endblock %}