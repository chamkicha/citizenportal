<?php
  
function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}


function base_url(){

  if (app()->environment()=='local'){

      return Config('api.TEST-TICKET');
  }

  else if(app()->environment()=='production'){

      return Config('api.LIVE-TICKET');

  }
}
