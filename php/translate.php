<?php
class Perkthe {
  private $url = "https://translate.yandex.net/api/v1.5/tr.json/translate";
  private $key = "--";
  private $format = "plain";
  function __construct( $language ) {
		$this->language = $language;
	}
  function translate($text){
  $parameters = array(
            'key'     => $this->key,
            'text'    => $text,
            'lang'    => $this->language,
            'format'  => $this->format
  );
  $options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($parameters)
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($this->url, false, $context);
  if ($result === FALSE){
    return false;
  }else return json_decode($result, true);
  }
}
?>