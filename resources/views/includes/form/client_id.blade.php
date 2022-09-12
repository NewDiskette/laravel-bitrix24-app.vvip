<form action="{{ route('vvip.store') }}" method="post"> 
    @csrf
    <div class="form-group mb-3">
        <select required class="form-select" size="4"
            id="client_id" name="client_id">
            @foreach($clients as $client)
                    <option 
                        <?php if(isset($task->client_id) && $client->id == $task->client_id)
                            echo 'selected'; ?>
                        value="{{ $client->id }}">
                        {{ $client->name }}
                    </option>
            @endforeach
        </select>
    </div>

