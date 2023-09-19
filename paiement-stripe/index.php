<?php require_once '../head.html' ?>

<body>
    <div class="container">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">
                    <font style="vertical-align: inherit;">Adresse de facturation</font>
                
                </h4>
            <form class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Prénom</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nom de famille</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Nom d'utilisateur</font>
                        </font>
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">@</font>
                                </font>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur" required="">
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Courriel </font>
                        </font><span class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">(facultatif)</font>
                            </font>
                        </span>
                    </label>
                    <input type="email" class="form-control" id="email" placeholder="vous@exemple.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Adresse</font>
                        </font>
                    </label>
                    <input type="text" class="form-control" id="address" placeholder="1234, rue Main" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Adresse 2 </font>
                        </font><span class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">(facultatif)</font>
                            </font>
                        </span>
                    </label>
                    <input type="text" class="form-control" id="address2" placeholder="Appartement ou suite">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Pays</font>
                            </font>
                        </label>
                        <select class="custom-select d-block w-100" id="country" required="">
                            <option value="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Choisir...</font>
                                </font>
                            </option>
                            <option>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">États-Unis</font>
                                </font>
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">État</font>
                            </font>
                        </label>
                        <select class="custom-select d-block w-100" id="state" required="">
                            <option value="">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Choisir...</font>
                                </font>
                            </option>
                            <option>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Californie</font>
                                </font>
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Zipper</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">L'adresse de livraison est la même que mon adresse de facturation</font>
                        </font>
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Enregistrez ces informations pour la prochaine fois</font>
                        </font>
                    </label>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Paiement</font>
                    </font>
                </h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Carte de crédit</font>
                            </font>
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Carte de débit</font>
                            </font>
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Pay Pal</font>
                            </font>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nom sur la carte</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nom complet tel qu'affiché sur la carte</font>
                            </font>
                        </small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Numéro de Carte de Crédit</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Expiration</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">CVV</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Continuer à la caisse</font>
                    </font>
                </button>
            </form>
        </div>
    </div>
</body>

</html>