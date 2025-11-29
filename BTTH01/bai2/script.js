let questions = [];

fetch("questions.json")
  .then(response => response.json())
  .then(data => {
    questions = data;
    renderQuestions();
  });

function renderQuestions() {
  const quizDiv = document.getElementById("quiz");
  quizDiv.innerHTML = "";

  questions.forEach((q, index) => {
    let html = `
      <div class="question-box">
        <b>Câu ${index + 1}: </b> ${q.question}
        ${q.type === "multi" ? '<div class="multi">(Chọn nhiều đáp án)</div>' : ""}
        <br>
    `;

    q.options.forEach((opt, i) => {
      let letter = String.fromCharCode(65 + i); 

      if (q.type === "single") {
        html += `
          <label>
            <input type="radio" name="q${index}" value="${letter}">
            ${letter}. ${opt}
          </label><br>
        `;
      } else {
        html += `
          <label>
            <input type="checkbox" name="q${index}" value="${letter}">
            ${letter}. ${opt}
          </label><br>
        `;
      }
    });

    html += `</div>`;
    quizDiv.innerHTML += html;
  });
}

function submitQuiz() {
  let score = 0;

  questions.forEach((q, index) => {
    let selected = [];

    document.querySelectorAll(`input[name=q${index}]:checked`).forEach(i => {
      selected.push(i.value);
    });


    if (arraysEqual(selected, q.answer)) {
      score++;
    }
  });

  document.getElementById("result").innerHTML =
    `<h3>Kết quả: ${score} / ${questions.length}</h3>`;
}

function arraysEqual(a, b) {
  if (a.length !== b.length) return false;
  a.sort(); b.sort();
  return a.every((val, index) => val === b[index]);
}
