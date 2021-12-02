


let galleryImages = document.querySelectorAll("button.butty");
let windowWidth = window.innerWidth;

if (galleryImages){
    galleryImages.forEach(function (image,index){
        image.onclick = function (){
            let volbaAId = image.id;
            let volba = volbaAId.split("/");

            let container = document.body;
            let newImgWindow = document.createElement("div");
            container.appendChild(newImgWindow);
            newImgWindow.setAttribute("class","img-window");
            //newImgWindow.setAttribute("onclick","closeImg()");
            let formular = document.createElement("form");
            formular.setAttribute("method","post");
            formular.setAttribute("enctype","?multipart/form-data");
            formular.setAttribute("action","?c=home&a=uploadPrispevok");
            newImgWindow.appendChild(formular);
            let pole = document.createElement("input");
            pole.setAttribute("type","text");
            pole.setAttribute("name","zmena");
            formular.appendChild(pole);

            let pole2 = document.createElement("input");
            pole2.setAttribute("type","hidden");
            pole2.setAttribute("name","volba");
            pole2.setAttribute("value",volba[0]);
            formular.appendChild(pole2);

            let pole3 = document.createElement("input");
            pole3.setAttribute("type","hidden");
            pole3.setAttribute("name","plssId");
            pole3.setAttribute("value",volba[1]);
            formular.appendChild(pole3);

            let odoslat = document.createElement("input")
            odoslat.setAttribute("type","submit");
            odoslat.setAttribute("value","Editovať");

            formular.appendChild(odoslat);
        }
    });
}


function closeImg(){
    document.querySelector(".img-window").remove();
}
