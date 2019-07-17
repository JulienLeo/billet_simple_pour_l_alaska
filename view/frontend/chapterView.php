{% extends 'template.php' %}

{% block head %}
    <title>{{ chapter.title }}</title>
{% endblock %}

{% block content %}
    <div class="chapterDiv">
        <p class="imgDiv"><img src="public/img/chapter_img/{{ chapter.img_url }}" alt="une peinture de paysage enneigé"><a id="goToComments" href="#target">Aller aux commentaires &darr;</a></p>
        <p><h2>{{ romanNumbered(loop.index) }}</h2></p>
        <p><h3><u>{{ chapter.title }}</u></h3></p>
        <p>{{ chapter.content | raw }}</p>
        <p id="endChapter"><strong>Fin du chapitre {{ loop.index }}</strong></p>
            <!--{% if chapter.id - 1 == true %}
                <p id="prevChapter"><a href="index.php?action=chapter&amp;id={{ chapter.id - 1 }}">Chapitre précédent &#8592;</a></p>
            {% endif %}

            {% if chapter.id + 1 == true %}
                <p id="nextChapter"><a href="index.php?action=chapter&amp;id={{ chapter.id + 1 }}">Chapitre suivant &#8594;</a></p>
            {% endif %}-->
    </div>

    <div class="commentsDiv" id="commentsDiv">
        <a name="target" id="target"></a>
        <h3>Poster un commentaire</h3>

        <form action="index.php?action=addComment&amp;id={{ chapter.id }}" method="post" id="commentForm">
            <div>
                <label for="author">Auteur</label>
                <input type="text" id="author" name="author" max-length="20" required />
            </div>

            <div>
                <label for="comment">Votre commentaire</label>
                <textarea name="comment" id="comment" max-length="1000" required></textarea>
            </div>

            <div>
                <input type="submit" value="Ajouter" id="addButton" />
            </div>
        </form>

        <div class="postedComments">

            <div class="commentsTitle">
                    <h3 id="commentsTitle">Commentaires</h3>
                    {% for comment in comments %}
                        <div class="commentDiv">
                            <p><strong>{{ comment.author_comment }}</strong> le {{ comment.date_comment_fr }}</p>
                            <p>{{ comment.comment | nl2br }}</p>
                            <form action="index.php?action=reportComment" method="post">
                                <button type="submit">
                                <i class="far fa-flag"></i>&nbsp;<i>Signaler</i>
                                <input type="text" name="id" value="{{ chapter.id}}">
                                <input type="text" name="commentId" value="{{ comment.id }}">
                             </button>
                            </form>
                        </div>
                    {% endfor %}
            </div>
        </div>
    </div>
{% endblock %}