{% extends 'sidebar.php' %}

{% block head %}
    <title>Gestion des commentaires</title>
{% endblock %}

{% block sidebar %}
    <nav>
        <h2>Administration</h2>
        <ul>
        <li><a href="indexAdmin.php?p=admin">Accueil</a></li>
            <li><a href="indexAdmin.php?p=addChapter">Ajouter un chapitre</a></li>
            <li><a href="indexAdmin.php?p=modifyChapter">Modifier/supprimer un chapitre</a></li>
            <li><a href="indexAdmin.php?p=adminComments">Gérer les commentaires</a></li>
            <li><a href="indexAdmin.php?p=authorPage">Page auteur</a></li>
        </ul>
    </nav>
{% endblock %}

{% block main %}
    <h2>GESTION DES COMMENTAIRES</h2>
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