class Login {
    constructor(form, fields){
        this.form = form;
        this.fields = fields;
        this.validateOnSubmit();
    }

    validateOnSubmit(){
        let self = this;

        this.form.addEventListener("submit", (e) => {
            e.preventDefault();
            var error = 0;
            self.fields.forEach((field)=>{
                const input = document.querySelector(`#${field}`);
                if (self.validateFields(input) == false) {
                    error ++;
                }
            })
            if (error == 0) {
                var data = {
                    username: document.getElementById('username').value,
                    password: document.getElementById('password').value
                }

                fetch("//API/auth/auth.php", {
                    method: "POST",
                    body: JSON.stringify(data),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                })
                .then((response)=>response.json())
                .then((data)=>{
                    if(data.error){
                        console.error("Error:", data.message);
                        document.getElementById('error-message-all').innerText = 'usuario o contraseña incorrecta'
                        document.getElementById('error-message-all').style.display = 'block';
                    }else{
                        document.getElementById('error-message-all').style.display = 'none';
                        localStorage.setItem('auth', 1);
                        localStorage.setItem('user', JSON.stringify(data));
                        this.form.submit();
                    }
                })
                .catch((data)=>{
                    console.error("Error: ", data.message)
                })
                
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
        }else{
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

const form = document.querySelector(".loginForm");

if (form) {
    const fields = ["username",  "password"];
    const validator = new Login(form, fields);
}