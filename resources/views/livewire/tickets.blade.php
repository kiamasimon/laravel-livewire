<div class="row">
    <div class="col-sm-12">
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <h4>Support Tickets</h4>
            </div>

            <div class="card-body">
                @foreach($tickets as $ticket)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="rounded border shadow p-3 my-2 {{ $active == $ticket->id ? 'bg-primary' : '' }}" wire:click="$emit('ticketSelected', {{ $ticket->id }})">
                                <p class="text-gray-800">{{ $ticket->question }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
