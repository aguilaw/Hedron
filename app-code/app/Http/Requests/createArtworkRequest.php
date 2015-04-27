<?php namespace hedron\Http\Requests;

use hedron\Http\Requests\Request;

class createArtworkRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
			//TODO need authorization?
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'tools'  =>array('Min:3','Max:200','regex:/[A-Za-z0-9\(,\)\- ]/','required'),
			'file' => 'Image','Max:2000',
			'type'=>array('regex:/[A-Za-z0-9\(,\)\- ]/','required'),
			'title'=>'regex:/[A-Za-z0-9_@#$%^&*()!,.`+=-~:;"\/) ]/',
		// 'desc'=>'alpha|max:300', /*fails eventhough input only contained letters and nums*/
			'featured'=>'alpha',
		// 'left'=>'numeric',
		// 'top'=>'numeric',
		];
	}

}
