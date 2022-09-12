<?php

function placementBind(){
   $result = CRest::call(
   'placement.bind',
   [
      'PLACEMENT' => 'TASK_VIEW_TAB',
      'HANDLER' => 'https://newdiskette.ru/php/bitrix24/app_vvip_laravel/public/vvip',
      'LANG_ALL' => [
         'en' => [
            'TITLE' => 'App.VV&P',
            'DESCRIPTION' => 'description',
            'GROUP_NAME' => 'group',
         ],
         'ru' => [
            'TITLE' => 'App.VV&P',
            'DESCRIPTION' => 'описание',
            'GROUP_NAME' => 'группа',
         ],
      ],
   ]);

  echo '<pre>';
    print_r($result);
  echo '</pre>';
}

function placementUnbind(){

    $result = CRest::call(
       'placement.unbind',
       [
          'PLACEMENT' => 'TASK_VIEW_TAB',
          'HANDLER' => 'https://newdiskette.ru/php/bitrix24/app_vvip_laravel/public/vvip',
          
       ]
    );

  echo '<pre>';
    print_r($result);
  echo '</pre>';
}