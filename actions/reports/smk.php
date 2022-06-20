<?php

$render = '';

if(
    isset($_GET['from']) && !empty($_GET['from']) &&
    isset($_GET['to']) && !empty($_GET['to'])
)
{
    unset($_GET['r']);
    $url = config('child_sites')['smk'].'/index.php?r=api/reports/index&'.http_build_query($_GET);
    $data = file_get_contents($url);
    $data = json_decode($data);
    
    $render = $data->status == 'fail'?$data->message:$data->data;
}

return compact('render');