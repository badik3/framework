

class Ajax {

    getAllUsers(){
        fetch('?c=home&a=usery')
            .then(response => response.json())
            .then(data => {
                let html ="";
                for (let message of data){

                    html += "<i className=\"bi bi-telephone-fill\">"+ message.telefon+"</i>"
                }
                document.getElementById("telefon").innerHTML = html;
            });
    }

    startMessageReloaoding(){
        setInterval(()=>{
            this.getAllUsers()
        },1000);
    }
}

window.onload = function (){
    var user = new Ajax();

    user.getAllUsers();
    user.startMessageReloaoding();
}