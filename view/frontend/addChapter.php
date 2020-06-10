{% extends 'sidebar.php' %}

{% block head %}
    <title>Ajout d'un chapitre</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="fas fa-align-justify"></i>
        <h2>Ajouter un chapitre</h2>
    </div>
    
    <article class="addChapterDiv">
        <form action="index.php?action=addedChapter&amp;token={{ token }}" method="post" enctype="multipart/form-data">
            <p class="addChapterDivItem">
                <input type="file" name="img_url" id="imgFile" accept="image/png, image/jpg, image/jpeg"/>
                <span class="error">* ajout d'une image obligatoire</span>
            </p>

            <p class="addChapterDivItem">
                <input type="number" id="addChapterNumber" name="chapterNumber" placeholder="N°" required/>
                <span class="error">* champ requis</span>
            </p>

            <p class="addChapterDivItem">
                <input type="text" id="addChapterTitle" name="title" placeholder="Titre" required/>
                <span class="error">* champ requis</span>
            </p>    

            <p class="addChapterDivItem chapterDivItem">
                <textarea class="chapterContent" name="content" id="content"></textarea>
            </p>

            <p class="addChapterDivItem">
                <input type="submit" id="addChapterButton" value="Ajouter" />
            </p>
        </form>
    </article>
{% endblock %}