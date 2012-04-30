<div id="search">
   <form method="get" id="searchform" action="<?php bloginfo('url'); ?>" />
      <input type="submit" id="searchsubmit" value="Search" />
      <input type="text" name="s" id="searchfield" value="Search here" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
   </form>
</div>