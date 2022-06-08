<?php 

require('./src/Facebook/autoload.php');


$fb = new Facebook\Facebook([
  'app_id' => '{YOUR APP ID }',
  'app_secret' => '{YOUR APP SECRET}',
  'default_graph_version' => 'v2.10',
  ]);

  $data = [
    'message' => 'My awesome photo upload example.',
    'link' => 'http://www.example.com',
    'source' => $fb->fileToUpload('./src/Facebook-logo.png'),
  ];
  

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/photos', $data, '{YOUR PAGE ACCESS TOKEN }');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Posted with id: ' . $graphNode['id'];



?>