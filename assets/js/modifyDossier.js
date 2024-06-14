document.addEventListener('DOMContentLoaded', function () {


    let countdownDuration = 2 * 60; // 5 minutes
    let redirecting = false;
    const timerElement = document.getElementById('timerSpan');

    function updateCountdown() {
        let minutes = Math.floor(countdownDuration / 60);
        let seconds = countdownDuration % 60;
        if(timerElement){
            timerElement.textContent = minutes + ' minutes : ' + (seconds < 10 ? '0' : '') + seconds+ ' secondes';
            countdownDuration--;

        }

        if (countdownDuration < 0) {
            clearInterval(timerInterval);
            if(timerElement){
                timerElement.textContent = 'Terminé!';
            }
            if (!redirecting) { // Vérifier si la redirection n'a pas déjà été déclenchée
                redirecting = true; // Marquer la redirection comme déclenchée
                window.onbeforeunload = null;
                window.location.replace("http://127.0.0.1:8000/");
            }
        }
    }

    const timerInterval = setInterval(updateCountdown, 1000);
    
    const modifyButtons = document.querySelectorAll('.modifyComment');
    const deleteButtons = document.querySelectorAll('.deleteComment');
    const sendCommentButton = document.getElementById('sendCommentButton');
    

    // Fonction pour attacher les gestionnaires d'événements pour les boutons de modification et de suppression
    function attachEventHandlers() {
        // Sélectionner tous les boutons de modification et de suppression
        const modifyButtons = document.querySelectorAll('.modifyComment');
        const deleteButtons = document.querySelectorAll('.deleteComment');

        // Attacher les gestionnaires d'événements aux boutons de modification
        modifyButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const commentId = button.parentElement.parentElement.querySelector('#commentId').textContent;
                const containerDiv = document.getElementById(`p-${commentId}`).parentNode;

                // Check if the container div already contains an input element
                if (!containerDiv.querySelector('input[type="text"]')) {
                    // Create an input element with the class form-control
                    const inputElement = document.createElement('input');
                    inputElement.type = 'text';
                    inputElement.value = containerDiv.querySelector('p').textContent;
                    inputElement.classList.add('form-control');
                
                    // Create a sibling button element with the classes btn and btn-primary
                    const buttonSendModifyElement = document.createElement('button');
                    buttonSendModifyElement.type = 'button';
                    buttonSendModifyElement.classList.add('btn', 'btn-primary');
                    buttonSendModifyElement.textContent = 'Envoyer';

                    // Append the input and button elements to the container div
                    containerDiv.appendChild(inputElement);
                    containerDiv.appendChild(buttonSendModifyElement);

                    // Hide the original paragraph element
                    containerDiv.querySelector('p').style.display = 'none';

                    // Add event listener to the button to send the modified comment
                    buttonSendModifyElement.addEventListener('click', function() {
                        // Get the modified comment message
                        const modifiedMessage = inputElement.value.trim();        
                        // Validate the input field
                        if (modifiedMessage === '') {
                            // Prevent default action and show error styles
                            event.preventDefault();
                            inputElement.style.border = '2px solid red';
                            inputElement.placeholder = 'Vous devez renseigner un commentaire';
                            inputElement.classList.add('comment-placeholder'); // Optionally add a class to style the placeholder with CSS
                            return;
                        }else{
                            // Update the paragraph element with the new message
                            const paragraphElement = containerDiv.querySelector('p');
                            paragraphElement.textContent = modifiedMessage;
    
                            // Show the updated paragraph element
                            paragraphElement.style.display = 'block';
    
                            // Remove the input and button elements
                            inputElement.remove();
                            buttonSendModifyElement.remove();

                             // Send the modified comment message via AJAX
                            fetch(`/dossiers/modifyCommentaire/${commentId}`, {
                                method: 'POST', // Use POST to send the modified data
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ message: modifiedMessage }) // Send the modified message in the request body
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                // Optionally, update the UI to reflect the changes
                                const newParagraph = document.createElement('p');
                                newParagraph.id = `p-${commentId}`;
                                newParagraph.textContent = modifiedMessage;
                                
                       
                            
                                const buttonElement = containerDiv.querySelector('button');
                                if (buttonElement) {
                                    buttonElement.remove();
                                }
                            })
                           

                        }

                    });
                
                
                } else {
                    // Remove the input element and button element, and show the original paragraph element
                    containerDiv.querySelector('input[type="text"]').remove();
                    containerDiv.querySelector('button').remove();
                    containerDiv.querySelector('p').style.display = 'block';
                }
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const commentId = button.parentElement.parentElement.querySelector('#commentId').textContent;

                const containerDiv = document.getElementById(`p-${commentId}`);
                let parentCommentaire = document.querySelector(`.id_cardCommentaire-${commentId}`).parentElement;
                
                // Envoi de la requête AJAX
                const xhr = new XMLHttpRequest();
                xhr.open("GET", `/dossiers/deleteCommentaire/${commentId}`, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Actualiser la page ou mettre à jour l'interface utilisateur si nécessaire
                            parentCommentaire.remove();
                        } else {
                            console.error('Une erreur s\'est produite lors de la suppression du commentaire');
                            // Gérer les erreurs
                        }
                    }
                };
                xhr.send();
            });
        });
    }

    attachEventHandlers();
    if(sendCommentButton){
        sendCommentButton.addEventListener('click', function(e) {
            // Extract the dossier ID from the form's data attribute
            const form = document.getElementById('dossierModified');
            const dossierId = form.getAttribute('data-dossier-id');
            const commentInput = document.getElementById('dossiers_edit_dossier_commentaire_message');
            const commentMessage = commentInput.value.trim();
        
            // Vérifie si le commentaire est vide
            if (commentMessage === '') {
                e.preventDefault();
                // Affiche une erreur visuelle
                commentInput.style.border = '2px solid red';
    
                commentInput.placeholder = 'Veuillez saisir un commentaire (minimum 1 caractère)';
                
                // Efface le champ de commentaire
                commentInput.value = '';
        
                // Empêche l'envoi du formulaire
            }else{
                // Affiche une erreur visuelle
                commentInput.style.border = '1px solid #dee2e6';
                commentInput.placeholder = 'Ajouter un commentaire';
    
                function capitalize(str) {
                    return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
                }
    
                const xhr = new XMLHttpRequest();
                xhr.open('POST', `/dossiers/submit-comment/${dossierId}`, true);
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            if (response.comment) {
                                const newComment = response.comment;
                                const newCommentDiv = document.createElement('div');
                                newCommentDiv.classList.add('card', 'mb-4');
                                newCommentDiv.style="height: fit-content !important;";
                                newCommentDiv.innerHTML = `
                                    <div class="card-body id_cardCommentaire-${newComment.id}">
                                        <div class="d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-row align-items-center justify-content-between">
                                                <p class="text-muted fs-4 mb-0">${capitalize(newComment.userName)} ${capitalize(newComment.userLastName)}</p>
                                                <p class="text-muted fs-4 mb-0">${new Date(newComment.dateCommentaire).toLocaleString()}</p>
                                            </div>
                                            <p class="invisible" id="commentId">${newComment.id}</p>
                                            <div>
                                                <p class="fs-5 text-black" id="p-${newComment.id}">${newComment.message}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-primary btn-md modifyComment">Modifier</button>
                                            
                                        </div>
                                    </div>
                                `;
                                document.getElementById('editComments').appendChild(newCommentDiv);
                                document.getElementById('dossiers_edit_dossier_commentaire_message').value = ''; // Clear the textarea
                                attachEventHandlers();
        
                            } else {
                                alert('Error: ' + response.message);
                            }
                        } else {
                            alert('Error: ' + xhr.statusText);
                        }
                    }
                };
                xhr.send(JSON.stringify({ message: commentMessage }));
            }
              
        });
    }
    
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));



});



