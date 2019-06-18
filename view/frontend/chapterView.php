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
        <p id="nextChapter"><a href="{{ nextChapter }}">Chapitre suivant &#8594;</a></p>
    </div>

    <div class="commentsDiv">
        <h3>Poster un commentaire</h3>

        <form action="index.php?action=addComment&amp;id={{ chapter.id }}" method="post">
            <div>
                <label for="author">Auteur</label>
                <input type="text" id="author" name="author" required />
            </div>

            <div>
                <label for="comment">Votre commentaire</label>
                <textarea name="comment" id="comment" required></textarea>
            </div>

            <div>
                <input type="submit" value="Ajouter" id="addButton" />
            </div>
        </form>

            <h3>Commentaires</h3>
            {% for comment in comments %}<!--if comment.chapter_id  == chapter.id-OK-->
                <div class="commentDiv">
                    <p><strong>{{ comment.author_comment }}</strong> le {{ comment.date_comment_fr }}</p>
                    <p>{{ comment.comment | nl2br }}</p>
                    <p id="reportParaph"><a href="index.php?action=reportComment&amp;id={{ chapter.id }}"><i class="far fa-flag"></i>&nbsp;<i>Signaler</i></a></p>
                </div>
            {% endfor %}
    </div>
{% endblock %}