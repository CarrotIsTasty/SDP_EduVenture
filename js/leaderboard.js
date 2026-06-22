document.getElementById('topicDropdown').addEventListener('change', function() {
    const topicID = this.value;
    const link = document.getElementById('leaderboardLink');
    console.log(topicID)
    if (topicID) {
        link.href = `leaderboard-2.php?topic_id=${topicID}`;
    } else {
        link.href = 'leaderboard-2.php?topic_id=1';
    }
});