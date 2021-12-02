


let galleryImages = document.querySelectorAll(".galery-img");
let getLatestOpendImg;
let windowWidth = window.innerWidth;


if (galleryImages){
    galleryImages.forEach(function (image,index){
        image.onclick = function (){
            let getElementCss = window.getComputedStyle(image);
            let getFullImgUrl = getElementCss.getPropertyValue("background-image");
            let getImageUrlPos = getFullImgUrl.split("/fotky/");
            let setNewImgUel = getImageUrlPos[1].replace('")','');
            getLatestOpendImg = index + 1;

            let container = document.body;
            let newImgWindow = document.createElement("div");
            container.appendChild(newImgWindow);
            newImgWindow.setAttribute("class","img-window");
            newImgWindow.setAttribute("onclick","closeImg()");

            let newImg = document.createElement("img");
            newImgWindow.appendChild(newImg);
            newImg.setAttribute("src","fotky/"+setNewImgUel);
            newImg.setAttribute("id","current-img");

            newImg.onload = function () {
                let imgWidth = this.width;
                let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 80;

                let newNextBtn = document.createElement("a");
                let btnNextText = document.createTextNode("next");
                newNextBtn.appendChild(btnNextText);
                container.appendChild(newNextBtn);
                newNextBtn.setAttribute("class","img-btn-next");
                newNextBtn.setAttribute("onclick","changeImg(1)");
                newNextBtn.style.cssText = "right:" + (calcImgToEdge - 20) + "px";

                let newPrevBtn = document.createElement("a");
                let btnPrevText = document.createTextNode("Prev");
                newPrevBtn.appendChild(btnPrevText);
                container.appendChild(newPrevBtn);
                newPrevBtn.setAttribute("class","img-btn-prev");
                newPrevBtn.setAttribute("onclick","changeImg(0)");
                newPrevBtn.style.cssText = "left:" + calcImgToEdge + "px";
            }
        }
    });
}


function closeImg(){
    document.querySelector(".img-window").remove();
    document.querySelector(".img-btn-next").remove();
    document.querySelector(".img-btn-prev").remove();
}

function changeImg(changeDir){
    document.querySelector("#current-img").remove();
    let getImgWindow = document.querySelector(".img-window");
    let newImg = document.createElement("img");
    getImgWindow.appendChild(newImg);

    let calcNewImg;
    if(changeDir === 1 ){
        calcNewImg = getLatestOpendImg + 1;
        if (calcNewImg > galleryImages.length){
            calcNewImg = 1;
        }
    }
    else if(changeDir === 0 ){
        calcNewImg = getLatestOpendImg - 1;
        if (calcNewImg < 1){
            calcNewImg = galleryImages.length;
        }
    }

    newImg.setAttribute("src","fotky/img"+calcNewImg+".jpg");
    newImg.setAttribute("id","current-img");

    getLatestOpendImg = calcNewImg;
    newImg.onload = function (){
        let imgWidth = this.width;
        let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 80;

        let nextBtn = document.querySelector(".img-btn-next");
        nextBtn.style.cssText = "right:" + (calcImgToEdge - 20)+ "px";

        let prevBtn = document.querySelector(".img-btn-prev");
        prevBtn.style.cssText = "left:" + calcImgToEdge + "px";
    }

}