<?php

/*
 * Obtendo os dados HG Finance
 *
 * Consulte nossa documentacao em https://console.hgbrasil.com/documentation/finance
 * Contato: https://console.hgbrasil.com/tickets
 *
 * Ontenha uma chave gratuitamente: https://console.hgbrasil.com/keys
 *
 * Copyright 2018 - HG Brasil - HG Finance
 *
*/


class HGFinance {
  private $key = null;
  private $locale = 'pt-br';
  private $use_ssl = true;

  private $valid_key = null;
  private $last_query = '';

  public $data = false;

  private $requests = array();

  const sdk_version = '1.0.0';

  function __construct($key = null, $locale = 'pt-br', $use_ssl = true){
    if(!empty($key)) $this->key = $key;
    if(!empty($locale)) $this->locale = $locale;
    if(!empty($use_ssl)) $this->use_ssl = $use_ssl;
  }

  function valid_key() {
    return $this->valid_key;
  }

  function get_requests() {
    return $this->requests;
  }

  function get_key() {
    return $this->key;
  }

  function get_locale() {
    return $this->locale;
  }

  function get_use_ssl() {
    return $this->use_ssl;
  }

  function set_key($key) {
    $this->key = $key;
  }

  function set_locale($locale) {
    $this->locale = $locale;
  }

  function set_use_ssl($use_ssl) {
    $this->use_ssl = $use_ssl;
  }

  function get($endpoint = '', $params = array()) {
    $query = md5($endpoint.serialize($params));
    if($query == $this->last_query) return $this->data;

    $data = $this->hg_request($endpoint, $params);

    if(!empty($data) && is_array($data) && isset($data['valid_key']) && is_array($data['results'])) {
      $this->data = $data['results'];
      $this->last_query = $query;
      $this->valid_key = $data['valid_key'] != 0;
    } else {
      return false;
    }

    return $this->data;
  }

  private function hg_request($endpoint = '', $params = array()) {
    $uri = ($this->use_ssl ? 'https' : 'http') . '://api.hgbrasil.com/finance/'.$endpoint.'?format=json&';

    if(is_array($params)){
      $params = array_merge($params, array(
        'locale' => $this->locale,
        'sdk_version' => 'php_f'.self::sdk_version
      ));

      if(!empty($this->key) && $this->key != 'SUA-CHAVE') $params = array_merge($params, array('key' => $this->key));

      foreach($params as $key => $value){
        if(empty($value)) continue;
        $uri .= $key.'='.urlencode($value).'&';
      }

      $this->requests[] = $uri;
      $response = @file_get_contents(substr($uri, 0, -1));

      return json_decode($response, true);
    } else {
      return false;
    }
  }

}

function pr($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

?>
