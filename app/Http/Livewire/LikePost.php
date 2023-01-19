<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    //el mount es como el constructor, se ejecuta al llamar likepost
    public function mount($post)
    {
        $this->isLiked = $post->checkLike( auth()->user() );
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if( $this->post->checkLike( auth()->user() )){
            $this->post->likes()->where('post_id', $this->post->id)->delete();

            $this->isLiked = false;
            $this->likes--;

        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);    
            $this->isLiked = true;
            $this->likes++;
        }
    }
    
    public function render()
    {
        return view('livewire.like-post');
    }
}
