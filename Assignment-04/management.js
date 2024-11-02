// Initialize or get scores from localStorage
let players = JSON.parse(localStorage.getItem('players')) || [
    {name: 'Alice', score: 10},
    {name: 'Bob', score: 5}
];

// Function to update the scoreboard
function updateScoreboard() {
    $('#scoreboard').empty();
    players.forEach(player => {
        $('#scoreboard').append(`<li>${player.name}: ${player.score}</li>`);
    });
    // Save updated scores in localStorage
    localStorage.setItem('players', JSON.stringify(players));
}

// Example function to change player score dynamically
function changePlayerScore(playerName, newScore) {
    players = players.map(player => {
        if (player.name === playerName) {
            player.score = newScore;
        }
        return player;
    });
    updateScoreboard();
}

$(document).ready(function() {
    updateScoreboard();

    // Button to reset Alice's score
    $('#resetScore').click(function() {
        changePlayerScore('Alice', 0); // Reset Alice's score to 0 on button click
    });

    // Handle difficulty changes
    $('#difficulty').change(function() {
        let difficulty = $(this).val();
        if (difficulty === 'easy') {
            alert('Easy difficulty selected');
        } else if (difficulty === 'medium') {
            alert('Medium difficulty selected');
        } else if (difficulty === 'hard') {
            alert('Hard difficulty selected');
        }
    });
});

