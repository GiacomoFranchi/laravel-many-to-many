import './bootstrap';

import '~resources/scss/app.scss'
import * as bootstrap from 'bootstrap'
import.meta.glob([
    '../img/**'
])



const buttons = document.querySelectorAll('.btn-delete');

buttons.forEach(button => {
    button.addEventListener('click', (event) => {
        //Bloccare il form al click del bottone
        event.preventDefault();

        //Trovare l'elemento MODAL
        const deleteModal = new bootstrap.Modal('#delete-modal');

        //Inserire il tiolo del comic da eliminare a schermo
        const title = button.getAttribute('data-title');
        document.getElementById('title-to-delete').innerHTML = title;

        //Conferma elimina
        document.getElementById('action-delete').addEventListener('click', () => {
            button.parentElement.submit();
        })

        deleteModal.show();
    });
})