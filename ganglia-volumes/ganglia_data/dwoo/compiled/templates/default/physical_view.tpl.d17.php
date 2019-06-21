<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><table cellpadding="1" border="0" width="100%">
<tr>
<td colspan=3 class="title"><?php echo $this->scope["cluster"];?> cluster - Physical View |
 <font size="-1">Columns&nbsp;&nbsp;<?php echo $this->scope["cols_menu"];?></font>
</td>

<tr>
<td align="center" valign="top">
   Verbosity level (Lower is more compact):<br />
   <?php 
$_fh0_data = (isset($this->scope["verbosity_levels"]) ? $this->scope["verbosity_levels"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['verbosity']=>$this->scope['checked'])
	{
/* -- foreach start output */
?>
   <?php echo $this->scope["verbosity"];?> <input type="radio" name="p" value="<?php echo $this->scope["verbosity"];?>" OnClick="ganglia_form.submit();" <?php echo $this->scope["checked"];?> />&nbsp;
   <?php 
/* -- foreach end output */
	}
}?>

</td>

<td align="left" valign="top" width="25%">
Total CPUs: <b><?php echo $this->scope["CPUs"];?></b><br />
Total Memory: <b><?php echo $this->scope["Memory"];?></b><br />
</td>

<td align="left" valign="top" width="25%">
Total Disk: <b><?php echo $this->scope["Disk"];?></b><br />
Most Full Disk: <b><?php echo $this->scope["most_full"];?></b><br />
</td>

</tr>
<tr>
<td align="left" colspan="3">

<table cellspacing="20">
<tr>
<?php 
$_fh1_data = (isset($this->scope["racks"]) ? $this->scope["racks"] : null);
if ($this->isTraversable($_fh1_data) == true)
{
	foreach ($_fh1_data as $this->scope['rack'])
	{
/* -- foreach start output */
?>
   <td valign="top" align="center">
      <table cellspacing="5" border="0">
         <?php echo $this->scope["rack"]["RackID"];?>

         <?php echo $this->scope["rack"]["nodes"];?>

      </table>
   </td>
   <?php echo $this->scope["rack"]["tr"];?>

<?php 
/* -- foreach end output */
	}
}?>

</tr></table>

</td></tr>
</table>

<hr />


<table border="0">
<tr>
 <td align="left">
<font size="-1">
Legend
</font>
 </td>
</tr>
<tr>
<td class="odd">
<table width="100%" cellpadding="1" cellspacing="0" border="0">
<tr>
 <td style="color: blue">Node Name&nbsp;<br /></td>
 <td align="right" valign="top">
  <table cellspacing=1 cellpadding=3 border="0">
  <tr>
  <td class="L1" align="right">
  <font size="-1">1-min load</font>
  </td>
  </tr>
 </table>
<tr>
<td colspan="2" style="color: rgb(70,70,70)">
<font size="-1">
<em>cpu: </em> CPU clock (GHz) (num CPUs)<br />
<em>mem: </em> Total Memory (GB)
</font>
</td>
</tr>
</table>

</td>
</tr>
</table>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>