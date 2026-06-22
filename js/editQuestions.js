let chosenTopic = 1

document.addEventListener('DOMContentLoaded', function() {
    fetchQuestions();

    const form = document.getElementById('quizForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        saveQuestions();
    });
});

function fetchQuestions() {
    console.log("fetchQuestions loaded");
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "php/getQuestions.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                questionsArray = JSON.parse(xhr.responseText);
                const topics = fetchUniqueTopics(questionsArray);
                populateDropdown(topics);
                showQuestion();
                topicSort(chosenTopic);
            } catch (e) {
                console.error('Failed to parse JSON response:', e);
            }
        }
    };
    xhr.send();
}

function saveQuestions() {
    const form = document.getElementById('quizForm');
    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/updateQuestions.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert('Questions updated successfully!');
                    fetchQuestions()
                } else {
                    alert('Error updating questions: ' + response.message);
                }
            } catch (e) {
                console.error('Failed to parse JSON response:', e);
            }
        }
    };
    xhr.send(formData);
}

function showQuestion() {
    const showButton = document.getElementById('show-button');
    showButton.addEventListener('click', function() {
        const selectedTopic = document.getElementById('topicDropdown').value;
        if (selectedTopic !== "") {
            chosenTopic = selectedTopic;
        }
        topicSort(chosenTopic);
        renderQuestionsByTopic(chosenTopic);
        console.log('click');
    });
}

function fetchUniqueTopics(questionsArray) {
    let uniqueTopics = [];
    questionsArray.forEach(i => {
        if (!uniqueTopics.includes(i.Topic)) {
            uniqueTopics.push(i.Topic);
        }
    });
    return uniqueTopics;
}

function populateDropdown(topics) {
    const dropdown = document.getElementById('topicDropdown');
    dropdown.innerHTML = '';
    topics.forEach(topic => {
        const option = document.createElement('option');
        option.value = topic;
        option.textContent = `Topic ${topic}`;
        dropdown.appendChild(option);
    });
}

let quizQuestions = [];

function topicSort(topic) {
    quizQuestions = questionsArray.filter(q => q.Topic == topic);
}

function renderQuestionsByTopic(topic) {
    const form = document.getElementById('quizForm');
    form.innerHTML = '';

    const section = document.createElement('div');
    section.className = 'quiz-section';
    section.id = `topic${topic}`;

    const title = document.createElement('h2');
    title.textContent = `Topic ${topic}`;
    section.appendChild(title);

    const topicQuestions = quizQuestions;
    let questionCounter = 1;

    topicQuestions.forEach(quizRow => {
        const questionDiv = document.createElement('div');
        questionDiv.className = 'question';

        questionDiv.innerHTML = `
            <input type="hidden" name="questions[${quizRow.Question_ID}][Question_ID]" value="${quizRow.Question_ID}">
            <input type="hidden" name="questions[${quizRow.Question_ID}][Topic]" value="${quizRow.Topic}">
            <label for="question${quizRow.Question_ID}">Question ${questionCounter++}:</label>
            <textarea id="question${quizRow.Question_ID}" name="questions[${quizRow.Question_ID}][Question]" rows="4">${quizRow.Question}</textarea>
            <div class="answer">
                <label for="option1_${quizRow.Question_ID}">Option A:</label>
                <textarea id="option1_${quizRow.Question_ID}" name="questions[${quizRow.Question_ID}][Option1]" rows="2">${quizRow.Option1}</textarea>
            </div>
            <div class="answer">
                <label for="option2_${quizRow.Question_ID}">Option B:</label>
                <textarea id="option2_${quizRow.Question_ID}" name="questions[${quizRow.Question_ID}][Option2]" rows="2">${quizRow.Option2}</textarea>
            </div>
            <div class="answer">
                <label for="option3_${quizRow.Question_ID}">Option C:</label>
                <textarea id="option3_${quizRow.Question_ID}" name="questions[${quizRow.Question_ID}][Option3]" rows="2">${quizRow.Option3}</textarea>
            </div>
            <div class="answer">
                <label for="option4_${quizRow.Question_ID}">Option D:</label>
                <textarea id="option4_${quizRow.Question_ID}" name="questions[${quizRow.Question_ID}][Option4]" rows="2">${quizRow.Option4}</textarea>
            </div>
            <div class="correct-answer">
                <label for="correct_${quizRow.Question_ID}">Correct Answer:</label>
                <textarea id="correct_${quizRow.Question_ID}" name="questions[${quizRow.Question_ID}][Answer]" rows="1">${quizRow.Answer}</textarea>
            </div>
        `;
        section.appendChild(questionDiv);
    });

    form.appendChild(section);

    const saveButton = document.createElement('button');
    saveButton.type = 'submit';
    saveButton.className = 'fixed-button';
    saveButton.textContent = 'Save';
    form.appendChild(saveButton);
}
