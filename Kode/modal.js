function readMore(data){
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    var judul = document.getElementById("judul-modal");
    modal.style.display = "block";
    alert(data);
    judul.innerHTML = data.nama;
    span.onclick = function() {
        modal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
}