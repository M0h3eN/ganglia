<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ?><!-- Begin show_node.tpl -->
<table border="0" width="100%">
<tr>
  <td colspan="2" class=title><?php echo $this->scope["name"];?> Info</td>
</tr>
<tr><td colspan="1">&nbsp;</td></tr>
<tr>
<td align="center">

<table cellpadding="2" cellspacing="7" border="1">
<tr>
<td class="<?php echo $this->scope["class"];?>">
   <table cellpadding="1" cellspacing="10" border="0">
   <tr><td valign="top"><font size="+2"><b><?php echo $this->scope["name"];?></b></font><br />
   <i><?php echo $this->scope["ip"];?></i><br />
   <em>Location:</em> <?php echo $this->scope["location"];?><p>

   Cluster local time <?php echo $this->scope["clustertime"];?><br />
   Last heartbeat received <?php echo $this->scope["age"];?> ago.<br />
   Uptime <?php echo $this->scope["uptime"];?><br />

   </td>
   <td align="right" valign="top">
   <table cellspacing="4" cellpadding="3" border="0"><tr>
   <tr><td><i>Load:</i></td>
   <td class=<?php echo $this->scope["load1"];?>><small><?php echo $this->scope["load_one"];?></small></td>
   <td class=<?php echo $this->scope["load5"];?>><small><?php echo $this->scope["load_five"];?></small></td>
   <td class=<?php echo $this->scope["load15"];?>><small><?php echo $this->scope["load_fifteen"];?></small></td>
   </tr><tr><td></td><td><em>1m</em></td><td><em>5m</em></td><td><em>15m</em></td></tr>
   </table><br />

   <table cellspacing="4" cellpadding="3" border="0"><tr>
   <td><i>CPU Utilization:</i></td>
   <td class=<?php echo $this->scope["user"];?>><small><?php echo $this->scope["cpu_user"];?></small></td>
   <td class=<?php echo $this->scope["sys"];?>><small><?php echo $this->scope["cpu_system"];?></small></td>
   <td class=<?php echo $this->scope["idle"];?>><small><?php echo $this->scope["cpu_idle"];?></small></td>
   </tr><tr><td></td><td><em>user</em></td><td><em>sys</em></td><td><em>idle</em></td></tr>
   </table>
   </td>
   </tr>
   <tr><td align="left" valign="top">

   <b>Hardware</b><br />
   <em>CPU<?php echo $this->scope["s"];?>:</em> <?php echo $this->scope["cpu"];?><br />
   <em>Memory (RAM):</em> <?php echo $this->scope["mem"];?><br />
   <em>Local Disk:</em> <?php echo $this->scope["disk"];?><br />
   <em>Most Full Disk Partition:</em> <?php echo $this->scope["part_max_used"];?>

   </td>
   <td align="left" valign="top">

   <b>Software</b><br />
   <em>OS:</em> <?php echo $this->scope["OS"];?><br />
   <em>Booted:</em> <?php echo $this->scope["booted"];?><br />
   <em>Uptime:</em> <?php echo $this->scope["uptime"];?><br />
   <em>Swap:</em> <?php echo $this->scope["swap"];?><br />

   </td></tr></table>
</td>
</tr></table>

 </td>
</tr>
<tr>
<td align="center" valign="middle">
 <a href="<?php echo $this->scope["physical_view"];?>">Physical View</a> | <a href="<?php echo $this->scope["self"];?>">Reload</a>
</td>
</tr>
<tr>
 <td>
<?php if (((isset($this->scope["extra"]) ? $this->scope["extra"] : null) !== null)) {
?>
<?php echo Dwoo_Plugin_include($this, "".(isset($this->scope["extra"]) ? $this->scope["extra"] : null)."", null, null, null, '_root', null);?>

<?php 
}?> 
</td>
</tr>
</table>
<!-- End show_node.tpl -->
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>