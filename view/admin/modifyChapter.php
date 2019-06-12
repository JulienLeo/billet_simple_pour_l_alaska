{% extends 'sidebar.php' %}

{% block head %}
    <title>Modification du chapitre {{ chapter.title }}</title>
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
    
    <div class="modifyChapterDiv">
        <div class="modifyItem modifyChapterImg">
            <img src="public/img/chapter_img/{{ chapter.img_url }}" alt="une peinture de paysage enneigé">
        </div>
        <div class="modifyItem modifyChapterTitle">
            <input type="text" id="modifyChapterTitle" name="modifyChapterTitle" value="{{ chapter.title }}" />
        </div>
        <div class="modifyItem modifyChapterContent">
            <textarea name="chapterText" id="chapterText">{{ chapter.content }}</textarea>
        </div>

        <div class="modifyItem modifyChapterItemButtons">
            <a href="indexAdmin.php?p=editChapter&amp;id={{ chapter.id }}"><input type="submit" id="modifyButton" value="Modifier" /></a>
            <a href="indexAdmin.php?p=deleteChapter&amp;id={{ chapter.id }}"></a><input type="submit" id="deleteButton" value="Supprimer" /></a>
            <p>(Toute modification ou suppression sera définitive)</p>
        </div>
    </div>
{% endblock %}