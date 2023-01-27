const question = document.querySelector('#question');
const choices = Array.from(document.querySelectorAll('.choice-text'));
const progressText = document.querySelector('#progressText');
const scoreText = document.querySelector('#score');
const progressBarFull = document.querySelector('#progressBarFull');

let currentQuestion = {}
let questionCounter = 0
let availableQuestions = []

let questions = [
    {
        question: "Quanto você quer investir?",
        choice1: "De R$1.000 até R$9.999",
        choice2: "De R$10.000 até R$50.000",
        choice3: "De R$50.001 até R$100.000",
        choice4: "De R$100.001 até R$1.000.000",
    },
    {
        question:"Quando você quer resgatar seu investimento?",
        choice1: "1 Ano ou menos",
        choice2: "2-3 Ano",
        choice3: "4-5 Anos",
        choice4: "6 Ano",
    },
    {
        question: "Quais das opções abaixo, qual mais te atende em relação as suas expectativas com o investimento?",
        choice1: "100% de chance de ganhar 10%",
        choice2: "Possibilidade de ganhar entre 5% - 20%",
        choice3: "Possibilidade de ganhar entre 0% - 25%",
        choice4: "Possibilidade de perder 10% ou ganhar até 40%",
    }
]

const MAX_QUESTIONS = 3

var questionsIndex = 0;

startGame = () => {
    questionCounter = 0
    availableQuestions = [...questions]
    getNewQuestion()
}

getNewQuestion = () => {
    if(availableQuestions.length === 0 || questionCounter > MAX_QUESTIONS) {
        localStorage.setItem('mostRecentScore', score)

        return window.location.assign('/end.html')
    }

    questionCounter++
    progressText.innerText = `Question ${questionCounter} of ${MAX_QUESTIONS}`
    progressBarFull.style.width = `${(questionCounter/MAX_QUESTIONS) * 100}%`
    
    
    currentQuestion = availableQuestions[questionsIndex]
    question.innerText = currentQuestion.question

    choices.forEach(choice => {
        const number = choice.dataset['number']
        choice.innerText = currentQuestion['choice' + number]
    })


  
    availableQuestions.splice(questionsIndex, 1)

    acceptingAnswers = true
}

choices.forEach(choice => {
    choice.addEventListener('click', e => {
        if(!acceptingAnswers) return

        acceptingAnswers = false
        const selectedChoice = e.target
        const selectedAnswer = selectedChoice.dataset['number']
        
        
        let classToApply = selectedAnswer == currentQuestion.answer ? 'correct' : 'incorrect'

        if(classToApply === 'correct') {
            incrementScore(SCORE_POINTS)
        }

        selectedChoice.parentElement.classList.add(classToApply)
choices[currentQuestion.answer-1].parentElement.classList.add('correct') 

        setTimeout(() => {
            selectedChoice.parentElement.classList.remove(classToApply)
          choices[currentQuestion.answer-1].parentElement.classList.remove('correct') 
            getNewQuestion()
        }, 1000)

        questionsIndex++
    })
})
             

incrementScore = num => {
    score +=num
    scoreText.innerText = score
}   

startGame()