{% extends 'sidebar.php' %}

{% block head %}
    <title>Modifier/supprimer un chapitre</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-edit"></i>
        <h2>Modification/suppression d'un chapitre</h2>
    </div>
    
    <article class="listChaptersAdmin">
        <select class="chapterSelection" name="chapterSelection" id="chapterSelection" onchange="location=this.value">
            <option selected disabled >Sélection d'un chapitre</option>
            {% for chapter in chaptersAdmin %}
                <option class="selection" value="index.php?action=modifyChapter&amp;id={{ chapter.id }}">
                    {{ 'Chapitre ' ~ chapter.chapterNumber ~ ' : ' ~ chapter.title }}
                </option>
            {% endfor %}
        </select>
    </article>
{% endblock %}