const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("light");
    }else{
        localStorage.setItem("light","set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');

$(document).ready(function() {
    $('#predictionForm').submit(function(e) {
        e.preventDefault();
        var regionID = $('#regionID').val();

        $.ajax({
            type: 'POST',
            url: 'predict_calamity.php',
            data: { regionID: regionID },
            dataType: 'json',
            success: function(response) {
                $('#predictionResult').html('<p>Prediction: ' + response.prediction + '</p>');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});