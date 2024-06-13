export function date_register(){
    var fecha = new Date(); //Fecha actual
    var month = fecha.getMonth()+1; //obteniendo mes
    var day = fecha.getDate(); //obteniendo dia
    var year = fecha.getFullYear(); //obteniendo año
    if(day<10)
      day='0'+day; //agrega cero si el menor de 10
    if(month<10)
      month='0'+month //agrega cero si el menor de 10
    document.getElementById('date').value=year+"-"+month+"-"+day;
}

export function timenow(){
    var time = new Date();
    var hours = time.getHours();
    var minutes = time.getMinutes();
    //var seconds = time.getSeconds();
    if (hours < 10){
        hours = "0" + hours;
    }
    if (minutes < 10){
        minutes = "0" + minutes;
    }
    //if (seconds < 10){
   //     seconds = "0" + seconds;
   // } 
    document.getElementById('time').value=hours+ ":" +minutes;//+ ":" +seconds;

    setInterval(timenow, 1000);
}