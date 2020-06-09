{% extends 'template.php' %}

{% block head %}
    <title>{{ chapter.title }}</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("commentForm").submit();
        }
    </script>
    <!--<script src="https://www.google.com/recaptcha/api.js?render=6LcP9_8UAAAAAOWR9a2mNj9tjCF__2YL4HN7Lbd1"></script>-->
    <!--<script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LcP9_8UAAAAAOWR9a2mNj9tjCF__2YL4HN7Lbd1', {action: 'submit'}).then(function(token) {
                let recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>-->
{% endblock %}

{% block content %}
    <section class="chapterDiv">
        <p class="imgDiv"><img src="{{ chapter.img_url }}" alt="une peinture de paysage enneigé"></p>
        <h2>{{ romanNumbered(chapter.chapterNumber) }} <a id="goToComments" href="#target">Aller aux commentaires &darr;</a></h2>
        <h3><u>{{ chapter.title }}</u></h3>
        {{ chapter.content | raw | nl2br }}
        <p id="endChapter"><strong>Fin du chapitre {{ chapter.chapterNumber }}</strong></p>
    </section>

    <section class="commentsDiv" id="commentsDiv">
        <a id="target"></a>

        <h3>Poster un commentaire</h3>

        <form action="index.php?action=addComment&amp;id={{ chapter.id }}" method="post" id="commentForm">
            <label for="author">Auteur <span id="spanAuthor">* champs obligatoire</span></label>
            <input type="text" id="author" name="author" class="inputComments"/>
        
            <label for="comment">Votre commentaire <span id="spanComment">* champs obligatoire</span></label>
            <textarea type="text" name="comment" id="comment" class="inputComments"></textarea>    

            <button type="submit" name="addButton" id="addButton" class="g-recaptcha" data-sitekey="6LcP9_8UAAAAAOWR9a2mNj9tjCF__2YL4HN7Lbd1
" data-callback='onSubmit' data-action='submit' value="Ajouter">Ajouter</button>

            <!--<input type="hidden" name="recaptcha_response" id="recaptchaResponse">-->           
        </form>

        <section class="postedComments">

            <span class="commentsTitle">
                {% if noComments|length > 0 %}
                    <h3 id="commentsTitle">Commentaires</h3>
                {% else %}
                    <h3>Pas de commentaires</h3>
                {% endif %}
            </span>
            {% for postedComment in postedComments %}
                <article class="commentDiv">
                    <p><strong>{{ postedComment.author_comment }}</strong> le {{ postedComment.date_comment_fr }}</p>
                    <p>{{ postedComment.comment | nl2br }}</p>                    
                    <form action="index.php?action=reportComment&amp;id={{ chapter.id }}" method="post">
                        <input type="text" name="id" value="{{ chapter.id}}" class="hidden">
                        <input type="text" name="commentId" value="{{ postedComment.id }}" class="hidden">
                        <button type="submit" class="alertButton"><i class="far fa-flag"></i>Signaler</button>     
                        {% if postedComment.moderate == 1 %}
                            <span><i>(Ce commentaire a été signalé)</i></span>
                        {% endif %}
                    </form>
                </article>
            {% endfor %}
        </section>
    </section>
    <script src="js/commentActions.js"></script>
{% endblock %}