<?php
require_once 'libraries/functions.php' ;
demande_de_connection();

require_once 'headadmin.html' ;
?>

<body>

    <div class="form-actions">
        <a class="btn btn-success" style="margin: 1%;" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
    </div>
    <h1 class="titre-ajouter-article">Ajouter un nouvel Article </h1>

    <div class="container ajouter article">
        <form action=""></form>
        <div class="row">
            <div class="list-group border rounded">

                <label for="marques">Veuillez sélectionner une marque</label>
                <select name="marques" id="marques" onchange="getType(selectMarque) ;        
                activate(selectMarque,selectTypes);activate(selectMarque,selectModels)" class="list-group-item form-select-lg rounded">
                </select>
                <br>
                <label for="marques">Veuillez sélectionner un type</label>

                <select name="types" id="types" class="list-group-item form-select-lg rounded" onchange="getModel();activate(selectTypes,selectModels)" placeholder="veuillez selectionner un type">
                </select>
                <br>
                <label for="marques">Veuillez selectionner un model</label>

                <select name="models" id="models" class="list-group-item form-select-lg rounded">
                </select>
                <br>
                <label for="marques">Veuillez selectionner une catégorie</label>

                <select name="catégories" id="catégories" onchange="inputNouvelleValeur()" class="list-group-item form-select-lg rounded">

                </select>
                <br>
                <label for="marques">Veuillez selectionner une couleur</label>

                <select name="couleurs" id="couleurs" class="list-group-item form-select-lg rounded">
                </select>
                <br>
                <label for="marques">Veuillez selectionner la qualité</label>

                <select name="qualités" id="qualités" class="list-group-item form-select-lg rounded">
                </select>
                <br>
                <label for="marques">Veuillez selectionner le status</label>

                <select name="quantité" placeholder="Veuillez selectionner la disponibilité" id="quantité" class="list-group-item form-select-lg rounded">
                    

                </select>
                <br>
                <input name="prix" placeholder="Veuillez mettre le prix" id="prix" type='number' class="list-group-item form-select-lg rounded">
                </input>
                <br>

                <input name="image" id="image" type="file" class="list-group-item form-select-lg rounded" placeholder="Veuillez mettre le prix">
                <option value="">Veuillez choisir une image</option>

                <br>
                <input id="description" name="description" type='text' placeholder="Veuillez saisir une description" id="" class="col-6 list-group-item form-select-lg rounded">
                </input>
                <br>
                <br>
                <button type="submit" class="btn btn-primary col-6">Ajouter</button>

            </div>

        </div>

    </div>


    <script>
        var requete = new XMLHttpRequest;
        var selectMarque = document.getElementById('marques');
        var selectModels = document.getElementById('models')
        var selectTypes = document.getElementById('types');
        var selectQualite = document.getElementById('qualités');
        var selectCouleur = document.getElementById('couleurs');
        var selectCategorie = document.getElementById('catégories')


        function xmlGet(url) { //
            requete.open("GET", url, true)
            requete.send();
        };

        function xmlPost(url, valeur) {
            requete.open("POST", url, true);
            requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            requete.send("valeur=" + valeur);
        }
        getMarque(selectMarque);

        function getValueSelected(FormSelect) {
            var index = FormSelect.options.selectedIndex; //recuperer index de la valeur selectionnée sur le tableau
            var valeur = FormSelect[index].value;
            return valeur
        }

        function createOptionEmpty(select, valeur) {
            var option = document.createElement("option");
            option.text = "Veuillez renseigner " + valeur;
            option.value = "";
            select.add(option)
        }
      
        function createOption(reponse, select) {

            for (i = 0; i < reponse.length; i++) {


                var option = document.createElement("option");
                // le contenu text de chaque option créée = nom de l'objet
                option.text = reponse[i].nom
                option.value = reponse[i].nom
                select.add(option)
            }
        }

        function emptySelect(select) { //sert a vider le select
            select.length = null;

        }

        function nouvelleValeur(select) // a faire
        {
            var option = document.createElement("option");
            // le contenu text de chaque option créée = nom de l'objet
            option.text = 'Nouvelle Valeur'
            option.value = 'Nouvelle Valeur'
            select.add(option)
        }









        function activate(select1, select2) {
            var valeur = select1[select1.options.selectedIndex].value;
            console.log(valeur)
            if (valeur === "")

                select2.disabled = true
            else select2.disabled = false

        }
        createOptionEmpty(selectMarque, " la marque")


        function getMarque(selectMarque) {
            url = "requetes/getMarque.php";
            xmlGet(url)
            requete.onreadystatechange = function() {
                if (requete.readyState === 4 && requete.status == 200) {
                    var reponse = JSON.parse(requete.response);
                    createOption(reponse, selectMarque)
                    nouvelleValeur(selectMarque)
                }
            }
        }




        function getType() {
            valeur = getValueSelected(selectMarque) //recupere la valeur selectionnée dans le tableau grace a l'index 
            var url = "requetes/getType.php"
            xmlPost(url, valeur)
            requete.onreadystatechange = function() {
                if (requete.readyState === 4 && requete.status == 200 && valeur != "") {
                    var reponse = JSON.parse(requete.response);
                    emptySelect(selectTypes) //vide le select
                    createOptionEmpty(selectTypes, " le type") // crée une option vide
                    createOption(reponse, selectTypes) //insere les options dans le select
                    nouvelleValeur(selectTypes)

                }
            }
        }



        function getModel() {

            valeur = getValueSelected(selectTypes);

            var url = "requetes/getModel.php";
            xmlPost(url, valeur);

            requete.onreadystatechange = function() {
                if (requete.readyState === 4 && requete.status == 200 && valeur != "") {
                    var reponse = JSON.parse(requete.response)
                    emptySelect(selectModels)
                    createOptionEmpty(selectModels, " le model")
                    createOption(reponse, selectModels)
                    nouvelleValeur(selectModels)
                }
            }
        }
        function CreateSelectOptionWithParent(url)//non appelée
        {
            valeur = getValueSelected(selectParent);

            var urlModel = "requetes/getModel.php";
            xmlPost(url, valeur);

            requete.onreadystatechange = function() {
                if (requete.readyState === 4 && requete.status == 200 && valeur != "") {
                    var reponse = JSON.parse(requete.response)
                    emptySelect(select)
                    createOptionEmpty(select, " le model")
                    createOption(reponse, select)
                    nouvelleValeur(select)
                }
            }

        }


        function getQualité() {
            var url = 'requetes/getQualite.php';
            var requete = new XMLHttpRequest();
            requete.open("GET", url, true)
            requete.send();

            requete.onreadystatechange = function() {
                if (requete.readyState === 4) {
                    var reponse = JSON.parse(requete.response);
                    for (i = 0; i < reponse.length; i++) {
                        var option = document.createElement('option');
                        option.text = reponse[i].qualite
                        option.value = reponse[i].qualite
                        selectQualite.add(option)

                    }
                }

            }
        }
        getQualité()


        function getCouleur() {
            var url = 'requetes/getCouleur.php';
            var requete = new XMLHttpRequest();
            requete.open("GET", url, true)
            requete.send();

            requete.onreadystatechange = function() {
                if (requete.readyState === 4) {
                    var reponse = JSON.parse(requete.response);
                    for (i = 0; i < reponse.length; i++) {
                        var option = document.createElement('option');
                        option.text = reponse[i].couleur
                        option.value = reponse[i].couleur
                        selectCouleur.add(option)

                    }
                }

            }

        }
        getCouleur();

        function getCategorie() {
            var url = 'requetes/getCategorie.php';
            var requete = new XMLHttpRequest();
            requete.open("GET", url, true)
            requete.send();

            requete.onreadystatechange = function() {
                if (requete.readyState === 4) {
                    var reponse = JSON.parse(requete.response);
                    createOptionEmpty(selectCategorie, 'la categorie')
                    createOption(reponse, selectCategorie)
                }

            }
        }
        getCategorie()

        function inputNouvelleValeur() {
            //**si la veleur selectionnée est egale a nouvelle valeur 
            //affiche un input dsans les options et recupere sa valeur
            if (FormSelect[FormSelect.options.selectedIndex].value == 'Nouvelle Valeur') {
                let input = document.createElement('input')
                input.className = "list-group-item form-select-lg rounded";
                selectCategorie.replaceWith(input);
            }


        }
    </script>
</body>

</html>