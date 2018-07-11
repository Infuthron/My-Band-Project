<div class="cms-music-wrapper">
    <h1>Music</h1>
    <div class="cms-music-add">
        <a href="index.php?page=cms_add_event">Add Event</a>
        <a href="index.php?page=cms_add_song">Add Song</a>
    </div>
    <div class="cms-events">
        {foreach from=$events item=event}
            <div class="cms-single-event-holder">
                <h1>{$event[2]}</h1>
                <table>
                    <tr>
                        <th>Event Type</th>
                        <th>Event Location</th>
                        <th>Event Price</th>
                    </tr>
                    <br>
                    <tr>
                        <td>{$event[1]}</td>
                        <td>{$event[3]}</td>
                        <td>{$event[7]}</td>
                    </tr>
                </table>
                <h3>Date: {$event[4]} / {$event[5]} / {$event[6]}</h3>
                <h4>Event info</h4>
                <p>{$event[8]}</p>
            </div>
            <div class="cms-event-form">
                <form method="post" action="index.php">
                    <input type="hidden" name="event_delete_id" value="{$event[0]}">
                    <label> Delete:
                        <input type="checkbox" name="event_delete_check" value="delete">
                    </label>
                    <input type="submit" name="submit_cms_event_delete" value="Confirm delete">
                    <label>
                        <a href="index.php?page=cms_edit_event&id={$event[0]}">Edit</a>
                    </label>
                </form>
            </div>
        {/foreach}
    </div>
    <div class="cms-songs">
        {foreach from=$songs item=song}
            <div class="cms-single-song-holder">
                <h1>{$song[2]}</h1>
                <h3>{$song[4]}</h3>
                <h4>{$song[1]}</h4>
                <h4>See song <a target="_blank" rel="noopener noreferrer" href="{$song[5]}">here</a></h4>
                <p>{$song[4]}</p>
            </div>
            <div class="cms-song-form">
                <form method="post" action="index.php">
                    <input type="hidden" name="song_delete_id" value="{$song[0]}">
                    <label> Delete:
                        <input type="checkbox" name="song_delete_check" value="delete">
                    </label>
                    <input type="submit" name="submit_cms_song_delete" value="Confirm delete">
                    <label>
                        <a href="index.php?page=cms_edit_song&id={$song[0]}">Edit</a>
                    </label>
                </form>
            </div>
        {/foreach}
    </div>
</div>

