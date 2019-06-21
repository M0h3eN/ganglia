<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!-- A place to put custom HTML for the cluster view. -->
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>