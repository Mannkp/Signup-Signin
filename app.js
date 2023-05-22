const login = document.getElementById("login_f1");
const form = document.getElementById("form1");
const errorElement = document.getElementById("error");
const errorbtn = document.getElementById("reset");
const signup = document.getElementById("signup");
const SignupForm = document.getElementById("signupForm");
const SigninForm = document.getElementById("signinForm");



signup.addEventListener('click' , (e) => {
    SignupForm.classList.remove("hidden");
    SignupForm.classList.add("show");
    SigninForm.classList.remove("show");
    SigninForm.classList.add("hidden")
    e.preventDefault();
});


login.addEventListener("click" , (e) => {
    let messages = [];
    let name = document.getElementById("name_f1");
    let password = document.getElementById("pass_f1");
    if(name.value === "" || name.value == null){
        alert("Username is required");
        messages.push("User Name is required");
        e.preventDefault();
        // return false;
    }

    if(password.value.length < 4 || password.value.length>20){
    alert("Password should have atleast 4 characters or more");
    messages.push("Password should have atleast 4 characters or atmost 20 characters");
    e.preventDefault();
    // return false;
    }

    if(messages.length > 0){
        errorElement.classList.remove("hidden");
        errorElement.classList.add("show");
        errorbtn.classList.remove("hidden");
        errorbtn.classList.add("show");
        errorElement.innerHTML += messages.join(", ");
        e.preventDefault();
        errorElement.focus();
        }
        if(messages.length === 0){
            errorElement.classList.remove("show");
            errorElement.classList.add("hidden");
            confirm("“data submitted successfully”");
        }
});

errorbtn.addEventListener("click" , () => {
    errorElement.classList.add("hidden");
    errorElement.classList.remove("show");
});

// signup.addEventListener("mouseover" , () => {
//     document.querySelector("#newUserHelp").classList.remove("hidden");
//     document.querySelector("#newUserHelp").classList.add("show");
//     // document.querySelector("#newUserHelp").classList.toggle("show");
// })
// signup.addEventListener("mouseout" , () => {
//     document.querySelector("#newUserHelp").classList.remove("show");
//     document.querySelector("#newUserHelp").classList.add("hidden");
//     // document.querySelector("#newUserHelp").classList.toggle("show");
// })