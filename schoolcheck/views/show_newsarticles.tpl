<table>
{foreach from=$result item=oneItem}
<tr>
  <td>{$oneItem.title}</td>
  <td>{$oneItem.content}</td>
  <td>{$oneItem.date_created}</td>
  <td><a href="#"></a>edit</td>
  <td><a href="?action=admin&cms_action=delete&id={$oneItem.id}">delete</a></td>
</tr>
{/foreach}
</table>
