window.onload = function () {
    for (let divko of document.querySelectorAll("div[data-tooltip]")) {
        divko.onmouseenter = function () {
            divko.innerHTML += "<div>" + divko.getAttribute("data-tooltip") + "</div>";
        }
        divko.onmouseleave = function () {
            divko.querySelector("div").remove();
        }
    }
}

const buttons = document.querySelectorAll("div");
buttons.forEach(btn=> {
    btn.addEventListener('click', function (e) {
        let x = e.clientX - (e.target.offsetLeft)/50;
        let y = e.clientY - (e.target.offsetTop)/50;

        let ripples = document.createElement('span');
        ripples.setAttribute("id","spany");
        ripples.style.left = x +'px';
        ripples.style.top = y + 'px';
        this.appendChild(ripples);

        setTimeout(()=>{
            ripples.remove()
        },1000);
    })
})

