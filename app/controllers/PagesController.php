<?php

class PagesController extends BaseController {

	public function ShowGallery()
	{
		return View::make('gallery');
	}

	public function ShowAbout()
	{
		return View::make('about');
	}

	public function ShowContact()
	{
		return View::make('contact');
	}

	public function ShowLatestProject()
	{
		return View::make('latest-project');
	}

	public function ShowSketchbook()
	{
		return View::make('sketchbook');
	}

	public function ShowComingSoon()
	{
		return View::make('coming-soon');
	}

}
