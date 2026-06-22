document.addEventListener('DOMContentLoaded', function() {
    checkBadges();
    fetchCertificateData();
});

function checkBadges() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/insertCert.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("Badge check completed.");
        }
    };
    xhr.send();
}

function fetchCertificateData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/checkCert.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response && response.Name && response.Date_Achieved) {
                document.querySelector('.studentname').textContent = response.Name;
                document.querySelector('.date').textContent = "Date Achieved: " + response.Date_Achieved;
                document.querySelector('.idnumber').textContent = "ID: " + response.CertificateID;
            } else {
                document.querySelector('.studentname').textContent = "Name";
                document.querySelector('.date').textContent = "Date Achieved: Date Not Available";
                document.querySelector('.idnumber').textContent = "ID: This is a preview";
            }
        }
    };
    xhr.send();
}
