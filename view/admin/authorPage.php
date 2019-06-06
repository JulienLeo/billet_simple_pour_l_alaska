{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion de la page auteur</title>
{% endblock %}

{% block sidebar %}
    <nav>
        <h2>Administration</h2>
        <ul>
            <a href="indexAdmin.php?p=admin"><li>Accueil</li></a>
            <a href="indexAdmin.php?p=addChapter"><li>Ajouter un chapitre</li></a>
            <a href="indexAdmin.php?p=adminListChapters"><li>Modifier/supprimer un chapitre</li></a>
            <a href="indexAdmin.php?p=adminComments"><li>Gérer les commentaires</li></a>
            <a href="indexAdmin.php?p=authorPage"><li>Page auteur</li></a>
        </ul>
    </nav>
{% endblock %}

{% block main %}
    <h2>GESTION DE LA PAGE AUTEUR</h2>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae consequatur iste suscipit modi, pariatur, enim aliquid reiciendis vitae iusto debitis velit, accusantium quidem. Repellat suscipit dolore quidem, qui dolorum maxime!
    </p>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae consequatur iste suscipit modi, pariatur, enim aliquid reiciendis vitae iusto debitis velit, accusantium quidem. Repellat suscipit dolore quidem, qui dolorum maxime!
    </p>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae consequatur iste suscipit modi, pariatur, enim aliquid reiciendis vitae iusto debitis velit, accusantium quidem. Repellat suscipit dolore quidem, qui dolorum maxime!
    </p>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae consequatur iste suscipit modi, pariatur, enim aliquid reiciendis vitae iusto debitis velit, accusantium quidem. Repellat suscipit dolore quidem, qui dolorum maxime!
    </p>
{% endblock %}