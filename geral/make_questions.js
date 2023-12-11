var questionsNumber = [0, 1, 2, 3, 4]
var points = 0

async function fetchData() {
    const response = await fetch('./../questions_php/data_questions.php')
    const data = await response.json()

    const queryString = window.location.search
    const urlParams = new URLSearchParams(queryString)
    const theme = urlParams.get('theme')

    createQuestion(theme, data)
}

function createQuestion(theme, data) {

    const localization = data[theme]
    const div_question = document.getElementById('question')
    div_question.innerHTML = ""

    const randIndex = Math.floor(Math.random() * questionsNumber.length)
    const question_selected = questionsNumber.splice(randIndex, 1)[0]

    const quest = document.createElement('h2')
    quest.classList.add('question_text')
    quest.innerText = localization[question_selected].question

    const div_img = document.createElement('div')
    div_img.classList.add('img_div')
    div_img.innerHTML = `${localization[question_selected].image}`

    var div_answers = document.createElement('div')
    div_answers.classList.add('answers')
    const options = localization[question_selected].options

    for (let i = 0; i < options.length; i++) {
        var btn = document.createElement('button')
        btn.classList.add('alternative_button')
        btn.innerText = options[i]
        div_answers.appendChild(btn)
    }


    div_question.appendChild(quest)
    div_question.appendChild(div_img)
    div_question.appendChild(div_answers)

    const alternatives = document.getElementsByClassName('alternative_button')
    const right_answer = data[theme][question_selected].answer

    console.log(right_answer)

    verification(alternatives, right_answer)
}

const verification = (alternatives, right_answer) => {
    for (let btn of alternatives) {
        btn.addEventListener('click', function () {
            for (let btn of alternatives) {
                btn.disabled = true
            }
            console.log(this.innerText)
            console.log(right_answer)

            if (this.innerText === right_answer) {
                points += 10
                for (let alternative of alternatives) {
                    if(alternative.innerText !== right_answer) {
                        alternative.style.backgroundColor = 'red'
                        alternative.style.boxShadow = '5px 5px #c00502'
                    }
                }

            } else {
                for (let alternative of alternatives) {
                    if(alternative.innerText !== right_answer) {
                        alternative.style.backgroundColor = 'red'
                        alternative.style.boxShadow = '5px 5px #c00502'
                    }
                }
                this.style.backgroundColor = ' #880505'
                this.style.boxShadow = '5px 5px #610303'
            }
            nextQuestion()
        })
    }
}

const nextQuestion = () => {
    setTimeout(() => {
        if (questionsNumber.length === 0) {
            window.location.href = `final_page.php?pts=${points}`
        } else {
            fetchData()
        }
    }, 3000)
}

fetchData()