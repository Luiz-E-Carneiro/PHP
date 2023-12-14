//Firt API search: https://random-word-api.herokuapp.com/home

var alphabet = [];
for (var i = 65; i <= 90; i++) {
  alphabet.push(String.fromCharCode(i));
}

const body = document.body
const boardArea = document.getElementById('boardArea')
var currentLine = 1
var currentCell = 1

var arrayDivs = []
var currentInputs = []
var emptyInputs = []


const makeBoard = () => {
    objLetters = []
    const board = document.createElement('div')
        board.classList.add('board')
    makeLines(board)
        boardArea.appendChild(board)
}

const makeLines = (board) => {
    var board = board
    for (let i = 0; i < 6; i++) {
        const line = document.createElement('div')
            line.classList.add('line')
        makeCells(line)
        board.appendChild(line)
    }
}

makeCells = (line) => {
    var line = line
    var lineDivs = []

    for (let i = 0; i < 5; i++) { //Change by the lenght of the words 
        const cell = document.createElement('div')
            cell.classList.add('cell')
        line.appendChild(cell)
        lineDivs.push(cell)
    }
    arrayDivs.push(lineDivs)
}

var alphabet = [];
for (var i = 65; i <= 90; i++) {
  alphabet.push(String.fromCharCode(i));
}

document.addEventListener('keydown', function (e) {
    var key = e.key.toUpperCase();
    var line = arrayDivs[currentLine - 1]
    if (alphabet.includes(key)) {
        makeInput(line, key)
    } 
    else if(key === "BACKSPACE"){
        deleteLastLetter(line)
    }
    else if(key === "ARROWRIGHT"){

    }
    else if(key === "ARROWLEFT"){
    
    } else if(key === "SPACE"){

    }else{
        alert('Type a letter')
    }
});

const deleteLastLetter = () => {
    if(currentInputs.length > 0){
        if (currentCell > 0) {
            currentCell --
            var last = currentInputs[currentInputs.length - 1];
            last.remove();
            currentInputs.splice(currentInputs.length - 1, 1);
        } 
    }
};

const makeInput = (line, key) => {
    var line = line
    var inpt = document.createElement('input')
        inpt.setAttribute('type', 'text')
        inpt.classList.add('inputLetter')
        inpt.value = key
    line[currentCell - 1].appendChild(inpt)
    currentCell++
    currentInputs.push(inpt)
}

makeBoard()
