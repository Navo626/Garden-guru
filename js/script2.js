function submitQuestion() {
  const questionInput = document.getElementById("question-input");
  const question = questionInput.value;

  if (question.trim() === "") {
    alert("Please enter a valid question.");
    return;
  }

  // Here, you can implement backend functionality to store the question and generate answers.
  // For this example, we'll just display a placeholder answer.
  const answer = "This is a placeholder answer for the question: " + question;

  const answerContainer = document.getElementById("answer-container");
  const answerElement = document.createElement("div");
  answerElement.classList.add("answer");
  answerElement.textContent = answer;
  answerContainer.appendChild(answerElement);

  // Clear the question input after submission
  questionInput.value = "";
}

