<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    
    'modules' => [
      'dynagrid'=> [
      'class'=>'\kartik\dynagrid\Module',
      // other module settings
  ],
  'gridview'=> [
      'class'=>'\kartik\grid\Module',
      // other module settings
  ],
  ],
];
