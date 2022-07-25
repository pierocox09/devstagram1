<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;  
    public $like; 
    public $numerolikes;
    public $comentarios;
  
    public function mount($post) //es el contrustor
    {
            $this->like=$this->post->checklike(auth()->user());
            $this->numerolikes=$post->likes()->count();
            $this->comentarios=$post->comentarios->count();
    }

    public function like()
    {
        
        if($this->post->checklike(auth()->user()))
        {
            
            $this->post->likes()->where('user_id',auth()->user()->id)->delete();
            $this->like=false;
            $this->numerolikes--;

           
        }

        else{
            $this->post->likes()->create(
                [
                   'user_id' =>auth()->user()->id,
                ]);
                $this->like=true;
                $this->numerolikes++;
        }
    }
   
    public function render()
    {

        return view('livewire.like-post');
    }
}
