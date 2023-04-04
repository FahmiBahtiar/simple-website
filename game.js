var rps = document.getElementsByClassName('icon');
var grid = document.getElementsByClassName('col-sm');
var result = document.getElementById('result');


class Player {
    getRandomChoice() {
        var choice = Math.floor(Math.random() * 3) + 1;
        return choice;
    }
}

class Game {
    constructor(hasResult) {
        this.hasResult = hasResult;
    }

    isHasResult() {
        return this.hasResult;
    }

    getWinner(player, com) {
        if (com == 1) {
            document.getElementById('enemy-batu').classList.add('selected');
            document.getElementById('enemy-kertas').classList.remove('selected');
            document.getElementById('enemy-gunting').classList.remove('selected');
        } else if (com == 2) {
            document.getElementById('enemy-kertas').classList.add('selected');
            document.getElementById('enemy-batu').classList.remove('selected');
            document.getElementById('enemy-gunting').classList.remove('selected');
        } else {
            document.getElementById('enemy-gunting').classList.add('selected');
            document.getElementById('enemy-kertas').classList.remove('selected');
            document.getElementById('enemy-batu').classList.remove('selected');
        }

        if (player == 'rock') {
            document.getElementById('player-batu').classList.add('selected');
            document.getElementById('player-kertas').classList.remove('selected');
            document.getElementById('player-gunting').classList.remove('selected');
        } else if (player == 'paper') {
            document.getElementById('player-kertas').classList.add('selected');
            document.getElementById('player-batu').classList.remove('selected');
            document.getElementById('player-gunting').classList.remove('selected');
        } else {
            document.getElementById('player-gunting').classList.add('selected');
            document.getElementById('player-kertas').classList.remove('selected');
            document.getElementById('player-batu').classList.remove('selected');
        }

        if (player == 'rock' && com == 1) {
            result.innerHTML = 'DRAW';
        } else if (player == 'rock' && com == 2) {
            result.innerHTML = 'COM WINS';
        } else if (player == 'rock' && com == 3) {
            result.innerHTML = 'PLAYER 1 WINS';
        } else if (player == 'paper' && com == 1) {
            result.innerHTML = 'PLAYER 1 WINS';
        } else if (player == 'paper' && com == 2) {
            result.innerHTML = 'DRAW';
        } else if (player == 'paper' && com == 3) {
            result.innerHTML = 'COM WINS';
        } else if (player == 'scissors' && com == 1) {
            result.innerHTML = 'COM WINS';
        } else if (player == 'scissors' && com == 2) {
            result.innerHTML = 'PLAYER 1 WINS';
        } else {
            result.innerHTML = 'DRAW';
        }

        if (result.innerHTML == 'DRAW') {
            result.classList.remove('win-text');
            result.classList.remove('vs-text');
            result.className += ' text-style draw-text';
        } else {
            result.classList.remove('draw-text');
            result.classList.remove('vs-text');
            result.className += ' text-style win-text';
        }

        this.hasResult = true;
    }

    refreshGame() {
        result.classList.remove('draw-text');
        result.classList.remove('win-text');
        result.classList.remove('text-style');
        result.className += ' vs-text';
        result.innerHTML = "VS";

        var gameIcon = document.getElementsByClassName('rps');

        for (var i = 0; i < gameIcon.length; i++) {
            gameIcon[i].classList.remove('selected');
        }

        this.hasResult = false;
    }
}

var game = new Game(false);
var player = new Player();

for (var i = 0; i < grid.length; i++) {
    grid[i].className += ' d-flex justify-content-center align-items-center';
}

function goToHome() {
    window.location.href = 'Main-page';
}

function rpsClicked(e) {
    var human = e;
    var com = player.getRandomChoice();
    if (!game.isHasResult()) {
        game.getWinner(human, com);
    }
}

function refreshGame() {
    game.refreshGame();
}
