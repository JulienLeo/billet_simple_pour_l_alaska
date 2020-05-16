{% extends 'template.php' %}

{% block head %}
    <title>Billet Simple Pour L'Alaska</title>
{% endblock %}

{% block content %}
    {% for chapter in chapters %}
        <div class="row">
            <div class="card listChapters borderedText col-xs">
                <img src="{{ chapter.img_url }}" alt="une peinture de paysage enneigé" class="imgChapter">
                <div class="card-block">
                    <h3 class="card-title">{{ 'Chapitre ' ~ romanNumbered(chapter.chapterNumber) ~ ' : ' ~ chapter.title }}
                    </h3>
                    <p class="textContent">{{ substrWords(chapter.content, 500) | raw }}</p>
                    <p class="textContent"><em><a href="index.php?action=chapter&amp;id={{ chapter.id }}">Lire la suite ...</a></em></p>
                    <p class="textContent"><em>Ajouté le {{ chapter.addition_date_fr }}</em></p>
                </div>
            </div>
        </div>
    {% endfor %}
{% endblock %}