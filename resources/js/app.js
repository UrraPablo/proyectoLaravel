import 'bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const searchButton = searchForm.querySelector('button');

    searchButton.addEventListener('mouseenter', function() {
        searchForm.classList.add('active');
    });

    searchForm.addEventListener('mouseleave', function(event) {
        const relatedTarget = event.relatedTarget;
        if (!searchForm.contains(relatedTarget)) {
            searchForm.classList.remove('active');
        }
    });
});