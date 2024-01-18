

function openShoeImages(evt, productListImage) {
    var s, tabcontent1, tablinks1;
    tabcontent1 = document.getElementsByClassName("tabcontent1");
    for (s = 0; s < tabcontent1.length; s++) {
      tabcontent1[s].style.display = "none";
    }
    tablinks1 = document.getElementsByClassName("tablinks1");
    for (s = 0; s < tablinks1.length; s++) {
      tablinks1[s].className = tablinks1[s].className.replace(" active", "");
    }
    document.getElementById(productListImage).style.display = "block";
    evt.currentTarget.classList.add("active");
  }
  
  function setDefaultTab() {
    document.querySelector('.tablinks1.active').classList.remove('active');
    document.querySelector('.tablinks1').classList.add('active');
  }