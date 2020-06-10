{% block head %}
    <title>Administration du site de Jean Forteroche</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminStyle.css">
{% endblock %}

{% block content %}
    <body>
        <section class="signInContainer">
            <p class="websiteLinkDiv">
                <a class="websiteLink websiteLinkDiv" href="index.php?action=home"><i class="fas fa-arrow-circle-left"></i> Retour sur le site</a>
            </p>
            <section class="signInDiv">
                <form action="index.php?action=signIn" method="post">
                    <p class="usernameDiv">
                        <input type="text" id="admin" name="admin" placeholder="ID" class="usernameDiv" required/>
                    </p>
                    <p class="passwordDiv">
                        <input type="password" id="password" name="password" placeholder="Code" required/>
                    </p>
                    <p class="validAdmin">
                        <input type="submit" id="validAdminButton" value="Valider"/>
                    </p>
                </form>
            </section>
        </section>
    </body>
{% endblock %}