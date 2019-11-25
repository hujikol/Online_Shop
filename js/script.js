console.log('js masuk gan!')
var keyword = document.getElementById('search');
var container = document.getElementById('tampil');

keyword.addEventListener('keyup',function() {

    var xhr = new XMLHttpRequest();
// $.(#tampil).hide();
    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && xhr.status == 200 ){
           
            container.innerHTML = xhr.responseText;
        }
    } 

    xhr.open('GET', 'order_search.php?keyword=' + keyword.value, true);
    xhr.send();

});