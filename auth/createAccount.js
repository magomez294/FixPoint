var USERNAME = 'username';
var EMAIL = 'email';
var PASSWORD = 'password';
var PASSWORDCOPY = 'passwordCopy';
var EMAIL_REGEX = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
class createAccount {
    constructor(form, fields){
        this.form = form;
        this.fields = fields;
        this.validateOnSubmit();
    }

    validateOnSubmit(){
        let self = this;
        this.form.addEventListener("submit", (e)=>{
            e.preventDefault();
            var error = 0;
            console.log(self.fields);
            console.log(self.fields);
            self.fields.forEach((field) => {
                const input = document.getElementById(`${field}`);
                if (self.validateFields(input) == false){
                    error ++;
                }
            });
            if (error == 0){
                var data = {
                    // @ts-ignore
                    username: document.getElementById(USERNAME).value,
                    // @ts-ignore
                    email: document.getElementById(EMAIL).value,
                    // @ts-ignore
                    password: document.getElementById(PASSWORD).value
                }
                console.log(data);
                fetch("../API/auth/createAccount.php", {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8'
                    }
                })
                .then((response)=>response.json())
                .then((data)=>{
                    if(data.error){
                        document.getElementById('error-message-all').innerText = data.message;
                        document.getElementById('error-message-all').style.display = 'block';
                    }else{
                        document.getElementById('error-message-all').style.display = 'none';
                        const now = new Date()
                        const actualTime = now.getTime();
                        localStorage.setItem('auth', JSON.stringify({value: 1, expiry: actualTime + 36000000}));
                        /* data.expiry = actualTime + 36000000; */
                        localStorage.setItem('user', JSON.stringify(data));
                        this.form.submit();
                    }
                })
                .catch((data)=>{
                    console.error("Error: ", data.message);
                });
            }
        });
    }
    
    validateFields(field){
        if(field.value.trim() == "") {
            this.setStatus(
                field,
                `El campo ${field.previousElementSibling.innerText} no puede estar en blanco`,
                "error"
            );
            return false;
        }else if(field.id == EMAIL){
            var valid = EMAIL_REGEX.test(String(field.value).toLowerCase());
            if(valid){
                this.setStatus(field, null, "succes");
                return true;
            }else{
                this.setStatus(
                    field, 
                    `formato del email incorrecto`,
                    "error"
                );
                return false;
            }
        }else if (field.id == PASSWORDCOPY) {
            const password = document.getElementById(PASSWORD);
            // @ts-ignore
            if(field.value != password.value){
                this.setStatus(
                    field, 
                    `La contraseña no coincide`,
                    "error"
                );
                return false;
            }else{
                this.setStatus(field, null, "succes");
                return true;
            }
        } else {
            this.setStatus(field, null, "succes");
            return true;
        }

    }

    setStatus(field, message, status){
        const errorMessage = field.nextElementSibling;
        if (errorMessage) {
            if(status == "error"){
                errorMessage.innerText = message;
                field.classList.add("input-error");
            }
            if (status == "succes") {
                errorMessage.innerText = "";     
                field.classList.remove("input-error");       
            }
        }else{
            console.log('Error: No se encuentra el elemento errorMessage');
        }
        
    }
}

var form = document.querySelector(".createAccountForm");

if (form) {
    const fields = [USERNAME, EMAIL, PASSWORD, PASSWORDCOPY];
    const validator = new createAccount(form, fields);
}