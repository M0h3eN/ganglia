<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
if (((isset($this->scope["filters"]) ? $this->scope["filters"] : null) !== null)) {
?>
<table border="0" width="100%">
  <tr>
    <?php 
$_fh1_data = (isset($this->scope["filters"]) ? $this->scope["filters"] : null);
if ($this->isTraversable($_fh1_data) == true)
{
	foreach ($_fh1_data as $this->scope['filter'])
	{
/* -- foreach start output */
?>
      <td>
        <b><?php echo $this->scope["filter"]["filter_name"];?></b>
        <select name="choose_filter[<?php echo $this->scope["filter"]["filter_shortname"];?>]" OnChange="ganglia_form.submit();">
          <option name=""></option>
          <?php 
$_fh0_data = (isset($this->scope["filter"]["choice"]) ? $this->scope["filter"]["choice"]:null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['choice'])
	{
/* -- foreach start output */
?>
          <?php if ($this->readVar("choose_filter.".(isset($this->scope["filter"]) ? $this->scope["filter"] : null).".filter_shortname") == (isset($this->scope["choice"]) ? $this->scope["choice"] : null)) {
?>
          <option name="<?php echo $this->scope["choice"];?>" selected><?php echo $this->scope["choice"];?></option>
          <?php 
}
else {
?>
          <option name="<?php echo $this->scope["choice"];?>"><?php echo $this->scope["choice"];?></option>
          <?php 
}?>

          <?php 
/* -- foreach end output */
	}
}?>

        </select>
      </td>
    <?php 
/* -- foreach end output */
	}
}?>

  </tr>
</table>
<?php 
}?>


<table border="0" width="100%">

<tr>
<td colspan="3">&nbsp;</td>
</tr>

<?php 
$_fh2_data = (isset($this->scope["sources"]) ? $this->scope["sources"] : null);
if ($this->isTraversable($_fh2_data) == true)
{
	foreach ($_fh2_data as $this->scope['source'])
	{
/* -- foreach start output */
?>
<tr>
  <td class=<?php echo $this->scope["source"]["class"];?> colspan="3">
    <a href="<?php echo $this->scope["source"]["url"];?>"><strong><?php echo $this->scope["source"]["name"];?></strong></a> <?php echo $this->scope["source"]["alt_view"];?>

  </td>
</tr>

<tr>
<?php if (((isset($this->scope["source"]["public"]) ? $this->scope["source"]["public"]:null) !== null)) {
?>
<td align="LEFT" valign="TOP">
<table cellspacing="1" cellpadding="1" width="100%" border="0">
 <tr><td>CPUs Total:</td><td align="left"><B><?php echo $this->scope["source"]["cpu_num"];?></B></td></tr>
 <tr><td width="80%">Hosts up:</td><td align="left"><B><?php echo $this->scope["source"]["num_nodes"];?></B></td></tr>
 <tr><td>Hosts down:</td><td align="left"><B><?php echo $this->scope["source"]["num_dead_nodes"];?></B></td></tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td class="footer" colspan="2"><?php echo $this->scope["source"]["cluster_load"];?></td></tr>
 <tr><td class="footer" colspan="2"><?php echo $this->scope["source"]["cluster_util"];?></td></tr>
 <tr><td class="footer" colspan="2"><?php echo $this->scope["source"]["localtime"];?></td></tr>
</table>
</td>

<?php if (((isset($this->scope["source"]["self_summary_graphs"]) ? $this->scope["source"]["self_summary_graphs"]:null) !== null)) {
?>
<td>
 <table align="center" border="0">
  <tr>

   <td>
    <a href="./graph_all_periods.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=load_report&amp;z=large">
      <img src="./graph.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=load_report&amp;z=medium"
           alt="<?php echo $this->scope["source"]["name"];?> LOAD" border="0" />
    </a>
   </td>
   <td>
    <a href="./graph_all_periods.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=mem_report&amp;z=large">
      <img src="./graph.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=mem_report&amp;z=medium"
           alt="<?php echo $this->scope["source"]["name"];?> MEM" border="0" />
    </a>
   </td>
  </tr>

  <tr>
   <td>
    <a href="./graph_all_periods.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=cpu_report&amp;z=large">
      <img src="./graph.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=cpu_report&amp;z=medium"
           alt="<?php echo $this->scope["source"]["name"];?> CPU" border="0" />
    </a>
   </td>
   <td>
    <a href="./graph_all_periods.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=network_report&amp;z=large">
      <img src="./graph.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=network_report&amp;z=medium"
           alt="<?php echo $this->scope["source"]["name"];?> NETWORK" border="0" />
    </a>
   </td>

  </tr>
 </table>
</td>
<?php 
}?>


<?php if (((isset($this->scope["source"]["summary_graphs"]) ? $this->scope["source"]["summary_graphs"]:null) !== null)) {
?>
<td>
 <table align="center" border="0">
  <tr>

      <td>
      <a href="<?php echo $this->scope["source"]["url"];?>">
        <img src="./graph.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=load_report&amp;z=medium&amp;r=<?php echo $this->scope["source"]["range"];?>"
             alt="<?php echo $this->scope["source"]["name"];?> LOAD" border="0" />
      </a>
      </td>

      <td>
      <a href="<?php echo $this->scope["source"]["url"];?>">
        <img src="./graph.php?<?php echo $this->scope["source"]["graph_url"];?>&amp;g=network_report&amp;z=medium&amp;r=<?php echo $this->scope["source"]["range"];?>"
             alt="<?php echo $this->scope["source"]["name"];?> NETWORK" border="0" />
      </a>
      </td>

  </tr>
 </td>
</table>
<?php 
}?>

<?php 
}?>



<?php if (((isset($this->scope["source"]["private"]) ? $this->scope["source"]["private"]:null) !== null)) {
?>
  <td align="LEFT" valign="TOP">
<table cellspacing="1" cellpadding="1" width="100%" border="0">
 <tr><td>CPUs Total:</td><td align="left"><B><?php echo $this->scope["source"]["cpu_num"];?></B></td></tr>
 <tr><td width="80%">Nodes:</td><td align="left"><B><?php echo $this->scope["source"]["num_nodes"];?></B></td></tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td class="footer" colspan="2"><?php echo $this->scope["source"]["localtime"];?></td></tr>
</table>
   </td>
   <td colspan="2" align=center>This is a private cluster.</td>
<?php 
}?>

</tr>
<?php 
/* -- foreach end output */
	}
}?>

</table>

<?php if (((isset($this->scope["show_snapshot"]) ? $this->scope["show_snapshot"] : null) !== null)) {
?>
<table border="0" width="100%">
<tr>
  <td colspan="2" class="title">Snapshot of the <?php echo $this->scope["self"];?> |
    <font size="-1"><a href="./cluster_legend.html">Legend</a></font>
  </td>
</tr>
</table>

<center>
<table cellspacing="12" cellpadding="2">
<?php 
$_fh3_data = (isset($this->scope["snap_rows"]) ? $this->scope["snap_rows"] : null);
if ($this->isTraversable($_fh3_data) == true)
{
	foreach ($_fh3_data as $this->scope['snap_row'])
	{
/* -- foreach start output */
?>
<tr><?php echo $this->scope["snap_row"]["names"];?></tr>
<tr><?php echo $this->scope["snap_row"]["images"];?></tr>
<?php 
/* -- foreach end output */
	}
}?>

</table>
</center>
<?php 
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>