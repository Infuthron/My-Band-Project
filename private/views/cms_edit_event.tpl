<form method="post" action="index.php">
    <input type="hidden" name="event_edit_id" value="{$edit_event[0]}">
    <label>Choose event type<br>
        <select name="edit_event_kind">
            <option selected="selected" value="{$edit_event[1]}">{$edit_event[1]}</option>
            <option value="swing">Swing</option>
            <option value="rock">Rock</option>
            <option value="retro">Retro</option>
        </select>
    </label><br>
    <label>The event name<br>
        <input type="text" name="edit_event_name" value="{$edit_event[2]}">
    </label><br>
    <label>The event location<br>
        <input type="text" name="edit_event_location" value="{$edit_event[3]}">
    </label><br>
    <label>The date of the event<br>
        <select name="edit_event_day">
                <option selected="selected" value="{$edit_event[4]}">{$edit_event[4]}</option>
            {for $day = 1 to 31}
                <option value="{$day}">{$day}</option>
            {/for}
        </select>
        <select name="edit_event_month">
                <option selected="selected" value="{$edit_event[5]}">{$edit_event[5]}</option>
            {for $month = 1 to 12}
                <option value="{$month}">{$month}</option>
            {/for}
        </select>
        <select name="edit_event_year">
            <option selected="selected" value="{$edit_event[6]}">{$edit_event[6]}</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
        </select>
    </label><br>
    <label>The ticker price<br>
        <input type="text" name="edit_event_ticket" value="{$edit_event[7]}">
    </label><br>
    <label>The event description<br>
        <textarea name="edit_event_info" rows="10" cols="100">
            {$edit_event[8]}
        </textarea><br>
    </label>
    <label>
        <input type="submit" name="submit_edit_event" value="Edit Event">
    </label>
</form>