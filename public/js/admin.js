function addTitle(text,location) {
    let header = document.getElementById('top_left');
    let title = document.createElement('span');
    title.textContent = '>>>';
    let a = document.createElement('a');
    location = location.replace('&amp;','&');
    a.href = location;
    a.text = text;
    header.appendChild(title);
    header.appendChild(a);
}
function changepic(obj) {
    console.log(obj.files[0])
    var newsrc=getObjectURL(obj.files[0]);
    document.getElementById('show').src=newsrc;
}
//建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ;
    // 下面函数执行的效果是一样的，只是需要针对不同的浏览器执行不同的 js 函数而已
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
var count = 0;
function removeIngredient(id) {
    let div_remove = document.getElementById('div_ingredient'+id);
    document.getElementById('td_ingredient').removeChild(div_remove);
    count--;
    for(let i= id+1;i<=count;i++){
        let div = document.getElementById('div_ingredient'+i);
        div.setAttribute('id','div_ingredient'+(i-1));
        let spans = div.getElementsByTagName('span');
        spans[0].innerHTML  = 'ingredient '+(i)+' name:&nbsp;&nbsp;&nbsp;&nbsp;';
        spans[1].innerHTML  = '&nbsp;ingredient '+(i)+' quantite:&nbsp;&nbsp;&nbsp;&nbsp;';
        let select = div.getElementsByTagName('select')[0];
        select.setAttribute('name','ingredient[ingredient'+(i-1)+'][id_ingredient]');
        let inputs = div.getElementsByTagName('input');
        inputs[0].setAttribute('name','ingredient[ingredient'+(i-1)+'][quantite]');
        inputs[1].setAttribute('id',''+(i-1));
    }
}
function checkForm() {
    let quantites = document.getElementsByClassName('ingredient_quantite');
    for(let i=0;i<quantites.length;i++){
        let quantite = quantites[i];
        let patern = /[\d]+(mg|g|kg|t)$/;
        console.log(patern.test(quantite.value))
        if(!patern.test(quantite.value)==true) {
            quantite.setAttribute('style','border: 2px solid red;')
            alert('ingredient quantite should be number and end with mg/g/kg/t.');
            return false;
        }
    }
    return true;
}
function check(obj) {
    let patern = /[\d]+(mg|g|kg|t)$/;
    if(!patern.test(obj.value)==true) {
        obj.setAttribute('style','width:20%;border: 2px solid red;');
    }else{
        obj.setAttribute('style','width:20%');
    }
}
