<?php namespace App\Controllers;

use App\Models\MovieModel;

class Home extends BaseController
{
	/**
	 * Index Movie Data
	 */
	public function index()
	{
		$data['title'] = "Movie Index";
		$MovieModel = new MovieModel();
		$data['listMovie'] = $MovieModel->findAll();
		return view('movie_index', $data);
	}

	/**
	 * Create new Movie
	 * 
	 */
	public function create()
	{
		$data['title'] = "Create Movie";
		
		// Rule Validation
		$movie_rule = [
			'title' 		=> 'required',
			'description' 	=> 'required'
		];
		
		if($this->request->getMethod() == 'post'){
			if($this->validate($movie_rule)){
				$MovieModel = new MovieModel();
				$movieData = array(
					'title' 	  => $this->request->getPost('title'), 
					'description' => $this->request->getPost('description'), 
				);
				
				// esc => escape character, help prevent XSS attacks 
				if($MovieModel->save(esc($movieData))){
					//redirect same page, and show flash success message
					return redirect()->to('/')->with('message_noti', 'Success create new movie!');
				}else {
					//redirect same page, and show flash error message
					return redirect()->back()->with('message_error', 'Failed create new movie!');
				}
			}else {
				// validation info
				$data['validation'] = $this->validator;
			}
		}
		return view('movie_create', $data);
	}

	/**
	 * Edit movie
	 * @param int movie id
	 */
	public function edit(int $movie_id)
	{
		$data['title'] = "Edit";
		$MovieModel = new MovieModel();
		$data['movieData'] = $MovieModel->find($movie_id);
		if(empty($data['movieData'])){
			return redirect()->to('/')->with('message_error', 'Movie not exist');
		}
		// Rule Validation
		$movie_rule = [
			'title' 		=> 'required',
			'description' 	=> 'required'
		];
		if($this->request->getMethod() == 'post'){
			if($this->validate($movie_rule)){
				
				// If you want update data, you need define primary key exp: id
				$movieData = array(
					'id'		  => $movie_id, //movie id
					'title' 	  => $this->request->getPost('title'), 
					'description' => $this->request->getPost('description'), 
				);

				// esc => escape character, help prevent XSS attacks 
				if($MovieModel->save(esc($movieData))){
					//redirect same page, and show flash success message
					return redirect()->to('/')->with('message_noti', 'Success update change!');
				}else {
					//redirect same page, and show flash error message
					return redirect()->back()->with('message_error', 'Failed update change!');
				}
			}else {
				// validation info
				$data['validation'] = $this->validator;
			}
		}
		return view('movie_edit', $data);
	}

	/**
	 * Delete Movie
	 * @param int movie id
	 */
	public function delete(int $movie_id)
	{
		$MovieModel = new MovieModel();
		
		$check = $MovieModel->find($movie_id);
		
		if(empty($check)){
			return redirect()->to('/')->with('message_error', 'Movie not exist');
		}else {
			$MovieModel->delete($movie_id);
			return redirect()->to('/')->with('message_noti', 'Success delete data!');
		}
	}
	//--------------------------------------------------------------------

}
