<div class="card">
    <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
            <div class="img_cont">
                <img src="{{ url('uploads/' . $rece_detali->avatar) }}" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div>
            <div class="user_info">
                <span>Chat with {{ $rece_detali->name }}</span>
                <p class="count">{{ $CountMessages }} Messages</p>
            </div>
        </div>

    </div>


    <div class="card-body msg_card_body">
        @if (sizeof($allMessages) > 0)
            @foreach ($allMessages as $key)
                @if ((int) $key->send_id !== (int) Auth::user()->id)
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            {{ $key->message }}
                            {{-- <span
                                class="msg_time_send">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($key->created_at))->diffForHumans() }}</span> --}}
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{ url('uploads/' . $key->userInfoFrom->avatar) }}"
                                class="rounded-circle user_img_msg">
                        </div>
                    </div>

                @else
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="{{ url('uploads/' . $key->userInfoFrom->avatar) }}"
                                class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                            {{ $key->message }}
                            {{-- <span
                                class="msg_time">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($key->created_at))->diffForHumans() }}</span> --}}
                        </div>
                    </div>
                @endif
            @endforeach

        @endif

    </div>

    <div class="card-footer">
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text attach_btn" style="width:40px"><i class="zmdi zmdi-attachment-alt"
                        style="font-size:30px"></i></span>
            </div>
            <input type="hidden" value="{{ $rece_detali->id }}" name="recevice_id" class="recevice_id"
                id="recevice_id">
            <textarea name="message" id="type_msg" class="form-control type_msg"
                placeholder="Type your message..."></textarea>
            <div class="input-group-append">
                <button class="input-group-text send_btn" style="width:40px"><i class="zmdi zmdi-caret-right-circle"
                        style="font-size:30px"></i></button>
            </div>
        </div>
    </div>
</div>
<script>
    $(".send_btn").click(function() {
        var recevice_id = $('#recevice_id').val();
        var message = $('#type_msg').val();
        $.ajax({
            url: "{{ route('userside.chat.store') }}",
            type: 'get',
            data: {
                recevice_id: recevice_id,
                message: message
            },
            success: function(msg) {
                alert("sucess");
                // var message = "jaymin";
                // var jk = $('.card-body msg_card_body').append(
                //     '<div class="d-flex justify-content-start mb-4"><div class="msg_cotainer">' +
                //     message + '</div></div>')
                // console.log(jk);
            },
            error: function() {
                alert("not sucess");
            }
        });
    });

</script>
