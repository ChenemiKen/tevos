const gen_pass_btn = document.getElementById('gen-pass-btn')
const autogen_pass_field = document.getElementById('autogen-pass-field')
const use_btn = document.getElementById('use-btn')
const cancel_btn = document.getElementById('cancel-btn')
const pass_loader = document.getElementById('pass-loader')
const autogen_failed = document.getElementById('autogen-failed')
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


gen_pass_btn.addEventListener('click', function(event){
    event.preventDefault()
    this.disabled = true
    pass_loader.classList.remove('d-none')
    pass_loader.classList.add('d-inline-block')

    fetch('https://makemeapassword.ligos.net/api/v1/alphanumeric/plain',{
        method:'GET',
        headers: {
            'Content-Type': 'text/plain'
        }
    }).then(response =>{
        if(!response.ok) {
            autogen_failed.hidden=false
            this.disabled = false
            pass_loader.classList.remove('d-inline-block')
            pass_loader.classList.add('d-none')
            throw new Error('Password generator response was not OK');
        }
        return response.text()
    }).then(data=>{
        autogen_pass_field.hidden=false
        autogen_pass_field.value= data
        passwordgeneyebtn.hidden=false
        use_btn.hidden=false
        use_btn.disabled=false
        cancel_btn.hidden=false
        cancel_btn.disabled=false
        this.disabled = false
        pass_loader.classList.remove('d-inline-block')
        pass_loader.classList.add('d-none')
    }).catch(error => {
        console.error('Error:', error);
    });
    
})

use_btn.addEventListener('click', function(event){
    event.preventDefault()
    let pass = autogen_pass_field.value
    password1.value = pass
    password2.value = pass
    autogen_pass_field.type='password'
})
cancel_btn.addEventListener('click', function(event){
    event.preventDefault()
    autogen_pass_field.hidden=true
    autogen_pass_field.value= ''
    passwordgeneyebtn.hidden=true
    use_btn.hidden=true
    use_btn.disabled=true
    cancel_btn.hidden=true
    cancel_btn.disabled=true
    this.disabled = false
    pass_loader.classList.remove('d-inline-block')
    pass_loader.classList.add('d-none')
})

function togglepassword(field) {
    if (field.type == "password") {
      field.type = "text";
    } else {
      field.type = "password";
    }
}