<?php
include("includes/includedFiles.php");
?>

<div class="entityInfo">
    <div class="centerSection">
        <h2>All Songs</h2>
        <div class="tracklistContainer">
            <ul class="tracklist">
                <?php
                $query = "SELECT * FROM songs";
                $result = $con->query($query);

                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    $song = new Song($con, $row['id']);

                    echo "<li class='tracklistRow'>
                            <div class='trackCount'>
                                <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $song->getId() . "\", tempPlaylist, true)'>
                                <span class='trackNumber'>$i</span>
                            </div>
                            <div class='trackInfo'>
                                <span class='trackName'>" . $song->getTitle() . "</span>
                                <span class='artistName'>" . $song->getArtist()->getName() . "</span>
                            </div>
                            <div class='trackOptions'>
                                <input type='hidden' class='songId' value='" . $song->getId() . "'>
                                <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                            </div>
                            <div class='trackDuration'>
                                <span class='duration'>" . $song->getDuration() . "</span>
                            </div>
                        </li>";
                    $i++;
                }
                ?>
                <script>
                    var tempSongIds = '<?php echo json_encode($songs); ?>';
                    tempPlaylist = JSON.parse(tempSongIds);
                </script>
            </ul>
        </div>
    </div>
</div>

<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>
