@extends('user.layouts.app')
@section('title')
    Chat
@endsection
@section('mainContent')
    <div class="wrapper">
        <section id="page-content" class="page-wrapper section">
            <div class="shop-section mb-80">
                <div class="">
                    <div class="container-fluid h-50">
                        <div class="row justify-content-center h-100">
                            <div class="col-md-4 col-xl-3 chat">
                                <div class="card mb-sm-3 mb-md-0 contacts_card">
                                    <div class="card-header">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search..." name="search"
                                                class="form-control search">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text search_btn">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body contacts_body">
                                        <ul class="contacts" id="user_serach">
                                            @foreach ($user_list as $list)
                                                <li id="user_chat" data-id="{{ $list->id }}" style="background:#FFF">
                                                    <div class="d-flex bd-highlight">
                                                        <div class="img_cont">
                                                            <img src="{{ url('uploads/' . $list->avatar) }}"
                                                                class="rounded-circle user_img">
                                                            @if ($list->login_status == 'online')
                                                                <span class="online_icon"></span>
                                                            @else
                                                                <span class="offline"></span>
                                                            @endif

                                                        </div>
                                                        <div class="user_info">
                                                            <span>{{ $list->name }}</span>
                                                            @php
                                                                $use = Auth::user()->id;
                                                                $userID = $list->id;
                                                                $messge_chat = App\Models\Chat::where(function ($query) use ($userID, $use) {
                                                                    return $query->where('recevice_id', $use)->where('send_id', $userID);
                                                                })
                                                                    ->orWhere(function ($query) use ($userID, $use) {
                                                                        return $query->where('send_id', $use)->where('recevice_id', $userID);
                                                                    })
                                                                    ->orderBy('id', 'DESC')
                                                                    ->first();
                                                                
                                                            @endphp
                                                            <p data-toggle="tooltip"
                                                                title="{{ \Illuminate\Support\Str::limit(@$messge_chat->message, 200, $end = '...') }}">
                                                                {{ \Illuminate\Support\Str::limit(@$messge_chat->message, 20, $end = '...') }}
                                                            </p>

                                                        </div>
                                                        @php
                                                            $count_chat = App\Models\Chat::where('send_id', $list->id)
                                                                ->where('status', 'unread')
                                                                ->count();
                                                        @endphp
                                                        @if ($count_chat != 0)
                                                            <span
                                                                style="font-size: 14px;width: 30px;text-align: center;background: #4753c7;color: white;height: 20px;display: flex;justify-content: center;align-items: center;border-radius: 10px;float:right">{{ $count_chat }}</span>
                                                        @endif
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                        <ul class="contacts" id="user_serach1"></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 col-xl-6 chat start_chat">
                                <div class="card">
                                    <div class="card-body msg_card_body">
                                        <p
                                            style="color: #000; font-size: 30px; font-weight: bold; text-align:center;margin-top: 30px;">
                                            Wel Come {{ Auth::user()->name }}
                                        </p>
                                        <div style="text-align: center">
                                            @if (Auth::check() && Auth::user()->avatar)
                                                <img src="{{ url('uploads/' . Auth::user()->avatar) }}"
                                                    class="rounded-circle user_img" style="height: 100px;width:100px">
                                            @else
                                                <img src="{{ asset('user/img/logo/logo.png') }}"
                                                    class="rounded-circle user_img" style="height: 100px;width:100px">
                                            @endif
                                        </div>
                                        <center>
                                            <div class="chat_center"
                                                style="width: 202px;height: 55px;background: #000;border-radius: 25px; margin-top:15px">
                                                <p class="text-center"
                                                    style="color: #FFF;font-size: 25px;line-height: 59px;font-weight: bold;">
                                                    Start
                                                    Chat</p>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 col-xl-6 chat chat_start"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('user/chat/all.css') }}">
    <link rel="stylesheet" href="{{ asset('user/chat/chat.css') }}">
    <style>
        .contacts_body .contacts li:hover {
            background: #999 !important
        }

    </style>
@endsection
@section('scripts')
    <script>
        var Project_Url = '{{ env('Project_Url') }}';
        $('.search').on('change', function() {
            var search = this.value;
            $.ajax({
                type: 'get',
                url: Project_Url + 'userside/chat/user_search',
                data: {
                    search: search
                },
                success: function(data) {
                    $("#user_serach").empty();
                    $("#user_serach1").empty();
                    if (data.status == 'success') {
                        $('#user_serach').css("display", "none");
                        $('#user_serach1').css("display", "block");
                        var obj = data.user_list
                        if (obj.length > 0) {
                            jQuery.each(obj, function(i, val) {
                                if (val.login_status == 'online') {
                                    var online = `<span class="online_icon"></span>`;
                                } else {
                                    var online = `<span class="offline"></span>`;
                                }
                                $('#user_serach1').append((
                                    `<li id="user_chat" data-id="${val.id}" style="background:#FFF">
                                                    <div class="d-flex bd-highlight">
                                                    <div class="img_cont">
                                                    <img src=${Project_Url}uploads/${val.avatar} class="rounded-circle user_img">${online}
                                                    </div>
                                                    <div class="user_info">
                                                    <span>${val.name}</span>
                                                    <p></p>
                                                    </div>
                                                    </div>
                                                    </li>`
                                ))
                            });
                        } else {
                            var not = 'Record Not Found';
                            $('#user_serach1').append((
                                `<li id="user_chat" style="background:#FFF">${not}</li>`))
                        }
                    }
                }
            });
        });



        $(document).ready(function() {
            $(".start_chat").show();
            $(".chat_start").hide();
        });
        $(document).on("click", "#user_chat", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('userside.chat.show') }}",
                type: 'get',
                data: {
                    id: id
                },
                success: function(msg) {
                    $(".start_chat").hide();
                    $(".chat_start").show();
                    $('.chat_start').html(msg.html).scrollTop($(
                        ".chat_start")[0].scrollHeight);
                },
                error: function() {
                    $('.chat_start').html(msg.html).scrollTop($(
                        ".chat_start")[0].scrollHeight);
                }
            });
        });

    </script>
@endsection
