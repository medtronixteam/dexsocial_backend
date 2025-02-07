<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dexsocial</title>
        <!-- boxicon -->
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <!-- font-awesome -->
        <link rel="stylesheet" href="{{ url('main/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ url('main/css/style.css') }}" />

    </head>

    <body>
        <!-- header -->
        <header class="header bg-dark">
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand text-white" href="/">
                    <h1>DEXSOCIALS</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0 mx-auto">
                        <div class="form-group has-search d-flex">
                            <input class="form-control bg-transparent text-white" type="text" placeholder="Search"
                                aria-label="Search" id="searchInput">
                                <div id="customDropdown">
                                    <input id="searchDropdownInput" type="text" placeholder="Search within options">
                                  </div>


                            <span class="bx bx-search-alt-2 form-control-feedback position-relative"></span>
                        </div>

                    </form>

                    <button class="btn btn-update">Update social</button>
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <script src="{{ url('main/js/jquery-3.5.1.js') }}"></script>
        <script src="{{ url('main/js/bootstrap.bundle.min.js') }}"></script>
        <script>
            $(document).ready(function () {


              function openCustomDropdown(value='') {

                var customDropdown = $('#customDropdown');
                var searchDropdownInput = $('#searchDropdownInput');
                customDropdown.empty();
                if(value!=''){
                $.ajax({
                    url: '/fetch/tokens/all',
                    type: 'POST',
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{name:value},
                    success: function (response) {
                        console.log(response);
                    $.each(response, function (index, item) {
                        let image_path;
                        if(item.image_path=='null' || item.image_path==null){
                            image_path=`{{asset('main/images/noimage.png')}}`;
                        }else{
                            image_path=`{{asset('storage/${item.image_path}')}}`;
                        }
                        let option = $('<div>', {
                            class: 'custom-dropdown-item',
                            html: `<img src="${image_path}" alt="${item.token_name}">
                                <span>${item.token_name}</span>`,
                            click: function () {
                            // Redirect to the specified URL when an item is clicked
                            window.location.href = '/token/'+item.contract_address;
                            }
                        });

                        customDropdown.append(option);
                        });

                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                 });
                }



                // Handle live filtering based on user input
               // Input event to dynamically filter dropdown options based on user input
                    searchDropdownInput.on('input', function () {
                    // Get the current value of the search input and convert it to uppercase
                    var filter = searchDropdownInput.val().toUpperCase();

                    // Iterate through each dropdown item in the custom dropdown
                    $('.custom-dropdown-item').each(function () {
                        // Get the text content of the current dropdown item and convert it to uppercase
                        var text = $(this).text().toUpperCase();

                        // Toggle the visibility of the dropdown item based on the filter
                        $(this).toggle(text.indexOf(filter) > -1);
                    });
                    });

                // Show the custom dropdown, clear the search input, and set focus
                customDropdown.show();
                searchDropdownInput.val('').focus();
              }

              // Event handler to hide the dropdown when clicking outside of it
              $(document).on('click', function (e) {
                if (!$(e.target).hasClass('custom-dropdown-item') &&
                    !$(e.target).is('#searchInput') &&
                    !$(e.target).is('#searchDropdownInput')) {
                  $('#customDropdown').hide();
                }
              });

              // Event handler to open the custom dropdown when the search input is focused
              $('#searchInput').on('focus', function () {
                openCustomDropdown();
              });
              $('#searchInput').on('keyup', function () {
                let value=$(this).val();
                openCustomDropdown(value);
              });
            });
          </script>







    </body>
</html>
