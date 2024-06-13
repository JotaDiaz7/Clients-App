window.addEventListener('load', function(){
    buttons();
    date_register();
    timenow();
    register_comment();
    delete_user();
    update();
    delete_comment();
});
import {date_register} from './main.js';
import { timenow } from './main.js';

function buttons(){
    document.getElementById('delete').onclick = (event) =>{
        event.preventDefault();
        document.getElementById('wrap_delete').classList.add('wrap_delete_show');
        document.getElementById('message_delete').classList.add('message_delete_show');
    }

    document.getElementById('update').onclick = (event) => {
        event.preventDefault();

        document.getElementById('buttons_form').classList.add('hidden');
        document.getElementById('submit_form').classList.remove('hidden');
        document.getElementById('wrap_foot').classList.add('hidden');

        document.querySelectorAll('.update').forEach((update)=>{
            if(update.hasAttribute('readonly')){
                update.removeAttribute('readonly');
            }
            update.classList.add('update_focus');

            if(update.id === 'sex_date'){
                update.parentNode.classList.add('hidden');
            }else if(update.id === 'sex'){
                update.parentNode.classList.remove('hidden');
            }
        });
    }

    document.getElementById('cancel').onclick = (event) => {
        event.preventDefault();

        document.getElementById('buttons_form').classList.remove('hidden');
        document.getElementById('submit_form').classList.add('hidden');
        document.getElementById('wrap_foot').classList.remove('hidden');

        document.querySelectorAll('.update').forEach((update)=>{
            update.setAttribute('readonly', 'readonly');
            update.classList.remove('update_focus');

            if(update.id === 'sex_date'){
                update.parentNode.classList.remove('hidden');
            }else if(update.id === 'sex'){
                update.parentNode.classList.add('hidden');
            }

        });
    }

    document.getElementById('no').onclick = (event) =>{
        event.preventDefault();
        document.getElementById('wrap_delete').classList.remove('wrap_delete_show');
        document.getElementById('message_delete').classList.remove('message_delete_show');
    }
}

function register_comment(){
    const submit_comment = document.getElementById('submit_comment');

    submit_comment.onclick = (event) =>{
        event.preventDefault();

        let comments = new FormData(document.getElementById('form_comments'));

        fetch('../php/user_config.php', {
            method: 'POST',
            body: comments
        })
        .then(answer => answer.json())
        .then(comment_register => {

            if(comment_register == 'OK'){
                document.getElementById('comment').value = '';
                document.location.reload();

            }else if(comment_register == 'Error1'){
                console.log(comment_register);
                
                var comment = document.getElementById('comment');

                if(comment.value == ''){
                    comment.classList.add('error');
                }
                comment.onclick = (event)=>{
                    comment.classList.remove('error');
                }
                
            }
        })
    }
}

function delete_user(){

    document.getElementById('yes').onclick = (event) =>{
        event.preventDefault();

        let form_delete = new FormData(document.getElementById('message_delete'));

        fetch('../php/delete.php', {
            method: 'POST',
            body: form_delete
        }).then(answer => answer.json())
        .then(deleted_dates => {
            if(deleted_dates == 'deleted'){
                document.location.reload();
            }else{
                console.log('Error_delete');

            }
        })
    }
}

function update(){

    document.getElementById('send').onclick = (event) =>{
        event.preventDefault();

        let form_update = new FormData(document.getElementById('wrap_dates'));

        fetch('../php/update.php', {
            method: 'POST',
            body: form_update
        }).then(answer => answer.json())
        .then(updated_dates =>{
            if(updated_dates == 'OK'){
                document.location.reload();
            }else{
                console.log('Error_update');
            }
        })
    }
}

function delete_comment(){

    document.querySelectorAll('.delete_comment_button').forEach((button_delete)=>{
        button_delete.onclick = (event) =>{
            event.preventDefault();
    
            var form_document = document.querySelector('.form_comment');
    
            var form_comment = new FormData(form_document);
    
            fetch('../php/delete_comment.php', {
                method:'POST',
                body:form_comment,
                data
            }).then(answer => answer.json())
            .then(delete_comment =>{
                if(delete_comment == 'deleted_comment'){
                    document.location.reload();
    
                }else{
                    console.log('Error_delete_comment');
                }
            })
        
        }
    });

}