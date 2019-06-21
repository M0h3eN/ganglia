<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
if (((isset($this->scope["flot_graph"]) ? $this->scope["flot_graph"] : null) !== null)) {
?>
  <script type="text/javascript">
   $(function() {
     var viewGraphs = [];
     <?php 
$_fh0_data = (isset($this->scope["view_items"]) ? $this->scope["view_items"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['view_item'])
	{
/* -- foreach start output */
?>
     viewGraphs.push("<?php echo $this->scope["view_item"]["url_args"];?>");
     <?php 
/* -- foreach end output */
	}
}?>

     var tz = getTimezone();
     for (var i = 0; i < viewGraphs.length; i++) {
       var viewGraph = viewGraphs[i];
       console.log(viewGraph);
       var flotGraph = new FlotGraph(viewGraph,
                                     g_refreshInterval,
                                     tz);
       var $viewItem = $("#flot_view_item_" + i);
       $viewItem.html(flotGraph.getBaseHtml());
       flotGraph.initialize();
       flotGraph.start();
     }
   });
  </script>
<?php 
}?>

<div id="views-content">
  <div id=view_graphs>
    <script type="text/javascript">viewCommonYaxis=<?php if ((isset($this->scope["common_y_axis"]) ? $this->scope["common_y_axis"] : null)) {
?>true<?php 
}
else {
?>false<?php 
}?>;yAxisUpperLimit=null;yAxisLowerLimit=null;</script>
    <?php if (((isset($this->scope["number_of_view_items"]) ? $this->scope["number_of_view_items"] : null) !== null)) {
?>
      <?php if ((isset($this->scope["number_of_view_items"]) ? $this->scope["number_of_view_items"] : null) == 0) {
?>
        <div class="ui-widget">
          <div class="ui-state-default ui-corner-all" style="padding: 0 .7em;">
            <p><span class="ui-icon ui-icon-alert"
                     style="float: left; margin-right: .3em;"></span>
              No graphs defined for this view. Please add some
          </div>
        </div>
      <?php 
}
else {
?>
        <?php $this->scope["i"]=0?>

        <?php 
$_fh1_data = (isset($this->scope["view_items"]) ? $this->scope["view_items"] : null);
if ($this->isTraversable($_fh1_data) == true)
{
	foreach ($_fh1_data as $this->scope['view_item'])
	{
/* -- foreach start output */
?>
          <?php $this->scope["graphId"]=((isset($this->scope["GRAPH_BASE_ID"]) ? $this->scope["GRAPH_BASE_ID"] : null)).("view_").((isset($this->scope["i"]) ? $this->scope["i"] : null))?>

          <?php $this->scope["showEventsId"]=((isset($this->scope["SHOW_EVENTS_BASE_ID"]) ? $this->scope["SHOW_EVENTS_BASE_ID"] : null)).("view_").((isset($this->scope["i"]) ? $this->scope["i"] : null))?>

          <div class="img_view">
            <button title="Export to CSV"
                    class="cupid-green"
                    onClick="javascript:location.href='graph.php?<?php echo $this->scope["view_item"]["url_args"];?>&amp;csv=1';return false;">CSV</button>
            <button title="Export to JSON"
                    class="cupid-green"
                    onClick="javascript:location.href='graph.php?<?php echo $this->scope["view_item"]["url_args"];?>&amp;json=1';return false;">JSON</button>
            <?php if ((isset($this->scope["view_item"]["canBeDecomposed"]) ? $this->scope["view_item"]["canBeDecomposed"]:null) == 1) {
?>
              <button title="Decompose graph"
                      class="shiny-blue"
                      onClick="javascript:location.href='?<?php echo $this->scope["view_item"]["url_args"];?>&amp;dg=1&amp;tab=v';return false;">Decompose</button>
            <?php 
}?>

            <button title="Inspect Graph"
                    onClick="inspectGraph('<?php echo $this->scope["view_item"]["url_args"];?>'); return false;" class="shiny-blue">Inspect</button>
            <input type="checkbox"
                   id="<?php echo $this->scope["showEventsId"];?>"
                   onclick="showEvents('<?php echo $this->scope["graphId"];?>', this.checked)"/>
            <label title="Hide/Show Events"
                   class="show_event_text"
                   for="<?php echo $this->scope["showEventsId"];?>">Hide/Show Events</label>
            <br />
            <?php if (((isset($this->scope["flot_graph"]) ? $this->scope["flot_graph"] : null) !== null)) {
?>
              <div id="flot_view_item_<?php echo $this->scope["i"];?>"
                   style="height:280px;width:460px;"
                   class="flotgraph2 img_view"></div>
            <?php 
}
elseif ((isset($this->scope["graph_engine"]) ? $this->scope["graph_engine"] : null) == "flot") {
?>
              <div id="placeholder_<?php echo $this->scope["view_item"]["url_args"];?>"
                   class="flotgraph2 img_view"></div>
              <div id="placeholder_<?php echo $this->scope["view_item"]["url_args"];?>_legend"
                   class="flotlegend"></div>
            <?php 
}
else {
?>
              <a href="graph_all_periods.php?<?php echo $this->scope["view_item"]["url_args"];?>">
                <img id="<?php echo $this->scope["graphId"];?>"
                     class="noborder <?php echo $this->scope["additional_host_img_css_classes"];?>"
                     style="margin-top:5px;"
                     src="graph.php?<?php echo $this->scope["view_item"]["url_args"];?>" />
              </a>
            <?php 
}?>

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
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>