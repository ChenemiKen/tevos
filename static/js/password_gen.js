const gen_pass_btn = document.getElementById('gen-pass-btn')
const autogen_pass_field = document.getElementById('autogen-pass-field')

// password vissibility manipulation
const password1 = document.getElementsByName('password1')[0]
const password2 = document.getElementsByName('password2')[0]
const password1eye = document.getElementById('password1eye')
const password2eye = document.getElementById('password2eye')
const passwordgeneye = document.getElementById('passwordgeneye')
const password1eyebtn = document.getElementById('password1eyebtn')
const password2eyebtn = document.getElementById('password2eyebtn')
const passwordgeneyebtn = document.getElementById('passwordgeneyebtn')

password1eyebtn.addEventListener('click', function(event){
    event.preventDefault()
    togglepassword(password1)
})
password2eyebtn.addEventListener('click', function(event){
    event.preventDefault()
    togglepassword(password2)
})
passwordgeneyebtn.addEventListener('click', function(event){
    event.preventDefault()
    togglepassword(autogen_pass_field)
})

function togglepassword(field) {
    if (field.type == "password") {
      field.type = "text";
    } else {
      field.type = "password";
    }
}

// password generator API use
gen_pass_btn.addEventListener('click', function(event){
    event.preventDefault()
    this.disabled = true

    fetch('https://makemeapassword.ligos.net/api/v1/alphanumeric/plain',{
        method:'GET',
        headers: {
            'Content-Type': 'text/plain'
        }
    }).then(response =>{
        if(!response.ok) {
            this.disabled = false
            throw new Error('Password generator response was not OK');
        }
        return response.text()
    }).then(data=>{
        autogen_pass_field.hidden=false
        autogen_pass_field.value= data
        passwordgeneyebtn.hidden=false
        this.disabled = false
    }).catch(error => {
        console.error('Error:', error);
    });
})