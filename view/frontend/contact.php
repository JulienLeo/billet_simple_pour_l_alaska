{% extends 'template.php' %}

{% block head %}
    <title>Contact</title>
{% endblock %}

{% block content %}
    <form action="?action=contact">
        <h2 id="contactTitle">Contact</h2></br>
        <input type="text" name="name" placeholder="Votre nom"></br>
        <input type="email" name="email" placeholder="Votre email"></br>
        <input type="text" name="subject" placeholder="Objet"></br>
        <textarea name="message" id="message" rows="8"></textarea></br>
        <input type="submit" name="send" id ="send" value="Envoyer">
    </form>
{% endblock %}