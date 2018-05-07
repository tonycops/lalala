
function search(key){
  if(key.length == 0){
    document.getElementById("search").innerHTML = "";
    return
  }
  var xml = new XMLHttpRequest();
  var base_url = "http://localhost/proyek_fai/";
  xml.onreadystatechange = function(){
    //alert(this.readyState);
    if(this.readyState == 4){
      document.getElementById("search").innerHTML = this.responseText;
      console.log(this.responseText);
    }
  }
  xml.open("get", base_url + "cont_user/search/"+ key, true);
  xml.send();
}

function modal(gambar){
  document.getElementById("myModal").style.display = "block";
  document.getElementById("img01").src = gambar;
}
function span(){
  document.getElementById("myModal").style.display = "none";
}