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
        <p><a href="index.php?action=post&amp;id={{ plusOne(chapter.id) }}">Chapitre suivant &#8594;</a>
    </div>
{% endblock %}