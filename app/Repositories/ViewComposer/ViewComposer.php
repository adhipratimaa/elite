<?php
namespace App\Repositories\ViewComposer;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Testimonial\TestimonialRepository;
use App\Repositories\Setting\SettingRepository;
use Illuminate\View\View;

class ViewComposer {
	private $dashboard;
	private $setting;
	
	public function __construct(DashboardRepository $dashboard,ServiceRepository $service, TestimonialRepository $testimonial, SettingRepository $setting) {
		$this->dashboard=$dashboard;
		$this->service=$service;
		$this->testimonial=$testimonial;
		$this->setting=$setting;

	}
	public function compose(View $view) {
		$dashboard=$this->dashboard->first();
		$setting=$this->setting->first();
		$service=$this->service->orderBy('created_at','desc')->get();
		$testimonial=$this->testimonial->orderBy('created_at', 'desc')->get();
		$view->with(['dashboard_composer'=>$dashboard,'dashboard_setting'=>$setting,'dashboard_service'=>$service, 'dashboard_testimonial'=>$dashboard]);
	}
	
}
