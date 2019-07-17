{% extends 'sidebar.php' %}

{% block head %}
    <title>Modification du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Modification/suppression d'un chapitre</h2>
    </div>
    
    <form class="modifyChapterDiv" action="indexAdmin.php?p=editChapter&amp;id={{ chapter.id }}" method="post">
        <div class="modifyItem modifyChapterImg">
            <img src="public/img/chapter_img/{{ chapter.img_url }}" alt="une peinture de paysage enneigé">
        </div>
        <div class="modifyItem modifyChapterTitle">
            <input type="text" id="modifyChapterTitle" name="modifyChapterTitle" value="{{ chapter.title }}" />
        </div>
        <div class="modifyItem modifyChapterContent chapterDivItem">
            <textarea name="chapterText" id="chapterText">{{ chapter.content }}</textarea>
        </div>

        <div class="modifyItem modifyChapterItemButtons">
            <input type="submit" id="modifyButton" value="Modifier" />
            <a href="indexAdmin.php?p=deleteChapter&amp;id={{ chapter.id }}"><input type="submit" id="deleteButton" value="Supprimer" /></a>
            <p>(Toute modification ou suppression sera définitive)</p>
        </div>
    </form>
{% endblock %}