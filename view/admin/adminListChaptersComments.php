{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires</title>
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
        <h2>Gestion des commentaires</h2>
    </div>
    <div class="listChaptersAdmin">
        <select class="chapterSelection" name="chapterSelection" id="chapterSelection" onchange="location=this.value">
            <option selected disabled >Sélection des commentaires d'un chapitre</option>
            {% for chapter in chaptersComments %}
                <option class="selection" value="indexAdmin.php?p=adminChapterComments&amp;id={{ chapter.id }}">
                    {{ 'Chapitre ' ~ chapter.id ~ ' : ' ~ chapter.title }}
                </option>
            {% endfor %}
        </select>
    </div>
{% endblock %}