<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dexsocial</title>
    <!-- boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- font-awesome -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- header -->
    <header class="header bg-dark">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand text-white" href="#">
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
        <!-- 1 section -->
        <section class="token-section">
            <div class="container-fluid mt-4 position-relative">
                <div class="row">
                     <!-- First Column -->
                    <div class="col-md-8 col-lg-9 col-xl-10">
                        <div class="d-flex align-items-center">
                            <img src="assets/images/pokemon.jfif" class="card-img-top"
                                style="max-width: 80px; height: auto;" alt="Profile Image">
                            <div class="card-body">
                                <h5 class="card-title  ml-3 mb-0 h3">John Doe</h5>
                                <div class="d-flex flex-wrap">
                                    <button class="btn gradient-btn m-3">
                                        <h4>$BabyDragon</h4>
                                    </button>
                                    <button class="btn gradient-btn m-3">votes <span class="h4">12233</span></button>
                                    <button class="btn gradient-btn m-3">
                                        <i class="bx bxl-telegram"></i> Button
                                        <small class="d-block">Subheading</small>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <p class="card-text mt-3">Description about ✔ John Doe 🎶 goes here. 😜</p>
                    </div>

                    <!-- Second Column -->
                    <div class="col-md-4 col-lg-3 col-xl-2">
                        <div class="mt-4">
                            <button class="btn btn-block btn-dark mb-2">
                                <i class="fas fa-star"></i> Visit Website
                            </button>
                            <button class="btn btn-block  btn-dark mb-2">
                                <i class="fas fa-heart"></i> Telegram English
                            </button>
                            <button class="btn btn-block  btn-dark mb-2">
                                <i class="fas fa-envelope"></i> Follow Twitter
                            </button>
                            <button class="btn btn-block  btn-dark">
                                <i class="fas fa-cog"></i> Follow Telegram
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
          // Data representing each dropdown option
          var searchData = [
            { value: 'Apple', image: 'pok.png', redirect: 'apple' },
            { value: 'Banana', image: 'banana.jpg', redirect: 'banana' },
            { value: 'Cherry', image: 'cherry.jpg', redirect: 'cherry' },
            // ... (include the rest of your data)
          ];

          // Function to open and populate the custom dropdown
          function openCustomDropdown() {
            // Get references to the dropdown container and search input
            var customDropdown = $('#customDropdown');
            var searchDropdownInput = $('#searchDropdownInput');
            customDropdown.empty(); // Clear previous content

            // Populate the dropdown with items from the searchData array
            $.each(searchData, function (index, item) {
              var option = $('<div>', {
                class: 'custom-dropdown-item',
                html: `<img src="assets/images/${item.image}" alt="${item.value}">
                       <span>${item.value}</span>`,
                click: function () {
                  // Redirect to the specified URL when an item is clicked
                  window.location.href = item.redirect;
                }
              });

              customDropdown.append(option);
            });

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
        });
      </script>




</body>

</html>
