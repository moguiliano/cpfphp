var requete = new XMLHttpRequest;
        var selectMarque = document.getElementById('marques');
        var selectModels = document.getElementById('models')
        var selectTypes = document.getElementById('types');
        var selectQualite = document.getElementById('qualités');
        var selectCouleur = document.getElementById('couleurs');
        var selectCategorie = document.getElementById('catégories')


        function xmlGet(url) {
            requete.open("GET", url, true)
            requete.send();
        };

        function xmlPost(url, valeur) {
            requete.open("POST", url, true);
            requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            requete.send("valeur=" + valeur);
        }

        function createOptionEmpty(select, valeur) {
            var option = document.createElement("option");
            option.text = "Veuillez renseigner" + valeur;
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

        function emptySelect(select) {//sert a vider le select
            select.length = null;

        }

        function activate(select1, select2) {
            var valeur = select1[select1.options.selectedIndex].value;
            console.log(valeur)
            if (valeur === "")

                select2.disabled = true
            else select2.disabled = false

        }
        createOptionEmpty(selectMarque, " la marque")

        //initialiser la variable reponse 
        //declarer la requete 
        function getMarque(requete, selectMarque) {
            url = "requetes/getMarque.php";
            xmlGet(url)

            requete.onreadystatechange = function() {
                if (requete.readyState === 4 && requete.status == 200 && valeur != "") {
                    var reponse = JSON.parse(requete.response);
                    createOption(reponse, selectMarque);
                }
            }
        }

        getMarque(requete, selectMarque);


        function getType(selectMarque, requete)

        //appelée lorsqu'il y a un changement sur le selct , permet de recuperer la valeur selectionnée et l'envoyer l'envoyer en post a la page getType.php
        {
            //valeur = marque selectionnée

            var index = selectMarque.options.selectedIndex; //recuperer index de la valeur selectionnée sur le tableau
            var valeur = selectMarque[index].value; //recupere la valeur selectionnée dans le tableau grace a l'index 
            var url = "requetes/getType.php"
            xmlPost(url, valeur)
            requete.onreadystatechange = function() {
                if (requete.readyState === 4 && requete.status == 200 && valeur != "") {
                    var reponseType = JSON.parse(requete.response);
                    emptySelect(selectTypes)
                    createOption(reponseType, selectTypes)
                    createOptionEmpty(selectTypes, " le type")


                }

            }

        }



        function getModel(selectModels, selectTypes) {

            var index = selectTypes.options.selectedIndex; //recuperer index de la valeur selectionnée sur le tableau
            var valeur = selectTypes[index].value;

            var url = "requetes/getModel.php";
            xmlPost(url, valeur);

            requete.onreadystatechange = function() {
                if (requete.readyState === 4 && requete.status == 200 && valeur != "") {
                    console.log(valeur);
                    var reponseModel = JSON.parse(requete.response);
                    console.log(reponseModel);

                    emptySelect(selectModels)
                    createOptionEmpty(selectModels, " le model")
                    createOption(reponseModel, selectModels)
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
                    createOption(reponse, selectCategorie)
                }

            }
        }
        getCategorie()

        function inputNouvelleValeur() {
            //**si la veleur selectionnée est egale a nouvelle valeur 
            //affiche un input dsans les options et recupere sa valeur
            if (selectCategorie[selectCategorie.options.selectedIndex].value == 'nouvelle valeur') {
                let input = document.createElement('input')
                input.className = "list-group-item form-select-lg rounded";
                selectCategorie.replaceWith(input);

            }


        }