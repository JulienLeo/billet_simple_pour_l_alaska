{% extends 'sidebar.php' %}

{% block head %}
    <title>Modification du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Modification/suppression du chapitre {{ chapter.title }}</h2>
    </div>
    
    <form class="modifyChapterDiv" action="indexAdmin.php?action=editChapter&amp;id={{ chapter.id }}" method="post">
        <div class="modifyItem modifyChapterImg">
            <image src="{{ chapter.img_url }}" id="imgFileModificationImage" alt="une peinture de paysage enneigé"><br>
            <input type="file" name="img_url" id="imgFileModification" accept="image/png, image/jpg, image/jpeg"/>        
        </div>
        
        <div class="modifyItem modifyChapterNumber">
            <input type="number" id="modifyChapterNumber" name="modifyChapterNumber" value="{{ chapter.chapterNumber }}" />
        </div>

        <div class="modifyItem modifyChapterTitle">
            <input type="text" id="modifyChapterTitle" name="modifyChapterTitle" value="{{ chapter.title }}" />
        </div>
        
        <div class="modifyItem modifyChapterContent chapterDivItem">
            <textarea id="chapterText" name="modifyChapterContent">{{ chapter.content | raw }}</textarea>
        </div>

        <div class="modifyItem modifyChapterItemButtons">
            <input type="submit" id="modifyButton" value="Modifier" />
        </div>
    </form>

    <form action="indexAdmin.php?action=deleteChapter&amp;id={{ chapter.id }}" method="post">
        <input type="submit" id="deleteButton" value="Supprimer" />
    </form>

    <p id="modificationCaution">(Toute modification ou suppression sera définitive)</p>
{% endblock %}