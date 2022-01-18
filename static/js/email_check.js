const email_field = document.getElementsByName('email')[0]
const email_help = document.getElementById('emailHelp')
const submit_btn = document.getElementsByName('submit')[0]

email_field.addEventListener('blur', function(event){
    var email = this.value

    fetch("https://email-validator15.p.rapidapi.com/v1/validation/single/"+email+"?result_type=CHECK_IF_EMAIL_EXIST",{
        method:'GET',
        headers: {
            'Content-Type': 'text/plain',
            'x-rapidapi-host': 'email-validator15.p.rapidapi.com',
            'x-rapidapi-key' : '23383a841fmsh07b5c90d4e5e4f8p12379djsn25c7dd3eeb36'
        }
    }).then(response =>{
        if(!response.ok) {
            email_help.classList.remove('text-muted').add('text-danger')
            // email_help.classList.add('text-danger')
            email_help.innerHTML = "Unable to validate email address";
            submit_btn.disabled = true
            throw new Error('Unable to validate email address');
        }
        return response.json()
    }).then(data=>{
        console.log(data)
        var res = data['check_if_email_exist'];
        // console.log(res)
        if(res['is_reachable'] !='safe'){
            email_help.classList.remove('text-muted')
            email_help.classList.add('text-danger')
            email_help.innerHTML = "Email address is not reachable. Please enter a valid email";
            submit_btn.disabled = true
            return
        }
        if(!res['smtp']['can_connect_smtp']){
        email_help.classList.remove('text-muted')
        email_help.classList.add('text-danger')
        email_help.innerHTML = "Unable to connect email address via smtp";
        submit_btn.disabled = true
        return
        }
        if(res['smtp']['is_disabled']){
        email_help.classList.remove('text-muted')
        email_help.classList.add('text-danger')
        email_help.innerHTML = "Unable to connect email address via smtp";
        submit_btn.disabled = true
        return 
        }
        email_help.classList.remove('text-muted')
        email_help.classList.remove('text-danger')
        email_help.classList.add('text-success')
        email_help.innerHTML = "Email is valid!";
        submit_btn.disabled = false
        // return "valid";
    }).catch(error => {
        console.error('Error:', error);
    })
})