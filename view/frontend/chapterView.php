{% extends 'template.php' %}

{% block head %}
    <title>{{ chapter.title }}</title>
{% endblock %}

{% block content %}
    <div class="chapterDiv">
        <p class="imgDiv"><img src="{{ chapter.img_url }}" alt="une peinture de paysage enneigé"></p>
        <h2>{{ romanNumbered(chapter.chapterNumber) }} <a id="goToComments" href="#target">Aller aux commentaires &darr;</a></h2>
        <h3><u>{{ chapter.title }}</u></h3>
        {{ chapter.content | raw | nl2br }}
        <p id="endChapter"><strong>Fin du chapitre {{ chapter.chapterNumber }}</strong></p>
    </div>

    <div class="commentsDiv" id="commentsDiv">
        <a id="target"></a>
        <h3>Poster un commentaire</h3>

        <form action="index.php?action=addComment&amp;id={{ chapter.id }}" method="post" id="commentForm">
            <div>
                <label for="author">Auteur</label>
                <input type="text" id="author" name="author" required/>
            </div>

            <div>
                <label for="comment">Votre commentaire</label>
                <textarea name="comment" id="comment" required></textarea>
            </div>

            <div>
                <input type="submit" value="Ajouter" id="addButton" />
            </div>
        </form>

        <div class="postedComments">

            <div class="commentsTitle">
                {% if comments|length > 0 %}
                    <h3 id="commentsTitle">Commentaires</h3>
                {% else %}
                    <h3>Pas de commentaires</h3>    
                {% endif %}
            </div>
            {% for postedComment in postedComments %}
                <div class="commentDiv">
                    <p><strong>{{ postedComment.author_comment }}</strong> le {{ postedComment.date_comment_fr }}</p>
                    <p>{{ postedComment.comment | nl2br }}</p>
                    <form action="index.php?action=reportComment&amp;id={{ chapter.id }}" method="post">
                        <button type="submit">
                            <i class="far fa-flag"></i>&nbsp;<i>Signaler</i>
                            <input type="text" name="id" value="{{ chapter.id}}">
                            <input type="text" name="commentId" value="{{ postedComment.id }}">
                        </button>
                        {% if postedComment.moderate == 1 %}
                            <span><i>(Ce commentaire a été signalé)</i></span>
                        {% endif %}
                    </form>
                </div>
            {% endfor %}
        </div>
    </div>
{% endblock %}