class DataTable{
    data;
    elementID;


    constructor(data, elementID) {
        this.data = data;
        this.elementID = elementID;

        document.getElementById(elementID).innerHTML = this.getTableString();
    }

    getHeader(){
        let header = "";

        let firstItem = this.data[0];
        for (let prop in firstItem){
            header += `<th>${prop}</th>`;
        }
        return `<tr>${header}</tr>`;
    }

    getBody(){
        let row = "";
        let bodyRow = "";

        for (let item of this.data){
            bodyRow="";
            for (let prop in item){
                bodyRow += `<td>${item[prop]}</td>`;
            }
            row += `<tr>${bodyRow}</tr>`
        }
        return row;
    }


    getTableString(){
        return `<table border='1'>${this.getHeader()}${this.getBody()}</table>`

    }


}