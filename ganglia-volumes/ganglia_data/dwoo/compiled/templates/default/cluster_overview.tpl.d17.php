<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><table cellspacing=1 cellpadding=1 width="100%" border=0>
 <tr><td>CPUs Total:</td><td align=left><B><?php echo $this->scope["overview"]["cpu_num"];?></B></td></tr>
 <tr><td width="60%">Hosts up:</td><td align=left><B><?php echo $this->scope["overview"]["num_nodes"];?></B></td></tr>
 <tr><td>Hosts down:</td><td align=left><B><?php echo $this->scope["overview"]["num_dead_nodes"];?></B></td></tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td colspan=2><font class="nobr">Current Load Avg (15, 5, 1m):</font><br>&nbsp;&nbsp;<b><?php echo $this->scope["overview"]["cluster_load"];?></b></td></tr>
 <tr><td colspan=2>Avg Utilization (last <?php echo $this->scope["overview"]["range"];?>):<br>&nbsp;&nbsp;<b><?php echo $this->scope["overview"]["cluster_util"];?></b></td></tr>
 </table>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>