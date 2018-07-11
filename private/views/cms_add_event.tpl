<div class="cms-add-event-wrapper">
    <h1>Add Event</h1>
    <form method="post" action="index.php">

            <label>Choose event type<br>
                <select name="event_kind">
                    <option value="swing">Swing</option>
                    <option value="rock">Rock</option>
                    <option value="retro">Retro</option>
                </select>
            </label><br>
            <label>The event name<br>
                <input type="text" name="event_name">
            </label><br>
            <label>The event location<br>
                <input type="text" name="event_location">
            </label><br>
            <label>The date of the event<br>
                <select name="event_day">
                {for $day = 1 to 31}
                    <option value="{$day}">{$day}</option>
                {/for}
                </select>
                <select name="event_month">
                {for $month = 1 to 12}
                    <option value="{$month}">{$month}</option>
                {/for}
                </select>
                <select name="event_year">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </label><br>
            <label>The ticker price<br>
                <input type="text" name="event_ticket">
            </label><br>
            <label>The event description<br>
                <textarea name="event_info" rows="10" cols="100">
                </textarea><br>
            </label>
            <label>
                <input type="submit" name="submit_add_event" value="Add Event">
            </label>
    </form>
</div>