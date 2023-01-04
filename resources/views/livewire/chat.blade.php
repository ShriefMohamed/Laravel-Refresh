<div wire:poll>
    <div class="container">
        <div class="messaging">
            <div class="inbox_msg">
                <div class="mesgs">
                    <div id="chat" class="msg_history">
                    @forelse ($messages as $message)
                        @if ($message->user_id == auth()->user()->id)
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->message }}</p>
                                        <span class="time_date">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="incoming_msg">{{ $message->name }}
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->message }}</p>
                                            <span class="time_date">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> No Previous Messages!</h5>
                        @endforelse
                    </div>

                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <div class="form-group">
                                    <button class="msg_send_btn btn btn-primary" type="submit" style="display: inline-block">Send</button>
                                    <input onkeydown='scrollDown()' wire:model.defer="message" required type="text" class="write_msg form-control" placeholder="Write your message..." style="display: inline-block;width: 90%" />
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
