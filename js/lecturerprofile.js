function fetchUsers() {
    console.log("users loaded");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/profile.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                userArray = JSON.parse(xhr.responseText);
                displayUser()
                displayQuiz()
            } catch (e) {
                console.error('Failed to parse JSON response:', e);
                // window.location.href = 'php/logout.php';
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

function displayQuiz() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "php/checkQuiz.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                const quizContainer = document.getElementById("quiz-container");

                const topicData = {};

                response.forEach(quiz => {
                    const topicID = quiz.TopicID;
                    const score = parseFloat(quiz.Score);
                    if (!topicData[topicID]) {
                        topicData[topicID] = { totalScore: 0, count: 0 };
                    }
                    topicData[topicID].totalScore += score;
                    topicData[topicID].count += 1;
                });

                for (const topicID in topicData) {
                    const data = topicData[topicID];
                    const averageScore = (data.totalScore / data.count).toFixed(2);
                    const html= `
                        <div class ="quiz-item">
                            <div class="quiz-title">Topic ${topicID}</div>
                            <div class="quiz-average">Average Score: ${averageScore}</div>
                            <div class="quiz-count">Number of Participants: ${data.count}</div>
                        </div>
                    `;
                    quizContainer.insertAdjacentHTML('beforeend', html);
                }
            } catch (e) {
                console.error('Failed to parse JSON response:', e);
            }
        }
    };
}

document.getElementById('logout').addEventListener('click', function() {
    window.location.href = 'php/logout.php';
});