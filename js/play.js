var secondes = 0;
var minutes = 0;
var timeDiv;
var matchmakingInterval;

function playLoad() {
    timeDiv = document.getElementById('time');
    
    if (timeDiv) {
        setInterval(compter, 1000);
        matchmakingInterval = setInterval(checkMatchmaking, 2000);
    }
}

function compter() {
    secondes++;
    if (secondes == 60) {
        secondes = 0;
        minutes++;
    }
    timeDiv.innerHTML = "Temps dans la file d'attente : " + minutes + "m " + secondes + "s";
}

function checkMatchmaking() {
    fetch('./requests/check_matchmaking.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'found') {
                clearInterval(matchmakingInterval);
                window.location.href = 'index.php?view=game&game_id=' + data.game_id;
            }
        })
        .catch(error => {
            console.error("Erreur lors du matchmaking:", error);
        });
}