{if count($validerrors)>0 }
<div id="validErrorPanel" class="validErrors" >
<ul>
{section name=error_index loop=$validerrors}
	<li><strong>{$validerrors[error_index].field}:</strong> {$validerrors[error_index].message}</li>
{/section}
</ul>
</div>
{/if}
