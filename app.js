document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-btn");
    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            const confirmed = confirm("Da li ste sigurni da želite obrisati ovaj zapis?");
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });

    const searchInput = document.getElementById("searchInput");
    const tasksTable = document.getElementById("tasksTable");

    if (searchInput && tasksTable) {
        searchInput.addEventListener("keyup", function () {
            const filter = this.value.toLowerCase();
            const rows = tasksTable.querySelectorAll("tbody tr");
            rows.forEach(function (row) {
                const titleCell = row.cells[1];
                if (!titleCell) {
                    return;
                }
                const title = titleCell.textContent.toLowerCase();
                row.style.display = title.indexOf(filter) > -1 ? "" : "none";
            });
        });
    }

    const taskForm = document.getElementById("taskForm");
    const titleInput = document.getElementById("title");
    const categorySelect = document.getElementById("category_id");

    if (taskForm && titleInput && categorySelect) {
        taskForm.addEventListener("submit", function (event) {
            if (titleInput.value.trim() === "" || categorySelect.value.trim() === "") {
                alert("Naslov zadatka i kategorija su obavezni.");
                event.preventDefault();
            }
        });
    }

    const categoryForm = document.getElementById("categoryForm");
    const categoryNameInput = document.getElementById("name");

    if (categoryForm && categoryNameInput) {
        categoryForm.addEventListener("submit", function (event) {
            if (categoryNameInput.value.trim() === "") {
                alert("Naziv kategorije je obavezan.");
                event.preventDefault();
            }
        });
    }
});