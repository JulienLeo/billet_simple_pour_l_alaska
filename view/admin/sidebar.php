{% extends 'adminTemplate.php' %}

{% block content %}

    <div class="row">
        <div class="col-sm-3 sidebar">
            {% block sidebar %}{% endblock %}
        </div>
        <div class="col-sm-9 content">
            {% block main %}{% endblock %}
        </div>
    </div>


{% endblock content %}