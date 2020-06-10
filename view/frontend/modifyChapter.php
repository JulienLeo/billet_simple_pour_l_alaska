{% extends 'sidebar.php' %}

{% block head %}
    <title>Modification du chapitre {{ chapter.title }}</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Modification/suppression du chapitre {{ chapter.title }}</h2>
    </div>
    
    <form class="modifyChapterDiv" action="index.php?action=editChapter&amp;id={{ chapter.id }}&amp;token={{ token }}" method="post" enctype="multipart/form-data">
        <p class="modifyItem modifyChapterImg">
            <image src="{{ chapter.img_url }}" id="imgFileModificationImage" alt="une peinture de paysage enneigé"><br>
            <input type="file" name="img_url" id="imgFileModification" accept="image/png, image/jpg, image/jpeg"/>        
        </p>
        
        <p class="modifyItem modifyChapterNumber">
            <input type="number" id="modifyChapterNumber" name="modifyChapterNumber" value="{{ chapter.chapterNumber }}" />
        </p>

        <p class="modifyItem modifyChapterTitle">
            <input type="text" id="modifyChapterTitle" name="modifyChapterTitle" value="{{ chapter.title }}" />
        </p>
        
        <p class="modifyItem modifyChapterContent chapterDivItem">
            <textarea id="chapterText" name="modifyChapterContent">{{ chapter.content | raw }}</textarea>
        </p>

        <p class="modifyItem modifyChapterItemButtons">
            <input type="submit" id="modifyButton" value="Modifier" />
        </p>
    </form>

    
    <form action="index.php?action=deleteChapter&amp;id={{ chapter.id }}&amp;token={{ token }}" method="post">
        <input type="submit" id="deleteButton" value="Supprimer" />
    </form>

    <p id="modificationCaution">(Toute modification ou suppression sera définitive)</p>
{% endblock %}