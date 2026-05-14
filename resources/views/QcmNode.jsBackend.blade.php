<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>QCM Quiz - CodeMaster</title>

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>

  <style>

    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
    }

    body{
      font-family:Arial;
      background:#0a0a0f;
      color:white;
      min-height:100vh;
    }

    .main{
      padding:30px;
      max-width:1400px;
      margin:auto;
    }

    /* TOP BAR */

    .top-bar{
      display:flex;
      justify-content:space-between;
      align-items:center;
      margin-bottom:30px;
      flex-wrap:wrap;
      gap:10px;
    }

    .back-btn{
      padding:10px 18px;
      border-radius:12px;
      text-decoration:none;
      color:#9ca3af;
      border:1px solid rgba(255,255,255,0.1);
      background:rgba(255,255,255,0.05);
    }

    .score-badge{
      padding:10px 18px;
      border-radius:12px;
      background:rgba(124,58,237,0.15);
      color:#c4b5fd;
      border:1px solid rgba(124,58,237,0.3);
      font-weight:bold;
    }

    /* TITLE */

    .course-title{
      text-align:center;
      margin-bottom:30px;
    }

    .course-title h1{
      font-size:32px;
    }

    /* LAYOUT */

    .quiz-layout{
      display:flex;
      gap:25px;
    }

    /* SIDEBAR */

    .sidebar{
      width:220px;
    }

    .sidebar-card{
      background:rgba(255,255,255,0.03);
      border:1px solid rgba(255,255,255,0.08);
      border-radius:16px;
      padding:20px;
    }

    .sidebar-card h3{
      margin-bottom:15px;
    }

    .q-btn{
      width:100%;
      padding:12px;
      border:none;
      border-radius:12px;
      margin-bottom:10px;
      background:rgba(255,255,255,0.05);
      color:#9ca3af;
      cursor:pointer;
      transition:0.3s;
    }

    .q-btn.active{
      background:#7c3aed;
      color:white;
    }

    .q-btn.correct{
      background:rgba(16,185,129,0.2);
      color:#34d399;
    }

    .q-btn.incorrect{
      background:rgba(239,68,68,0.2);
      color:#f87171;
    }

    /* QUESTION */

    .question-area{
      flex:1;
    }

    .question-card{
      background:rgba(255,255,255,0.03);
      border:1px solid rgba(255,255,255,0.08);
      border-radius:16px;
      overflow:hidden;
    }

    .question-header{
      padding:24px;
      border-bottom:1px solid rgba(255,255,255,0.08);
    }

    .label{
      color:#a78bfa;
      margin-bottom:10px;
      font-size:13px;
      font-weight:bold;
    }

    .question-header h2{
      font-size:22px;
      line-height:1.5;
    }

    .options{
      padding:24px;
      display:flex;
      flex-direction:column;
      gap:12px;
    }

    .option{
      width:100%;
      padding:16px 20px;
      border-radius:12px;
      border:1px solid rgba(255,255,255,0.1);
      background:rgba(255,255,255,0.03);
      color:white;
      cursor:pointer;
      text-align:left;
      transition:0.3s;
      font-size:15px;
    }

    .option:hover{
      border-color:#7c3aed;
    }

    .option.correct{
      background:rgba(16,185,129,0.15);
      border-color:#10b981;
      color:#34d399;
    }

    .option.incorrect{
      background:rgba(239,68,68,0.15);
      border-color:#ef4444;
      color:#f87171;
    }

    /* FEEDBACK */

    .feedback-box{
      margin-top:10px;
      padding:20px;
      border-radius:16px;
      border:1px solid rgba(239,68,68,0.35);
      background:rgba(239,68,68,0.12);
      animation:fadeIn .3s ease;
    }

    .feedback-title{
      display:flex;
      align-items:center;
      gap:10px;
      font-size:20px;
      font-weight:bold;
      margin-bottom:12px;
      color:#f87171;
    }

    .feedback-box p{
      color:#d1d5db;
      line-height:1.7;
      font-size:15px;
    }

    @keyframes fadeIn{

      from{
        opacity:0;
        transform:translateY(10px);
      }

      to{
        opacity:1;
        transform:translateY(0);
      }

    }

    /* RESULT */

    .result-box{
      text-align:center;
      margin-top:30px;
      display:none;
    }

    .result-box h2{
      font-size:30px;
      margin-bottom:10px;
    }

    .retry-btn{
      margin-top:20px;
      padding:12px 24px;
      border:none;
      border-radius:12px;
      background:#7c3aed;
      color:white;
      cursor:pointer;
    }

    @media(max-width:900px){

      .quiz-layout{
        flex-direction:column;
      }

      .sidebar{
        width:100%;
      }

    }

  </style>
</head>

<body>

<div class="main">

  <!-- TOP -->

  <div class="top-bar">

    <a href="#" class="back-btn">
      <i class="ri-arrow-left-line"></i>
      Back to Courses
    </a>

    <div class="score-badge">
      <i class="ri-trophy-line"></i>
      <span id="scoreText">0/5 Correct</span>
    </div>

  </div>

  <!-- TITLE -->

  <div class="course-title">
    <h1>Node.js & Express Backend</h1>
  </div>

  <!-- LAYOUT -->

  <div class="quiz-layout">

    <!-- SIDEBAR -->

    <div class="sidebar">

      <div class="sidebar-card">

        <h3>Exercises</h3>

        <div id="questionList"></div>

      </div>

    </div>

    <!-- QUESTION -->

    <div class="question-area">

      <div class="question-card">

        <div class="question-header">

          <div class="label" id="questionLabel">
            Question 1/5
          </div>

          <h2 id="questionText">
            Loading...
          </h2>

        </div>

        <div class="options" id="optionsList"></div>

      </div>

      <!-- RESULT -->

      <div class="result-box" id="resultBox">

        <h2 id="finalScore"></h2>

        <p id="message"></p>

        <button class="retry-btn" onclick="restartQuiz()">
          Try Again
        </button>

      </div>

    </div>

  </div>

</div>

<script>

const questions = [

  {
    id:1,
    question:"Which module is used to create an HTTP server in Node.js?",
    options:["fs","http","path","url"],
    correctAnswer:1,
    explanation:"The HTTP module is used to create web servers in Node.js."
  },

  {
    id:2,
    question:"What is middleware in Express.js?",
    options:[
      "A database layer",
      "Function that process request/responses",
      "A CSS framework",
      "A testing tool"
    ],
    correctAnswer:1,
    explanation:"Middleware functions handle requests and responses in Express."
  },

  {
    id:3,
    question:"Which method sends a JSON response in Express?",
    options:[
      "res.send()",
      "res.json()",
      "res.render()",
      "res.redirect()"
    ],
    correctAnswer:1,
    explanation:"res.json() sends JSON data to the client."
  },

  {
    id:4,
    question:"What does `app.use()` do in Express?",
    options:[
      "Starts the server",
      "Mounts middleware globally",
      "Creates a route",
      "Connects to a database"
    ],
    correctAnswer:1,
    explanation:"app.use() is used to register middleware in Express."
  },

  {
    id:5,
    question:"Which Node.js feature enables handling many connections efficiently?",
    options:[
      "Multi-threading",
      "Event-driven, non-blocking I/O",
      "Synchronous processing",
      "Web Workers"
    ],
    correctAnswer:1,
    explanation:"Node.js uses an event-driven non-blocking architecture for scalability."
  }

];

let currentIndex = 0;

let answers = {};

function correctCount(){

  let count = 0;

  for(let i in answers){

    if(answers[i].correct){

      count++;

    }

  }

  return count;

}

function renderSidebar(){

  const list = document.getElementById("questionList");

  list.innerHTML = "";

  questions.forEach((q,index)=>{

    let cls = "q-btn";

    const ans = answers[q.id];

    if(index === currentIndex){

      cls += " active";

    }

    if(ans){

      if(ans.correct){

        cls += " correct";

      }else{

        cls += " incorrect";

      }

    }

    list.innerHTML += `
      <button class="${cls}">
        Question ${index + 1}
      </button>
    `;

  });

}

function renderQuestion(){

  const q = questions[currentIndex];

  document.getElementById("questionLabel").innerText =
  `Question ${currentIndex + 1}/5`;

  document.getElementById("questionText").innerText =
  q.question;

  const optionsBox = document.getElementById("optionsList");

  optionsBox.innerHTML = "";

  q.options.forEach((option,index)=>{

    const ans = answers[q.id];

    const isSelected = ans && ans.selected === index;

    const hasAnswered = ans && ans.selected !== null;

    const isCorrect =
      hasAnswered && index === q.correctAnswer;

    const isWrong =
      hasAnswered &&
      isSelected &&
      index !== q.correctAnswer;

    let cls = "option";

    if(isCorrect){

      cls += " correct";

    }else if(isWrong){

      cls += " incorrect";

    }

    optionsBox.innerHTML += `
      <button class="${cls}" onclick="selectOption(${index})">

        ${option.replace(/</g, "&lt;").replace(/>/g, "&gt;")}

      </button>
    `;

  });

  const ans = answers[q.id];

  if(ans && !ans.correct){

    optionsBox.innerHTML += `

      <div class="feedback-box">

        <div class="feedback-title">

          <i class="ri-close-circle-line"></i>

          Incorrect

        </div>

        <p>
          ${q.explanation}
        </p>

      </div>

    `;

  }

  document.getElementById("scoreText").innerText =
  `${correctCount()}/5 Correct`;

}

function selectOption(index){

  const q = questions[currentIndex];

  if(answers[q.id]) return;

  answers[q.id] = {

    selected:index,

    correct:index === q.correctAnswer

  };

  renderQuestion();

  renderSidebar();

  setTimeout(() => {

    if(currentIndex < questions.length - 1){

      currentIndex++;

      renderQuestion();

      renderSidebar();

    }else{

      finishQuiz();

    }

  }, 1500);

}

function finishQuiz(){

  document.getElementById("resultBox").style.display = "block";

  const score = correctCount();

  document.getElementById("finalScore").innerText =
  `Score: ${score}/${questions.length}`;

  let msg = "";

  if(score === questions.length){

    msg = "Perfect! Well done!";

  }else if(score >= questions.length / 2){

    msg = "Good job! Keep learning.";

  }else{

    msg = "Keep practicing!";

  }

  document.getElementById("message").innerText = msg;

}

function restartQuiz(){

  currentIndex = 0;

  answers = {};

  document.getElementById("resultBox").style.display = "none";

  renderQuestion();

  renderSidebar();

}

renderQuestion();

renderSidebar();

</script>

</body>
</html>