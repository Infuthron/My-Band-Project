<h1 class="swing-head">Retro Music</h1>
{foreach from=$songs item=song}
    <div class="swing-songs">
        <h2>{$song[2]}</h2>
        <h3>By: {$song[4]}</h3>
        <h4>Genre: {$song[2]}</h4>
        <h5>Aditional info:</h5>
        <p>{$song[3]}</p>
        <a href="{$song[5]}" target="_blank">Clicc for song</a>
    </div>
{/foreach}
<h1 class="swing-bottom">Upcoming retro events</h1>
{foreach from=$events item=event}
    <div class="swing-events">
        <h2>{$event[2]}</h2>
        <h3>Genre: {$event[1]}</h3>
        <h4>About: </h4>
        <p>{$event[8]}</p>
        <h4>Location: {$event[3]}</h4>
        <h4>Price: {$event[7]}</h4>
        <h4>Date: {$event[4]} / {$event[5]} / {$event[6]}</h4>
    </div>
{/foreach}