function getSearch() {
    var select = document.getElementById('sort');
    var sort = select.options[select.selectedIndex].value;
    var searchbox = document.getElementById('searchbox');
    var str = searchbox.value;
    var select2 = document.getElementById('kategori');
    var kategori = select2.options[select2.selectedIndex].value;
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange=function(){
        
        if(this.readyState==4 && this.status==200){
            var services = document.getElementById('services');
            
            services.innerHTML = xhttp.responseText;
            
            
            
        }
        
    };
    xhttp.open("GET", "action/eventsearch.php?keyword="+str+"&sort="+sort+"&kategori="+kategori, true);
    xhttp.send();
}
function getSearchA() {
    var select = document.getElementById('sort');
    
    var sort = select.options[select.selectedIndex].value;
    var searchbox = document.getElementById('searchbox');
    var str = searchbox.value;
    var select2 = document.getElementById('kategori');
    var kategori = select2.options[select2.selectedIndex].value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        
        if(this.readyState==4 && this.status==200){
            
            var services = document.getElementById('services');
            services.innerHTML = xhttp.responseText;
            
            
            
        }
        
    };
    xhttp.open("GET", "action/akunsearch.php?keyword="+str+"&sort="+sort+"&kategori="+kategori, true);
    xhttp.send();
}
function readMore(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        
        if(this.readyState==4 && this.status==200){
            var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        var body = document.getElementById('modal-body');
            body.innerHTML = xhttp.responseText;
    modal.style.display = "block";
    span.onclick = function() {
        modal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
    
            
            
        }
        
    };
    xhttp.open("GET", "modal.php?id="+id, true);
    xhttp.send();
}