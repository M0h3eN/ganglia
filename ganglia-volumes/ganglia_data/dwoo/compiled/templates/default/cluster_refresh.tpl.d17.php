<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
echo $this->scope["localtimestamp"];?><!-- || -->Overview of <?php echo $this->scope["cluster"];?> @ <?php echo $this->scope["localtime"];?><!-- || --><?php echo Dwoo_Plugin_include($this, 'cluster_overview.tpl', null, null, null, '_root', null);?><!-- || --><?php if ((isset($this->scope["pie_args"]) ? $this->scope["pie_args"] : null)) {
?>./pie.php?<?php echo $this->scope["pie_args"];

}?><!-- || --><?php if ((isset($this->scope["heatmap_data"]) ? $this->scope["heatmap_data"] : null) && (isset($this->scope["overview"]["num_nodes"]) ? $this->scope["overview"]["num_nodes"]:null) > 0) {

echo $this->scope["heatmap_data"];

}?><!-- || --><?php echo Dwoo_Plugin_include($this, 'cluster_host_metric_graphs.tpl', null, null, null, '_root', null);?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>