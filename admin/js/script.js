document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('toggle-btn').addEventListener('click', function() {
        document.body.classList.toggle('hide-sidebar');
    });

    var dropdownBtns = document.getElementsByClassName("dropdown-btn");
    for (var i = 0; i < dropdownBtns.length; i++) {
        dropdownBtns[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
    

    // Add search and filter functionality
    document.getElementById('filterBtn').addEventListener('click', function() {
        var search = document.getElementById('search').value.toLowerCase();
        var orderBy = document.getElementById('orderBy').value;
        var orderType = document.getElementById('orderType').value;

        // Fetch and filter data based on search and sort criteria
        // This is just a placeholder for actual data fetching logic
        console.log('Search:', search);
        console.log('Order By:', orderBy);
        console.log('Order Type:', orderType);

        // Add your data fetching and table update logic here
    });

    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('active');
    });
    

    
});
