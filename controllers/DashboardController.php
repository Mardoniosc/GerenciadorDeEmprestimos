<?php 

class DashboardController extends Controller {
  public function home() {
    $this->loadView('dashboard');
  }
}