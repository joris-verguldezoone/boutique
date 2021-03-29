window.onload = () => {
    let stripe = Stripe('pk_test_51IKUynKWS3ZgsIjcIeL3IRSZPegZTYPsOIsaEnTh9I9u6dKHuhVFat6xGPx9B9oLcuZPZZ7IBe6TngUkKp2fERqI00Gh9SNLDU')
    let elements = stripe.elements()
    let redirect = 'panier.php'
    
    // redirection succès

    // objet de la page
    let cardHolderName = document.getElementById('card-owner-name')
    let cardButton = document.getElementById("card-button")
    let clientSecret = cardButton.dataset.secret;

    // on créer les element du formulaire de carte bancaire
    let card = elements.create('card')
    card.mount('#card-elements')

    // on gere la saisie
    card.addEventListener('change', (event) => {
        let displayError = document.getElementById('card-errors')
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    })
    //  on va gérer le paiement (promesse asynchrone)

    cardButton.addEventListener('click', () => {
        stripe.handleCardPayment(
            clientSecret, card, {
            payment_method_data: {
                billing_details: { name: cardHolderName.value }
            }
        }
        ).then((result) => {
            if (result.error) {
                document.getElementById('errors').innerText = result.error.message
            }
            else {
                document.location.href = redirect
            }
        })
    })

}