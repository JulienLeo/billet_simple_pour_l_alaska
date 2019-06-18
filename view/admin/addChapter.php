{% extends 'sidebar.php' %}

{% block head %}
    <title>Ajout d'un chapitre</title>
{% endblock %}

{% block sidebar %}
    <nav>
        <h3>Administration</h3>
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

            <div class="addChapterDivItem">
                <textarea name="content" id="addChapterContent" placeholder="Ajoutez le chapitre ici" required></textarea>
            </div>

            <div class="addChapterDivItem">
                <input type="submit" id="addChapterButton" value="Ajouter" />
            </div>
        </form>
{% endblock %}