<?php
class Controller_Thread extends Controller_Template
{

	public function action_index()
	{
		$data['threads'] = Model_Thread::find('all');
		$this->template->title = "Threads";
		$this->template->content = View::forge('thread/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('thread');

		if ( ! $data['thread'] = Model_Thread::find($id, ['related' =>['comments']]))
		{
			Session::set_flash('error', 'Could not find thread #'.$id);
			Response::redirect('thread');
		}

		$this->template->title = "Thread";
		$this->template->content = View::forge('thread/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Thread::validate('create');

			if ($val->run())
			{
				$thread = Model_Thread::forge(array(
					'title' => Input::post('title'),
					'body' => Input::post('body'),
				));

				if ($thread and $thread->save())
				{
					Session::set_flash('success', 'Added thread #'.$thread->id.'.');

					Response::redirect('thread');
				}

				else
				{
					Session::set_flash('error', 'Could not save thread.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Threads";
		$this->template->content = View::forge('thread/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('thread');

		if ( ! $thread = Model_Thread::find($id))
		{
			Session::set_flash('error', 'Could not find thread #'.$id);
			Response::redirect('thread');
		}

		$val = Model_Thread::validate('edit');

		if ($val->run())
		{
			$thread->title = Input::post('title');
			$thread->body = Input::post('body');

			if ($thread->save())
			{
				Session::set_flash('success', 'Updated thread #' . $id);

				Response::redirect('thread');
			}

			else
			{
				Session::set_flash('error', 'Could not update thread #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$thread->title = $val->validated('title');
				$thread->body = $val->validated('body');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('thread', $thread, false);
		}

		$this->template->title = "Threads";
		$this->template->content = View::forge('thread/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('thread');

		if ($thread = Model_Thread::find($id))
		{
			$thread->delete();

			Session::set_flash('success', 'Deleted thread #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete thread #'.$id);
		}

		Response::redirect('thread');

	}

}
