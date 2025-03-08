<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
    public $posts, $name, $gender, $email, $phone, $grade, $post_id;
    public $isOpen = 0;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->gender = '';
        $this->email = '';
        $this->phone = '';
        $this->grade = '';
        $this->post_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'grade' => 'required'
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'grade' => $this->grade
        ]);

        session()->flash('message', 
            $this->post_id ? 'Data is updated.' : 'Data is added.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->name = $post->name;
        $this->gender = $post->gender;
        $this->email = $post->email;
        $this->phone = $post->phone;
        $this->grade = $post->grade;

        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Data has been deleted');
    }
}
