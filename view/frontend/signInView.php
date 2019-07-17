{% block head %}
    <title>Administration du site de Jean Forteroche</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/adminStyle.css">
{% endblock %}

{% block content %}
    <body>
        <div class="signInContainer">
            <div class="websiteLinkDiv">
                <a class="websiteLink" href="index.php?p=home"><i class="fas fa-arrow-circle-left"></i> Retour sur le site</a>
            </div>
            <div class="signInDiv">
                <form action="indexAdmin.php" method="post">
                    <div class="usernameDiv">
                        <input type="text" id="username" name="username" placeholder="ID" required/>
                    </div>
                    <div class="passwordDiv">
                        <input type="text" id="password" name="password" placeholder="Code" required/>
                    </div>
                    <div class="validAdmin">
                        <input type="submit" id="validAdminButton" value="Valider"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
{% endblock %}