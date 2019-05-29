{% extends 'template.php' %}

{% block head %}
    <title>{{ chapter.title }}</title>
{% endblock %}

{% block content %}
    <div class="chapterDiv">
        <p><img src="public/img/chapter_img/{{ chapter.img_url }}" alt="une peinture de paysage enneigé"></p>
        <p><h2>{{ romanNumbered(chapter.id) }}</h2></p>
        <p><h3><u>{{ chapter.title }}</u></h3></p>
        <p>{{ chapter.content | nl2br }}</p>
        <p><a href="{{ nextChapter }}">Chapitre suivant &#8594;</a></p>
    </div>

    <div class="commentsDiv">
        <h3>Poster un commentaire</h3>

        <form action="index.php?action=addComment&amp;id={{ chapter.id }}" method="post">
            <div>
                <label for="author">Auteur</label>
                <input type="text" id="author" name="author" />
            </div>

            <div>
                <label for="comment">Votre commentaire</label>
                <textarea name="comment" id="comment"></textarea>
            </div>

            <div>
                <input type="submit" value="Ajouter" />
            </div>
        </form>

        <h3>Commentaires</h3>
        <div class="commentDiv">
            {% for comment in comments %}
            <p><strong>{{ comment.author_comment}}</strong> le {{ comment.comment_date_fr }}</p>
            <p>{{ comment.content | nl2br}}</p>
            {% endfor %}
        </div>
    </div>
{% endblock %}