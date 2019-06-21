<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!-- Extra content underneath the simple node view. -->
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>