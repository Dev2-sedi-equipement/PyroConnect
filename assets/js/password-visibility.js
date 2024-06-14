document.addEventListener('DOMContentLoaded', function() {
    const passwordButton = document.querySelector('.password-view'); // Sélectionne le premier élément avec la classe 'password-view'
    const passwordInput = document.getElementById('registration_form_password');
    const passwordUserInput = document.getElementById('user_password');

    let passwordVisible = false;

    passwordButton.addEventListener('click', function() {
        if (passwordVisible) {
            // Cacher le mot de passe
            if (passwordInput !== null) {
                passwordInput.type = 'password';
            }
            if (passwordUserInput !== null) {
                passwordUserInput.type = 'password';
            }

            passwordButton.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
            passwordVisible = false;
        } else {
            // Afficher le mot de passe
            if (passwordInput !== null) {
                passwordInput.type = 'text';
            }
            if (passwordUserInput !== null) {
                passwordUserInput.type = 'text';
            }

            passwordButton.innerHTML = '<i class="bi bi-eye-fill"></i>';
            passwordVisible = true;
        }
    });
    const rolesSelect = document.getElementById('registration_form_roles');
    const codeVrpField = document.getElementById('registration_form_codeVrp');
    if(rolesSelect){
        rolesSelect.addEventListener('change', function() {
            const selectedOptions = Array.from(rolesSelect.selectedOptions).map(option => option.value);
    
            if (selectedOptions.includes('SF') || selectedOptions.includes('ROLE_ADMIN')) {
                codeVrpField.style.cssText = 'visibility: hidden; height: 0px; margin: 0!important;';
                codeVrpField.value ="";
                
            } else {
        
                codeVrpField.style.cssText = 'visibility: visible; height: 50px; margin: 1.5rem 0 !important;';
    
            }
        });
    }
});
