/* 
 const form = document.getElementById('form');
const username = document.getElementById('prenom');
const user = document.getElementById('nom');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
form.addEventListener("submit", e => {
    
    validateInputs()

        e.preventDefault();  */
/*    {
   
    let prenomValid =hasValue(form.element["prenom"], NAME_REQUIRED)
    let nomValid =hasValue(form.element["nom"], NAME_REQUIRED)
    let emailValid =hasValue(form.element["email"], NAME_REQUIRED)
    let passwordValid =hasValue(form.element["passeword"], NAME_REQUIRED)
    let passeword2Valid =hasValue(form.element["name"], NAME_REQUIRED)
} */
/* });
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
} 
const validateInputs = () => {
    const usernameValue = prenom.value.trim();
    const userValue = nom.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if(usernameValue === '') {
        setError(username, 'ce champ est requis');
    } else {
        setSuccess(prenom,'valide');
    }

    if(userValue === '') {
        setError(user,'ce champ est requis');
    } else {
        setSuccess(nom),'valide';
    }
    if(emailValue === '') {
        setError(email, 'ce champ est requis');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Email incorrect ');
    } else {
        setSuccess(email),'valide';
    }
    if(passwordValue === '') {
        setError(password, 'ce champ est requis');
    } else if (passwordValue.length < 2 ) {
        setError(password, 'Password doit avoir 8 caractére.')
    } else {
        setSuccess(password),'valide';
    }
    if(password2Value === '') {
        setError(password2, 'ce champ est requis');
    } else if (password2Value !== passwordValue) {
        setError(password2, "mot de passe de pas comforme");
    } else {
        setSuccess(password2),'valide';
    }
};  */
 











/* 
  const form = document.getElementById('form');
const username = document.getElementById('prenom');
const user = document.getElementById('nom');
const email = document.getElementById('email');
const roles = document.getElementById('roles');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
form.addEventListener('submit', e => {
    
    validateInputs()
    if(validateInputs() == true){
    form.onsubmit();
    } else
    {
        e.preventDefault(); 
    }
    
}); */
 







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

});

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
    } 
    else {
        setSuccess(nomInput),'valide';
    }   
    
    // PRENOM
    if(prenomInput.value.trim()==''){
        setError(prenomInput, 'ce champ est requis');
    }
    else {
        setSuccess(prenomInput),'valide';
    }

    //EMAIL
    if(emailInput.value.trim()==''){
        setError(emailInput, 'ce champ est requis');
    }else if(isEmailValid(emailInput.value)){
        setSuccess(emailInput),'valide';
    }else{
        setError(emailInput, 'email invalide');
    }

    //PASSWORD
    if(passwordInput.value.trim()==''){
        setError(passwordInput, 'ce champ est requis');
    }else if(passwordInput.value.trim().length <6 || passwordInput.value.trim().length >20){
        setError(passwordInput, 'Password doit avoir 6 caractére.');
    }else {
        setSuccess(passwordInput);
    }
    //CONFIRM PASSWORD
    if(confirmPasswordInput.value.trim()==''){
        setError(confirmPasswordInput,'ce champ est requis');
    }else if(confirmPasswordInput.value !== passwordInput.value){
        setError(confirmPasswordInput, 'mot de passe ne pas comforme');
    }else {
        setSuccess(confirmPasswordInput),'valide';
    }
    // ROLE
   
    if((roleInput.value !='Administrateur')&&(roleInput.value !='Utilisateur')){
        setError(roleInput, 'Le role est obigatoire: veuillez choisir un');
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












