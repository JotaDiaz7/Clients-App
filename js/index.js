window.addEventListener('load', (event)=>{
    search();
    list();
});

function search(){
    
    document.querySelector('.fa-magnifying-glass').onclick = (event) =>{
        document.getElementById('search_wrap').classList.toggle('search_wrap_open');
        document.getElementById('search').focus();
    }
}

function list(){
    document.addEventListener('keyup', (search) =>{

        if(search.target.matches('#search')){
            document.querySelectorAll('.user').forEach((name)=>{
                if(name.className.toLowerCase().includes(search.target.value.toLowerCase())){
                    name.classList.remove('d-none');
                }else{
                    name.classList.add('d-none');
                }
            });
        }
    });
}

