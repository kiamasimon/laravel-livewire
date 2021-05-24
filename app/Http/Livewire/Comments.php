<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component {
    use WithPagination;
    public $newComment;

    public function updated($field){
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
    }

    public function addComment(){
        $this->validate(['newComment' => 'required|max:255']);

        $comment = Comment::create([
            'body' => $this->newComment,
            'user_id'=> 1
        ]);
//        $this->comments->prepend($comment);
        $this->newComment = "";
        session()->flash('message', 'Comment added successfully');
    }

    public function remove($comment_id){
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();
//        $this->comments = $this->comments->except($comment_id);
        session()->flash('message', 'Comment deleted successfully');
    }

    public function render(){
        return view('livewire.comments', ['comments'=>Comment::latest()->paginate(2)]);
    }
}
