let totalQuestions = 0;
let answeredQuestions = 0;
let questionsArray = [];
let currentQuestionNumber = 0;
let timer;
let timeLeft = 60;
let player2Health;
let player1Health;
let hp1;
let hp2;
const boxone = document.getElementById('box-one');
const boxtwo = document.getElementById('box-two');
const mewbody = document.getElementById('mewtwo-body');
const mewtail = document.getElementById('mewtwo-tail');
const pikabody = document.getElementById('pika-body');
const pikatail = document.getElementById('pika-tail');
const pikaear1 = document.getElementById('pika-ear1');
const pikaear2 = document.getElementById('pika-ear2');
const player1Hp = document.getElementById('player1HP');
const player2Hp = document.getElementById('player2HP');
const answerButtons = document.getElementById('answerButtons');
const endMessage = document.getElementById('endMessage');
const lightningContainer = document.getElementById('lightningContainer');
const lightningContainer2 = document.getElementById('lightningContainer2');

const urlParams = new URLSearchParams(window.location.search);
let TopicNum = urlParams.get('topic_id');

function fetchQuestions() {
    console.log("fetchQuestions loaded");
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "php/getQuestions.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                questionsArray = JSON.parse(xhr.responseText);
                displayQuestions(currentQuestionNumber);
                totalQuestion(currentQuestionNumber);
                setHealth();
                updateHealthStatus();
                startTimer();
            } catch (e) {
                console.error('Failed to parse JSON response:', e);
            }
        }
    };

    xhr.send();
}

function totalQuestion(Num){
    const progressBar = document.getElementById('progress-bar');
    for (let i = 0; i < questionsArray.length; i++){
        const question = questionsArray[Num];
        if(question.Topic == TopicNum){
            totalQuestions++;
            const pokeball = document.createElement('div');
            pokeball.classList.add('pokeball');
            const center = document.createElement('div');
            center.classList.add('center');
            const line = document.createElement('div');
            line.classList.add('line');
            pokeball.appendChild(center);
            pokeball.appendChild(line);
            progressBar.appendChild(pokeball);
        }
        Num++;
        if(Num == questionsArray.length){
            break;
        }
    }
}

function setHealth() {
    player2Health = totalQuestions;
    player1Health = Math.round(player2Health / 2);
    hp1 = player1Health;
    hp2 = player2Health;
}

function updateHealthStatus(){
    const hptext1 = document.getElementById('hptext1');
    const hptext2 = document.getElementById('hptext2');

    hptext1.innerText = `${player1Health}/${hp1}`;
    hptext2.innerText = `${player2Health}/${hp2}`;
}

function displayQuestions(Number) {
    const question = questionsArray[Number];
    const questionContainer = document.querySelector('.question');

    const button1 = document.querySelector('.answer1');
    const button2 = document.querySelector('.answer2');
    const button3 = document.querySelector('.answer3');
    const button4 = document.querySelector('.answer4');
    if(question.Topic == TopicNum){
        questionContainer.innerHTML = `${question.Question}`;
        button1.innerHTML = `${question.Option1}`;
        button2.innerHTML = `${question.Option2}`;
        if(question.Option3 == null){
            button3.innerHTML = ``;
            button3.classList.add('empty');}
        else {
            button3.innerHTML = `${question.Option3}`;
        }
        if(question.Option4 == null){
            button4.innerHTML = ``;
            button4.classList.add('empty');}
        else {
            button4.innerHTML = `${question.Option4}`;
        }

        button1.correct = question.Answer.toUpperCase() === 'A';
        button2.correct = question.Answer.toUpperCase() === 'B';
        button3.correct = question.Answer.toUpperCase() === 'C';
        button4.correct = question.Answer.toUpperCase() === 'D';
    }
    else{
        currentQuestionNumber++;
        displayQuestions(currentQuestionNumber);
    }
}

function startTimer() {
    const timerDisplay = document.getElementById('timer');
    timeLeft = 60;
    timerDisplay.innerText = timeLeft;

    if (timer) {
        clearInterval(timer);
    }

    timer = setInterval(() => {
        timeLeft--;
        timerDisplay.innerText = timeLeft;

        if (timeLeft <= 0) {
            console.log('Timer Out')
            wrongAnswer();
        }
    }, 1000);
}

window.onload = fetchQuestions();

document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelectorAll('.startAnimation');

    if (button.length >0 && lightningContainer) {
        document.querySelectorAll('.answer1, .answer2, .answer3, .answer4').forEach(button => {
            button.addEventListener('click', function() {
                const correct = this.correct;
                if (correct) {
                    console.log('Button clicked');

                    correctAnswer();

                    // console.log('Class "move" added:', lightningContainer.classList.contains('move'));
                    // console.log(player1Health);
                    // console.log(player2Health);
                }
                else {
                    console.log('wrong answer');

                    wrongAnswer();

                    // console.log('Class "move" added:', lightningContainer2.classList.contains('move'));
                    // console.log(player1Health);
                    // console.log(player2Health);
                }
            });
        });
        } else {
            console.error('Button or lightningContainer not found');
    }
});

function updateHealth(player, currentHealth, maxHealth){
    let healthPercentage = (currentHealth / maxHealth) * 100;
    player.style.width = healthPercentage + '%';

    if(healthPercentage <= 20){
        player.style.backgroundColor = '#ff3300';
    } 
    else if(healthPercentage <= 50){
        player.style.backgroundColor = '#ffee00';
    } 
    else {
        player.style.backgroundColor = '#00ff00';
    }
}

function correctAnswer(){
    if (boxtwo.classList.contains('move')) {
        boxtwo.classList.remove('move');}

    if (lightningContainer.classList.contains('move')) {
        lightningContainer.classList.remove('move');

        void lightningContainer.offsetWidth;
    }

    lightningContainer.style.display = 'block';
    lightningContainer.classList.add('move');
    startTimer();
    setTimeout(function() {
        lightningContainer.style.display = 'none';
        mewbody.src = 'img/mewtwobodyhit.png';
        mewtail.src = 'img/mewtwotailhit.png';
        boxtwo.classList.add('move');
        player2Health -= 1;
        updateHealth(player2Hp, player2Health, hp2);
        updateHealthStatus();
        statusCheck();
        setTimeout(function() {
            mewbody.src = 'img/mewtwobody.png';
            mewtail.src = 'img/mewtwotail.png';
        }, 100);
    }, 745);
    answerButtons.classList.add('temp');
    if (totalQuestions > answeredQuestions + 1) { //+1 cause status check is called earlier
        setTimeout(function() {
            displayQuestions(currentQuestionNumber);
            answerButtons.classList.remove('temp');
        }, 750);
    }
}

function wrongAnswer(){
    if (boxone.classList.contains('move')) {
        boxone.classList.remove('move');}

    if (lightningContainer2.classList.contains('move')) {
        lightningContainer2.classList.remove('move');

        void lightningContainer2.offsetWidth;
    }

    lightningContainer2.style.display = 'block';
    lightningContainer2.classList.add('move');
    startTimer();
    setTimeout(function() {
        lightningContainer2.style.display = 'none';
        pikabody.src = 'img/pikabodyhit.png';
        pikatail.src = 'img/tailhit.png';
        pikaear1.src = 'img/earlefthit.png';
        pikaear2.src = 'img/earrighthit.png';
        boxone.classList.add('move');
        player1Health -= 1;
        updateHealth(player1Hp, player1Health, hp1);
        updateHealthStatus();
        statusCheck();
        setTimeout(function() {
            pikabody.src = 'img/pikabody.png';
            pikatail.src = 'img/tail.png';
            pikaear1.src = 'img/earleft.png';
            pikaear2.src = 'img/earright.png';
        }, 100);
    }, 745);
    answerButtons.classList.add('temp');
    if (totalQuestions > answeredQuestions + 1) { //+1 cause status check is called earlier
        setTimeout(function() {
            displayQuestions(currentQuestionNumber);
            answerButtons.classList.remove('temp');
        }, 750);
    }
}

function statusCheck(){
    updateHealthStatus();
    currentQuestionNumber++;
    answerQuestion();
    if(player1Health == 0){
        console.log('dead');
        endMessage.innerHTML = 'You have failed the quiz!'
        stopGame();
    }
    else if(player2Health == 0){
        console.log('win');
        endMessage.innerHTML = 'You have perfected the quiz!'
        stopGame();
    }
    else if(totalQuestions == answeredQuestions){
        console.log('done');
        endMessage.innerHTML = 'You have passed the quiz!'
        stopGame();
    };
}

function answerQuestion() {
    if (answeredQuestions < totalQuestions) {
        const progressBar = document.getElementById('progress-bar');
        const pokeballs = progressBar.getElementsByClassName('pokeball');
        pokeballs[answeredQuestions].classList.add('gray');
        answeredQuestions++;
    }
}

function stopGame() {
    const timerDisplay = document.getElementById('timer');
    timeLeft = 60;
    timerDisplay.innerText = timeLeft;
    clearInterval(timer);

    document.querySelectorAll('.answer1, .answer2, .answer3, .answer4').forEach(button => {
        button.disabled = true;
    });
    showScore();
}

function showScore() {
    document.getElementById('scorePlayer1Health').innerText = player1Health;
    document.getElementById('scorePlayer2Health').innerText = player2Health;
    document.getElementById('scoreTotalQuestions').innerText = totalQuestions;
    document.getElementById('scoreAnsweredQuestions').innerText = answeredQuestions;
    document.getElementById('scoreCorrectAnswers').innerText = totalQuestions-player2Health;
    saveScore()
    var score = document.getElementById('score');
    score.style.display = 'block';

    var closeButton = document.getElementById('closeScore');
    closeButton.onclick = function() {
        score.style.display = 'none';
        window.location.href = 'studentmainmenu.php'
    }
}

function saveScore() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/saveScore.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    var score = totalQuestions - player2Health;
    var passingScore = Math.round(totalQuestions / 2);

    var data = 'TopicID=' + TopicNum + 
               '&Score=' + score +
               '&passScore=' + passingScore;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    console.log('Score saved successfully!');
                } else {
                    console.log('Error saving score: ' + response.message);
                }
            } catch (e) {
                console.error('Failed to parse JSON response:', e); //this error can show with no problems cause the user already has a score
            }
        }
    };

    xhr.send(data);
}

