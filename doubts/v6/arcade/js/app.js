// Enemies our player must avoid
var Enemy = function(firstValue, secondValue) {
    // Variables applied to each of our instances go here,
    // we've provided one for you to get started

    // The image/sprite for our enemies, this uses
    // a helper we've provided to easily load images
    this.sprite = 'images/enemy-bug.png';
    this.x = firstValue;
    this.y = secondValue;
    this.temp = 0;
};

// Update the enemy's position, required method for game
// Parameter: dt, a time delta between ticks
Enemy.prototype.update = function(dt) { //Multiplying any movement with dt so that the game runs with the same speed on all computers.
    
        this.temp = this.x + 90 * dt; //Increase this constant to increase the speed of beetles.
        if(this.temp <= 500){
            this.x = this.temp;
        } else {
            this.x = -100;
        }

};

// Draw the enemy on the screen, required method for game
Enemy.prototype.render = function() {
    
    ctx.drawImage(Resources.get(this.sprite), this.x, this.y);
};

// Now write your own player class
// This class requires an update(), render() and
// a handleInput() method.

var Player = function(){
    this.sprite = "images/char-boy.png";
    this.x = 405 / 2; // center = 405 / 2, each square is of 100 pixels width, x = 250(3rd line.). x = 150(2 line), x= 350;    
    this.y = 430;
    this.temp = 0;
    this.storePrevious = new Object();//{x: 0, y: 0};
};

Player.prototype.update = function(){ 

};

Player.prototype.render = function() {
    ctx.clearRect(this.storePrevious.x + 17, this.storePrevious.y + 60, 70, 80);
    ctx.drawImage(Resources.get(this.sprite), this.x, this.y);
    ctx.rect(this.x + 17, this.y + 60, 70, 80);
    this.storePrevious.x = this.x;
    this.storePrevious.y = this.y;
    ctx.strokeStyle = "inherit";
    ctx.stroke();

};

Player.prototype.handleInput = function(key) {
    if(key === 'left'){
        this.temp = this.x - 50;
        if(this.temp >= 2.5){
            this.x = this.temp;
        }
    }

    if(key === 'right'){

        this.temp = this.x + 50;

        if(this.temp <= 402.5){
            this.x = this.temp;
        }
    }

    if(key === 'up'){

        this.temp = this.y - 50;

        if(this.temp >= 30){
            this.y = this.temp;
        }

        

    }

    if(key === 'down'){
        this.temp = this.y + 50;
        if(this.temp <= 430){
            this.y = this.temp;
        }
    }

    this.render();
}



// Now instantiate your objects.
// Place all enemy objects in an array called allEnemies
// Place the player object in a variable called player
var allEnemies = [];
allEnemies.push((new Enemy(0, 0)), (new Enemy(15, 160)), (new Enemy(-150, 325)));

var player = new Player();

// This listens for key presses and sends the keys to your
// Player.handleInput() method. You don't need to modify this.
document.addEventListener('keyup', function(e) {
    var allowedKeys = {
        37: 'left',
        38: 'up',
        39: 'right',
        40: 'down'
    };

    player.handleInput(allowedKeys[e.keyCode]);
});

function checkCollisions(){
    allEnemies.forEach(function(enemy) {

        if((enemy.x === player.x)&& (enemy.y === player.y)) {
            console.log(collided);
        }


    });
}
