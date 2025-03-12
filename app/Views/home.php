<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
/* General styles */

.menu {
    display: flex;
    gap: 15px;
}

.menu a {
    color: white;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
}

.menu a:hover {
    background-color: #555;
}

.menu .dropdown {
    position: relative;
}

.menu .dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    top: 40px;
    left: 0;
    min-width: 150px;
    z-index: 1000;
}

.menu .dropdown-content a {
    display: block;
    padding: 10px;
}

.menu .dropdown-content a:hover {
    background-color: #555;
}

.menu .dropdown:hover .dropdown-content {
    display: block;
}

/* Responsive Menu */
.hamburger {
    display: none;
    font-size: 30px;
    cursor: pointer;
}

.menu-responsive {
    display: none;
    flex-direction: column;
    background-color: #333;
    width: 100%;
}

.menu-responsive a {
    padding: 10px;
    text-align: center;
}

.menu-responsive .dropdown-content {
    position: static;
}

@media (max-width: 768px) {
    .menu {
    display: none;
    }

    .hamburger {
    display: block;
    }

    .menu-responsive {
    display: flex;
    }
}

.welcomeDiv, .teamDiv {
    text-align: center;
    padding: 30px;
    color: white;
}

.welcomeDiv {
    background-color: green;
}

.teamDiv {
    background-color: rgb(33, 124, 33);
}

footer {
    background-color: #f1f1f1;
    text-align: center;
    padding: 15px;
}

footer .social {
    display: inline-block;
    margin-left: 10px;
}
</style>
<body>

    <div class="welcomeDiv">
        <h2>"BENVINGUTS A U.E.A"</h2>
        <p>*foto nens jugant*</p>
        <a class="w3-button w3-white w3-hover-green w3-round" href="./pages/log/login.html">INSCRIU-TE ARA</a>
    </div>

    <div class="teamDiv">
        <h2>UNEIX-TE AL NOSTRE EQUIP</h2>
        <p>ENTRENEM FUTURS CAMPIONS</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nisi sit perferendis, sunt commodi eum et fugiat ipsa mollitia adipisci modi laudantium quam inventore quibusdam accusantium quas amet labore exercitationem.</p>
    </div>

    <main class="w3-container" style="margin-top: 20px;">
        <h2 class="w3-center">Últimes Notícies</h2>
        <div class="w3-row-padding">
            <div class="w3-third w3-margin-bottom">
            <div class="w3-card w3-padding">
                <h3>Notícia 1</h3>
                <p>Detalls breus de la primera notícia.</p>
                <a href="#" class="w3-button w3-blue">Llegir més</a>
            </div>
            </div>
            <div class="w3-third w3-margin-bottom">
            <div class="w3-card w3-padding">
                <h3>Notícia 2</h3>
                <p>Detalls breus de la segona notícia.</p>
                <a href="#" class="w3-button w3-blue">Llegir més</a>
            </div>
            </div>
            <div class="w3-third w3-margin-bottom">
            <div class="w3-card w3-padding">
                <h3>Notícia 3</h3>
                <p>Detalls breus de la tercera notícia.</p>
                <a href="#" class="w3-button w3-blue">Llegir més</a>
            </div>
            </div>
        </div>
        <div class="w3-container w3-center w3-padding moreNews">
            <a href="/noticies" class="w3-button w3-blue w3-round">MÉS NOTÍCIES</a>
        </div>
    </main>
    
</body>
</html>