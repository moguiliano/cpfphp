window.onload = function () {
    let stripe = Stripe("pk_test_51KAiE6Bja7GgWYqGCrBCkAVP8WcMA3UkCpwEKsJJZuIxAoqasdMDHhPLHdFiOs7oINU2fyGxtO9GTYv6GmgzNiZA00qkpDdbqJ");
    let elements = stripe.elements();
    let redirect = 'index.php';



    let cardHolderName = document.getElementById('cardholder-name');
    let cardButton = document.getElementById('card-button');
    let clientSecret = cardButton.dataset.secret; //data est une propriété qui va chercher tous les elements data

//cree les elements du formulaire de la carte bancaire 
    let card = elements.create('card');
    card.mount('#card-elements');// on demander a monter l'ement card dans la div qui a l'id card element

    card.addEventListener('change',(event)=>
    {
        let displayError = document.getElementById('cards-errors');
        if(event.error)
        {
            displayError.textContent = event.error.message;
        }else
         displayError.textContent = "";


    })
    cardButton.addEventListener('click' , () => {
        //on lance une promesse qui dit je vais gerer le paiement
        stripe.handleCardPayment(
            clientSecret, card , {
                payment_method_data :{
                    billing_details:{name :cardHolderName.value}
                }
                
            }
        ).then((result)=>
        {
            if (result.error)
            {
                document.getElementById('error').innerText = result.error.message
            }else
            {
                document.location.href = redirect;
            }
        }
        //alors on recoit le resultat et on le traite
        )
    })


    //on gere le paiement
   
}