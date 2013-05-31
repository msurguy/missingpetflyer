<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.layout';

	public function getIndex()
	{
		$this->layout->content = View::make('home');
	}

	// return the poster forcing the download
	public function getDownload(){
		//to prevent users from downloading posters created by other people we get the folder hash from the session.	
		$hash = Session::get('hash');
		$destinationPath = 'uploads/'.$hash;

		return Response::download($destinationPath.'/poster.jpg');
	}

	// create the poster using the input data
	public function postIndex()
	{
		// to prevent abuse of the system we generate a random hash and assign it to user's session
		// this way the same user cannot create many posters - only one allowed per session.
		if(!Session::has('hash')){
			$hash = str_random(8);
			Session::put('hash', $hash);
			File::makeDirectory('uploads/'.$hash);
		} else {
			$hash = Session::get('hash');
			if (!File::exists('uploads/'.$hash)) File::makeDirectory('uploads/'.$hash);
		}
		
		$destinationPath = 'uploads/'.$hash;
		$filename = Session::get('filename','original.jpg');
		$fullpath = $destinationPath.'/'.$filename;

		// determine if the image should be cropped or not
		$cropped = false;
		if(Input::get('w') !='' && Input::get('w')!=0){
			$cropped = true;
			// crop the image
			Image::open($fullpath)
			->crop(Input::get('w'),Input::get('h'),Input::get('x'),Input::get('y'))
			->save($destinationPath.'/cropped.jpg');
			$filename = 'cropped.jpg';
			$fullpath = $destinationPath.'/'.$filename;
		}

		// define size of the poster
		$imgwidth = 1224;
		$imgheight = 1584;

		// create empty image on top of which everything else will go
		$img = Image::canvas($imgwidth, $imgheight, '#FFFFFF');

		// get text from the inputs
		$headerText 	= Input::get('header','Missing pet');
		$petName 		= Input::get('name','name');
		$petBreed 		= Input::get('breed','breed');
		$petColor 		= Input::get('color','color');
		$petGender 		= Input::get('gender','gender');
		$petDate 		= Input::get('date','date');
		$contactInfo 	= Input::get('contact','contact');
		
		// determine size of the text strings
		$headerArSize = imagettfbbox(72, 0, 'font/OpenSans-Semibold.ttf', $headerText);
		$headerWidth = abs($headerArSize[2] - $headerArSize[0]);

		$petNameArSize = imagettfbbox(50, 0, 'font/OpenSans-Semibold.ttf', $petName);
		$petNameWidth = abs($petNameArSize[2] - $petNameArSize[0]);

		$petBreedArSize = imagettfbbox(50, 0, 'font/OpenSans-Semibold.ttf', $petBreed);
		$petBreedWidth = abs($petBreedArSize[2] - $petBreedArSize[0]);

		$petColorArSize = imagettfbbox(50, 0, 'font/OpenSans-Semibold.ttf', $petColor);
		$petColorWidth = abs($petColorArSize[2] - $petColorArSize[0]);

		$petGenderArSize = imagettfbbox(50, 0, 'font/OpenSans-Semibold.ttf', $petGender);
		$petGenderWidth = abs($petGenderArSize[2] - $petGenderArSize[0]);

		$petDateArSize = imagettfbbox(50, 0, 'font/OpenSans-Semibold.ttf', $petDate);
		$petDateWidth = abs($petDateArSize[2] - $petDateArSize[0]);

		// write text on top of empty canvas
		$img->text($headerText, ($imgwidth/2)-($headerWidth/2), 120, 72, '#000000', null, 'font/OpenSans-Semibold.ttf');
		$img->text($petName, ($imgwidth/2)-($petNameWidth/2), 930, 50, '#333333', null, 'font/OpenSans-Semibold.ttf');
		$img->text($petBreed,  ($imgwidth/2)-($petBreedWidth/2), 1020, 50, '#333333', null, 'font/OpenSans-Semibold.ttf');
		$img->text($petColor, ($imgwidth/2)-($petColorWidth/2), 1110, 50, '#333333', null, 'font/OpenSans-Semibold.ttf');
		$img->text($petGender, ($imgwidth/2)-($petGenderWidth/2), 1200, 50, '#333333', null, 'font/OpenSans-Semibold.ttf');
		$img->text($petDate, ($imgwidth/2)-($petDateWidth/2), 1280, 50, '#333333', null, 'font/OpenSans-Semibold.ttf');
		
		// write contact info
		$img->text($contactInfo, 200, 1370, 32, '#333333', null, 'font/OpenSans-Semibold.ttf');

		// assign avatar of the pet
		if (File::exists($fullpath)){
			$avatar = Image::make($fullpath);
		} else {
			$avatar = Image::make('img/dogsketch.jpg');
		}
		
		$img->insert($avatar, ($imgwidth/2)-($avatar->width/2), 170);

		$img->save($destinationPath.'/poster.jpg');
		return Response::json(array('image'=>url($destinationPath.'/poster.jpg?'.time())), 200);
	}

	// process image upload
	public function postUpload()
	{

		$file = Input::file('file');
		 
		if(!Session::has('hash')){
			$hash = str_random(8);
			Session::put('hash', $hash);
		} else {
			$hash = Session::get('hash');
		}

		$destinationPath = 'uploads/'.$hash;
		$extension= $file->getClientOriginalExtension(); 
		$filename = 'original.'.$extension;

		Session::put('filename',$filename);

		$upload_success = Input::file('file')->move($destinationPath, $filename);
		 
		if( $upload_success ) {
			Image::open($destinationPath.'/'.$filename)->resize(null, 600, true)->save($destinationPath.'/'.$filename);
			return Response::json(array('files'=>array('name'=>url($destinationPath.'/'.$filename.'?'.time()))), 200);
		} else {
		   return Response::json('error', 400);
		}
	}
}