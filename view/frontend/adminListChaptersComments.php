{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires</title>
{% endblock %}

{% block main %}
    <div class="pageTitle">
        <i class="far fa-comment-dots"></i>
        <h2>Gestion des commentaires</h2>
    </div>
    
    <article class="listChaptersAdmin">
        <select class="chapterSelection" name="chapterSelection" id="chapterSelection" onchange="location=this.value">
            <option selected disabled >Sélection des commentaires d'un chapitre</option>
            {% for chapter in chaptersComments %}
                <option class="selection" value="index.php?action=adminChapterComments&amp;id={{ chapter.id }}">
                    {{ 'Chapitre ' ~ loop.index ~ ' : ' ~ chapter.title }}
                </option>
            {% endfor %}
        </select>
    </article>
{% endblock %}