<form method="get" action="index.php">
    <input type="hidden" name="page" value="search">
    <input type="text" name="searchterm">
    <input type="submit" name="submit" value="search">
</form>
<h3>Current page: {$current_page}</h3>
<br>
<p>
    {foreach from=$articles item=article}
<h2>{$article[0]}</h2>
<p>{$article[1]}</p>
<img src="{$article[2]}" alt="Ello"/>
{/foreach}
</p>

{if $current_page gt 1}
    <a href="index.php?page=news&pagenumber={$current_page - 1}">Grevious Page</a>
{/if}

{if $current_page lt $number_of_pages}
    <a href="index.php?page=news&pagenumber={$current_page + 1}">Nextus Page</a>
{/if}

<h1>Number of pages: {$number_of_pages}</h1>
