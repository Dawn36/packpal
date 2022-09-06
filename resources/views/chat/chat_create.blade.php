<div class="mx-5 mx-xl-18 pt-0 pb-15">
    {{-- <div class="text-center mb-13">
        <h1 class="mb-3">Search Users</h1>
        <div class="text-muted fw-semibold fs-5">Invite Collaborators To Your Project</div>
    </div> --}}
    <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline" data-kt-search="true">
        <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
            <input type="hidden">
            <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                </svg>
            </span>
            <input type="text"  onkeypress="return sendMessageOnEnter(event)" class="form-control form-control-lg form-control-solid px-15" id="search" value="" placeholder="Search by username, full name or email..." data-kt-search-element="input">
            <span id='spinner' class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
            </span>
            <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
                <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                    </svg>
                </span>
            </span>
        </form>
        <div class="py-5">
            <div data-kt-search-element="results" >
                <div class="mh-375px scroll-y me-n7 pe-7" id='add_contact'>
                   
                </div>
            </div>
            <div data-kt-search-element="empty" id='empty' class="text-center d-none">
                <div class="fw-semibold py-10">
                    <div class="text-gray-600 fs-3 mb-2">No users found</div>
                    <div class="text-muted fs-6">Try to search by username, full name or email...</div>
                </div>
                <div class="text-center px-5">
                    <img src="{{ asset('theme/assets/media/illustrations/sigma-1/1.png')}}" alt="" class="w-100 h-200px h-sm-325px">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var search='';
        function sendMessageOnEnter(elem) {
         search = $('#search').val();
        if (elem.which === 13 && !elem.shiftKey) {
            loadMoreDatass(search);

        }
    }

     loadMoreDatass(search);
function loadMoreDatass(search)
   {
    var value = {
        search: search,
        };
      $.ajax({
        url: "{{ route('get_chat_user_listing') }}",
         type:'get',
         data: value,
         beforeSend: function()
         {
            $("#spinner").removeClass("d-none");
         }
      })
      .done(function(data){
         if(data == ""){
            $("#add_contact").html('');
            $('#empty').removeClass("d-none");
            $('#spinner').addClass("d-none");
            return;
         }
         $('#spinner').addClass("d-none");
         $('#empty').addClass("d-none");
         $("#add_contact").html('');
         for (let i = 0; i < data.length; i++) {
            
         $("#add_contact").append(`<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="{{ asset('/profile') }}/${data[i]['profile_picture']}">
                            </div>
                            <div class="ms-5">
                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">${data[i]['first_name']} ${data[i]['last_name']}</a>
                                <div class="fw-semibold text-muted">${data[i]['email']}</div>
                            </div>
                        </div>
                        <div class="ms-2 w-100px">
                            <div class="d-flex flex-center ">
                                <a href="{{url("/add_contact/")}}/${data[i]['id']} " class="btn btn-icon btn-primary btn-circle mr-2">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>`);
         }

      })
      // Call back function
    //   .fail(function(jqXHR,ajaxOptions,thrownError){
    //      alert("Server not responding.....");
    //   });
 
   }
</script>
        
