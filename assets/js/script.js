document.addEventListener("DOMContentLoaded", function () {

    const filterBtns = document.querySelectorAll(".filter-btn-am");
    const cards = document.querySelectorAll(".team-card-am");

    filterBtns.forEach(btn => {

        btn.addEventListener("click", function () {

            filterBtns.forEach(b => b.classList.remove("active-am"));
            this.classList.add("active-am");

            const filter = this.getAttribute("data-filter");

            cards.forEach(card => {

                if (filter === "all") {
                    card.style.display = "block";
                } else {
                    if (card.classList.contains(filter)) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                }

            });

        });

    });

});