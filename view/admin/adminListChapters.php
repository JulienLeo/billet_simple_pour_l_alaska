{% extends 'sidebar.php' %}

{% block head %}
    <title>Modifier/supprimer un chapitre</title>
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
        <i class="far fa-edit"></i>
        <h2>Modification/suppression d'un chapitre</h2>
    </div>
    <div class="listChaptersAdmin">
        <select class="chapterSelection" name="chapterSelection" id="chapterSelection" onchange="location=this.value">
            <option selected disabled >Sélection d'un chapitre</option>
            {% for chapter in chaptersAdmin %}
                <option class="selection" value="indexAdmin.php?p=modifyChapter&amp;id={{ chapter.id }}">
                    {{ 'Chapitre ' ~ chapter.id ~ ' : ' ~ chapter.title }}
                </option>
            {% endfor %}
        </select>
    </div>
{% endblock %}