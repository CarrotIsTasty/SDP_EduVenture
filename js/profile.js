function fetchUsers() {
    console.log("users loaded");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/profile.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                userArray = JSON.parse(xhr.responseText);
                displayUser()
                display_badge()
            } catch (e) {
                console.error('Failed to parse JSON response:', e);
                window.location.href = 'php/logout.php';
            }
        }
    };
    xhr.send();
}

window.onload = fetchUsers();

function displayUser() {
    const name = document.getElementById('user-name')
    const age = document.getElementById('user-age')
    const gender = document.getElementById('user-gender')
    const dob = document.getElementById('user-dob')
    const pfp = document.getElementById('profile-pic')
    pfp.src = userArray.ProfilePicture;
    name.innerHTML = 'Name: ' + userArray.Name
    age.innerHTML = 'Age: ' + userArray.Age
    gender.innerHTML = 'Gender: ' + userArray.Gender
    dob.innerHTML = 'Date of Birth: ' + userArray
    .DOB
}

function clickAchievementItems() {
    const achievementItems = document.querySelectorAll('.achievement-item');

    achievementItems.forEach(item => {
        item.addEventListener('click', () => {
            const info = item.querySelector('.achievement-info');
            if (item.classList.contains('expanded')) {
                info.style.height = '0px';
                item.classList.remove('expanded');
                info.style.height = '0';
                info.style.opacity = '0';
                info.style.paddingTop = '0';
                info.style.paddingBottom = '0';
            } else {
                item.classList.add('expanded');
                info.style.height = info.scrollHeight + 'px';
                info.style.opacity = '1';
                info.style.paddingTop = '10px';
                info.style.paddingBottom = '10px';
                setTimeout(() => {
                    info.style.height = 'auto';
                }, 500);
            }
        });
    });
}

function display_badge() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "php/checkBadge.php?", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
        try {
            const res = JSON.parse(xhr.responseText);
            const badgeContainer = document.getElementById("achievement-container");

            res.forEach(badge => {
            const html = `<div class="achievement-item">
                            <div class="badge"><img src="${badge.Badge_Image}"></div>
                            <div class="details">${badge.Badge_Description}</div>
                            <div class="trophy"><i class="fa-solid fa-trophy"></i></div>
                            <div class="achievement-info">
                                <div class="score">Score: ${badge.Score}/15</div>
                                <div class="date">Date: ${badge.Date_Achieved}</div>
                            </div>
                            </div>`;
            badgeContainer.insertAdjacentHTML('beforeend', html);
            });
            clickAchievementItems();
        } catch (error) {
        console.error("Error parsing badge data:", error);
        }
    }
};
}

document.getElementById('logout').addEventListener('click', function() {
    window.location.href = 'php/logout.php';
});