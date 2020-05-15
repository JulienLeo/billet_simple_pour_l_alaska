{% extends 'sidebar.php' %}

{% block head %}
    <title>Ajout d'un chapitre</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="fas fa-align-justify"></i>
        <h2>Ajouter un chapitre</h2>
    </div>
    <div class="addChapterDiv">
        <form action="indexAdmin.php?action=addedChapter&amp;token={{ token }}" method="post" enctype="multipart/form-data">
            <div class="addChapterDivItem">
                <input type="file" name="img_url" id="imgFile" accept="image/png, image/jpg, image/jpeg"/>
                <span class="error">* ajout d'une image obligatoire</span>
            </div>

            <div class="addChapterDivItem">
                <input type="number" id="addChapterNumber" name="chapterNumber" placeholder="N°" required/>
                <span class="error">* champ requis</span>
            </div>

            <div class="addChapterDivItem">
                <input type="text" id="addChapterTitle" name="title" placeholder="Titre" required/>
                <span class="error">* champ requis</span>
            </div>

            <div class="addChapterDivItem chapterDivItem">
                <textarea class="chapterContent" name="content" id="content"></textarea>
            </div>

            <div class="addChapterDivItem">
                <input type="submit" id="addChapterButton" value="Ajouter" />
            </div>
        </form>
    </div>
{% endblock %}