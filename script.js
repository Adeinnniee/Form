
/* -------------------------------- GLOBAL VARIABLES ----------------------------- */
let message = document.querySelector('#error-message');
const user_name = document.querySelector('#name');
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const phone_no = document.querySelector("#phone-no");
const selected_lang = document.querySelector("#lang");
const zip_code = document.querySelector("#zip-code");
const about_user = document.querySelector("#about");
const male = document.querySelector("#male");
const female = document.querySelector("#female");
const others = document.querySelector("#others");



/*-------------------------------- ACTIONS ------------------------------------------ */

// error messages function to validate the form
let validate = () =>{

    if(user_name.value == "" || null){
        message.innerHTML = "Your name is required! Please enter it to proceed with the form.";
        return false;
    } 

    else if(email.value == "" || null){
        message.innerHTML = "Your email address is required! Please enter it to proceed with the form.";
        return false;
    }

    else if(password.value == "" || null){
        message.innerHTML = "Please create a password that is between 8 and 20 characters long to proceed with the form.";
        return false;
    }
    
    // check for a valid password length
    else if(password.value.length < 8 ||  password.value.length > 20){
        message.innerHTML = "Your password must be at least 8 characters long and no more than 20 characters long. Please check and try again.";
        return false;
    }
    
    else if(phone_no.value == "" || null){
        message.innerHTML = "Your Nigerian phone number is required! Please enter it to proceed with the form.";
        return false;
    }

    // check for a valid phone number
    else if(phone_no.value.length != 11){                                                 
        message.innerHTML = "Your Nigerian phone number should be 11 digits. Pls check and try again.";
        return false;
    }

    // check that a gender is picked
    else if((male.checked || female.checked || others.checked) != true){
        message.innerHTML = "Selecting a gender is required. Please select to proceed with the form.";
        return false;
    }

    // check that a language is selected
    else if(selected_lang.value == "select-lang"){
        message.innerHTML = "Please select a preferred language.";
        return false;
    }
    
    else if(zip_code.value == "" || null){
        message.innerHTML = "Your Nigerian zip code is required! Please enter it to proceed with the form.";
        return false;
    }

    // check for  a valid zipcode
     else if(zip_code.value.length != 6){                                                 
        message.innerHTML = "Your Nigerian zip code should be 6 digits. Pls check and try again.";
        return false;
    }

    else if (about_user.value == "" || null){
        message.innerHTML = "Pls tell us about yourself in the field provided to complete the form.";
        return false;
    }

    else{
        // valid form
    }
}