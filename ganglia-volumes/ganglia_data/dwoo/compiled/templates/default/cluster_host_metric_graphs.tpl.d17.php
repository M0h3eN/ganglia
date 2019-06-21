<?php
/* template head */
if (!function_exists('Dwoo_Plugin_display_host_graphs_5d06a6548e8d7')) {
function Dwoo_Plugin_display_host_graphs_5d06a6548e8d7(Dwoo_Core $dwoo, $hosts, $metric_name, $reports_metricname, $hostcols) {
static $_callCnt = 0;
$dwoo->scope[' 5d06a6548e8d7'.$_callCnt] = array();
$_scope = $dwoo->setScope(array(' 5d06a6548e8d7'.($_callCnt++)));
$dwoo->scope['hosts'] = $hosts;
$dwoo->scope['metric_name'] = $metric_name;
$dwoo->scope['reports_metricname'] = $reports_metricname;
$dwoo->scope['hostcols'] = $hostcols;
/* -- template start output */?>
<?php $dwoo->scope["index"]=1?>

<?php 
$_fh4_data = (isset($dwoo->scope["hosts"]) ? $dwoo->scope["hosts"] : null);
if ($dwoo->isTraversable($_fh4_data) == true)
{
	foreach ($_fh4_data as $dwoo->scope['host'])
	{
/* -- foreach start output */
?>
  <?php if (((isset($dwoo->scope["host"]["textval"]) ? $dwoo->scope["host"]["textval"]:null) !== null)) {
?>
    <td class=<?php echo $dwoo->scope["host"]["class"];?>>
      <b>
        <a href=<?php echo $dwoo->scope["host"]["host_link"];?>><?php echo $dwoo->scope["host"]["name"];?></a>
      </b>
      <br>
      <i><?php echo $dwoo->scope["metric_name"];?>:</i> <b><?php echo $dwoo->scope["host"]["textval"];?></b>
    </td>
  <?php 
}
else {
?>
    <td>
      <div>
        <font style='font-size: 8px'><?php echo $dwoo->scope["host"]["name"];?></font>
        <br>
        <a href=<?php echo $dwoo->scope["host"]["host_link"];?>>
          <img src="./graph.php?<?php if ((isset($dwoo->scope["reports_metricname"]) ? $dwoo->scope["reports_metricname"] : null)) {
?>g<?php 
}
else {
?>m<?php 
}?>=<?php echo $dwoo->scope["metric_name"];?>&amp;<?php echo $dwoo->scope["host"]["metric_graphargs"];?>"
               <?php if ((isset($dwoo->scope["host"]["zoom_support"]) ? $dwoo->scope["host"]["zoom_support"]:null)) {
?>class="host_<?php echo $dwoo->scope["host"]["size"];?>_zoomable"<?php 
}?>

               title="<?php echo $dwoo->scope["host"]["name"];?>"
               border=0
               style="padding:2px;">
        </a>
      </div>
    </td>
    <?php if ((isset($dwoo->scope["hostcols"]) ? $dwoo->scope["hostcols"] : null) == 0) {
?>
      <?php echo $dwoo->assignInScope(array(0=>"load_report", 1=>"mem_report", 2=>"cpu_report", 3=>"network_report"), 'reports');?>

      <?php 
$_fh3_data = (isset($dwoo->scope["reports"]) ? $dwoo->scope["reports"] : null);
if ($dwoo->isTraversable($_fh3_data) == true)
{
	foreach ($_fh3_data as $dwoo->scope['report'])
	{
/* -- foreach start output */
?>
        <td>
          <div>
            <font style='font-size: 8px'><?php echo $dwoo->scope["host"]["name"];?></font>
            <br>
            <a href=<?php echo $dwoo->scope["host"]["host_link"];?>>
              <img src="./graph.php?g=<?php echo $dwoo->scope["report"];?>&amp;<?php echo $dwoo->scope["host"]["report_graphargs"];?>"
                   <?php if ((isset($dwoo->scope["host"]["zoom_support"]) ? $dwoo->scope["host"]["zoom_support"]:null)) {
?>class="host_<?php echo $dwoo->scope["host"]["size"];?>_zoomable"<?php 
}?>

                   title="<?php echo $dwoo->scope["host"]["name"];?>"
                   border=0
                   style="padding:2px;">
            </a>
          </div>
        </td>
      <?php 
/* -- foreach end output */
	}
}?>

    <?php 
}?>

  <?php 
}?>

  <?php if ((isset($dwoo->scope["index"]) ? $dwoo->scope["index"] : null)%(isset($dwoo->scope["hostcols"]) ? $dwoo->scope["hostcols"] : null) == 0) {
?>
    </tr><tr>
  <?php 
}?>

  <?php echo ($dwoo->assignInScope((isset($dwoo->scope["index"]) ? $dwoo->scope["index"] : null) + 1, "index"));?>

<?php 
/* -- foreach end output */
	}
}?>

<?php /* -- template end output */ $dwoo->setScope($_scope, true);
}
}
/* end template head */ ob_start(); /* template body */ ?>

<center>
  <table id=graph_sorted_list>
    <tr>
      <?php echo Dwoo_Plugin_display_host_graphs_5d06a6548e8d7($this, (isset($this->scope["sorted_list"]) ? $this->scope["sorted_list"] : null), (isset($this->scope["metric_name"]) ? $this->scope["metric_name"] : null), (isset($this->scope["reports_metricname"]) ? $this->scope["reports_metricname"] : null), (isset($this->scope["hostcols"]) ? $this->scope["hostcols"] : null));?>

    </tr>
  </table>

  <?php if ((isset($this->scope["overflow"]["count"]) ? $this->scope["overflow"]["count"]:null) > 0) {
?>
  <table width=80%>
    <tr>
      <td align=center class=metric>
        <a href="#"
           id="overflow_list_button"
           onclick="$('#overflow_list').toggle();"
           class="button ui-state-default ui-corner-all"
           title="Toggle overflow list">Show more hosts (<?php echo $this->scope["overflow"]["count"];?>)</a>
      </td>
    </tr>
  </table>
  <div style="display: none;" id="overflow_list">
    <table>
      <tr>
        <?php echo Dwoo_Plugin_display_host_graphs_5d06a6548e8d7($this, (isset($this->scope["overflow_list"]) ? $this->scope["overflow_list"] : null), (isset($this->scope["metric_name"]) ? $this->scope["metric_name"] : null), (isset($this->scope["reports_metricname"]) ? $this->scope["reports_metricname"] : null), (isset($this->scope["hostcols"]) ? $this->scope["hostcols"] : null));?>

      </tr>
    </table>
  </div>
  <div style="clear:both"></div>
<?php 
}?>


<?php if (((isset($this->scope["node_legend"]) ? $this->scope["node_legend"] : null) !== null)) {
?>
<p>
(Nodes colored by 1-minute load) | <a href="./node_legend.html">Legend</A>
</p>
<?php 
}?>

</center>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>