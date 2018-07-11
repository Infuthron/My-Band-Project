<div class="info-wrapper">
    <h1 class="info-h1">Info</h1>
    {foreach from=$info_contents item=info_content}
        <div class="info-txt-1">
            <h4 class="info-h4">{$info_content[1]}</h4>
            <p class="info-part1">
                {$info_content[2]}
            </p>
        </div>
    {/foreach}
</div>



