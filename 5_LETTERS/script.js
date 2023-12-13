const body = document.body
const boardArea = document.getElementById('boardArea')

const makeBoard = () => {
    const board = document.createElement('div')
    board.classList.add('board')
    makeLines(board)
    boardArea.appendChild(board)
}

const makeLines = (board) => {
    var board = board
    for(let i = 0; i < 6; i++){
        const line = document.createElement('div')
        line.classList.add('line')
        makeCells(line)
        board.appendChild(line)
    }
}

makeCells = (line) => {
    var line = line
    for (let i = 0; i < 5; i++) {
        const cell = document.createElement('div')
        cell.classList.add('cell')
        line.appendChild(cell)                
    }
}

makeBoard()