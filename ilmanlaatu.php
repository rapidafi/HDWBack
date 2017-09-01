<?php
// NB! CORS required!
// parametrit / argumentit
if ($_GET) {
  if (isset($_GET['p'])) {
    $p_p = $_GET['p'];
  }
  if (isset($_GET['ss'])) {
    $p_ss = $_GET['ss'];
  }
}

// alternatively get more api like from URI, e.g. .../[self].php/[codeset]/[code]
// no special handling for both, so order matters here
if (isset($_SERVER['PATH_INFO'])) {
  $request = array();
  $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
  $p_p = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
  $p_ss = array_shift($request);
}

header('Content-Type: application/json; charset=utf-8');

// now switch to codeset, regardless of mode (type), not in list mode though
if (isset($p_p)) {
  if (isset($p_ss)) {
    echo file_get_contents("http://biomi.kapsi.fi/tools/airquality/?p=".$p_p."&ss=".$p_ss);
  }
}

?>