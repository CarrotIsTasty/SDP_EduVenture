document.addEventListener('DOMContentLoaded', function() {
    fetchUserInfo();

    populateProfilePictures();

    function fetchUserInfo() {
        console.log('Fetching user info');
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "php/profile.php", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    document.getElementById('name').value = response.Name || '';
                    document.getElementById('gender').value = capitalizeFirstLetter(response.Gender) || '';
                    document.getElementById('dob').value = response.DOB || '';
                    document.querySelector('.profile-picture').style.backgroundImage = 'url(' + response.ProfilePicture.replace(/\\/g, '/') + ')';
                    var profilePicNumber = response.ProfilePicture.match(/\d+/)[0];
                    document.getElementById('selected-profile-picture').value = profilePicNumber;
                    document.querySelector(`.profile-picture-selection img[src="image/profilepic/${profilePicNumber}.png"]`).classList.add('selected');
                } catch (e) {
                    console.error('Failed to parse JSON response:', e);
                }
            } else {
                console.error('Error fetching user information');
            }
        };
        xhr.onerror = function() {
            console.error('Request error');
        };
        xhr.send();
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
    }

    function populateProfilePictures() {
        var container = document.querySelector('.profile-picture-selection');
        for (let i = 1; i <= 19; i++) {
            var img = document.createElement('img');
            img.src = 'image/profilepic/' + i + '.png';
            img.alt = 'Profile Picture ' + i;
            img.onclick = function() {
                selectProfilePicture(i);
            };
            container.appendChild(img);
        }
    }

    function selectProfilePicture(picNumber) {
        document.getElementById('selected-profile-picture').value = picNumber;
        document.querySelectorAll('.profile-picture-selection img').forEach(img => {
            img.classList.remove('selected');
            
        });
        document.querySelector(`.profile-picture-selection img[src="image/profilepic/${picNumber}.png"]`).classList.add('selected');
        document.querySelector('.profile-picture').style.backgroundImage = `url(image/profilepic/${picNumber}.png)`;
        console.log(picNumber)
    }
});