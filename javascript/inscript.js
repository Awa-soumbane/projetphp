

const form = document.querySelector('#form');
const nomInput = document.querySelector('#nom');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#password2');

const prenomInput = document.querySelector('#prenom');
const roleInput = document.querySelector('#role');

form.addEventListener('submit', (event)=>{
    
    validateForm();
    console.log(isFormValid());
    if(isFormValid()==true){
        form.submit();
     }else {

         event.preventDefault();
     }



function isFormValid(){
    const inputContainers = form.querySelectorAll('.input-control');
    let result = true;
    inputContainers.forEach((container)=>{
        if(container.classList.contains('error')){
            result = false;
        }
    });
    return result;
}

function validateForm() {
    //NOM
    if(nomInput.value.trim()==''){
        setError(nomInput, 'ce champ est requis');
        setTimeout(() => {
        setError(nomInput, '');
            
        }, 2000);
    } 
    else {
        setSuccess(nomInput),'valide';
    }   
    
    // PRENOM
    if(prenomInput.value.trim()==''){
        setError(prenomInput, 'ce champ est requis');
        setTimeout(() => {
            setError(prenomInput, '');
                
            }, 2000);
    }
    else {
        setSuccess(prenomInput),'valide';
    }

    //EMAIL
    if(emailInput.value.trim()==''){
        setError(emailInput, 'ce champ est requis');
        setTimeout(() => {
            setError(emailInput, '');
                
            }, 2000);
    }else if(isEmailValid(emailInput.value)){
        setSuccess(emailInput),'valide';
    }else{
        setError(emailInput, 'email invalide');
    }

    //PASSWORD
    if(passwordInput.value.trim()==''){
        setError(passwordInput, 'ce champ est requis');
        setTimeout(() => {
            setError(passwordInput, '');
                
            }, 2000);
    }else if(passwordInput.value.trim().length <6 || passwordInput.value.trim().length >20){
        setError(passwordInput, 'Password doit avoir 6 caractére.');
    }else {
        setSuccess(passwordInput);
    }
    //CONFIRM PASSWORD
    if(confirmPasswordInput.value.trim()==''){
        setError(confirmPasswordInput, 'Ce champ est requis');
        setTimeout(() => {
            setError(confirmPasswordInput, '');
                
            }, 2000);
    }else if(confirmPasswordInput.value !== passwordInput.value){
        setError(confirmPasswordInput, 'mot de passe ne pas comforme');
    }else {
        setSuccess(confirmPasswordInput),'valide';
    }
    // ROLE
   
    if((roleInput.value !='Administrateur')&&(roleInput.value !='Utilisateur')){
        setError(roleInput, 'Le role est obigatoire: veuillez choisir un role');
        setTimeout(() => {
            setError(roleInput, '');
                
            }, 2000);
    }else {
        setSuccess(roleInput),'valide';
    }
}

function setError(element, errorMessage) {
    const parent = element.parentElement;
    if(parent.classList.contains('success')){
        parent.classList.remove('success');
    }
    parent.classList.add('error');
    const paragraph = parent.querySelector('p');
    paragraph.textContent = errorMessage;
}

function setSuccess(element){
    const parent = element.parentElement;
    if(parent.classList.contains('error')){
        parent.classList.remove('error');
    }
    parent.classList.add('success');
}

 function isEmailValid(email){
    const reg =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    return reg.test(email);
    
} 


});
















