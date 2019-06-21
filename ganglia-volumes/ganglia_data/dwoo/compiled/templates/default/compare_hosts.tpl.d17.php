<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="inspect-graph-dialog" title="Inspect Graph">
  <div id="inspect-graph-dialog-content">
  </div>
</div>
<div>
  Enter host regular expression: 
  <input type="text" name="hreg[]" value="<?php echo $this->scope["hreg_arg"];?>">
  <button>Go</button>
</div>
<div id="compare-hosts-content">
  <div id=compare-hosts>
    <?php if ((isset($this->scope["hreg_arg"]) ? $this->scope["hreg_arg"] : null) != '') {
?>
    <?php if ((isset($this->scope["number_of_metrics"]) ? $this->scope["number_of_metrics"] : null) == 0) {
?>
    <div class="ui-widget">
      <div class="ui-state-default ui-corner-all" style="padding: 0 .7em;"> 
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
          No matching metrics
      </div>
    </div>
    <?php 
}
else {
?>
      <?php $this->scope["i"]=0?>

      <?php 
$_fh0_data = (isset($this->scope["host_metrics"]) ? $this->scope["host_metrics"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['metric'])
	{
/* -- foreach start output */
?>
      <?php $this->scope["graphId"]=((isset($this->scope["GRAPH_BASE_ID"]) ? $this->scope["GRAPH_BASE_ID"] : null)).("dg_").((isset($this->scope["i"]) ? $this->scope["i"] : null))?>

      <?php $this->scope["showEventsId"]=((isset($this->scope["SHOW_EVENTS_BASE_ID"]) ? $this->scope["SHOW_EVENTS_BASE_ID"] : null)).("dg_").((isset($this->scope["i"]) ? $this->scope["i"] : null))?>

      <div class="img_view"><font style="font-size: 9px"><?php echo $this->scope["metric"];?></font>
        <button title="Export to CSV" class="cupid-green" onClick="javascript:location.href='graph.php?<?php echo $this->scope["metric"];
echo $this->scope["hreg"];
echo $this->scope["graphargs"];?>&amp;csv=1';return false;">CSV</button>
        <button title="Export to JSON" class="cupid-green" onClick="javascript:location.href='graph.php?<?php echo $this->scope["metric"];
echo $this->scope["hreg"];
echo $this->scope["graphargs"];?>&amp;json=1';return false;">JSON</button>
        <button title="Inspect Graph" onClick="inspectGraph('mreg[]=%5E<?php echo $this->scope["metric"];?>%24<?php echo $this->scope["hreg"];?>&aggregate=1'); return false;" class="shiny-blue">Inspect</button>
        <button title="Decompose aggregate graph" class="shiny-blue" onClick="javascript:location.href='?mreg[]=%5E<?php echo $this->scope["metric"];?>%24<?php echo $this->scope["hreg"];?>&amp;dg=1';return false;">Decompose</button>
        <input title="Hide/Show Events" type="checkbox" id="<?php echo $this->scope["showEventsId"];?>" onclick="showEvents('<?php echo $this->scope["graphId"];?>', this.checked)"/><label class="show_event_text" for="<?php echo $this->scope["showEventsId"];?>">Hide/Show Events</label>
        <br /><a href="graph_all_periods.php?title=<?php echo $this->scope["metric"];?>&mreg[]=%5E<?php echo $this->scope["metric"];?>%24<?php echo $this->scope["hreg"];?>&aggregate=1&hl=<?php echo $this->scope["host_list"];?>"><img id="<?php echo $this->scope["graphId"];?>" style="margin-top:5px;" class="noborder <?php echo $this->scope["additional_host_img_css_classes"];?>" src="graph.php?title=<?php echo $this->scope["metric"];?>&mreg[]=%5E<?php echo $this->scope["metric"];?>%24$<?php echo $this->scope["hreg"];
echo $this->scope["graphargs"];?>&aggregate=1&hl=<?php echo $this->scope["host_list"];?>" /></a>
      </div>
      <?php echo ($this->assignInScope((isset($this->scope["i"]) ? $this->scope["i"] : null) + 1, 'i'));?>

      <?php 
/* -- foreach end output */
	}
}?>

    <?php 
}?>

    <?php 
}?>

  </div>
</div>
<div style="clear: left"></div>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>