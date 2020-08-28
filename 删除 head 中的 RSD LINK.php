<?php

//删除 head 中的 RSD LINK  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://example.com/xmlrpc.php?rsd" />
remove_action( 'wp_head', 'rsd_link' );