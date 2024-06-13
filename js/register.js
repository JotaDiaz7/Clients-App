window.addEventListener('load', () =>{
    photo_file();
    user();
    date_register();
    register();
});
import {date_register} from './main.js';

function photo_file(){
    const files = document.querySelectorAll('#file');

    Array.from(files).forEach(function(file){
        file.addEventListener('change', (text)=>{
            var photo = document.getElementById('photo');
            photo.innerHTML = file.files[0].name;
        })
    });
}

function user(){

    const name = document.getElementById('name');
    const dni = document.getElementById('dni');
    const date = document.getElementById('date');
    const user = document.getElementById('user');

    document.addEventListener('keyup', function(){
        user.value = dni.value.toUpperCase().slice(6,8) + name.value.toUpperCase().substr(0,2) + date.value.toUpperCase().substr(8);
    });

}

function register(){

    const button = document.getElementById('send');

    button.onclick = (event) =>{
        event.preventDefault();

        let dates = new FormData(document.getElementById('register'));

        fetch('../php/register_config.php', {
            method: 'POST',
            body: dates
        }).then(answer => answer.json())
        .then(dates_register => {
            
            if(dates_register == 'OK'){
                document.getElementById('register').classList.add('d-none');
                document.getElementById('sent').classList.remove('d-none');
            }else if(dates_register == 'Error1'){
                console.log(dates_register);

                document.querySelectorAll('.register_input').forEach(function(input){
                    if(input.value == ''){
                        input.classList.add('error');
                    }
                    input.onclick = ()=>{
                        input.classList.remove('error');
                    }
                })
            }
        })
    }
}

