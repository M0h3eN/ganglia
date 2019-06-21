<?php
/* template head */
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
/* end template head */ ob_start(); /* template body */ ;
if ((isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
  <!doctype html>
  <html>
    <head>
      <title>Ganglia: Graph all periods</title>
      <?php echo Dwoo_Plugin_include($this, 'scripts.tpl', null, null, null, '_root', null);?>

<?php 
}?>

<script type="text/javascript">
 function openDecompose($url) {
   $.cookie("ganglia-selected-tab-" + window.name, 0);
   location.href="./index.php" + $url + "&amp;tab=m";
 }

 $(function() {
   <?php if (((isset($this->scope["graph_actions"]) ? $this->scope["graph_actions"] : null) !== null)) {
?>
   initShowEvent();
   <?php if ((isset($this->scope["graph_actions"]["timeshift"]) ? $this->scope["graph_actions"]["timeshift"]:null)) {
?>
   initTimeShift();
   <?php 
}?>

   <?php if ((isset($this->scope["graph_actions"]["metric_actions"]) ? $this->scope["graph_actions"]["metric_actions"]:null) && (isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
   initMetricActionsDialog();
   <?php 
}?>

   <?php if ((isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
   $("#popup-dialog").dialog( { autoOpen: false,
                                width:800,
                                height:500,
                                position: { my: "top",
                                            at: "top+200",
                                            of: window } } );
   <?php 
}?>

   <?php 
}?>

 });
</script>

<?php if ((isset($this->scope["conf"]["graph_engine"]) ? $this->scope["conf"]["graph_engine"]:null) == 'flot') {
?>
  <style type="text/css">
   .flotgraph {
     height: <?php echo $this->scope["flot_graph_height"];?>px;
     width: <?php echo $this->scope["flot_graph_width"];?>px;
   }
  </style>

  <script type="text/javascript">
   var metric = "<?php if (((isset($this->scope["g"]) ? $this->scope["g"] : null) !== null)) {
?> <?php echo $this->scope["g"];?> <?php 
}
else {
?> <?php echo $this->scope["m"];?> <?php 
}?>";
   var base_url = "graph.php?flot=1&amp;<?php echo $this->scope["m"];?>&amp;<?php echo $this->scope["query_string"];?>&amp;r=hour";
  </script>
  <script type="text/javascript" src="js/create-flot-graphs.js"></script>
<?php 
}?>


<?php if ((isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
    </head>
    <body onSubmit="return false;">

      <div id="popup-dialog" title="Inspect Graph">
        <div id="popup-dialog-navigation"></div>
        <div id="popup-dialog-content">
        </div>
      </div>

      <div id="metric-actions-dialog"
           style="display: none"
           title="Metric Actions">
        <div id="metric-actions-dialog-content">
          Available Metric actions.
        </div>
      </div>
<?php 
}?>


<form>

  <?php if (((isset($this->scope["mobile"]) ? $this->scope["mobile"] : null) !== null)) {
?>
    <div data-role="page" class="ganglia-mobile" id="view-home">
      <div data-role="header">
        <a href="#" class="ui-btn-left"
           data-icon="arrow-l"
           onclick="history.back(); return false">Back</a>
        <h3><?php if (((isset($this->scope["html_g"]) ? $this->scope["html_g"] : null) !== null)) {
?> <?php echo $this->scope["html_g"];?> <?php 
}
else {
?> <?php echo $this->scope["html_m"];?> <?php 
}?></h3>
        <a href="#mobile-home">Home</a>
      </div>
      <div data-role="content">
  <?php 
}?>


  <?php if ((isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
    <div style="background-color:#dddddd;<?php if ((isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?> padding:5px; <?php 
}?>">
      <big>
        <b><?php echo $this->scope["host_type"];?>: </b><?php echo $this->scope["host_description"];?>&nbsp;
        <b><?php echo $this->scope["metric_type"];?>: </b><?php echo $this->scope["metric_description"];?>&nbsp;&nbsp;
      </big>
    </div>
  <?php 
}?>


  <?php if (((isset($this->scope["graph_actions"]) ? $this->scope["graph_actions"] : null) !== null)) {
?>
    <?php if ((isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
      <div style='height:10px;'></div>
    <?php 
}?>

    <div>
      <div style="float:right;">
        <input title="Hide/Show Events"
               type="checkbox"
               id="show_all_events_graph_all_periods"
               onclick="showAllEvents(this.checked)"/>
        <label class="show_event_text"
               for="show_all_events_graph_all_periods">Hide/Show Events All Graphs</label>
        <?php if ((isset($this->scope["graph_actions"]["timeshift"]) ? $this->scope["graph_actions"]["timeshift"]:null)) {
?>
          <input title="Timeshift Overlay"
                 type="checkbox"
                 id="timeshift_overlay"
                 onclick="showTimeshiftOverlay(this.checked)"/>
          <label class="show_timeshift_text"
                 for="timeshift_overlay">Timeshift Overlay</label>
          <br />
        <?php 
}?>

      </div>
      <div style="clear:both"></div>
    </div>
  <?php 
}?>


  <?php if (((isset($this->scope["embed"]) ? $this->scope["embed"] : null) !== null) || (isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
    <div style='height:10px;'></div>
  <?php 
}?>


  <?php 
$_fh0_data = (isset($this->scope["conf"]["time_ranges"]) ? $this->scope["conf"]["time_ranges"]:null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['key']=>$this->scope['value'])
	{
/* -- foreach start output */
?>
    <?php if ((isset($this->scope["value"]) ? $this->scope["value"] : null) != 'job') {
?>
      <div class="img_view">
        <?php $this->scope["graphId"]=((isset($this->scope["GRAPH_BASE_ID"]) ? $this->scope["GRAPH_BASE_ID"] : null)).((isset($this->scope["key"]) ? $this->scope["key"] : null))?>


        <?php if (((isset($this->scope["graph_actions"]) ? $this->scope["graph_actions"] : null) !== null)) {
?>
          <span style="padding-left: 4em; padding-right: 4em; text-weight: bold;"><?php echo $this->scope["key"];?></span>

          <?php if ((isset($this->scope["graph_actions"]["metric_actions"]) ? $this->scope["graph_actions"]["metric_actions"]:null)) {
?>
            <button class="cupid-green"
                    title="Metric Actions - Add to View, etc"
                    onclick="<?php if ((isset($this->scope["is_aggregate"]) ? $this->scope["is_aggregate"] : null)) {
?> metricActionsAggregateGraph('<?php echo $this->scope["query_string"];?>') <?php 
}
else {
?> metricActions('<?php echo $this->scope["h"];?>', <?php if (((isset($this->scope["g"]) ? $this->scope["g"] : null) !== null)) {
?> '<?php echo $this->scope["g"];?>', 'graph' <?php 
}
else {
?> '<?php echo $this->scope["m"];?>', 'metric' <?php 
}?>, '<?php echo $this->scope["query_string"];?>')<?php 
}?>; return false;">+</button>
          <?php 
}?>


          <button title="Export to CSV"
                  class="cupid-green"
                  onclick="window.location='./graph.php?r=<?php echo $this->scope["key"];?>&amp;<?php echo $this->scope["query_string"];?>&amp;csv=1';return false">CSV</button>

          <button title="Export to JSON"
                  class="cupid-green"
                  onclick="window.location='./graph.php?r=<?php echo $this->scope["key"];?>&amp;<?php echo $this->scope["query_string"];?>&amp;json=1';return false;">JSON</button>

          <?php if ((isset($this->scope["graph_actions"]["decompose"]) ? $this->scope["graph_actions"]["decompose"]:null)) {
?>
            <button title="Decompose aggregate graph"
                    class="shiny-blue"
                    onClick="openDecompose('?r=<?php echo $this->scope["key"];?>&amp;<?php echo $this->scope["query_string"];?>&amp;dg=1');return false;">Decompose</button>
          <?php 
}?>


          <button title="Inspect Graph"
                  onClick="inspectGraph('r=<?php echo $this->scope["key"];?>&amp;<?php echo $this->scope["query_string"];?>'); return false;"
                  class="shiny-blue">Inspect</button>

          <?php $this->scope["showEventsId"]=((isset($this->scope["SHOW_EVENTS_BASE_ID"]) ? $this->scope["SHOW_EVENTS_BASE_ID"] : null)).((isset($this->scope["key"]) ? $this->scope["key"] : null))?>


          <input title="Hide/Show Events"
                 type="checkbox"
                 id="<?php echo $this->scope["showEventsId"];?>"
                 onclick="showEvents('<?php echo $this->scope["graphId"];?>', this.checked)"/>
          <label class="show_event_text"
                 for="<?php echo $this->scope["showEventsId"];?>">Hide/Show Events</label>

          <?php if ((isset($this->scope["graph_actions"]["timeshift"]) ? $this->scope["graph_actions"]["timeshift"]:null)) {
?>
            <?php $this->scope["timeShiftId"]=((isset($this->scope["TIME_SHIFT_BASE_ID"]) ? $this->scope["TIME_SHIFT_BASE_ID"] : null)).((isset($this->scope["key"]) ? $this->scope["key"] : null))?>

            <input title="Timeshift Overlay"
                   type="checkbox"
                   id="<?php echo $this->scope["timeShiftId"];?>"
                   onclick="showTimeShift('<?php echo $this->scope["graphId"];?>', this.checked)"/>
            <label class="show_timeshift_text"
                   for="<?php echo $this->scope["timeShiftId"];?>">Timeshift</label>
          <?php 
}?>

        <?php 
}?>


        <br />

        <?php if ((isset($this->scope["conf"]["graph_engine"]) ? $this->scope["conf"]["graph_engine"]:null) == "flot") {
?>
          <div id="placeholder_<?php echo $this->scope["key"];?>" class="flotgraph img_view"></div>
          <div id="placeholder_<?php echo $this->scope["key"];?>_legend" class="flotlegend"></div>
        <?php 
}
else {
?>
          <a href="./graph.php?r=<?php echo $this->scope["key"];?>&amp;z=<?php echo $this->scope["xlargesize"];?>&amp;<?php echo $this->scope["query_string"];?>">
            <img class="noborder"
                 id="<?php echo $this->scope["graphId"];?>"
                 style="margin-top:5px;"
                 title="Last <?php echo $this->scope["key"];?>"
                 src="graph.php?r=<?php echo $this->scope["key"];?>&amp;z=<?php echo $this->scope["largesize"];?>&amp;<?php echo $this->scope["query_string"];?>"></a>
        <?php 
}?>

      </div>
    <?php 
}?>

  <?php 
/* -- foreach end output */
	}
}?>

  <div style="clear: left"></div>
</form>
<?php if ((isset($this->scope["standalone"]) ? $this->scope["standalone"] : null)) {
?>
    </body>
  </html>
<?php 
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>