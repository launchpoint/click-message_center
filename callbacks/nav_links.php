<?

if (logged_in())
{
  $message_counts = event('message_count');
  $c=0;
  foreach($message_counts as $module_name=>$data)
  {
    if (array_key_exists('message_count', $data))
    {
      $c+=$data['message_count'];
    }
  }
  global $message_center_subnav_links;
  $message_center_subnav_links=array();
  $link_data = event('message_center_nav_links');
  foreach($link_data as $module_name=>$data)
  {
    if (!array_key_exists('links', $data)) continue;
    {
      $message_center_subnav_links = array_merge($message_center_subnav_links, $data['links']);
    }
  }
  $links = array(
    array('href'=>$message_center_subnav_links[0]['href'], 'label'=>se("Inbox") . (($c > 0) ? " ($c)" : '') )
  );
}