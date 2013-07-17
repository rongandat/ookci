{if count($feedbackmsgs)>0 }
<br />
<div id="feedbackMessagesPanel" class="success" >
<ul>
{section name=fb_index loop=$feedbackmsgs}
	<li>{$feedbackmsgs[fb_index]}</li>
{/section}
</ul>
</div>
{/if}
