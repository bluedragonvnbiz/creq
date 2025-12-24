<?php
define('USER', "subscriber");
class Pv_Class{

  public function Controller($file_name){
    $file_url = "controller/" . $file_name . ".php";
    $controller_name = "BJ_" . $file_name . "_Controller";
    require_once $file_url;
    $obj = new $controller_name();
    return $obj;
  }

  public function Model($file_name){
    $file_url = "model/" . $file_name . ".php";
    $model_name = "BJ_" . $file_name . "_Model";
    require_once $file_url;
    $obj = new $model_name();
    return $obj;
  }

  public function View($path = "", $data = array()){
    get_template_part("framework/view/" . $path, "", $data);
  }

  public function CSS($file_name, $deps = array(), $path = "assets/css/"){
    if (is_array($file_name)) {
      foreach ($file_name as $file) {
        $css_url = get_template_directory_uri() . "/" . $path . $file . ".css";
        wp_enqueue_style($file, $css_url, $deps, STYLE_VER);
      }
    } else {
      $css_url = get_template_directory_uri() . "/" . $path . $file_name . ".css";
      wp_enqueue_style($file_name, $css_url, $deps, STYLE_VER);
    }
  }

  public function JS($file_name, $deps = array(), $path = "assets/js/", $in_footer = true){
    if (is_array($file_name)) {
      foreach ($file_name as $file) {
        $js_url = get_template_directory_uri() . "/" . $path . $file . ".js";
        wp_enqueue_script($file, $js_url, $deps, STYLE_VER, $in_footer);
      }
    } else {
      $js_url = get_template_directory_uri() . "/" . $path . $file_name . ".js";
      wp_enqueue_script($file_name, $js_url, $deps, STYLE_VER, $in_footer);
    }
  }
}
