let score = 0;
let spawnInterval;
let timer;
let lastBoxTime = 0;
const timeLimit = 2000; // Time limit in milliseconds (3 seconds)

function spawnObject() {
    let $obj = $('<div class="gameObject"></div>');
    let randomX = Math.random() * ($('#gameCanvas').width() - 50);
    let randomY = Math.random() * ($('#gameCanvas').height() - 50);
    $obj.css({ top: randomY, left: randomX });
    $('#gameCanvas').append($obj);

    $obj.animate({
        width: "70px",
        height: "70px"
    }, 1000, function() {
        $obj.fadeOut(500, function() {
            $(this).remove();
        });
    });

    // Store the time when this box was spawned
    lastBoxTime = Date.now();

    $obj.click(function() {
        score++;
        $('#score').text(score);
        $(this).remove();
        resetTimer(); // Reset the timer on successful click
    });
}

function startGame() {
    score = 0; // Reset score
    $('#score').text(score); // Display score
    $('#restartButton').hide(); // Hide restart button
    $('#startButton').hide(); // Hide start button
    spawnInterval = setInterval(spawnObject, 2000); // Spawn objects every 2 seconds
    resetTimer(); // Start the timer
}

function stopGame() {
    clearInterval(spawnInterval);
    clearTimeout(timer);
    alert("Game Over! You missed a box. Your score is: " + score);
    $('#restartButton').show(); // Show the restart button
}

// Function to check if the game should stop due to missed clicks
function checkGameOver() {
    if (Date.now() - lastBoxTime >= timeLimit) {
        stopGame(); // Stop the game if the time limit is reached
    }
}

function resetTimer() {
    clearTimeout(timer);
    timer = setTimeout(checkGameOver, timeLimit); // Check for game over due to missed box
}

$(document).ready(function() {
    // Add event listener for Start Game button
    $('#startButton').click(function() {
        startGame(); // Start the game when clicked
    });

    $('#restartButton').click(function() {
        $(this).hide(); // Hide the restart button
        startGame(); // Restart the game
    });
});





