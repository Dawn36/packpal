@extends('layouts.main')

@section('content')
<style>
    .custom-chats-dots {
        display: none;
        transition: 0.8s ease;
    }
    
    .custom-user-div:hover .custom-chats-dots {
        display: block;
        transition: 0.8s ease;
    }
    .pointer {cursor: pointer;}
</style>
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Chat</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="#" class="text-white text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="#" class="text-white text-hover-primary">Chat</a>
                </li>

                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        {{-- <div class="d-flex align-items-center py-3 py-md-1">
            <div class="me-4">
                <a href="#" class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span>
                    Create
                </a>

            </div>

        </div> --}}
    </div>
</div>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                <!--begin::Contacts-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Form-->
                        <form class="w-100 position-relative" autocomplete="off">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by username or email..." />
                            <!--end::Input-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5" id="kt_chat_contacts_body">
                        <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="480px" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
                            <div id='add_user'>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                <div class="card" id="kt_chat_messenger">
                    <div class="card-header" id="kt_chat_messenger_header">
                        <div class="card-title">
                            <div class="d-flex justify-content-center flex-column me-3">
                                <div class="d-flex align-items-center">
                                    <div id='change_div'></div>

                                    <div class="ms-5">
                                        <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1" id='person_name' data-info='chat_box'>Select a person and start chat</a>
                                    </div>
                                </div>
                                <!-- <div class="mb-0 lh-1">
                                    <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                    <span class="fs-7 fw-bold text-muted">Active</span>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="me-n3">
                                <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-three-dots fs-2"></i>
                                </button>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" style="">
                                    <div class="menu-item px-3">
                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" onclick="addContact();">Add Contact</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="kt_chat_messenger_body">
                        <div id='scroll' class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="350px" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">

                            <div id='chatMessage'></div>
                        </div>
                    </div>
                    <div id="kt_chat_messenger_footer"></div>
                </div>
            </div>
        </div>

        {{-- <div class="me-n3 custom-chats-dots">
            <button class="btn btn-sm btn-icon btn-circle btn-active-light-primary p-0 mx-2 w-25px h-25px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="bi bi-three-dots fs-4"></i>
            </button>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Delete Chat</a>
                </div>
            </div>
        </div> --}}
    </div>
    <!--end::Post-->
</div>

<script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>

<script>
    var myId = "{{Auth::user()->id}}";
    var userId = '';
    let ip_address = "{{env('CHAT_IP') }}";
    let socket_port = "{{ env('CHAT_PORT') }}";
    let url = "{{ env('CHAT_URL') }}";
    var page = 1;
    console.log('dawn',url);
    // let socket = io(ip_address + ":" + socket_port);
    let socket = io(url);
    console.log(socket);

    room = '';
    var i = 0;
    getUser();

    function getUser() {
        $.ajax({
            type: "GET",
            url: "{{ route('get_user_contact') }}",
            success: function(result) {
                $('#add_user').html('');
                for (let i = 0; i < result.length; i++) {
                 
                    if (result[i].therd_id != null) {
                        $('#add_user').append(`<div class="d-flex flex-stack py-4 custom-user-div">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px symbol-circle">
                                            <img alt="Pic" src="{{ asset('/profile/${result[i].profile_picture}') }}">
                                            <div style="display:none"  id='userDiv${result[i].user_id}' class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2"></div>
                                        </div>
                                        <div class="ms-5">
                                            <a  class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2 pointer"  onclick="openChatWindow(this,'${result[i].therd_id}','${result[i].user_id}')">${result[i].first_name} ${result[i].last_name}</a>
                                            <div class="fw-bold text-muted">${result[i].email}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end ms-2">
                                        <span class="text-muted fs-7 mb-1" style="margin-left: -40px;">${result[i].last_message_date}</span>
                                        <span class="badge badge-sm badge-circle badge-light-success" id='therd_${result[i].therd_id}'>${result[i].is_read}</span>
                                        
                                    </div>
                                </div>
                                <div class="separator separator-dashed d-none"></div>`);
                    }
                }

            },
        });
    }


    function openChatWindow(obj, therdId, userId) {
        $("#change_div").html('');
        aa = obj.parentElement.parentElement.children[0];
        $("#change_div").html(aa.cloneNode(true));
        page = 1;
        i = 0;
        userId = userId
        room = parseInt(therdId);
        $("#therd_" + therdId).text('0');
        $("#person_name").text(obj.text);
        $("#person_name").attr('data-info', 'chat_box_' + therdId);

        socket.emit("join-room", room);
        var value = {
            therdId: therdId,
            userId: userId
        };
        $.ajax({
            type: "GET",
            url: "{{ route('get_message') }}",
            data: value,
            success: function(result) {
                // debugger;
                // console.log(result);
                $('#chatMessage').html('');
                if (result.data.length > 0) {
                    data = result.data.reverse();
                    for (let i = 0; i < data.length; i++) {
                        classChange = data[i].user_id == myId ? "end" : "start";
                        $('#chatMessage').append(`<div class="d-flex justify-content-${classChange} mb-10">
                    <div class="d-flex flex-column align-items-${classChange}">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-3">
                                <span class="text-muted fs-7 mb-1">${data[i].created_at}</span>
                            </div>
                        </div>
                        <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-${classChange}" data-kt-element="message-text">${data[i].message}</div>
                    </div>
                </div>`);
                    }
                }

                $('#kt_chat_messenger_footer').html('');
                $('#kt_chat_messenger_footer').append(`<div class="card-footer pt-4">
                        <textarea class="form-control form-control-flush mb-3" id='chatInput' onkeypress="return sendMessageOnEnter(event)" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
                        <div class="d-flex flex-stack">
                            <div class="d-flex align-items-center me-2">
                                
                            </div>
                            <button class="btn btn-primary" type="button" data-kt-element="send" onclick="sendMessage()">Send</button>
                        </div>
                    </div>`);
            },
        });
        // $('#scroll').scrollTop($("#scroll").height());
        $('#scroll').scrollTop($("#chatMessage").height());

    }



    function sendMessage() {
        let message = $('#chatInput').val();
        socket.emit('sendChatToSever', {
            "myId": myId,
            "userId": userId,
            "message": message,
            'room': room
        });
        $('#chatInput').val('');
        data = {
            "myId": myId,
            "userId": userId,
            "message": message,
            'room': room
        };

        sendMessageToServer(data);
        return false;
    }


    function sendMessageOnEnter(elem) {
        let message = $('#chatInput').val();
        if (elem.which === 13 && !elem.shiftKey) {
            socket.emit('sendChatToSever', {
                "myId": myId,
                "userId": userId,
                "message": message,
                'room': room
            });
            $('#chatInput').val('');
            data = {
                "myId": myId,
                "userId": userId,
                "message": message,
                'room': room
            };
            sendMessageToServer(data);
            return false;

        }
    }


    // function getId(userId) {
    //     room = parseInt(userId);
    //     socket.emit("join-room", room);
    //     console.log(room);
    // }
    $(function() {

        // var socketIO = io("http://localhost:3000");
        socket.emit("connected", myId);


        socket.on('sendChatToClient', (data) => {
            let meClass = myId == data.myId ? 'end' : 'start';
            $('#chatMessage').append(`<div class="d-flex justify-content-${meClass} mb-10">
                                <div class="d-flex flex-column align-items-${meClass}">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="ms-3">
                                            <span class="text-muted fs-7 mb-1"><?= Date("Y-m-d H:i:s") ?></span>
                                        </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-${meClass}" data-kt-element="message-text">${data.message}</div>
                                </div>
                            </div>`)
                            $('#scroll').scrollTop($("#chatMessage").height());
            // $('#scroll').scrollTop($("#scroll").height());
        });
        socket.on('connection');

        socket.on('updateUserStatus', function(data) {
            console.log('asdasd adas', data);
            $.each(data, (key, value) => {
                if (value != null && value != 0) {
                    let $userIcon = $('#userDiv' + key).show();
                }

            });
        });
    });
    var i = 0;
    socket.on('sendChatToClientA', (data) => {

        i++;
        val = $("#person_name").attr("data-info");
        val2 = "chat_box_" + data.room;
        console.log(val);
        console.log(val2);
        if (val != val2) {
            $("#therd_" + data.room).text(i);
        }
        if (myId == data.userId) {
            console.log(data);
            $.ajax({
                type: "GET",
                url: "{{ route('change_message_status') }}",
                data: data,
                success: function(result) {
                    console.log(result);
                },
            });
        }
    });


    function sendMessageToServer(data) {
        // console.log(data)
        $.ajax({
            type: "GET",
            url: "{{ route('message_store') }}",
            data: data,
            success: function(result) {
                // console.log(result);

            },
        });
    }


    $('#scroll').scroll(function() {
        // console.log('scroll',$(window).scrollTop())
        // console.log($("#scroll").scrollTop());
        // console.log($("#scroll").height());
        if ($("#scroll").scrollTop() == 0) {
            page++;
            $('#scroll').scrollTop($("#chatMessage").height());
            // $("#scroll").scrollTop($("#scroll").height())
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        url = "{{ route('get_message','page=:page') }}";
        url = url.replace(':page', page);
        console.log(url);
        console.log('room', room);
        console.log('userId', userId);
        var value = {
            therdId: room,
            userId: userId
        };
        $.ajax({
                url: url,
                type: 'get',
                data: value,
                beforeSend: function() {
                    //$(".ajax-load").show();
                }
            })
            .done(function(result) {
                if (result.data == "") {
                    // $('.ajax-load').html("No more Posts Found!");
                    return;
                }
                //  $('.ajax-load').hide();
                if (result.data.length > 0) {
                    // data = result.data.reverse();
                    data = result.data;
                    for (let i = 0; i < data.length; i++) {
                        classChange = data[i].user_id == myId ? "end" : "start";
                        $('#chatMessage').prepend(`<div class="d-flex justify-content-${classChange} mb-10">
                    <div class="d-flex flex-column align-items-${classChange}">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ms-3">
                                <span class="text-muted fs-7 mb-1">${data[i].created_at}</span>
                            </div>
                        </div>
                        <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-${classChange}" data-kt-element="message-text">${data[i].message}</div>
                    </div>
                </div>`);
                    }
                }
            })
            // Call back function
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert("Server not responding.....");
            });

    }

    function addContact()
    {
        $.ajax({
            type: 'GET',
            url: "{{ route('add_chat_contact') }}",

            success: function(result) {
                $('#myModalLgHeading').html('Search Users');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
</script>

@endsection