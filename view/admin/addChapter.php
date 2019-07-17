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

        <form action="indexAdmin.php?p=addedChapter" method="post">
            <div class="addChapterDivItem">
                <input type="file" name="img_url" id="imgFile" accept="image/png" required/>
            </div>

            <div class="addChapterDivItem">
                <input type="text" id="addChapterTitle" name="title" placeholder="Titre" required/>
            </div>

            <div class="addChapterDivItem chapterDivItem">
            </div>

            <div class="addChapterDivItem">
                <input type="submit" id="addChapterButton" value="Ajouter" />
            </div>
        </form>
{% endblock %}