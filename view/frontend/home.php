{% extends 'template.php' %}

{% block head %}
    <title>Billet Simple Pour L'Alaska</title>
{% endblock %}

{% block content %}

    <div class="row" style="margin: 20px !important">
        {% for chapter in chapters %}
                <div class="card listChapters borderedText col-xs">
                    <img src="public/img/billet_simple.png" width="20%" alt="une peinture de paysage enneigé">
                    <div class="card-block" width="100%">
                        <h3 class="card-title"> {{ 'Chapitre ' ~ romanNumbered(chapter.id) ~ ' : ' ~ chapter.title }}
                        </h3>
                        <p class="textContent">{{ substrWords(chapter.content, 500) | nl2br }}</p>
                        <p class="textContent"><em><a href="index.php?action=post&amp;id={{ chapter.id }}">Lire la suite ...</a></em></p>
                        <p class="textContent"><em>Ajouté le {{ chapter.addition_date_fr }}</em></p>
                    </div>
                </div>

            {% if loop.index is divisibleby(2) %}
    </div>
    <div class="row">
            {% endif %}
        {% endfor %}
    </div>

{% endblock %}