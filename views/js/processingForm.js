

    // Code en JSON qui permette d'attendre que la page soit complètement charger avant d'éxecuter le reste
    // Code in JSON that allows you to wait until the page is fully loaded before executing the rest

$(document).ready( function() {

    const regex =/^[a-zA-Z]+$/;

    let myForm = document.getElementById('myForm');
    let search = document.getElementById('search');
    let dateFrom = document.getElementById('dateFrom');
    let dateTo = document.getElementById('dateTo');
    let isValidSearch = true;
    let isValidDate = true;


        let validateField = (elem) => {

            let message = document.getElementById(elem.dataset['error_target']);

            switch (elem.type) {
                case 'text' :

                    // Permet de vérifier que le champ correspond à l'expression régulière
                    // Check that the field matches the regular expression
                    if (!regex.test(search.value) && search.value !== '') {
                        isValidSearch = false;

                        // display message error
                        message.textContent = 'Veuillez rentrer uniquement des lettres minuscule, majuscule et pas de caractères spéciaux';
                        message.style = "text-overflow: unset";
                        message.className = "error"
                    } else {
                        isValidSearch = true;

                        message.textContent = '';
                        message.className = ""
                    }
                    break;
                case 'date' :
                    if (dateFrom.value !== '' && dateTo.value !== '' && dateFrom.value > dateTo.value) {
                        isValidDate = false;


                        message.textContent = 'Veuillez saisir une date de début et une de fin, celle de début doit être inférieure à celle de fin';
                        message.className = "error"
                        console.log('si champ est pas vide et que la De < à, alors je m affiche');
                    } else {
                        isValidDate = true;

                        message.textContent = ''
                        message.className = ""
                    }
                    break;
                default :
                    break;
            }

            if (isValidSearch !== true || isValidDate !== true ){
                document.getElementById("submit").disabled = true
            }else {
                document.getElementById("submit").disabled = false
            }

        };

    myForm.querySelectorAll('input[type="text"], input[type="date"]').forEach(function(elem) {
        elem.addEventListener('blur', (e) => {

            // target.type cible l'élément dans lequel on entre
            validateField(e.target);
            e.preventDefault()
        });
    });

    //document.addEventListener()
})