<?php

class ErrorsController extends Controller {
  
  public function notFound() {
    $this->loadView('errors/404');
  }
}