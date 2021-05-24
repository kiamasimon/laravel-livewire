<div class="row">
    <div class="col-sm-3">

    </div>

    <div class="col-sm-6">
        <br>
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h1>Comments</h1>
            </div>

            <div class="card-body">
                @error('newComment')
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror

                <section>
                    @if($image)
                        <div class="row">
                            <div class="col-sm-12">
                                <img src="{{ $image }}" width="200"/>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="file" id="image" wire:change="$emit('fileChoosen')">
                        </div>
                    </div>
                </section>
                <br>

                <form wire:submit.prevent="addComment">
                    <div class="row">
                        <div class="col-sm-9">
{{--                            <input type="text" class="form-control" placeholder="What's on your mind??" wire:model.lazy="newComment" >--}}
                            <input type="text" class="form-control" placeholder="What's on your mind??" wire:model.debounce.500ms="newComment" >
                        </div>

                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </div>
                </form>

                @foreach($comments as $comment)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="rounded border shadow p-3 my-2">
                                <div class="flex justify-start my-2">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <p class="font-bold text-lg">{{ $comment->creator->name }} <small class="disabled">{{ $comment->created_at->diffForHumans() }}</small></p>
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fas fa-times text-danger" style="cursor: pointer;" wire:click="remove({{ $comment->id }})"></i>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-gray-800">{{ $comment->body }}</p>

                                @if($comment->image)
                                    <img width="100" src="{{ $comment->imagePath }}">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                {{ $comments->links('pagination-links') }}
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image');
        let file = inputField.files[0];

        let reader = new FileReader();
        reader.onloadend = () =>{
            window.livewire.emit('fileUpload', reader.result)
        }

        reader.readAsDataURL(file);
    })
</script>

