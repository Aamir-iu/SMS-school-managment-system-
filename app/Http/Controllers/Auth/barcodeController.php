<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Picqer\Barcode;
class BarcodeController extends Controller {
	public function __construct() {
		/*$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth');
		$this->beforeFilter('userAccess',array('only'=> array('index','generate')));*/
		$this->middleware('auth');
	}

	public function index()
	{
		// return View::Make('app.barcodeform');
		return view('app.barcodeform');

	}
	/**
	* Display a listing of the resource.
	* POST /barcode
	*
	* @return Response
	*/
	public function generate()
	{
		$rules=[
			'code' => 'required|min:10|max:10'

		];
		$validator = \Validator::make(Input::all(), $rules);
		if ($validator->fails())
		{
			return Redirect::to('/barcode')->withErrors($validator);
		}
		else {
			try {
				$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
				$code=Input::get('code');

				$barcodesc1=array();
				for($i=1;$i<15;$i++)
				{

					$img=base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128));
					$barcode = array("img"=>$img,"code"=>strval($code));
					array_push($barcodesc1,$barcode);
					$code+=1;
				}
				$barcodesc2=array();
				for($i=1;$i<15;$i++)
				{

					$img=base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128));

					$barcode = array("img"=>$img,"code"=>strval($code));
					array_push($barcodesc2,$barcode);
					$code+=1;
				}
				$barcodesc3=array();
				for($i=1;$i<15;$i++)
				{

					$img=base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128));

					$barcode = array("img"=>$img,"code"=>strval($code));
					array_push($barcodesc3,$barcode);
					$code+=1;
				}

				return View::Make('app.barcode',compact('barcodesc1','barcodesc2','barcodesc3'));

			} catch (Exception $e) {
				$validator->errors()->add('Invalid', 'Please give valid number.');
				return Redirect::to('/barcode')->withErrors($validator);
			}
		}

	}	
}
